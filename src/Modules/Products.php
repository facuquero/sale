<?php
class Products
{
    public $info;
    public $categories;
    public $products_list = [];
    public $products_catalog = [];

    function __construct()
    {
        try {
            $businessId = $_SESSION['Business']->id;
            # Load products
            $data = DB::get(['*'], 'm_products', ['business_id' => $businessId]);

            if (!$data && !is_array($data)) {
                $data = [];
            }
            $this->info = $data;
            foreach ($data as $product) {
                if ($product['view_in_price_list']) {
                    $this->products_list[] = $product;
                }
                if ($product['view_in_catalog']) {
                    $this->products_catalog[] = $product;
                }
            }
            # Load Cartegories
            $this->categories =  $_SESSION['Categories']->info;
            # Validate directories
            $this->validate_directories();
        } catch (Exception $e) {
            Logger::error('Products', 'Error in Construnct ->' . $e->getMessage());
        }
    }

    /**
     * Method for add a product by POST data parameters
     */
    public function add_product(): string
    {
        try {
            if (empty($_POST['product_name']) || empty($_POST['product_price_sale'])) {
                return Helper::error('Alguno de los campos requeridos se encuentra vacio.');
            }
            # Params
            $product_name = $_POST['product_name'];
            $product_price_sale = $_POST['product_price_sale'];
            $product_price_list = empty($_POST['product_price_list']) ? 0 : $_POST['product_price_list'];
            $product_description = empty($_POST['product_description']) ? '' : $_POST['product_description'];
            $product_category = empty($_POST['category_product']) ? '' : $_POST['category_product'];
            $business_id = $_SESSION['Business']->info['id'];
            $user_creator_id = $_SESSION['User']->info['id'];
            $img = "";
            #Validamos el tamaño de la descripcion
            if (strlen($product_description) > 100) {
                return Helper::error('Tu descripción es muy larga. Solo se permiten 100 caracteres.');
            }
            # Asignamos la primer categoria que encuentre en la lista en caso de no tener ninguna asignada
            if (empty($product_category)) {
                foreach ($_SESSION['Categories']->list as $category) {
                    $product_category = $category;
                    break;
                }
            }
            # Buscamos el ID de la categoria elegida
            $product_category = $_SESSION['Categories']->findCategoryByName($product_category);
            $product_category = $product_category['id'];

            # Upload img
            if (!empty($_FILES['img']['name'])) {
                $img = $this->upload_img();
                if (!$img) {
                    return Helper::error('No se pudo subir tu imagen');
                }
            }

            $status = DB::insert('m_products', [
                'business_id' => $business_id,
                'user_creator_id' => $user_creator_id,
                'category_id' => $product_category,
                'product' => $product_name,
                'price_list' => $product_price_list,
                'price_sale' => $product_price_sale,
                'image_url' => $img,
                'description' => $product_description
            ]);
            if ($status) {
                Helper::alert("Puedes ver tu lista de precios en la sección Enlaces.", './catalog.php');
                return Helper::success('Tu producto fue agregado!');
            }
            return Helper::error('Hubo un problema al intentar agregar tu producto!');
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }
    /**
     * Method for update a product by POST data parameters
     */
    public function update_product(): string
    {
        try {
            # Params
            $businessId = $_SESSION['Business']->id;
            $productId = $_POST['product_update'];
            $business = $_SESSION['Business']->info['business'];
            $product_name = $_POST['product_name'];
            $product_price_list = $_POST['product_price_list'];
            $product_price_sale = $_POST['product_price_sale'];
            $category_product = isset($_POST['category_product']) ? $_POST['category_product'] : '';
            # Validamos descripcion del producto
            if (strlen($_POST['product_description']) > 100) {
                return Helper::error('Tu descripción es muy larga. Solo se permiten 100 caracteres.');
            }
            $product_description = $_POST['product_description'];

            # Validamos antes de subir la imagen, que la membresía se lo permita
            $directory = DIR_UPLOAD . "/" . $_SESSION['Business']->info['business'] . "/products";
            
            if ($_SESSION['Business']->quantity_of_products_consumed >= $_SESSION['Business']->max_products) {
                return Helper::warning('Haz superado el limite de productos con imagenes segun tu membresia.');
            }
            # Validamos si está subiendo una imagen para este producto
            if (!empty($_FILES['img']['name'])) {
                $img = $this->upload_img();
                if (!$img) {
                    return Helper::error('No se pudo subir tu imagen');
                }
            }

            if (Permissions::get_permission('links')) {
                # Traemos todos los datos de la categoria del producto
                $category_product = $_SESSION['Categories']->findCategoryByName($category_product);
            }

            # Eliminamos la imagen anterior del producto si subió una nueva imagen
            $product = DB::findById('m_products', $productId);
            if (!empty($product['image_url'])) {
                $path_img = URL['upload'] . '/' . $business . '/products/' . $product['image_url'];
                $status_delete_img = $this->deleteImageByProduct($path_img);
                if (!$status_delete_img) {
                    Logger::error('Products', 'Error in update_product -> ' . "Se trató de eliminar una imagen de un producto y hubo un error. name_img -> " . $product['image_url'] . " | product_id -> " . $productId . "| user_id -> " . $_SESSION['User']->id . " | Business_id -> " . $businessId);
                }
            }
            
            # Update
            $arrayPamsQueryUpdate = [
                'product' => $product_name,
                'category_id' => isset($category_product["id"]) ? $category_product["id"] : null,
                'price_list' => $product_price_list,
                'price_sale' => $product_price_sale,
                'description' => $product_description
            ];
            if (!empty($_FILES['img']['name'])) {
                $arrayPamsQueryUpdate['image_url'] = $img;
            }

            $statusUpdate = DB::update('m_products', $arrayPamsQueryUpdate, [
                'id' => $productId,
                'AND business_id' => $businessId
            ]);
            return $statusUpdate ? Helper::success('Producto actualizado.') : Helper::error('No se pudo actualizar el producto.');
        } catch (Exception $e) {
            Logger::error('Products', 'Error in product_update -> ' . $e->getMessage());
            return Helper::error('No se pudo actualizar el producto. Es problable que sea un problema interno, lo arreglaremos lo antes posible.');
        }
    }
    /**
     * Method for delete a product by POST data parameters
     */
    public function delete_product(): string
    {
        try {
            $id = $_POST['borrarProducto'];
            $businessId = $_SESSION['User']->info['business_id'];
            $business = $_SESSION['Business']->info['business'];
            $id_user = $_SESSION['User']->info['id'];
            $product = DB::findById('m_products', $id);
            # Validamos que el producto a eliminar realmente pertenece al Business
            if ($product['business_id'] != $businessId) {
                return Helper::error("No puedes eliminar un producto que no te pertenece.");
            }
            if (!empty($product['image_url'])) {
                $path_img = URL['upload'] . '/' . $business . '/products/' . $product['image_url'];
                $status_delete_img = $this->deleteImageByProduct($path_img);
                if (!$status_delete_img) {
                    Logger::error('Products', 'Error in delete_product -> ' . "Se trató de eliminar una imagen de un producto y hubo un error. name_img -> " . $product['image_url'] . " | product_id -> " . $id . "| user_id -> " . $_SESSION['User']->id . " | Business_id -> " . $businessId);
                }
            }
            $status = DB::deleteById('m_products', $id);
            if ($status) {
                return Helper::success("Producto borrado!");
            }
            return Helper::error("No se pudo eliminar el producto");
        } catch (Exception $e) {
            Logger::error('Products', 'Error in remove_product ->' . $e->getMessage());
            return Helper::error("No se pudo eliminar el producto");
        }
    }
    /**
     * Method for delete image from product
     * @param string $file file name to delete
     */
    private function deleteImageByProduct($file): bool
    {
        try {
            if (file_exists($file)) {
                unlink($file);
            }
            return true;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in delete_file -> ' . $e->getMessage());
            return false;
        }
    }
    /**
     * Method for download QRimage 
     */
    public function downloadQR()
    {
        try {
            $business = $_SESSION['Business']->info['business'];
            $fileName = basename("business-$business-catalogoQR.jpg");
            $filePath = '../template/assets/img/qr/' . $fileName;
            if (!empty($fileName) && file_exists($filePath)) {
                // Define headers
                // header("Cache-Control: public");
                // header("Content-Description: File Transfer");
                header("Content-Disposition: attachment; filename=$fileName");
                // Header("Content-type: image/jpg");
                // header("Content-Type: application/zip");
                // header("Content-Transfer-Encoding: binary");

                // Read the file
                readfile($filePath);
                // exit;
            } else {
                return Helper::error('No hemos encontrado tu QR para descargar.');
            }
            return;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in downloadQR -> ' . $e->getMessage());
        }
    }
    /**
     * Method for upload image 
     */
    public function upload_img(): ?string
    {
        try {
            $business = $_SESSION['Business']->info['business'];
            $file = $_FILES['img']['tmp_name'];
            $file_type = $_FILES['img']['type'];
            $file_type = explode('/', $file_type);
            $file_type = $file_type[1];
            $rand = rand(0, 99999999);
            $new_name = $business . '_' . hash('ripemd160', "$rand") . '.webp';
            $ruta_up = "../upload/$business/products/$new_name";
            # Creamos un recurso de imagen 
            switch ($file_type) {
                case 'png':
                    $recursoImage = imagecreatefrompng($file);
                    break;
                case 'jpg':
                case 'jpeg':
                    $recursoImage = imagecreatefromjpeg($file);
                    break;
            }
            $image = $recursoImage;
            if (!$image) {
                $image = imagecreatefromstring(file_get_contents($file));
                $recursoImage = $image;
            }
            # Valor entre 0 y 100. Mayor calidad, mayor peso
            $calidad = 20;
            $status = imagewebp($recursoImage, $ruta_up, $calidad);
            if ($status) {
                return  $new_name;
            }
            return false;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in upload_img -> ' . $e->getMessage());
        }
    }
    /**
     * Method for validate directories. Verify if exist
     */
    private function validate_directories(): void
    {
        try {
            $business = $_SESSION['Business']->info['business'];

            // Business
            if (!is_dir("../upload/$business")) {
                mkdir("../upload/$business", 0777, true);
            }
            // Productos
            if (!is_dir("../upload/$business/products")) {
                mkdir("../upload/$business/products", 0777, true);
            }
            // Img_profiles
            if (!is_dir("../upload/$business/img_profiles")) {
                mkdir("../upload/$business/img_profiles", 0777, true);
            }
            // QR
            if (!is_dir("../upload/$business/qr")) {
                mkdir("../upload/$business/qr", 0777, true);
            }
        } catch (Exception $e) {
            Logger::error('Products', 'Error in validate_directorys -> ' . $e->getMessage());
        }
    }
    /**
     * Method for generate pdf document with products prices
     */
    public function generate_pdf()
    {
        try {
            $Products = '';
            if ($_GET['view_pdf'] == 'list') {
                $Products = $this->products_list;
            }
            if ($_GET['view_pdf'] == 'catalog') {
                $Products = $this->products_catalog;
            }
            $pdf = new PDF();
            //header
            $pdf->AddPage();
            //foter page
            $pdf->AliasNbPages();
            $pdf->SetFont('Arial', 'B', 12);
            // Declaramos el ancho de las columnas
            $w = array(80, 30, 30, 30);
            //Declaramos el encabezado de la tabla
            $pdf->Cell(80, 12, 'Producto', 1);
            $pdf->Cell(30, 12, 'PV', 1);
            $pdf->Cell(30, 12, 'PL', 1);
            $pdf->Cell(30, 12, 'Gan', 1);
            $pdf->Ln();
            $pdf->SetFont('Arial', '', 12);
            //Mostramos el contenido de la tabla
            foreach ($Products as $product) {
                $pdf->Cell($w[0], 6, utf8_decode($product['product']), 1);
                $pdf->Cell($w[1], 6, '$ ' . $product['price_sale'], 1);
                $pdf->Cell($w[2], 6, '$ ' . $product['price_list'], 1);
                $pdf->Cell($w[3], 6, '$ ' . ($product['price_sale'] - $product['price_list']), 1);
                $pdf->Ln();
            }
            $pdf->Output('', '', true);
            // $_SESSION['PDF'] = $pdf;

            // header('Location: ./view/pdf.php');
        } catch (Exception $e) {
            Logger::error('Products', 'Error in generate_pdf -> ' . $e->getMessage());
        }
    }

    /*=========================================
    |   AJAX
    =========================================*/
    /**
     * Method ajax for search products list
     */
    public function AJAX_search_products()
    {
        try {
            if ($_POST['type'] == 'AJAX_list_products') {
                $searchProduct = $_POST['search'];
                $arrayCharacters = array("'");
                $searchProduct = str_replace($arrayCharacters, "", $searchProduct);
                if (empty($searchProduct)) {
                    $data = $_SESSION['Products']->info;
                }
                $data = DB::search('m_products', $searchProduct);
                if (!$data) {
                    $data = array();
                    echo "No se encontraron productos";
                }
                $Business = $_SESSION['Business']->info;
                foreach ($data as $product) {
                    $img_use = "../upload/" . $Business['business'] . "/products/";
                    if (empty($product['image_url'])) {
                        $img_use = '';
                    } else {
                        $img_use .= $product['image_url'];
                    }
                    include('../template/components/products/sub_components/render_products.php');
                }
                die;
            }
        } catch (Exception $e) {
            Logger::error('Products', 'Error in AJAX_search_products -> ' . $e->getMessage());
        }
    }
    /**
     * Method ajax for update view in products
     */
    public function AJAX_update_view_product()
    {
        try {
            $businessId = $_SESSION['Business']->id;
            $productId =  $_POST['product_id'];
            # Validate if the product troly belongs to this business
            $product = DB::findById('m_products', $productId);
            if ($product['business_id'] != $businessId) {
                Response::json([
                    'status' => false,
                    'message' => ' Tratas de modificar un producto que no te pertenece.'
                ], 400);
            }
            if ($_POST['type'] == 'product_view_in_price_list') {
                $statusUpdate = DB::query("UPDATE m_products SET view_in_price_list = !view_in_price_list WHERE id = $productId");
            } elseif ($_POST['type'] == 'product_view_in_catalog') {
                if (count($this->products_catalog) <= $_SESSION['Business']->modules['products_max']) {
                    $statusUpdate = DB::query("UPDATE m_products SET view_in_catalog = !view_in_catalog WHERE id = $productId");
                } else {
                    Response::json([
                        'status' => false,
                        'message' => 'Haz alcanzado la cantidad máxima de productos a mostrar en Catalogo. Recuerda que en la membresía gratuita tienes un limite de 20 productos en catalogo e ilimitado en lista de precios.'
                    ], 400);
                }
            }
            $statusUpdate ? Response::json([
                'status' => true,
                'message' => 'El producto se ha actualizado!'
            ], 200) : Response::json([
                'status' => false,
                'message' => 'No se pudo actualizar el producto'
            ], 500);
        } catch (Exception $e) {
            Logger::error('Products', 'Error in AJAX_update_view_product -> ' . $e->getMessage());
            Response::json([
                'status' => false,
                'message' => 'Hubo un error complejo. Por favor comuniquelo al administrador de la plataforma.'
            ], 500);
        }
    }
}
