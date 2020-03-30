<?php
namespace Core;

use JsonSerializable;

class Controller {
    
    //Retorna o tipo do método da requisição, Ex: PUT, PUSH, DELTE, GET, etc...
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    //Pega os dados enviados na requisição de acordo com o tratamento necessário para cada método de requisição
    public function getRequestData()
    {
        switch($this->getMethod()){
            case 'GET':
                return $_GET;
                break;
            
            //Os métodos PUT e DELETE são recebidos com o mesmo tratamento
            case 'PUT':
            case 'DELETE':
                //Pega os dados enviados no php://input e converte de String para um ARRAY de objetos
                parse_str(file_get_contents('php://input'), $data);
                //Faz um cast convertendo de array de objetos para ARRAY
                return (array) $data;
                break;
            
            case 'POST':
                //No método POST os dados vem como um JSON, logo, decodificamos ele para um ARRAY de objetos
                $data = json_decode(file_get_contents('php://input'));

                //Caso os dados sejam enviados de um <form> eles vão vir na variável global $_POST
                if (is_null($data))
                    $data = $_POST;
    
                //Faz um cast convertendo de array de objetos para ARRAY
                return (array) $data;
                break;

        }
    }

    //Converte o array em uma responsa JSON
    public function returnJson($array)
    {
        //Definindo o cabeçalho da resposta
        header("Content-Type: application/json");
        echo json_encode($array);
        exit();
    }
}