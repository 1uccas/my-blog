<?php 

class Formatted_url{
    public $queryUrl;

    public function __construct(string $queryUrl){
        $this->queryUrl = $this->Formatted($queryUrl);
    }

    function Formatted($queryUrl){
        $caracters = array(
            'A' => 'a', 'B' => 'b', 'C' => 'c', 'D' => 'd', 'E' => 'e', 'Ê' => 'e',
            'É' => 'e', 'F' => 'f', 'G' => 'g', 'H' => 'h', 'I' => 'i', 'J' => 'j',
            'K' => 'k', 'L' => 'l', 'M' => 'm', 'N' => 'n', 'O' => 'o', 'P' => 'p',
            'Q' => 'q', 'R' => 'r', 'S' => 's', 'T' => 't', 'U' => 'u', 'V' => 'v',
            'W' => 'w', 'X' => 'x', 'Y' => 'y', 'Z' => 'z', 'á' => 'a', 'à' => 'a',
            'â' => 'a', 'ã' => 'a', 'é' => 'e', 'ê' => 'e', 'í' => 'i', 'ó' => 'o',
            'ô' => 'o', 'õ' => 'o', 'ú' => 'u', 'ç' => 'c', ',' => '',  "'" => '',
            "!" => '', "?" => ''
        );

        $urlPost = $queryUrl;
        $explodeUrl = explode(" ", $urlPost); //separa url
        $newUrl = array_slice($explodeUrl, 2); //pega da terceira posição até o final do array 

        //Percorre todo o array e modifica os caracteres listados no array acima
        $removeCaracters = array_map(function($word) use ($caracters) { 
            //Em seguida os retorna modificado
            return strtr($word, $caracters);
        }, $newUrl);
        $implodeUrl = implode("-", $removeCaracters); // junta todos os array com "-" 

        return $implodeUrl; 
    }

    //__toString() para retornar a função sem o Error ~> Catchable fatal error: Object of class could not be converted to string
    public function __toString(){
        return $this->queryUrl;
    }
}

?>