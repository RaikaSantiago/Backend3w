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
	while($usuario = $query->fetch_assoc()){
		$usuarios[] = $usuario;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $usuarios);

	echo json_encode($result);


});

$app->post("/usuarios", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO usuarios VALUES(NULL,".
		"'{$data['Id_Usuarios']}',".
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

$app->post("/roles", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO roles VALUES(NULL,".
		"'{$data['idRoles']}',".
		"'{$data['Usuarios_Id_Usuario']}',".
		"'{$data['NombreRol']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear el rol, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Rol  creado correctamente'.$insert);
	}

	echo json_encode($result);

});

$app->post("/innovacion", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO innovacion VALUES(NULL,".
		"'{$data['Id_Innovacion']}',".
		"'{$data['Id_Usuario']}',".
		"'{$data['NombreObjetivo']}',".
		"'{$data['Indicador']}',".
		"'{$data['Meta']}',".
		"'{$data['Iniciativa']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear innovacion, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Innovacion creada correctamente'.$insert);
	}

	echo json_encode($result);

});

$app->post("/gestionhumana", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO gestionhumana VALUES(NULL,".
		"'{$data['ID_GestionHumana']}',".
		"'{$data['Id_Usuario']}',".
		"'{$data['NombreObjetivo']}',".
		"'{$data['Indicador']}',".
		"'{$data['Meta']}',".
		"'{$data['Iniciativa']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear Gestion Humana, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Gestion Humana creada correctamente'.$insert);
	}

	echo json_encode($result);

});

$app->post("/financiera", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO financiera VALUES(NULL,".
		"'{$data['Id_Financiera']}',".
		"'{$data['Id_Usuario']}',".
		"'{$data['NombreObjetivo']}',".
		"'{$data['Indicador']}',".
		"'{$data['Meta']}',".
		"'{$data['Iniciativa']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear Financiera, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Financiera creada correctamente'.$insert);
	}

	echo json_encode($result);

});

$app->post("/cliente", function() use($app, $db){

	
	$json = $request->getParam('json');
	$data = json_decode($json, true);

	$query = "INSERT INTO cliente VALUES(NULL,".
		"'{$data['Id_Cliente']}',".
		"'{$data['Id_Usuario']}',".
		"'{$data['NombreObjetivo']}',".
		"'{$data['Indicador']}',".
		"'{$data['Meta']}',".
		"'{$data['Iniciativa']}'";


	$insert = $db->query($query);


	$result = array('status' => 'error',
						'code' => 150,
						'message' => 'Error al crear Cliente, detalle del error error=['.$db->error.']');

	if($insert){
		$result = array('status' => 'success',
						'code' => 200,
						'message' => 'Cliente creada correctamente'.$insert);
	}

	echo json_encode($result);

});
$app->run();
