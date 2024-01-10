<?php


class Carro  {
    private $marca;
    protected $modelo;
    public $ano;

    public function __construct($marca, $modelo, $ano){
        $this->marca = $marca;
        $this->modelo = $modelo;
        $this->ano = $ano;
    }

    public function setMarca($marca){
        $this->marca = $marca;
    }

    public function getMarca(){
        return $this->marca;
    }

    public function getModelo(){
        return $this->modelo;
    }

    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
}

class CarroDAO {
    private $conexao;

    public function __construct(){
        $host = "localhost";
        $user = 'root';
        $pass = "";
        $dbname = "automotivo";

        $this->conexao = new mysqli($host, $user, $pass, $dbname);

        if ($this->conexao->connect_error){
            die("Erro ao conectar com banco de dados: " . $this->conexao->connect_error);
        }
    }

    public function salvarCarro(Carro $carro) { 
        $marca = $this->conexao->real_escape_string($carro->getMarca());
        $modelo = $this->conexao->real_escape_string($carro->getModelo());
        $ano = $this->conexao->real_escape_string($carro->ano);
        $query = "INSERT INTO carros (marca, modelo, ano) VALUES ('$marca', '$modelo', '$ano')";

        if ($this->conexao->query($query)){
            echo "Carro salvo com sucesso !";
        } else {
            echo "Erro ao salvar carro: " . $this->conexao->error;
        }
    }

    public function fecharConexao(){
        $this->conexao->close();
    }
}


?>
