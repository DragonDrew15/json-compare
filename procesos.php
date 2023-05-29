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
                <!-- <input class="form-control w-100" type="text" value="<?php // echo $_POST['backup-check'] ?>"> -->
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-6">
                <!-- <textarea style="height: 300px;" class="form-control w-100" type="text" value='<?php // echo $jsonFinal ?>'></textarea> -->
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
$fecha = date("Ymd");
if (date("I")) { $hora = date("Gis", strtotime(("-1 hour"))); } else { $hora = date("Gis"); }

//Verificando si existe el directorio de lo contarios lo creamos el Directorio
    
$directorio = "Backup/" . $fecha . "/";
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);
}

// $tipoArchivo = strtolower(pathinfo($archivo1, PATHINFO_EXTENSION));

switch ($_POST['radio-option']) {
    case 'elem-faltan':
        include_once "elem-faltan.php";
        break;

    case 'arch-faltan':
        include_once "arch-faltan.php";
        break;

    case 'duplicados':
        include_once "duplicados.php";
        break;

    case 'contar':
        include_once "contar.php";
        break;
    
    case 'gen-json':
        include_once "gen-json.php";
        break;
                
    case 'txt-to-json':
        
        // $textData1 = file_get_contents($_FILES["json1"]["tmp_name"]);

        ?>

<!-- <textarea style="height: 300px;" class="form-control w-100" type="text"></textarea> -->
<?php
    $row = 0;
    $headers = [];
    $prejson = [];
    if (($handle = fopen($_FILES["json1"]["tmp_name"], "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            if ($row == 0) {
                $headers = $data;
            }else{
                $fila = [];
                array_push($fila,['id' => $row]);
                for ($c=0; $c < count($data); $c++) {
                    array_push($fila, [$headers[$c] => $data[$c]]);
                }
                array_push($prejson, $fila);
            }
            $row++;
        }
        fclose($handle);
        $jsonFinal = json_encode($prejson);

        echo "<script> console.log('$jsonFinal'); </script>";

        $myfile = fopen("Backup/".$fecha."/cvs_".$hora.".json", "w") or die("Unable to open file!");
        fwrite($myfile, $jsonFinal);
        fclose($myfile);
    }
?>

       
        <!-- <textarea style="height: 300px;" class="form-control w-100" type="text" ><?php // echo str_replace("\n", "\r", $_test) ?></textarea> -->

        <?php

        // $datos = explode("\n", $_test);
        // $prejson = [];
        // $cont = 1;
        // foreach ($datos as $valor){
        //     array_push($prejson,['id' => $cont, 'data' => $valor]);
        //     $cont++;
        // }
        // $jsonFinal = json_encode($prejson);

        // echo "<script> console.log('$jsonFinal'); </script>";
        // $myfile = fopen("Backup/".$fecha."/lista_".$hora.".json", "w") or die("Unable to open file!");
        // fwrite($myfile, $jsonFinal);
        // fclose($myfile);
    
        break;
    
    default:
        echo "<script> alert('No hay funcion definida'); </script>";
        break;
}

if (isset($_POST['backup-check'])) {

    // echo "<script> alert('se hace backup'); </script>";

    
    
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
}


?>

<script>
    function main_menu() {
        window.location.href = "http://localhost/dragon-jsons/";
    }
</script>

<?php

        // $jsonFile = file_get_contents('pruebas/data4.json');
        // $jsonFile = json_decode($jsonFile);
        // var_dump($jsonFile);
        // print_r($jsonFile);

        // $json_test = json_encode($datos);
        // $prejson = '[\n';


        // echo "<script> console.log('".$valor."'); </script>";
        // $prejson = $prejson.'{"data":"'.$valor.'"},\n'; //
        // array_push($prejson,('"data" => ' + $valor));
        // $prejson = $prejson.']';

        // $json_out = json_encode($prejson);
        // echo "<script>console.log(".json_encode($datos).");</script>";

        
        // var_dump($jsonFile);
        // print_r($jsonFile);
        // echo $jsonFile;
        // echo $_POST["list-arch"];
        // echo "<script> console.log('".$jsonFile."'); </script>";

        // $jsonFile = file_get_contents('pruebas/data4.json');
        // $jsonFile = json_decode($jsonFile);
        // var_dump($jsonFile);
        // print_r($jsonFile); 
        // echo $prejson;