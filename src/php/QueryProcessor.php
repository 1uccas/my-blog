<?php 
function returnQuery(){ //Retorno de consultas do banco de dados
    function SimplesQueryPost(){//Retorno simples (padrão) de uma consulta

        //Requisitando o arquivo de conexão do banco de dados
        require_once 'src/conf/db.php';

        //Definindo a variavel mysql como um objeto criado
        $mysql = new DatabaseConnection();
        //LINK contém todas as informações do banco de dados, necessários para gerar consultas, etc.
        $link = $mysql->getLink();

        //Dados ordenados por ordem decrescente
        $sql = "SELECT * FROM my_posts ORDER BY current_data DESC;"; 
        $result = $link->query($sql);

        return $result;
    }
    //Definindo a variavel como Global para que assim ela possa ser acessada de qualquer lugar fora do escopo da função principal.
    global $SimplesQueryPost;

    //Atribuindo a função como uma string para não gerar erro (PHP não deixa definir funções diretamente como variaveis)
    $SimplesQueryPost = 'SimplesQueryPost';
}
function queryHomeMyPosts(){

    //função para formatar caracteres da URL
    //Recebe um parametro de acesso ~> a propria URL
    function FormattedUrl($queryUrl){
        $caracters = array(
            'A' => 'a',
            'B' => 'b',
            'C' => 'c',
            'D' => 'd',
            'E' => 'e',
            'Ê' => 'e',
            'É' => 'e',
            'F' => 'f',
            'G' => 'g',
            'H' => 'h',
            'I' => 'i',
            'J' => 'j',
            'K' => 'k',
            'L' => 'l',
            'M' => 'm',
            'N' => 'n',
            'O' => 'o',
            'P' => 'p',
            'Q' => 'q',
            'R' => 'r',
            'S' => 's',
            'T' => 't',
            'U' => 'u',
            'V' => 'v',
            'W' => 'w',
            'X' => 'x',
            'Y' => 'y',
            'Z' => 'z',
            'á' => 'a',
            'à' => 'a',
            'â' => 'a',
            'ã' => 'a',
            'é' => 'e',
            'ê' => 'e',
            'í' => 'i',
            'ó' => 'o',
            'ô' => 'o',
            'õ' => 'o',
            'ú' => 'u',
            'ç' => 'c',
            ',' => '',
            "'" => '',
            "!" => '',
            "?" => ''
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

    //Função para retornar, em PT-BR, os meses definidos na função Date()
    function takeData($allData){
        $arrayMounth = ["", "Janeiro", "Fevereiro", "Março", "Abril", "Maio", 
        "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

        $data = date("n", strtotime($allData)); //Month 
        $year = date("Y", strtotime($allData));
        $time = date("H:i", strtotime($allData));
        $day = date("d", strtotime($allData));

        return array(
            "month" => $arrayMounth[$data],
            "year" => $year,
            "time" => $time,
            "day" => $day
        );
    }
    returnQuery(); //Declarando a função principal 
    $result = SimplesQueryPost(); //definindo uma variavel de resultados retornados pela função

    //(#No_repete) Variavel utilizadas para não imprimir meses ou anos repetidos nas consultas do banco de dados
    $lastYear = null; 
    $lastMonth = null;

    //condicional para caso a linha de resultados seja maior que zero, retorne os resultados
    if ($result->num_rows > 0) {
        //Definindo a variavel row (linha) como um alinhado para o funcionamento da variavel result
        //usando o fetch assoc para percorrer todas as linhas da colunas no banco de dados
        while ($row = $result->fetch_assoc()) {
            $data = $row['current_data']; //Data atual
            $url = $row['title']; //Titulo para ser usado na url
            $url = FormattedUrl($url); //Usando a função de formatação de url
            $id = $row['id']; 

            //Definindo a função, para mostrar os meses em PT-BR, como uma variavel
            $formatted_data = takeData($data); 
            $month = $formatted_data['month'];
            $year = $formatted_data['year'];
            $time = $formatted_data['time'];
            $day = $formatted_data['day'];

            //(#No_repete) Verifica se é um novo ano ou mês
            $newYear = $lastYear !== $year;
            $newMonth = $lastMonth !== $month;

            //Caso for um mês, ou ano, novo imprima o conteudo abaixo:
            if ($newYear || $newMonth) {
                echo "<div class='class_time_post'><label>$year - $month</label></div>";
                $lastYear = $year; //Defina a variavel como o ano retornado pela consulta do bd.
                $lastMonth = $month;
            }

            echo "
            <div class='div_master_only_post'>
                <a href='post/{$id}/{$url}'>
                    <div class='div_only_post' title='Post in ~ $time'>
                        <label class='label_title_post'>{$row['title']}</label> 
                        <label class='label_fullData_post'>$day $month $year · $time</label>
                    </div>
                </a>
            </div>
            ";
        }   
    }
}
//Função para retornar IDS que serão usados na página POST.
function QueryPostID($id){
    require_once 'src/conf/db.php';

    $mysql = new DatabaseConnection();
    $link = $mysql->getLink();

    //Selecionando apenas os post que contenham o id indicado pela URL definida em index.php
    $query_id = "SELECT * FROM my_posts WHERE id='$id';";
    $result_id = $link->query($query_id);

    if ($result_id->num_rows > 0) {
        while($row = $result_id->fetch_assoc()){
            return var_dump($row['post']);
        }     
    }
}
?>
