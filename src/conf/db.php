<?php 
require 'vendor/autoload.php';
 
$dotenv = Dotenv\Dotenv::createUnsafeImmutable(__DIR__. "\..\..");
$dotenv->load();

class DatabaseConnection {
    private $link;

    public $SERVIDOR;
    public $USUARIO;
    public $SENHA ;
    public $BANCO;

    public function __construct() {
        $this->SERVIDOR = $_ENV['DB_SERVER'];
        $this->USUARIO = $_ENV['DB_USER'];
        $this->SENHA = $_ENV['DB_PASSWORD'];
        $this->BANCO = $_ENV['DB_DATABASE'];

        $this->link = mysqli_connect($this->SERVIDOR, $this->USUARIO, $this->SENHA, $this->BANCO);

        // Valida a conexão
        if (mysqli_connect_errno()){
            echo "Falha ao conectar no Banco de Dados MySQL: " . mysqli_connect_error();
        }

        // Configuração do conjunto de caracteres
        mysqli_query($this->link, "SET NAMES 'utf8'") or die("Erro na SQL" . mysqli_error($this->link));
        mysqli_query($this->link, "SET character_set_connection=utf8") or die("Erro na SQL" . mysqli_error($this->link));
        mysqli_query($this->link, "SET character_set_client=utf8") or die("Erro na SQL" . mysqli_error($this->link));
        mysqli_query($this->link, "SET character_set_results=utf8") or die("Erro na SQL" . mysqli_error($this->link));
    }

    public function getLink() {
        return $this->link;
    }

    public function closeConnection() {
        mysqli_close($this->link);
    }
}

?>