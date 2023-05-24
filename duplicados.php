<?php
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