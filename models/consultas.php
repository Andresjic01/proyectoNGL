<?php
    class Consultas{
        public function registroUsers($clavemd, $foto, $usuario, $estado){
            //Creamos el objeto de la conexion
            $objConexion = new Conexion();
            $conexion = $objConexion-> get_conexion();

            //select de usuario registrado en el sistema
            //el objetivo de este select es identificar si el ususario ya existe en la base ded datos

            //Creamos el objeto de la conexion
            //creamos la variable que contenga la consulta
            $consultar = "SELECT * FROM usuarios WHERE usuario=:usuario ";
            // $consultar = "SELECT * FROM usuarios WHERE email=:email";

            $result = $conexion -> prepare($consultar);

            $result -> bindparam(":usuario", $usuario );

            $result -> execute();

            $f = $result -> fetch();

            if($f){
                echo'<script> 
                    window.alert("El usuario ya existe");
                    window.location.href = "../pages/registro.html";
                </script>';
            }else{



            //creamos la variable que contiene la consulta a ejecutar
            $insertar ="INSERT INTO usuarios(usuario, clave, perfil, Estado) VALUES(:usuario, :clavemd, :foto, :estado)";

            //Preparamos lo necesario para ejecutar la funcion anterior

            $result= $conexion -> prepare($insertar);

            //convertimos los argumentos en parametros

            $result->bindparam(":clavemd", $clavemd);
            $result->bindparam(":foto", $foto);
            $result->bindparam(":usuario", $usuario);
            $result->bindparam(":estado", $estado);

            //ejecutamos el insert
            $result->execute();

            echo '<script> 
            window.alert("La cuenta se creo con exito, ya puedes iniciar sesion");
            window.location.href = "../index.html";
            </script>';
            }
        }

        public function verpost($id){
            $f = null;
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();


            $consulta = "SELECT * FROM post WHERE idUsuario=:id";
            $result = $conexion -> prepare($consulta);
            
            $result -> bindparam(":id",$id);

            $result -> execute();


            while ($resultado = $result -> fetch()){
                $f[] = $resultado;
            }
            return $f;
            
        } 

        public function mensajes($mensaje, $id){

            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            $consulta= "INSERT INTO post(idusuario, pregunta) VALUES(:id, :mensaje)";
            $result = $conexion -> prepare($consulta);

            $result ->bindparam(":id", $id);
            $result ->bindparam(":mensaje", $mensaje);
            
            $result ->execute();

            echo '<script> 
            window.alert("Has enviado tu mensaje con exito");
            window.location.href = "../pages/preguntas.php?id='.$id.'";
            </script>';
        }

        public function verperfil($id){

            $f = null;
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            $consulta ="SELECT * FROM usuarios WHERE idUsuario=:id";
            $result = $conexion ->prepare($consulta);

            $result->bindparam(":id", $id);

            $result -> execute();

            while ($resultado = $result -> fetch()) {
                $f[]= $resultado;
            }
            return $f;
        }

    }


    class Validarsesion{

        public function iniciarSesion($clave, $usuario){

            //Creamos el objeto de la conexion
            $objConexion = new Conexion();
            $conexion = $objConexion-> get_conexion();

            //creamos la variable que contiene la consulta a ejecutar
            $consultar = "SELECT * FROM usuarios WHERE usuario=:usuario";

            $result = $conexion -> prepare($consultar);
            
            //convertimos los argumentos en parametros
            $result -> bindparam(":usuario", $usuario );

            //ejecutar consultar

            $result -> execute();

            //convertir la variable result en un arreglo para separar o segmentar la informacion

            $f = $result -> fetch();

            if($f){

                //verificar la contraseña
                if($f['clave'] == $clave){
                    //validar el esatado de cuenta
                    if($f['Estado'] == "Activo"){
                       
                        //se realiza el inicio de sesion
                        session_start();
                        
                        //creamos variables de sesion
                        
                        $_SESSION['id'] =$f['idUsuario'];
                        $_SESSION['user']= $f['usuario'];
                        $_SESSION['AUTENTICADO'] = "si";

                        //Validar el rol para redirecionar a la interfaz correcta

                        switch($f['Estado']){
                            case'Activo':

                                echo '<script> alert("Bienvenido a NGL'.$_SESSION['id'].'") </script>';
                                echo '<script>location.href="../pages/perfil.php?id='.$_SESSION['id'].'"</script>';
                             
                        }

                    }else{{
                        echo '<script> alert("su estado es inactivo") </script>';
                        echo "<script>location.href='../index.html'</script>";
                    }}

                }else{

                    echo '<script> alert("Clave ingresada '.$clave.'") </script>';
                    echo '<script> alert("esta es la base de datos '.$f['clave'].'") </script>';
                    echo "<script>location.href='../index.html'</script>";
                }


            }else{
                echo '<script> alert("Usuario no registrado") </script>';
                echo "<script>location.href='../pages/registro.html'</script>";
            }

        }

        public function cerrarSesion(){
            $objConexion = new Conexion();
            $conexion = $objConexion -> get_conexion();

            session_start();
            session_destroy();

            echo "<script>location.href='../index.html'</script>";
        }
    }
?>