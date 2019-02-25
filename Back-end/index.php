<?php

use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require __DIR__ . '/../vendor/autoload.php';


$app = new \Slim\App();

//CONEXION A LA BASE DE DATOS PROYECTO UV-WWW

$db = new mysqli("localhost","root","","derrocha");

//---------GET-SELECT PROYECTO BACKEND UV-WWWW------------------
// CONSULTA TODOS LOS USUARIOS EN LA BASE DE DATOS
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
//CONSULTA TODOS LOS ROLES QUE HAY EN LA BASE DE DATOS
$app->get("/roles", function() use($app, $db){
	
	$sql = 'SELECT * FROM roles';

	$query = $db->query($sql);

	$roles = array();
	while($rol = $query->fetch_assoc()){
		$roles[] = $rol;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $roles);

	echo json_encode($result);


});

//CONSULTA TODOS LOS DE INNOVACION QUE HAY EN LA BASE DE DATOS
$app->get("/innovacion", function() use($app, $db){
	
	$sql = 'SELECT * FROM innovacion';

	$query = $db->query($sql);

	$innovaciones = array();
	while($innovacion = $query->fetch_assoc()){
		$innovaciones[] = $innovacion;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $innovaciones);

	echo json_encode($result);


});

//CONSULTA TODOS LOS DATOS DE GESTION HUMANA QUE HAY EN LA BASE DE DATOS
$app->get("/gestionhumana", function() use($app, $db){
	
	$sql = 'SELECT * FROM gestionhumana';

	$query = $db->query($sql);

	$gestioneshumanas = array();
	while($gestionhumana = $query->fetch_assoc()){
		$gestioneshumanas[] = $gestionhumana;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $gestioneshumanas);

	echo json_encode($result);


});

//CONSULTA TODOS LOS DATOS DE FINANCIERA QUE HAY EN LA BASE DE DATOS
$app->get("/financiera", function() use($app, $db){
	
	$sql = 'SELECT * FROM financiera';

	$query = $db->query($sql);

	$financieras = array();
	while($financiera = $query->fetch_assoc()){
		$financieras[] = $financiera;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $financieras);

	echo json_encode($result);


});



//CONSULTA TODOS LOS DATOS DE CLIENTE QUE HAY EN LA BASE DE DATOS
$app->get("/cliente", function() use($app, $db){
	
	$sql = 'SELECT * FROM cliente';

	$query = $db->query($sql);

	$clientes = array();
	while($cliente = $query->fetch_assoc()){
		$clientes[] = $cliente;
	}

	$result = array('status' => 'success',
						'code' => 200,
						'data' => $clientes);

	echo json_encode($result);


});
//----------- POST-INSERT DB PROYECTO UV-WWWW----------------
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
