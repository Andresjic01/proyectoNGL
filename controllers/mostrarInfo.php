<?php


function post(){

    $id = $_GET['id'];

    $objConsultas = new Consultas();
    $result = $objConsultas -> verpost($id);
    
    if(!isset($result)){ 

        echo'
        <h3>No hay respuestas hasta ahora</h3>
        ';
       

    }else{
        foreach ($result as $f) {
            echo'
            <div class="information">
                <div id="const">
                    <p>Enviame mensajes anonimos</p>
                </div>
                <div id="message">
                    <p>'.$f['pregunta'].'</p>
                </div>
            </div>
                
            ';
            }
    }

}

function links(){
    $id = $_GET['id'];

    if(isset($id)){
        echo'


        <div id="compartir">
                <p>¿Quieres que te hagan preguntas?</p>
                <div id="referencia">
                <a href="preguntas.php?id='.$id.'">Comparte tu link</a>
                </div>
        </div>

        
        ';
    }else{
        "";
    }

    
}

function mensaje(){
    $id = $_GET['id'];

    if(isset($id)){
        echo'


        <div class="input">
            <form action="../controllers/insertarmensaje.php" method="POST">
                <input id="texto" type="text" name="texto" placeholder="Envia mensajes anonimos...">
                <input id="texto" type="hidden" name="id" value="'.$id.'" >
                <button id="button" class="activo" type="submit">Enviar...</button>
            </form>
        </div>
        
        ';
    }else{
        "";
    }
}

function perfil(){

    $id = $_GET['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas -> verperfil($id);

    foreach($result as $f){
        echo'
            <div id="nav">
                <img src="'.$f['perfil'].'" alt="">
                <h3>@'.$f['usuario'].'</h3>  
            </div>
            
        ';
    }

}

function perfile(){

    $id = $_GET['id'];
    $objConsultas = new Consultas();
    $result = $objConsultas -> verperfil($id);

    foreach($result as $f){
        echo'
        <div class="perfil">
        <img src="'.$f['perfil'].'" alt="">
        <div>
            <h5>'.$f['usuario'].'</h5>
            <p>¡Mándame mensajes anónimos!</p>
        </div>
    </div>
            
        ';
    }

}


?>