<?php
require('../config/core.php');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doc</title>
    <!-- bootstrap 4.6 css -->
    <?php require_once '../template/sections/head.php'; ?>
</head>

<body>
    <?php require_once '../template/sections/navbar.php'; ?>

    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Cargar Stock telefono
    </button>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cargar stock telefono</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <style>
                        .autocomplete {
                            /*the container must be positioned relative:*/
                            position: relative;
                            /* display: inline-block; */
                        }

                        input {
                            border: 1px solid transparent;
                            background-color: #f1f1f1;
                            padding: 10px;
                            font-size: 16px;
                        }

                        input[type=text] {
                            background-color: #f1f1f1;
                            width: 100%;
                        }

                        .autocomplete-items {
                            position: absolute;
                            border: 1px solid #d4d4d4;
                            border-bottom: none;
                            border-top: none;
                            z-index: 99;
                            /*position the autocomplete items to be the same width as the container:*/
                            top: 100%;
                            left: 0;
                            right: 0;
                        }

                        .autocomplete-items div {
                            padding: 10px;
                            cursor: pointer;
                            background-color: #fff;
                            border-bottom: 1px solid #d4d4d4;
                        }

                        .autocomplete-items div:hover {
                            /*when hovering an item:*/
                            background-color: #e9e9e9;
                        }

                        .autocomplete-active {
                            /*when navigating through the items using the arrow keys:*/
                            background-color: DodgerBlue !important;
                            color: #ffffff;
                        }
                    </style>


                    <form method="POST" autocomplete="OFF">
                        <div class="autocomplete">
                            <input id="myInput" type="text" name="telefono" placeholder="Seleccione Telefono" autocomplete="OFF">
                        </div>


                        <div class="d-flex mt-3" style="gap: 20px">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="productoSellado" id="flexRadioDefault1" value="1">
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Sellado
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="productoSellado" id="flexRadioDefault2" value="0" checked>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Usado
                                </label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="imei" class="form-label">Imei</label>
                            <input type="text" class="form-control" id="imei" name="imei">
                        </div>
                        <div class="mb-3">
                            <label for="precio_lista" class="form-label">Precio de lista</label>
                            <input type="number" step="0.01" class="form-control" id="precio_lista" name="precio_lista">
                        </div>
                        <div class="mb-3">
                            <label for="precio_mayorista" class="form-label">Precio mayorista</label>
                            <input type="number" step="0.01" class="form-control" id="precio_mayorista" name="precio_mayorista">
                        </div>
                        <div class="mb-3">
                            <label for="precio_venta" class="form-label">Precio de venta</label>
                            <input type="number" step="0.01" class="form-control" id="precio_venta" name="precio_venta" >
                        </div>
                        <div class="mb-3">
                            <label for="costo" class="form-label">Costo</label>
                            <input type="number" step="0.01" class="form-control" id="costo" name="costo" >
                        </div>
                        <div class="mb-3">
                            <label for="fecha_ingreso" class="form-label">Fecha de ingreso</label>
                            <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" >
                        </div>
                        <div class="mb-3">
                            <label for="bateria" class="form-label">Bateria</label>
                            <input type="number" step="0.1" class="form-control" id="bateria" name="bateria" >
                        </div>

                        <input type="hidden" name="carga_stock_celular" value="1">
                        <input type="hidden" name="plan_canje" value="0">
                        <input type="submit" value="Cargar">
                    </form>

                </div>
            </div>
        </div>
    </div>
    <?php require_once '../template/components/stock_telefonos/tabla_productos.php'; ?>


    <?php require_once '../template/sections/footer.php'; ?>
</body>

