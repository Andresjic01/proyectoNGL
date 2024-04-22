<?php
    require_once ("../models/conexion.php");
    require_once ("../models/consultas.php");
    require_once ("../controllers/mostrarInfo.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGL | Preguntas | Copia</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <main>
        <section>
            <?php
                perfile();
            ?>

            <?php
                mensaje();
            ?>
            
            <div id="link" class="Inicio">
                <a href="../index.html" >Obten tus propios mensajes</a>
            </div>
        </section>
        <h3>
            By : Mancilla @AndresJic
        </h3>
    </main>

    <script src="../js/main.js"></script>
</body>
</html>