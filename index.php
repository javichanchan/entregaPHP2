<?php
session_start();
//AUTOLOAD DE LAS CLASES DEL MODELO
spl_autoload_register(function ($clase){
	require_once('modelo/'.$clase.'.php');
});

$baseDatos=new conexion();

//INCLUDES DE LAS VISTAS QUE SE VAN A UTILIZAR EN TODA LA EJECUCIÓN
include "vista/vistaHeader.php";
include "vista/vistaFooter.php";

//COMIENZA LA LÓGICA DE LA EJECUCIÓN
mostrarHeader();

if(isset($_POST['lista'])){
	//MOSTRAREMOS EL LISTADO DE CLIENTES	
	include "vista/vistaLista.php";
	mostrarLista($baseDatos->link);
	$datos['pie'] = "Listado";
	

} else if(isset($_POST['alta'])){
	//FORMULARIOS PARA DAR DE ALTA A UN NUEVO CLIENTE
	$datos['pie'] = "Altas";
	include "vista/vistaPideId.php";
	if(!isset($_POST['DNIpedido'])){		
		vistaPideId($baseDatos->link, 'alta');
	}else{
		$_SESSION['id']=$_POST['DNI'];
		//VAMOS A COMPROBAR QUE EL DNI NO EXISTE
		include "funciones.php";
		if(!existe($baseDatos->link) && $_SESSION['id']!=NULL){  
			//NOS VAMOS A LA VISTA DE MODALTA
			include "vista/vistaModAlta.php";			
			mostrarModAlta($baseDatos->link, 'alta');			
		}else{
			if($_SESSION['id']==NULL) mensajeExiste("vacio");
			else mensajeExiste("si");
		}		
	}	


} else if(isset($_POST['modificar'])){
	//PARA MODIFICAR LOS DATOS DE UN CLIENTE
	$datos['pie'] = "Modificaciones";
	include "vista/vistaPideId.php";
	if(!isset($_POST['DNIpedido'])){		
		vistaPideId($baseDatos->link, 'modificar');
	}else{
		$_SESSION['id']=$_POST['DNI'];
		//VAMOS A COMPROBAR QUE EL DNI EXISTE
		include "funciones.php";
		if($fila=existe($baseDatos->link)){  
			//NOS VAMOS A LA VISTA DE MODALTA
			$_SESSION['nombre']=$fila['nombre'];
			$_SESSION['direccion']=$fila['direccion'];
			$_SESSION['email']=$fila['email'];
			$_SESSION['pwd']=$fila['pwd'];
			include "vista/vistaModAlta.php";			
			mostrarModAlta($baseDatos->link, 'modificar');
						
		}else{
			if($_SESSION['id']==NULL) mensajeExiste("vacio");
			else mensajeExiste("no");
		}
	}


} else if(isset($_POST['modalta'])){
	//PARA DAR DE ALTA O MODIFICAR
	include "vista/vistaResultado.php";
	include "vista/vistaModAlta.php";
	$_SESSION['nombre']=$_POST['nombre'];
	$_SESSION['direccion']=$_POST['direccion'];
	$_SESSION['email']=$_POST['email'];
	$_SESSION['pwd']=$_POST['pwd'];

	if($_SESSION['nombre']==NULL || $_SESSION['direccion']==NULL || $_SESSION['email']==NULL || $_SESSION['pwd']==NULL){
		mensajeFaltan();
		$_SESSION['id']=$_SESSION['nombre']=$_SESSION['direccion']=$_SESSION['email']=$_SESSION['pwd']="";	
	}else{
		$nuevoCliente = new cliente();
		$nuevoCliente->dniCliente=$_SESSION['id'];
		$nuevoCliente->nombre=$_POST['nombre'];
		$nuevoCliente->direccion=$_POST['direccion'];
		$nuevoCliente->email=$_POST['email'];
		$nuevoCliente->pwd=$_POST['pwd'];
		if($_POST['op']=='alta'){
			$nuevoCliente->insertar($baseDatos->link);
			$datos['pie'] = "Altas";
			$datos['resultado'] = " Alta Nuevo Cliente ";
			mostrarResultado($datos['resultado']);
			$_SESSION['id']=$_SESSION['nombre']=$_SESSION['direccion']=$_SESSION['email']=$_SESSION['pwd']="";
		}else{
			$nuevoCliente->actualizar($baseDatos->link);
			$datos['pie'] = "Modificaciones";
			$datos['resultado'] = " Modificación Cliente ";
			mostrarResultado($datos['resultado']);
			$_SESSION['id']=$_SESSION['nombre']=$_SESSION['direccion']=$_SESSION['email']=$_SESSION['pwd']="";
		}
	}


} else if(isset($_POST['consultar'])){
	//PARA CONSULTAR LOS DATOS DE UN CLIENTE
	$datos['pie'] = "Consulta";
	include "vista/vistaPideId.php";
	if(!isset($_POST['DNIpedido'])){		
		vistaPideId($baseDatos->link, 'consultar');
	}else{
		$_SESSION['id']=$_POST['DNI'];
		//VAMOS A COMPROBAR QUE EL DNI EXISTE
		include "funciones.php";
		if($fila=existe($baseDatos->link)){  
			//NOS VAMOS A LA VISTA DE MOSTRAR DATOS
			$_SESSION['nombre']=$fila['nombre'];
			$_SESSION['direccion']=$fila['direccion'];
			$_SESSION['email']=$fila['email'];
			$_SESSION['pwd']=$fila['pwd'];
			include "vista/vistaMuestraDatos.php";			
			mostrarDatos($baseDatos->link);	
			$_SESSION['id']=$_SESSION['nombre']=$_SESSION['direccion']=$_SESSION['email']=$_SESSION['pwd']="";
		}else{
			if($_SESSION['id']==NULL) mensajeExiste("vacio");
			else mensajeExiste("no");
		}
	}


} else if(isset($_POST['baja'])){
	//PARA DAR DE BAJA A UN CLIENTE
	$datos['pie'] = "Eliminar Cliente";
	include "vista/vistaPideId.php";
	if(!isset($_POST['DNIpedido'])){		
		vistaPideId($baseDatos->link, 'baja');
	}else{
		$_SESSION['id']=$_POST['DNI'];
		//VAMOS A COMPROBAR QUE EL DNI EXISTE
		include "funciones.php";
		if($fila=existe($baseDatos->link)){  
			//NOS VAMOS A LA VISTA DE BAJAS
			include "vista/vistaResultado.php";
			$clienteEliminar = new cliente();
			$clienteEliminar->dniCliente=$_SESSION['id'];
			$clienteEliminar->borrar($baseDatos->link);						
			$datos['resultado'] = " Baja De Cliente ";
			mostrarResultado($datos['resultado']);
		}else{
			if($_SESSION['id']==NULL) mensajeExiste("vacio");
			else mensajeExiste("no");
		}
	}


} else{
	//CUANDO SE ENTRA POR PRIMERA VEZ A LA APLICACIÓN
	//SIMPLEMENTE SE MOSTRARÁ HEADER, FOOTER Y UN SALUDO EN EL BODY	
	include "vista/vistaInicio.php";	
	mostrarInicio();
	$datos['pie'] = "Inicio";	
	$_SESSION['id']=$_SESSION['nombre']=$_SESSION['direccion']=$_SESSION['email']=$_SESSION['pwd']="";	
}
mostrarFooter($datos['pie']);
