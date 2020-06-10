<?php
	require_once 'C:\xampp\htdocs\Fototeca - AdminLTE\classes\fotografia.php';
    $f = new Fotografia;
  	
  	$f->conectar("projeto_lori","localhost","root", "");
	$f->associarPessoa($_POST['id_f'], $_POST['id_p']);
  
  	echo "1";

?>