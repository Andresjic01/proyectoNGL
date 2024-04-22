<?php
require_once ("../models/conexion.php");
require_once ("../models/consultas.php");
require_once ("../controllers/mostrarInfo.php");
require_once ("../models/Seguridad.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NGL | Perfil | Copia</title>
    <link rel="stylesheet" href="../css/perfil.css">
</head>
<body>
    <main>

    <div id="tacho">
            <?php
            perfil();
            ?>
            <?php
            links();
            ?>

            <div>
                <a href="../controllers/cerrarSesion.php">Cerrar sesion</a>
            </div>
    </div>
        
        
        <section>
          
          <?php
                post() 
            ?>
          
            
        </section>
    </main>
</body>
</html>