<HTML> 
<BODY>
	<INPUT TYPE="checbox" NAME="extras[]" VALUE="garaje" CHEKED> Garaje
	<INPUT TYPE="checbox" NAME="extras[]" VALUE="piscina"> Piscina
	<INPUT TYPE="checbox" NAME="extras[]" VALUE="Jardin"> jardin


<?PHP>
	$extras = $_REQUEST ['extras']
	
	foreach ($extras as $extra)
		print ("$extra<BR>\n")
	
	?>
	</BODY>
	</html>