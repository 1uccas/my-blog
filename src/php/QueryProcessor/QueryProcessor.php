<?php 
require_once "CustomURL/FormattedURL.php";
require_once "Date/Date.php";
require_once 'vendor/erusev/parsedown/Parsedown.php';

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

            //Datas para URL
            $initial_data = explode(" ", $data);
            $DatatoURL = $initial_data[0];

            //função para formatar caracteres da URL
            //Recebe um parametro de acesso ~> a propria URL
            $urlFormatted = new Formatted_url($url);

            //Função para retornar, em PT-BR, os meses definidos na função Date()
            //Definindo a função, para mostrar os meses em PT-BR, como uma variavel
            $Date = new Date($data); 
            $month = $Date->requestData['month'];
            $year = $Date->requestData['year'];
            $time = $Date->requestData['time'];
            $day = $Date->requestData['day'];

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
                <a href='post/{$DatatoURL}/{$urlFormatted}'>
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
function QueryPostID($Date){
    require_once 'src/conf/db.php';

    $mysql = new DatabaseConnection();
    $link = $mysql->getLink();

    $Parsedown = new Parsedown();

    //Selecionando apenas os post que contenham o id indicado pela URL definida em index.php
    $query_date = "SELECT * FROM my_posts WHERE current_data LIKE '$Date %';";
    $result_Date = $link->query($query_date);

    if ($result_Date->num_rows > 0) {
        while($row = $result_Date->fetch_assoc()){
            return array (
                "post" => $row['post'],
                "title_to_post" => $row["title"],
                "content_type" => "
                <div class='master_class_post'>
                    <div class='div_class_title'>
                        ".$Parsedown->text("#$row[title]")."
                    </div>
                    <div class='div_class_post'>
                        ".$Parsedown->text($row['post'])."
                    </div>
                </div>
                "
            );
        }     
    }else{
        include 'src/pages/not-found.html';
        die();
    }
}
?>
