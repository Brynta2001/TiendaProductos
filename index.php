<?php
$recordarme = false;
$usuario ="";
$clave ="";

if(isset($_COOKIE["c_recordarme"]) && $_COOKIE["c_recordarme"]!= ""){
    $usuario = isset($_COOKIE["c_usuario"])?$_COOKIE["c_usuario"] : "";
    $clave = isset($_COOKIE["c_clave"])?$_COOKIE["c_clave"] : "";
    $recordarme=true;
}

?>

<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h1>LOGIN</h1>
        <form method="POST" action="panelprincipal.php">
            <fieldset>
                Usuario:<br>
                <input type="text" name="usuario" value="<?php echo $usuario; ?>"/><br>
                Clave:<br>
                <input type="password" name="clave" value="<?php echo $clave; ?>"/><br>
                <input type="checkbox" name="recordarme" <?php echo ($recordarme)?"checked":""; ?> >Recordarme <br>
                <br>
                <input type="submit" value="Enviar">
            </fieldset>
        </form>
    </body>
</html>