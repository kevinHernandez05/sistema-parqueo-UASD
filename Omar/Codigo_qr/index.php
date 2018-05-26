<?php    
/*
  * Codificador de código QR PHP
  *
  * Uso ejemplar
  *
  * El código QR PHP se distribuye bajo LGPL 3
  * Copyright (C) 2010 Dominik Dzienia <deltalab en poczta dot fm>
  *
  * Esta biblioteca es software libre; puedes redistribuirlo y / o
  * modificarlo bajo los términos de GNU Lesser General Public
  * Licencia publicada por la Free Software Foundation; ya sea
  * versión 3 de la licencia, o cualquier versión posterior.
  *
  * Esta biblioteca se distribuye con la esperanza de que sea útil,
  * pero SIN NINGUNA GARANTÍA; sin siquiera la garantía implícita de
  * COMERCIABILIDAD o IDONEIDAD PARA UN PROPÓSITO PARTICULAR. Ver el GNU
  * Licencia pública general menor para más detalles.
  *
  * Deberías haber recibido una copia del público general menor de GNU
  * Licencia junto con esta biblioteca; si no, escriba al Software Libre
  * Fundación, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 EE. UU.
  *OMAR DE JESUS DURAN DIAZ
  *LECTOR CODIGO QR PARUEO UNIVERSIDAD AUTONOMA DE SANTO DOMINO
  */
    
    echo "<h1><strong>CODIGO QR PARQUEO UASD</strong></h1><hr/>";
    
    //set it to writable location, a place for temp generated PNG files
    $PNG_TEMP_DIR = dirname(__FILE__).DIRECTORY_SEPARATOR.'temp'.DIRECTORY_SEPARATOR;
    
    //html PNG location prefix
    $PNG_WEB_DIR = 'temp/';

    include "qrlib.php";    
    
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


    if (isset($_REQUEST['data'])) { 
    
        //it's very important!
        if (trim($_REQUEST['data']) == '')
            die('Los datos no pueden estar vacíos! <a href="?">Volver</a>');
            
        // user data
        $filename = $PNG_TEMP_DIR.'test'.md5($_REQUEST['data'].'|'.$errorCorrectionLevel.'|'.$matrixPointSize).'.png';
        QRcode::png($_REQUEST['data'], $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    } else {    
    
        //default data
        echo 'Puede proporcionar datos en el parámetro GET: así: <a href="?data=like_that">Como eso</a><hr/>';    
        QRcode::png('PHP QR Code :)', $filename, $errorCorrectionLevel, $matrixPointSize, 2);    
        
    }    
        
    //display generated file
    echo '<img src="'.$PNG_WEB_DIR.basename($filename).'" /><hr/>';  
    
    //config form
    echo '<form action="index.php" method="post">
        Data:&nbsp;<input name="data" value="'.(isset($_REQUEST['data'])?htmlspecialchars($_REQUEST['data']):'Escriba Codigo QR aqui :)').'" />&nbsp;
        ECC:&nbsp;<select name="level">
            <option value="L"'.(($errorCorrectionLevel=='L')?' selected':'').'>L - Pequenito</option>
            <option value="M"'.(($errorCorrectionLevel=='M')?' selected':'').'>M</option>
            <option value="Q"'.(($errorCorrectionLevel=='Q')?' selected':'').'>Q</option>
            <option value="H"'.(($errorCorrectionLevel=='H')?' selected':'').'>H - Mejor</option>
        </select>&nbsp;
        Size:&nbsp;<select name="size">';
        
    for($i=1;$i<=10;$i++)
        echo '<option value="'.$i.'"'.(($matrixPointSize==$i)?' selected':'').'>'.$i.'</option>';
        
    echo '</select>&nbsp;
        <input type="submit" value="GENERAR"></form><hr/>';
        
    // benchmark
    QRtools::timeBenchmark();    

    