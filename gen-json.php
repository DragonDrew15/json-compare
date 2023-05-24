<?php
    $_test = $_POST["list-arch"];
    $datos = explode("\n", str_replace("\r", "", $_test));
    $prejson = [];
    $cont = 1;
    foreach ($datos as $valor){
        array_push($prejson,['id' => $cont, 'data' => $valor]);
        $cont++;
    }
    $jsonFinal = json_encode($prejson);
    
    // $jsonFile = file_get_contents('pruebas/data4.json');
    // $jsonFile = json_decode($jsonFile);
    // var_dump($jsonFile);
    // print_r($jsonFile); 
    // echo $prejson;

    echo "<script> console.log('$jsonFinal'); </script>";
    $myfile = fopen("Backup/".$fecha."/lista_".$hora.".json", "w") or die("Unable to open file!");
    fwrite($myfile, $jsonFinal);
    fclose($myfile);
?>