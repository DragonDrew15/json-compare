<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Jsons</title>
    <?php require_once "scripts.php"; ?>
</head>

<body class="main d-flex align-items-xxl-center overflow-x-hidden">
    <div class="container">
        <div class="row justify-content-center">

            <form class="col-12 col-lg-11 card p-2 my-2" method="POST" action="procesos.php" enctype="multipart/form-data">
                <div class="row justify-content-evenly mb-3 overflow-y-auto">
                    <div class="col-7 col-lg-10 d-flex align-items-end">
                        <p class="form-label fw-bolder ">Seleccione una opción</p>
                    </div>
                    <div class="col-5 col-lg-2 mb-3">
                        <input type="checkbox" class="btn-check" name="backup-check" id="backup-check" value="chi" autocomplete="off" checked>
                        <label class="btn btn-outline-primary w-100" for="backup-check">Backup</label>
                    </div>

                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion1" autocomplete="off" value="elem-faltan" required>
                        <label class="btn btn-outline-dark w-100" for="opcion1">Elem. Faltantes</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion2" autocomplete="off" value="arch-faltan">
                        <label class="btn btn-outline-dark w-100" for="opcion2">Arch. Faltantes</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion3" autocomplete="off" value="duplicados">
                        <label class="btn btn-outline-dark w-100" for="opcion3">Duplicados</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion4" autocomplete="off" value="contar">
                        <label class="btn btn-outline-dark w-100" for="opcion4">Contar</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1">
                        <input type="radio" class="btn-check" name="radio-option" id="opcion5" autocomplete="off" value="gen-json">
                        <label class="btn btn-outline-dark w-100" for="opcion5">Generar Json</label>
                    </div>
                    <div class="col-6 col-sm-4 col-md-3 col-lg-2 my-1" hidden>
                        <input type="radio" class="btn-check" name="radio-option" id="opcion6" autocomplete="off" value="txt-to-json">
                        <label class="btn btn-outline-dark w-100" for="opcion6">TXT to JSON</label>
                    </div>
                </div>

                <div class="row justify-content-evenly">
                    <p class="col-lg-11 fw-bold fs-6" id="instrucciones" hidden>Texto Random</p>
                </div>

                <div class="row justify-content-evenly">
                    <div class="col-11 col-md-6 col-lg-5" id="div-json1" hidden>
                        <label class="form-label fw-bolder ">Json 1</label><!-- for="json1" -->
                        <input class="form-control mb-3" type="file" name="json1" id="json1" accept=".json, .js">
                    </div>
                    <div class="col-11 col-md-6 col-lg-5" id="div-json2" hidden>
                        <label class="form-label fw-bolder">Json 2</label><!-- for="json2" -->
                        <input class="form-control mb-3" type="file" name="json2" id="json2" accept=".json, .js">
                    </div>
                </div>

                <div class="row justify-content-evenly mt-3">
                    <div class="col-10 col-md-5 col-lg-4" id="atributo1" hidden>
                        <div class="input-group">
                            <!-- <span class="input-group-text" for="atrib1">Atributo A</span> -->
                            <div class="form-floating">
                                <input class="form-control" type="text" name="atrib1" id="atrib1">
                                <label for="atrib1">Atributo A</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-10 col-md-5 col-lg-4" id="atributo2" hidden>
                        <div class="input-group">
                            <div class="form-floating">
                                <input class="form-control" type="text" name="atrib2" id="atrib2">
                                <label for="atrib2">Atributo B</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row justify-content-evenly mt-3">
                    <div class="col-11 col-md-10 col-lg-9 mt-3" id="lista-archivos" hidden>
                        <div class="input-group">
                            <div class="form-floating">
                                <textarea class="form-control" name="list-arch" id="list-arch" style="height: 300px;"></textarea>
                                <label for="list-arch">Lista de Archivos</label>
                            </div>
                        </div>
                    </div>
                </div>

                
                
                <div class="row justify-content-evenly mt-3">
                    <button class="btn btn-primary col-10 col-md-8 col-lg-6">Procesar</button>
                    <!-- <button class="btn btn-secondary col- col-md- col-lg-6" value="Entrar">Test</button> -->
                </div>
            </form>
        </div>
    </div>

</body>

