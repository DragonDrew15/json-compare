<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dragon Jsons</title>
    <?php require_once "scripts.php";  ?>
</head>

<body class="main d-flex align-items-center">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <input class="form-control w-100" type="text" value="<?php echo $_POST['radio-option'] ?>">
            </div>
        </div>
        <div class="row justify-content-center mt-2">
            <div class="col-3">
                <button onclick="main_menu();" class="btn btn-secondary w-100">Regresar al menu principal</button>
            </div>
        </div>
    </div>

</body>

</html>
<?php
date_default_timezone_set("America/Mexico_City");
// date_default_timezone_set("America/Merida");
$fecha = date("Ymd");
if (date("I")) { $hora = date("Gis", strtotime(("-1 hour"))); } else { $hora = date("Gis"); }
// echo "<script>console.log(" . $hora . ");</script>";

// $tipoArchivo = strtolower(pathinfo($archivo1, PATHINFO_EXTENSION));

switch ($_POST['radio-option']) {
    case 'elem-faltan':

        $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);
        $jsonData2 = file_get_contents($_FILES["json2"]["tmp_name"]);

        ?>
        <script>
            //json del script
            var jason1 = <?php echo $jsonData1 ?>;
            //json de productivo
            var jason2 = <?php echo $jsonData2 ?>;

            var jasonFinal = []
            var flagi = false
            var contador = 0

            //Funcion para encontrar elementos faltantes entre 2 objetos json
            //En jason1 ingresar el objeto json con la totalidad de elementos
            //En jason2 ingresar el objeto json con los elementos que se van a excluir por que ya existen
            //El resultado sera un objeto json con los elementos que le faltan al json2 y el contador del total de elementos faltantes
            jason1.forEach((e1) => {
                flagi = false
                jason2.forEach((e2) => {
                    if (e1.<?php echo $_POST['atrib1'] ?> === e2.<?php echo $_POST['atrib1'] ?>) {
                        flagi = true
                    }
                })
                if (flagi === false) {
                    jasonFinal.push(e1)
                    contador++
                }
            })


            console.log("<?php echo $_POST['radio-option'] ?>");
            console.log(contador)
            console.log(jasonFinal)
        </script>
        <?php
        break;

    case 'arch-faltan':

        $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);
        $jsonData2 = file_get_contents($_FILES["json2"]["tmp_name"]);

        ?>
        <script>
            //Json de Productivo
            var jason1 = <?php echo $jsonData1 ?>;

            //lista de archivos en json
            var jason2 = <?php echo $jsonData2 ?>;

            var jasonFinal = []
            var flagi = false
            var contador = 0


            //Funcion para encontrar archivos faltantes del objeto json
            //En jason1 ingresar el objeto json a tratar
            //En jason2 ingresar la lista de archivos ya extraida de la carpeta y transformada en objeto json
            //El resultado sera un json con los objetos que les falta su archivo correspondiente y el contador del total de archivos faltantes
            jason1.forEach((e1) => {
                flagi = false
                jason2.forEach((e2) => {
                    if (e1.<?php echo $_POST['atrib1'] ?> === e2.<?php echo $_POST['atrib2'] ?>) {
                        flagi = true
                    }
                })
                if (flagi === false) {
                    jasonFinal.push(e1)
                    contador++
                }
            })

            console.log(contador)
            console.log(jasonFinal)

            jasonFinal = []
            flagi = false
            contador = 0

            //Funcion para encontrar objeto json faltantes de los archivos
            jason2.forEach((e1) => {
                flagi = false
                jason1.forEach((e2) => {
                    if (e1.data === e2.archivo_url) {
                        flagi = true
                    }
                })
                if (flagi === false) {
                    jasonFinal.push(e1)
                    contador++
                }
            })

            console.log(contador)
            console.log(jasonFinal)
        </script>
        <?php
        break;

    case 'duplicados':

        $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);

        ?>
        <script>
            var jason1 = <?php echo $jsonData1 ?>;

            var jason2 = jason1

            var jasonTemp = []
            var flagi = false
            var contador = 0

            jason1.forEach(element => {
                contador++
            });

            console.log(contador)

            contador = 0

            //Funcion para eliminar elementos duplicados
            //En jason1 ingresar el objeto json a tratar
            for (let i = 0; i < jason2.length; i++) {
                jasonTemp = jason1
                flagi = false
                for (let j = 0; j < jasonTemp.length; j++) {
                    if (jason2[i].<?php echo $_POST['atrib1'] ?> == jasonTemp[j].<?php echo $_POST['atrib1'] ?> && jason2[i].<?php echo $_POST['atrib2'] ?> == jasonTemp[j].<?php echo $_POST['atrib2'] ?>) {
                        if (flagi == false) {
                            flagi = true
                            contador++

                        } else {
                            jason1.splice(j, 1)
                            // j = jasonTemp.length
                        }

                    }
                }
            }

            console.log(contador)
            console.log(jason1)


            // jason.innerHTML = JSON.stringify(jasonFinal);
        </script>
        <?php
        break;

    case 'contar':

        $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);

        ?>
        <script>
            var jason1 = <?php echo $jsonData1 ?>;
            var contador = 0

            //Funcion para encontrar contar un json
            jason1.forEach((e1) => {
                contador++
            })

            // new File(["Normal Text."],"hello world.txt",{type:"text/plain;charset=utf-8"});

            console.log(contador)
            console.log(jason1)
        </script>
        <?php
        break;

    default:
        echo "<script> alert('No hay funcion definida'); </script>";
        break;
}

//Verificando si existe el directorio de lo contarios lo creamos el Directorio

$directorio = "Jsons/" . $fecha . "/Backup/";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

//Guardando archivos en la carperta

if ($_FILES["json1"]["name"] != "") {
    $new_name1 = $_POST['radio-option'] . "-" . $hora . "-1.json";
    $archivo1 = $directorio . basename($new_name1);
    if (move_uploaded_file($_FILES["json1"]["tmp_name"], $archivo1)) {
        echo "<script> console.log('Json1 guardado'); </script>";
    }
}

if (isset($_FILES["json2"]["name"])) {
    $new_name2 = $_POST['radio-option'] . "-" . $hora . "-2.json";
    $archivo2 = $directorio . basename($new_name2);
    if (move_uploaded_file($_FILES["json2"]["tmp_name"], $archivo2)) {
        echo "<script> console.log('Json2 guardado'); </script>";
    }
}


?>

<script>
    function main_menu() {
        window.location.href = "http://localhost/dragon-jsons/";
    }
</script>