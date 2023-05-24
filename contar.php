<?php
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