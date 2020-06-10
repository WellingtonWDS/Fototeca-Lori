<?php  

Class Fotografia{
	private $pdo;
	public $msgErro = "";

	public function conectar($nome, $host, $usuario, $senha){
        global $pdo;
        try{
            $pdo = new PDO("mysql:dbname=".$nome.";host=".$host, $usuario, $senha);
        } catch(PDOException $e){
            $msgErro = $e->getMessage();
        }
    }

    public function cadastrarFoto($titulo, $diretorio, $data, $cidade, $regiao, $obs, $extensao){
    	global $pdo;
    	$sql = $pdo->prepare("INSERT into fotografias(titulo, diretorio, data, regiao, cidade, observacao, idU, extensao) Values(:t, :dir, :d, :r, :c, :o, 2, :e)");
    	$sql->bindValue(":t", $titulo);
    	$sql->bindValue(":dir", $diretorio);
    	$sql->bindValue(":d", $data);
    	$sql->bindValue(":r", $regiao);
    	$sql->bindValue(":c", $cidade);
    	$sql->bindValue(":d", $data);
        $sql->bindValue(":o", $obs);
    	$sql->bindValue(":e", $extensao);
    	$sql->execute();
    }

    public function associarPessoa($idF, $idP){
        global $pdo;
        $sql = $pdo->prepare("INSERT into fotopessoa(idF, idP) Values(:f, :p)");
        $sql->bindValue(":f", $idF);
        $sql->bindValue(":p", $idP);
        $sql->execute();
    }

}


?>