
<?php

    $text = $_POST["list-arch"];
    $datos = explode("\n", str_replace("\r", "", $text));
    $prejson = [];
    $cont = 1;
    foreach ($datos as $valor){
        array_push($prejson,['id' => $cont, 'data' => $valor]);
        $cont++;
    }

    $jsonFinal = json_encode($prejson);

    $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);
    $jsonData2 = json_encode($prejson);
    // $jsonData2 = file_get_contents($_FILES["json2"]["tmp_name"]);

    echo "<script> console.log('$jsonFinal'); </script>";
    $myfile = fopen("Backup/".$fecha."/archivos_".$hora.".json", "w") or die("Unable to open file!");
    fwrite($myfile, $jsonFinal);
    fclose($myfile);
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
        flagi = false;
        jason2.forEach((e2) => {
            if (e1.<?php echo $_POST['atrib1'] ?> === e2.data) {
                flagi = true;
            }
        })
        if (flagi === false) {
            jasonFinal.push(e1);
            contador++;
        }
    });

    console.log("Jsons sin archivo");
    console.log(contador)
    console.log(jasonFinal)

    jasonFinal = []
    flagi = false
    contador = 0

    //Funcion para encontrar objeto json faltantes de los archivos
    jason2.forEach((e1) => {
        flagi = false
        jason1.forEach((e2) => {
            if (e1.data === e2.<?php echo $_POST['atrib1'] ?>) {
                flagi = true
            }
        })
        if (flagi === false) {
            jasonFinal.push(e1)
            contador++
        }
    })

    console.log("Arcgivos sin json");
    console.log(contador)
    console.log(jasonFinal)
</script>