<?php 

require("ConnectionFactory.php");

class Competicao{
	var $id;
	var $nome;
	var $descricao;
	var $qtd_equipes;
    var $premiacao;
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
                
        
		$sql = 	"INSERT INTO `competicao` (`id`, `nome`, `descricao`, `qtd_equipes`, `premiacao`) VALUES (null,{1},{2},{3},{4});";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->descricao);
        $stmt->addStatement(3, $this->qtd_equipes);
        $stmt->addStatement(4, $this->premiacao);
        
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

		$sql = 	"UPDATE `competicao` SET `nome`={1},`descricao`={2},`qtd_equipes`={3}, `premiacao`={4} WHERE `id`={5}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->descricao);
        $stmt->addStatement(3, $this->qtd_equipes);
        $stmt->addStatement(4, $this->premiacao);
        $stmt->addStatement(5, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}
}

?>
