<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"> 
<html> 
<head> 
   	<title>Mándanos tus comentarios</title> 
</head> 

<body bgcolor="#cccc66" text="#003300" link="#006060" vlink="#006060"> 
<?php 
include("conn.php");
if (!$HTTP_POST_VARS){ 
?> 
<form action="form.php" method=post> 
Nombre: <input type=text name="nombre" size=16> 
<br> 
Email: <input type=text name=email size=16> 
<br> 
Comentarios: <textarea name=coment cols=32 rows=6></textarea> 
<br> 
<input type=submit value="Enviar"> 
</form> 
<? 
}else{ 
   	//Estoy recibiendo el formulario, compongo el cuerpo 
   	$cuerpo = "Formulario enviado\n"; 
   	$cuerpo .= "Nombre: " . $HTTP_POST_VARS["nombre"] . "\n"; 
   	$cuerpo .= "Email: " . $HTTP_POST_VARS["email"] . "\n"; 
   	$cuerpo .= "Comentarios: " . $HTTP_POST_VARS["coment"] . "\n"; 

     mail("jeffcristhlb@gmail.com","Formulario recibido",$cuerpo); 
$respuesta ='Recibimos su preticion. Recibirá nuestras noticias' ; 
mail(el correo del usuario,"Formulario recibido",$cuerpo . '\n' . $respuesta); 
       //doy las gracias por el envío 
       echo "Gracias por rellenar el formulario. Se ha enviado correctamente."; 
}
} 
?> 
</body> 
</html>