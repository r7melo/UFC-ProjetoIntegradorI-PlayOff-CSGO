<?php 

require("ConnectionFactory.php");

class Partida{
	var $id;
	var $data;
	var $local;
	var $placar;
    var $competicao_id;
	var $conn;

	function __construct(){
		$connf = new ConnectionFactory();
		$this->conn = $connf->getConnection();
	}

	function save(){
        $sql = 	"SELECT `id` FROM `partida` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;
                
        
		$sql = 	"INSERT INTO `partida` (`id`, `data`, `local`, `placar`, `competicao_id`) VALUES (null,{1},{2},{3},{4});";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->data);
        $stmt->addStatement(2, $this->local);
        $stmt->addStatement(3, $this->placar);
        $stmt->addStatement(4, $this->competicao_id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function delete(){
		$sql = 	"DELETE FROM `partida` WHERE id = {1}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function update(){
		$sql = 	"SELECT `id` FROM `partida` WHERE id = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;

		$sql = 	"UPDATE `partida` SET `data`={1},`local`={2},`placar`={3}, `competicao_id`={4} WHERE `id`={5}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->data);
        $stmt->addStatement(2, $this->local);
        $stmt->addStatement(3, $this->placar);
        $stmt->addStatement(4, $this->competicao_id);
        $stmt->addStatement(5, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}
}

?>
