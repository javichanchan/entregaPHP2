<?php

class cliente{
	private $dniCliente;
	private $nombre;
	private $direccion;
	private $email;
	private $pwd;

	public function __construct(){}

	public function insertar($link){
		try{
            $result = $link->prepare("INSERT into clientes values(:dniCliente,:nombre,:direccion,:email,:pwd)");
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->bindParam(':nombre', $this->nombre);
            $result->bindParam(':direccion', $this->direccion);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':pwd', $this->pwd);
        	$result->execute(); 
        }catch(PDOException $e){
        	print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        	print "<p>Error: ".$e->getMessage()."</p><br>";
        	print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
        }
	}

	public function borrar($link){
		try{
			$result = $link->prepare("DELETE FROM clientes WHERE dniCliente=:dniCliente");
            $result->bindParam(':dniCliente', $this->dniCliente);
        	$result->execute(); 
        }catch(PDOException $e){
        	print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        	print "<p>Error: ".$e->getMessage()."</p><br>";
        	print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
        }
	}

	public function actualizar($link){
		try{
			$result = $link->prepare("UPDATE clientes SET  nombre=:nombre, direccion=:direccion, email=:email, pwd=:pwd WHERE dniCliente=:dniCliente");
            $result->bindParam(':dniCliente', $this->dniCliente);
            $result->bindParam(':nombre', $this->nombre);
            $result->bindParam(':direccion', $this->direccion);
            $result->bindParam(':email', $this->email);
            $result->bindParam(':pwd', $this->pwd);
        	$result->execute(); 
        }catch(PDOException $e){
        	print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
        	print "<p>Error: ".$e->getMessage()."</p><br>";
        	print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
        }
	}

	public function __set($var, $valor){
        if (property_exists(__CLASS__, $var)){   
                $this->$var = $valor;           
        } else   echo "No existe el atributo $var.";    
    }

    public function __get($var){         
        if (property_exists(__CLASS__, $var)){   
            return $this->$var;         
        }         
        return NULL;     
    }

    /*@deprecated
    *public function consultar($link){
    *   try{
    *       $result = $link->prepare("SELECT * FROM clientes WHERE dniCliente=:dniCliente");
    *        $result->bindParam(':dniCliente', $this->dniCliente);
    *       $result->execute(); 
    *       return $result->fetch(PDO::FETCH_ASSOC);
    *       //en caso de modificar, habrá que sacar los valores de este FETCH_ASSOC
    *    }catch(PDOException $e){
    *       print "<p>Error: No puede conectarse con la base de datos.</p><br><br>";
    *       print "<p>Error: ".$e->getMessage()."</p><br>";
    *       print "<p>Si no entiende lo que pone, avise a un informático.</p><br>";
        }
    }*/

}