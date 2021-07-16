<?php 

require("ConnectionFactory.php");

class Usuario{
	var $id;
	var $nome;
	var $email;
	var $senha;
	var $conn;

	function __construct(){
		$connf = new ConnectionFactory();
		$this->conn = $connf->getConnection();
	}

	function save(){
        $sql = 	"SELECT `id` FROM `usuario` WHERE email = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->email);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;
                
        
		$sql = 	"INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`) VALUES (null,{1},{2},{3});";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->email);
        $stmt->addStatement(3, $this->senha);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function delete(){
		$sql = 	"DELETE FROM `usuario` WHERE id = {1}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->id);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function update(){
		$sql = 	"SELECT `id` FROM `usuario` WHERE email = {1}";
	
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->email);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $num_emails = mysqli_num_rows($rs);
        
        if($num_emails > 0) return 0;

		$sql = 	"UPDATE `usuario` SET `nome`={1},`email`={2},`senha`={3}, `data`={4} WHERE `email`={5}";
 		
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->nome);
        $stmt->addStatement(2, $this->email);
        $stmt->addStatement(3, $this->senha);
        $stmt->addStatement(4, $this->email);
        
        return mysqli_query($this->conn, $stmt->getSql());
	}

	function login(){
		$sql = "SELECT `id`, `nome`, `email`, `senha`, FROM `usuario` WHERE email = {1} and senha = {2}";
                
        $stmt = new Statement($sql);
        $stmt->addStatement(1, $this->email);
        $stmt->addStatement(2, $this->senha);
        
        $rs = mysqli_query($this->conn, $stmt->getSql());
        
        $login = mysqli_fetch_assoc($rs);
        
        $this->id = $login['id'];
        $this->nome = $login['nome'];
        $this->email = $login['email'];
        
        return $login;
                
	}
}

?>
