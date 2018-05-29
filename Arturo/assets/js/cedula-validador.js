
	//Funcion para solo mostrar numeros en el input>text
	function justNumbers(e)
	{
		key = (document.all) ? e.keyCode : e.which;
		if (key == 8)
			return true;
		else if (key == 0 || key == 9)
			return true;
		pattern = /[0-9\s]/;
		gg = String.fromCharCode(key);
		return pattern.test(gg);
	}

	// Validador de cantidad de digitos en cedula
	function validateID()
	{
		cedula1 = document.getElementById("cedula1");
		cedula2 = document.getElementById("cedula2");
		cedula3 = document.getElementById("cedula3");
		if (cedula1.value.length == 3 && cedula2.value.length == 7 && cedula3.value.length == 1)
		{
			validating();
			return true;
		}
		else 
		{
			document.getElementById("cedulaValidatorInner").innerHTML="Hay " + (cedula1.value.length + cedula2.value.length + cedula3.value.length) + " numeros en su cedula.";
			return false;
		}
	}

	//validador de cedula
	function validating()
	{ 
	    var Cedula =  document.getElementById("cedula1").value + document.getElementById("cedula2").value; 
	    var Verificador = document.getElementById("cedula3").value; 
	    var suma = 0; 
		         
	    for (i=0; i < Cedula.length; i++)
	    {
	        mod = ""; 
	        if((i % 2) == 0)
	        {
	         	mod = 1
	        } 
	        else 
	        {
	        	mod = 2
	        } 

	        res = Cedula.substr(i,1) * mod; 
	        if (res > 9)
	        { 
		        res = res.toString(); 
		        uno = res.substr(0,1); 
		        dos = res.substr(1,1); 
		        res = eval(uno) + eval(dos); 
		    } 

		    suma += eval(res); 
		    } 

		verificado = (10 - (suma % 10)) % 10; 

		if (verificado == Verificador && document.getElementById("cedula1").value != "000")
		{ 
		   	document.getElementById("cedulaValidatorInner").innerHTML=" ✔ Cedula validada :)";
		   	return true;
		} 
		else
		{ 
		   	document.getElementById("cedulaValidatorInner").innerHTML="<span><strong style=\"color: #C00;\"> X </strong>  La cedula ingresada no es valida :(</span>";
		   	return false;
		} 
	} 
	