<?php
    $jsonData1 = file_get_contents($_FILES["json1"]["tmp_name"]);
    $jsonData2 = file_get_contents($_FILES["json2"]["tmp_name"]);
?>

<script>
    //json del script
    var jason1 = <?php echo $jsonData1 ?>;
    //json de productivo
    var jason2 = <?php echo $jsonData2 ?>;

    var jasonFinal = [];
    var flagi = false
    var contador = 0

    //Funcion para encontrar elementos faltantes entre 2 objetos json
    //En jason1 ingresar el objeto json con la totalidad de elementos
    //En jason2 ingresar el objeto json con los elementos que se van a excluir por que ya existen
    //El resultado sera un objeto json con los elementos que le faltan al json2 y el contador del total de elementos faltantes
    jason1.forEach(e1 => {
        flagi = false
        jason2.forEach(e2 => {
            if (e1.<?php echo $_POST['atrib1'] ?> === e2.<?php echo $_POST['atrib2'] ?>) {
                flagi = true;
            }
        });
        if (flagi === false) {
            jasonFinal.push(e1);
            contador++;
        }
    });

    console.log("A - B");
    console.log(contador)
    console.log(jasonFinal)


    jasonFinal = []
    flagi = false
    contador = 0

    //Funcion para encontrar objeto json faltantes de los archivos
    jason2.forEach((e1) => {
        flagi = false
        jason1.forEach((e2) => {
            if (e1.<?php echo $_POST['atrib2'] ?> === e2.<?php echo $_POST['atrib1'] ?>) {
                flagi = true
            }
        })
        if (flagi === false) {
            jasonFinal.push(e1)
            contador++
        }
    })

    console.log("B - A");
    
    console.log(contador)
    console.log(jasonFinal)




</script>