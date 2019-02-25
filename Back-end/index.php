<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';



$app = new \Slim\App();

$db = new mysqli("localhost","root","","derrocha");

$app->get("/usuarios", function() use($app, $db){
	
	$sql = 'SELECT * FROM usuarios';

	$query = $db->query($sql);

	$usuarios = array();
	while($usuarios = $query->fetch_assoc()){
		$usuarios[] = $usuarios;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $usuarios);

	echo json_encode($result);


});
$app->post("/usuarios", function() use($app, $db){

	
	$json = $request->post('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO usuarios VALUES(NULL,".
		"'{$data['id_Usuarios']}',".
		"'{$data['Usuario']}',".
		"'{$data['Clave']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear el usuario, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Usuario creado correctamente'.$insert);
	}

	echo json_encode($result);

});
$app->run();
