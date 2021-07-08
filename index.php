<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Catastral Automatizado</title>
    <link rel="stylesheet" type="text/css" href="./assets/libs/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="./estilos/login.css">
    <link rel="stylesheet" href="./estilos/index.css">
    <link rel="stylesheet" href="./estilos/comercios.css">
    <script src="./server/js/server/usuario.js"></script>
    <script src="./server/js/server/imprimir.js"></script>
    <script src="./server/js/server/buscar.js"></script>
    

</head>
<body>
    <?php
        include('./server/estructura.php');
        include('./server/login.php');

        $estructura = new estructura();

        session_start();
        if(!isset($_SESSION["usuario"])){
            $_SESSION["usuario"]="";            
        }
        if(!isset($_SESSION["pass"])){
            $_SESSION["pass"]="";
        }
        if(!isset($_SESSION["nivel"])){
            $_SESSION["nivel"]="";
        }
        include('./server/conexion.php');
        $MySql = new conexion;
        $link= $MySql->conectar();
        $busqueda="SELECT * from usuarios where nick='".$_SESSION["usuario"]."' and pass='".$_SESSION["pass"]."' ";
        $rest = $link->query($busqueda);
        $filas = $rest->num_rows;
        $resUser= $rest->fetch_array();
    if($filas != 0){
        if($resUser["nivel"]=="1"){
            
            $estructura->head();
            echo'<div id="general">';
            $estructura->body();
            echo'</div>';   
        }
        if($resUser["nivel"]=="2"){
            $estructura = new estructura();
            $estructura->header2();
            echo'<div id="general">';
            $estructura->body();
            echo'</div>';   
        }
    }else{
        echo'<div id="general">';
        $nlog= new intro();
        $nlog->login();
        echo'</div>
        ';
        
    };
        $estructura->footer();
    ?>
<script src="./server/js/ajax.js"></script>
<script src="./server/js/login.js"></script>
<script src="./server/js/server/index.js"></script>
<script src="./assets/libs/jquery/jquery.min.js"></script>
<script src="./assets/libs/bootstrap/js/bootstrap.js"></script>
</body>
</html>