<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Jsons</title>
    <?php require_once "scripts.php"; ?>
</head>

<body class="main d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">

            <form class="col-10 card p-4" method="POST" action="procesos.php" enctype="multipart/form-data">
                <div class="row justify-content-evenly mb-3">
                    <p class="form-label fw-bolder ">Seleccione una opción</p>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion1" autocomplete="off" value="elem-faltan" required>
                        <label class="btn btn-outline-dark w-100" for="opcion1">Elementos Faltantes</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion2" autocomplete="off" value="arch-faltan">
                        <label class="btn btn-outline-dark w-100" for="opcion2">Archivos Faltantes</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion3" autocomplete="off" value="duplicados">
                        <label class="btn btn-outline-dark w-100" for="opcion3">Duplicados</label>
                    </div>
                    <div class="col-3">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion4" autocomplete="off" value="contar">
                        <label class="btn btn-outline-dark w-100" for="opcion4">Contar</label>
                    </div>
                </div>

                <div class="row justify-content-evenly">
                    <p class="col-11 fw-bold fs-6" id="instrucciones" hidden>Texto Random</p>
                </div>

                <div class="row justify-content-evenly">
                    <div class="col-5">
                        <label class="form-label fw-bolder ">Json 1</label><!-- for="json1" -->
                        <input class="form-control mb-3" type="file" name="json1" id="json1" accept=".json, .js" disabled required>
                    </div>
                    <div class="col-5">
                        <label class="form-label fw-bolder" id="label2">Json 2</label><!-- for="json2" -->
                        <input class="form-control mb-3" type="file" name="json2" id="json2" accept=".json, .js" disabled required>
                    </div>
                </div>

                <div class="row justify-content-evenly mt-3">
                    <div class="col-4" id="atributo1" hidden>
                        <div class="input-group">
                            <!-- <span class="input-group-text" for="atrib1">Atributo A</span> -->
                            <div class="form-floating">
                                <input class="form-control" type="text" name="atrib1" id="atrib1">
                                <label for="atrib1">Atributo A</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-4" id="atributo2" hidden>
                        <div class="input-group">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="atrib2" id="atrib2">
                                <label for="atrib2">Atributo B</label>
                            </div>
                        </div>
                    </div>

                </div>
                
                
                <div class="row justify-content-evenly mt-3">
                    <button class="btn btn-primary col-6">Procesar</button>
                    <!-- <button class="btn btn-secondary col-6" value="Entrar">Test</button> -->
                </div>
            </form>
        </div>
    </div>

</body>

<script>
    let opcion = document.getElementsByName("radio-option");
    let json1 = document.getElementById("json1");
    let json2 = document.getElementById("json2");
    let label2 = document.getElementById("label2");
    let atributo1 = document.getElementById("atributo1");
    let atrib1 = document.getElementById("atrib1");
    let atributo2 = document.getElementById("atributo2");
    let atrib2 = document.getElementById("atrib2");
    let instrucciones = document.getElementById("instrucciones");
    
        opcion[0].addEventListener("change",(e) => {
            json1.removeAttribute("disabled");

            json2.removeAttribute("disabled");
            json2.removeAttribute("hidden");
            
            label2.removeAttribute("hidden");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");

            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para encontrar elementos faltantes entre 2 objetos json<br>"+
                                        "En Json 1 ingresar el objeto con la totalidad de elementos<br>"+
                                        "En Json 2 ingresar el objeto con los elementos que se van a excluir porque ya existen<br>"+
                                        "En Atributo A ingresar el nombre del atributo que se usara de referencia para la busqueda<br>"+
                                        "El resultado sera un objeto Json con los elementos que faltan en Json2 y el contador del total de elementos faltantes.";

            console.log(json1);
            console.log(json2);
        });

        opcion[1].addEventListener("change",(e) => {
            json1.removeAttribute("disabled");

            json2.removeAttribute("disabled");
            json2.removeAttribute("hidden");
            
            label2.removeAttribute("hidden");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");
            
            atributo2.removeAttribute("hidden");
            atrib2.setAttribute("required","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para encontrar archivos faltantes del objeto json<br>"+
                                        "En Json 1 ingresar el objeto a tratar<br>"+
                                        "En Json 2 ingresar la lista de archivos como objeto json<br>"+
                                        "En Atributo A y B ingresar el nombre del atributo que se usara de referencia respectivamente para la busqueda <br>"+
                                        "El resultado sera un Json con los registros que les falta su archivo, asi como un Json con los archivos que no tienen un registro y el contador del total de elementos faltantes.";

            console.log(json1);
            console.log(json2);
        });

        opcion[2].addEventListener("change",(e) => {
            json1.removeAttribute("disabled");

            json2.setAttribute("disabled","true");
            json2.setAttribute("hidden","true");
            
            label2.setAttribute("hidden","true");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");

            atributo2.removeAttribute("hidden");
            atrib2.setAttribute("required","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para eliminar elementos duplicados<br>"+
                                        "En Json 1 ingresar el objeto json a tratar<br>"+
                                        "En Atributo A y B ingresar los nombres de los atributos que se usaran de referencia para la busqueda<br>"+
                                        "El resultado sera un nuevo objeto Json sin los elementos repetidos.";

            console.log(json1);
            console.log(json2);
        });

        opcion[3].addEventListener("change",(e) => {
            json1.removeAttribute("disabled");

            json2.setAttribute("disabled","true");
            json2.setAttribute("hidden","true");

            label2.setAttribute("hidden","true");

            atrib1.removeAttribute("required");
            atributo1.setAttribute("hidden","true");

            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para contar elementos de un Json<br>"+
                                        "En Json 1 ingresar el objeto json a tratar<br>"+
                                        "El resultado sera el mismo objeto Json y un contador de los elementos que contiene.";
            
            console.log(json1);
            console.log(json2);
        });
</script>

</html>

<!-- 

Pagina para convertir txt a json
https://products.aspose.com/cells/net/conversion/txt-to-json/

comando para listar todos los archivos de una carpeta en .txt
dir /b > lista.txt

-->