<script>
    let opcion = document.getElementsByName("radio-option");
    let json1 = document.getElementById("json1");
    let div_json1 = document.getElementById("div-json1");
    let json2 = document.getElementById("json2");
    let div_json2 = document.getElementById("div-json2");
    let atributo1 = document.getElementById("atributo1");
    let atrib1 = document.getElementById("atrib1");
    let atributo2 = document.getElementById("atributo2");
    let atrib2 = document.getElementById("atrib2");
    let instrucciones = document.getElementById("instrucciones");
    let lista_archivos = document.getElementById("lista-archivos");
    let list_arch = document.getElementById("list-arch");

    
        opcion[0].addEventListener("change",(e) => {
            div_json1.removeAttribute("hidden");
            json1.setAttribute("required","true");

            div_json2.removeAttribute("hidden");
            json2.setAttribute("required","true");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");

            atributo2.removeAttribute("hidden");
            atrib2.setAttribute("required","true");

            list_arch.removeAttribute("required");
            lista_archivos.setAttribute("hidden","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para encontrar elementos faltantes entre 2 objetos json<br>"+
                                        "En Json 1 ingresar el objeto con la totalidad de elementos<br>"+
                                        "En Json 2 ingresar el objeto con los elementos que se van a excluir porque ya existen<br>"+
                                        "En Atributo A y B ingresar los nombres de los atributos que se usaran de referencia correspondientemente para la busqueda<br>"+
                                        "El resultado sera un objeto Json con los elementos que faltan en Json2 y el contador del total de elementos faltantes.";

            // console.log(lista_archivos);
            // console.log(json2);
        });

        opcion[1].addEventListener("change",(e) => {
            div_json1.removeAttribute("hidden");
            json1.setAttribute("required","true");

            json2.removeAttribute("required");
            div_json2.setAttribute("hidden","true");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");
            
            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            lista_archivos.removeAttribute("hidden");
            list_arch.setAttribute("required","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para encontrar archivos faltantes del objeto json<br>"+
                                        "En Json 1 ingresar el objeto a tratar<br>"+
                                        "En Atributo A ingresar el nombre del atributo que se usara de referencia para la busqueda<br>"+
                                        "En el cuadro de texto escribir la lista de archivos<br>"+
                                        "Comando para listar los archivos de una carpeta:  <code>dir /b > lista.txt</code><br>"+
                                        "El resultado sera un Json con los registros que les falta su archivo, asi como un Json con los archivos que no tienen un registro y el contador del total de elementos faltantes.";

            // console.log(lista_archivos);
            // console.log(json2);
        });

        opcion[2].addEventListener("change",(e) => {
            div_json1.removeAttribute("hidden");
            json1.setAttribute("required","true");

            json2.removeAttribute("required");
            div_json2.setAttribute("hidden","true");

            atributo1.removeAttribute("hidden");
            atrib1.setAttribute("required","true");

            atributo2.removeAttribute("hidden");
            atrib2.setAttribute("required","true");

            list_arch.removeAttribute("required");
            lista_archivos.setAttribute("hidden","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para eliminar elementos duplicados<br>"+
                                        "En Json 1 ingresar el objeto json a tratar<br>"+
                                        "En Atributo A y B ingresar los nombres de los atributos que se usaran de referencia para la busqueda<br>"+
                                        "El resultado sera un nuevo objeto Json sin los elementos repetidos.";

            // console.log(json1);
            // console.log(json2);
        });

        opcion[3].addEventListener("change",(e) => {
            div_json1.removeAttribute("hidden");
            json1.setAttribute("required","true");

            json2.removeAttribute("required");
            div_json2.setAttribute("hidden","true");

            atrib1.removeAttribute("required");
            atributo1.setAttribute("hidden","true");

            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            list_arch.removeAttribute("required");
            lista_archivos.setAttribute("hidden","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para contar elementos de un Json<br>"+
                                        "En Json 1 ingresar el objeto json a tratar<br>"+
                                        "El resultado sera el mismo objeto Json y un contador de los elementos que contiene.";
            
            // console.log(json1);
            // console.log(json2);
        });

        opcion[4].addEventListener("change",(e) => {
            json1.removeAttribute("required");
            div_json1.setAttribute("hidden","true");

            json2.removeAttribute("required");
            div_json2.setAttribute("hidden","true");

            atrib1.removeAttribute("required");
            atributo1.setAttribute("hidden","true");

            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            lista_archivos.removeAttribute("hidden");
            list_arch.setAttribute("required","true");

            instrucciones.removeAttribute("hidden");
            instrucciones.innerHTML = "Función para generar un Json a partir de una lista de archivos<br>"+
                                        "En el cuadro de texto escribir la lista de archivos<br>"+
                                        "El resultado sera el Json de la lista ingresada.";
            
            // console.log(json1);
            // console.log(json2);
        });

        opcion[5].addEventListener("change",(e) => {
            div_json1.removeAttribute("hidden");
            json1.setAttribute("required","true");

            json2.removeAttribute("required");
            div_json2.setAttribute("hidden","true");

            atrib1.removeAttribute("required");
            atributo1.setAttribute("hidden","true");

            atrib2.removeAttribute("required");
            atributo2.setAttribute("hidden","true");

            list_arch.removeAttribute("required");
            lista_archivos.setAttribute("hidden","true");

            instrucciones.setAttribute("hidden","true");
            instrucciones.innerHTML = "Función para generar un Json a partir de una lista de archivos<br>"+
                                        "En el cuadro de texto escribir la lista de archivos<br>"+
                                        "El resultado sera el Json de la lista ingresada.";
            
            // console.log(json1);
            // console.log(json2);
        });
</script>

</html>

<!-- 

Pagina para convertir txt a json
https://products.aspose.com/cells/net/conversion/txt-to-json/

comando para listar todos los archivos de una carpeta en .txt
dir /b > lista.txt

-->