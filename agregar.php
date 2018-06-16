<?php

    //conectarse a base de datos.	
    $servidor = "mysql.webcindario.com";
    $usuarioDB = "sistemaparqueo";
    $passDB = "051095";
    $NombreDB = "sistemaparqueo";

    /*$servidor = "localhost";
    $usuarioDB = "root";
    $passDB = "";
    $NombreDB = "progiii";*/

	//iniciando la base de datos
	$conexion = @mysqli_connect($servidor, $usuarioDB, $passDB) 
	or die ("No se ha podido conectar con la base de datos.");

	//seleccion de base de datos 
	$db = mysqli_select_db($conexion, $NombreDB) 
    or die('La base de datos ' . $NombreDB . ' no pudo ser iniciada, revise credenciales');
    
    //Datos a pasar a la base de datos
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $cedula = $_POST['cedula'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];    
    $direccion = $_POST['direccion'];

    $tipoVehiculo = $_POST['tipoVehiculo'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $color = $_POST['color'];
    $anio = $_POST['anio'];

    $puertaEntrada = $_POST['puertaEntrada'];
    
    //consulta

    $consulta = "INSERT INTO registro (cedula, nombre, apellido, tipoVehiculo, marca, modelo, color, anio, noPuertaEntrada, representanteEntrada)
		VALUES ('".$cedula."',  
				'".$nombre."',  
                '".$apellido."',
                '".$tipoVehiculo."',
                '".$marca."',
                '".$modelo."',
                '".$color."',
                '".$anio."',
                '".$puertaEntrada."',
                'Admin')";
    if(mysqli_query($conexion, $consulta))
        echo 'BOLETO GENERADO';
    else
        echo  'error en la consulta';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Imprimir Boleto</title>
</head>
<body>
    <h3>Parqueo UASD</h3>
    <p>Nombre: <?php echo $nombre; ?></p>
    <p>Apellido: <?php echo $apellido; ?></p>
    <p>Cedula: <?php echo $cedula; ?></p>
    <p>Automovil registado: <?php echo $marca ." ".$modelo; ?> </p>
    <p>Fecha de Entrada: <?php echo date('l jS \of F Y h:i:s A') ?></p>
    <div>
        <p>Codigo QR generado</p>
        <?php
            
            //set it to writable location, a place for temp generated PNG files
            $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
            
            //html PNG location prefix
            $PNG_WEB_DIR = 'temp/';

            include "Omar/Codigo_qr/qrlib.php";    
            
            //ofcourse we need rights to create temp dir
            if (!file_exists($PNG_TEMP_DIR))
                mkdir($PNG_TEMP_DIR);
            
            
            $filename = $PNG_TEMP_DIR.'test.png';
            
            //processing form input
            //remember to sanitize user input in real-life solution !!!
            $errorCorrectionLevel = 'L';
            if (isset($_REQUEST['level']) && in_array($_REQUEST['level'], array('L','M','Q','H')))
                $errorCorrectionLevel = $_REQUEST['level'];    

            $matrixPointSize = 4;
            if (isset($_REQUEST['size']))
                $matrixPointSize = min(max((int)$_REQUEST['size'], 1), 10);


            if (isset($_REQUEST['cedula'])) { 
            
                //it's very important!
                if (trim($_REQUEST['cedula']) == '')
                    die('Los datos no pueden estar vacíos! <a href="?">Volver</a>');
                    
                // user data
                $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['cedula'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
                QRcode::png($_REQUEST['cedula'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
                
            } else {    
                           
                echo 'Error generando Codigo QR, por favor, inicialize el formulario nuevamente.<br/>';    
            }    
                
            //display generated file
            echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';
            
            //display a print button
            echo '<input type="button" name="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();">';
            echo '<a href="administracion.php"><p>Volver a la pagina de inicio</p></a>';
        ?>

    </div>
</body>
</html>