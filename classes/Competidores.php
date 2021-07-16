<?php 

require("ConnectionFactory.php");

class Competicao{
	var $id;
	var $nome;
	var $abreviacao;
	var $conn;

	function __construct(){
		$connf = new ConnectionFactory();
		$this->conn = $connf->getConnection();
	}

	function save(){
        $sql = 	"SELECT `id` FROM `competicao` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;
                
        
		$sql = 	"INSERT INTO `competicao` (`id`, `nome`, `abreviacao`) VALUES (null,{1},{2});";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->abreviacao);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function delete(){
		$sql = 	"DELETE FROM `competicao` WHERE id = {1}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function update(){
		$sql = 	"SELECT `id` FROM `competicao` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;

		$sql = 	"UPDATE `competicao` SET `nome`={1},`abreviacao`={2} WHERE `id`={3}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->abreviacao);
        $stmt->addStatement(3, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}
}

?>
