<?php
session_start();
if(isset($_POST["usuario"])){
    $_SESSION["s_usuario"] =$_POST["usuario"];
}
if(!isset($_SESSION["s_usuario"])){
    header("Location: index.php");
}


if(isset($_GET["idioma"])){
    $idioma = $_GET["idioma"];
}else{
    if(isset($_COOKIE["c_recordarme"])){
        $idioma = $_COOKIE["c_idioma"];
    }else{
        $idioma = "es";
    }
}

if(isset($_POST["recordarme"])){
    
    if(isset($_COOKIE["c_recordarme"])){
        setcookie("c_idioma", $idioma, time()+60*60*24);
    }else{
        $usuario = $_POST["usuario"];
        $clave = $_POST["clave"];
        $recordarme=$_POST["recordarme"];

        setcookie("c_usuario", $usuario, 0);
        setcookie("c_clave", $clave, 0);
        setcookie("c_recordarme", $recordarme, 0);
        setcookie("c_idioma", $idioma, time()+60*60*24);
    }

}else{

    if(isset($_POST["usuario"])){
        setcookie("c_usuario", "");
        setcookie("c_clave", "");
        setcookie("c_recordarme", "");
        setcookie("c_idioma", "");
    }else{
        if(isset($_COOKIE["c_recordarme"])){
            setcookie("c_idioma", $idioma, time()+60*60*24);
        }
        
    }
}



?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>PANEL PRINCIPAL</h1>
        <h2>Bienvenido Usuario: <?php echo $_SESSION["s_usuario"] ?></h2>
        <hr>
        <a href="panelprincipal.php?idioma=es">ES (Español)</a> |
        <a href="panelprincipal.php?idioma=en">EN (English)</a>
        <br>
        <a href="cerrarsesion.php">Cerrar sesión</a>
        <hr>
        <br>
        <?php
        
        if($idioma == "es"){
            echo "<h2>Lista de Productos</h2>";
            $nombreFichero = "categorias_es.txt";
        }else{
            echo "<h2>Product List</h2>";
            $nombreFichero = "categorias_en.txt";
        }
        $file = fopen($nombreFichero, "r"); 

        while (!feof($file)){
            $linea = fgets($file);
            echo $linea."<br>";
        }
        fclose ($file);

        ?>
    </body>
</html>