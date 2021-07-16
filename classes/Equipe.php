<?php 

require("ConnectionFactory.php");

class Equipe{
	var $id;
	var $nome;
	var $abreviacao;
	var $partida_id;
    var $premiacao;
	var $conn;

	function __construct(){
		$connf = new ConnectionFactory();
		$this->conn = $connf->getConnection();
	}

	function save(){
        $sql = 	"SELECT `id` FROM `equipe` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;
                
        
		$sql = 	"INSERT INTO `equipe` (`id`, `nome`, `abreviacao`, `partida_id`) VALUES (null,{1},{2},{3});";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->abreviacao);
        $stmt->addStatement(3, $this->partida_id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function delete(){
		$sql = 	"DELETE FROM `equipe` WHERE id = {1}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function update(){
		$sql = 	"SELECT `id` FROM `equipe` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;

		$sql = 	"UPDATE `equipe` SET `nome`={1},`abreviacao`={2},`partida_id`={3} WHERE `id`={5}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->abreviacao);
        $stmt->addStatement(3, $this->partida_id);
        $stmt->addStatement(5, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}
}

?>
