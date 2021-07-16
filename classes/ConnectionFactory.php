<?php  

require("dbconfig.php");

class ConnectionFactory{

	function getConnection(){

		$conn = mysqli_connect(HOST, USER, PASS, NAME);

		if($conn){
			mysqli_set_charset($conn,'utf8');
			return $conn;
		}
		else{
			echo '<script>alert("Banco de Dados não conectado.")</script>';
		}
		

	}
}

class Statement{
	var $sql;

	function __construct($sql){
		$this->sql = $sql;
	}

	function addStatement($num, $var){
		$this->sql = str_replace("{".$num."}", "'".$var."'" , $this->sql);
	}
        
        function getSql(){
                return $this->sql;
        }
}

function alert($str){
        echo '<script>alert("'.$str.'")</script>';
}

?>