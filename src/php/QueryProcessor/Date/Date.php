<?php 
class Date{
    public $requestData;

    public function __construct(string $requestData){
        $this->requestData = $this->TakeData($requestData);
    }

    public function TakeData($request){
        $array = ["", "Janeiro", "Fevereiro", "Março", "Abril", 
        "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", 
        "Novembro", "Dezembro"];

        $month = date("n", strtotime($request));
        $time = date("H:i", strtotime($request));
        $year = date("Y", strtotime($request));
        $day = date("d", strtotime($request));

        return array (
            "month" => $array[$month],
            "time" => $time,
            "year" => $year,
            "day" => $day
        );
    }

    public function __toString(){
        //Utilizando strinf para SOMENTE formatar o array e imprimi-lo em QueryProcessor.php

        return sprintf(
            "Mês: %s, Dia: %s, Ano: %s, Hora: %s",
            $this->requestData['month'],
            $this->requestData['day'],
            $this->requestData['year'],
            $this->requestData['time']
        );
    }
}
?>