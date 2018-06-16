
<?php
    
   /* session_start(); //variable de sesion, yay!

    if($_SESSION["logged"] == true){
        header("location:administracion.php");
    }*/

    function logging(){

        //credenciales de base de datos
        /*
        $servidor = "mysql.webcindario.com";
        $usuarioDB = "sistemaparqueo";
        $passDB = "051095";
        $NombreDB = "sistemaparqueo";
        */

        $servidor = "localhost";
        $usuarioDB = "root";
        $passDB = "";
        $NombreDB = "progiii";


        //Iniciando la base de datos
        $conexion = @mysqli_connect($servidor, $usuarioDB, $passDB) 
        or die ("No se ha podido conectar con la base de datos.");

        //Seleccion de base de datos 
        $db = mysqli_select_db($conexion, $NombreDB) 
        or die('La base de datos ' . $NombreDB . ' no pudo ser iniciada, revise credenciales');

        //Tomando datos del formulario 
        $correo = $_POST['email'];
        $pass = $_POST['password'];

        //Consulta a la base de datos
        $sql = mysqli_query($conexion, "select clave from usuario where credencial ='$correo' "); 
        
        //validar contraseña con usuario
        if($row = mysqli_fetch_array($sql)){
            
            if($pass == $row['clave'])
            {
                session_start();
                $_SESSION["logged"] = true;
                header("location:administracion.php"); //Redireccion a la pagina
                exit();
            }

            else
            {
                return false;
            }
        }
        
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Parqueo V0.1 - Lab. de Prog. III - Proyecto Final</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Login-Form-Clean.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body>
    <div class="login-clean">
        <form method="POST">
            <h2 class="sr-only">Login Form</h2>
            <div class="illustration"></div>
            <div class="form-group">
                <img src="assets/img/Escudo_UASD.jpg">  
                <input class="form-control" type="text" name="email" placeholder="Correo electronico...">
            </div>
            <div class="form-group">
                <input class="form-control" type="password" name="password" placeholder="Contraseña...">
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit" name="signin">Iniciar sesión</button>
                <!--PHP Logging Sesion-->
                <?php
                
                if (isset($_POST['signin']))
                {
                    if(logging())
                    {
                        echo "Sesion iniciada!";
                    } 
                    else
                    {
                        echo "<strong><p align=\"center\">Usuario o Contraseña invalidos, revise sus credenciales.</p></strong>";
                    }                   
                }
                ?>

            </div>
        </form>
    </div>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>



