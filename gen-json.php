<?php
    $_test = $_POST["list-arch"];

?>
<!-- <textarea style="height: 300px;" class="form-control w-100" type="text" ><?php // echo $_test ?></textarea> -->
<!-- <textarea style="height: 300px;" class="form-control w-100" type="text" ><?php // echo str_replace("\n", "\r", $_test) ?></textarea> -->

<?php
    // $datos = explode("\n", str_replace("\r", "", $_test));
    $datos = explode("\n", $_test);
    $prejson = [];
    $cont = 1;
    foreach ($datos as $valor){
        array_push($prejson,['id' => $cont, 'data' => $valor]);
        $cont++;
    }
    $jsonFinal = json_encode($prejson);

    echo "<script> console.log('$jsonFinal'); </script>";
    $myfile = fopen("Backup/".$fecha."/lista_".$hora.".json", "w") or die("Unable to open file!");
    fwrite($myfile, $jsonFinal);
    fclose($myfile);
?>