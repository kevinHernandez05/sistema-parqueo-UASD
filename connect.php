
<?php

$mysql = mysqli_connect("Localhost","root","");       

mysqli_select_db( $mysql, "progiii") ;

$test = mysqli_query($mysql,"select count(*) as res1 from registro where noPuertaEntrada = '1'");
$test2 = mysqli_query($mysql,"select count(*) as res2 from registro where noPuertaEntrada = '2'");
$test3 = mysqli_query($mysql,"select count(*) as res3 from registro where noPuertaEntrada = '3'");
$test4 = mysqli_query($mysql,"select count(*) as res4 from registro where noPuertaEntrada = '4'");

$test5= mysqli_query($mysql,"select count(*) as res5 from registro where noPuertaSalida = '1'");
$test6 = mysqli_query($mysql,"select count(*) as res6 from registro where noPuertaSalida = '2'");
$test7 = mysqli_query($mysql,"select count(*) as res7 from registro where noPuertaSalida = '3'");
$test8 = mysqli_query($mysql,"select count(*) as res8 from registro where noPuertaSalida = '4'");

$result = mysqli_fetch_assoc($test);
$result2 = mysqli_fetch_assoc($test2);
$result3 = mysqli_fetch_assoc($test3);
$result4 = mysqli_fetch_assoc($test4);

$result5 = mysqli_fetch_assoc($test5);
$result6 = mysqli_fetch_assoc($test6);
$result7 = mysqli_fetch_assoc($test7);
$result8 = mysqli_fetch_assoc($test8);

//echo $result['res1'];
//echo $result2['res2'];
//echo $result3['res3'];
//echo $result4['res4'];

//echo $result5['res5'];
//echo $result6['res6'];
//echo $result7['res7'];
//echo $result8['res8'];

?>