<script>
    
    var countries = [
        <?php foreach (Productos::getTelefonos() as $telefono) : ?>
            "<?= $telefono['modelo'] . " " . $telefono['color'] . " - " . $telefono['capacidad'] . "GB |" . $telefono['id']  ?>",
        <?php endforeach; ?>
    ];

    function autocomplete(inp, arr) {
        /*the autocomplete function takes two arguments,
        the text field element and an array of possible autocompleted values:*/
        var currentFocus;
        /*execute a function when someone writes in the text field:*/
        inp.addEventListener("input", function(e) {
            var a, b, i, val = this.value;
            /*close any already open lists of autocompleted values*/
            closeAllLists();
            if (!val) {
                return false;
            }
            currentFocus = -1;
            /*create a DIV element that will contain the items (values):*/
            a = document.createElement("DIV");
            a.setAttribute("id", this.id + "autocomplete-list");
            a.setAttribute("class", "autocomplete-items");
            /*append the DIV element as a child of the autocomplete container:*/
            this.parentNode.appendChild(a);
            /*for each item in the array...*/
            for (i = 0; i < arr.length; i++) {
                /*check if the item starts with the same letters as the text field value:*/
                if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
                    /*create a DIV element for each matching element:*/
                    b = document.createElement("DIV");
                    /*make the matching letters bold:*/
                    b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
                    b.innerHTML += arr[i].substr(val.length);
                    /*insert a input field that will hold the current array item's value:*/
                    b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
                    /*execute a function when someone clicks on the item value (DIV element):*/
                    b.addEventListener("click", function(e) {
                        /*insert the value for the autocomplete text field:*/
                        inp.value = this.getElementsByTagName("input")[0].value;
                        /*close the list of autocompleted values,
                        (or any other open lists of autocompleted values:*/
                        closeAllLists();
                    });
                    a.appendChild(b);
                }
            }
        });
        /*execute a function presses a key on the keyboard:*/
        inp.addEventListener("keydown", function(e) {
            var x = document.getElementById(this.id + "autocomplete-list");
            if (x) x = x.getElementsByTagName("div");
            if (e.keyCode == 40) {
                /*If the arrow DOWN key is pressed,
                increase the currentFocus variable:*/
                currentFocus++;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 38) { //up
                /*If the arrow UP key is pressed,
                decrease the currentFocus variable:*/
                currentFocus--;
                /*and and make the current item more visible:*/
                addActive(x);
            } else if (e.keyCode == 13) {
                /*If the ENTER key is pressed, prevent the form from being submitted,*/
                e.preventDefault();
                if (currentFocus > -1) {
                    /*and simulate a click on the "active" item:*/
                    if (x) x[currentFocus].click();
                }
            }
        });

        function addActive(x) {
            /*a function to classify an item as "active":*/
            if (!x) return false;
            /*start by removing the "active" class on all items:*/
            removeActive(x);
            if (currentFocus >= x.length) currentFocus = 0;
            if (currentFocus < 0) currentFocus = (x.length - 1);
            /*add class "autocomplete-active":*/
            x[currentFocus].classList.add("autocomplete-active");
        }

        function removeActive(x) {
            /*a function to remove the "active" class from all autocomplete items:*/
            for (var i = 0; i < x.length; i++) {
                x[i].classList.remove("autocomplete-active");
            }
        }

        function closeAllLists(elmnt) {
            /*close all autocomplete lists in the document,
            except the one passed as an argument:*/
            var x = document.getElementsByClassName("autocomplete-items");
            for (var i = 0; i < x.length; i++) {
                if (elmnt != x[i] && elmnt != inp) {
                    x[i].parentNode.removeChild(x[i]);
                }
            }
        }
        /*execute a function when someone clicks in the document:*/
        document.addEventListener("click", function(e) {
            // console.log($("#myInput").val());
            closeAllLists(e.target);
        });

    }

    autocomplete(document.getElementById("myInput"), countries);


    $('.boton_de_siguiente_en_venta_plan_canje_si').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step2_venta').css('display', 'block');
    })
    $('.boton_de_siguiente_en_venta_plan_canje_no').click(() => {
        $('.step1_venta').css('display', 'none');
        $('.step3_venta').css('display', 'block');
    })
</script>

</html>