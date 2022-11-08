<?php
class Products
{

    function __construct()
    {
        // return getProducts();
    }

    public static function getProducts():? array
    {
        try {
            $Products = DB::get(['*'] ,'m_products');
            return $Products;
        } catch (Exception $e) {
            Logger::error('Products', 'Error in add_product ->' . $e->getMessage());
        }
    }
 

}
