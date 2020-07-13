<?php
namespace Core;

use JsonSerializable;

class Controller {
    
    /**
     * Retorna o tipo do método da requisição, Ex: PUT, PUSH, DELTE, GET, etc...
     *
     * @return void
     */
    public function getMethod()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Pega os dados enviados na requisição de acordo com o tratamento necessário para cada método de requisição
     *
     * @return void
     */
    public function getRequestData()
    {
        switch($this->getMethod()){
            case 'GET':
                return $_GET;
                break;
            
            //Os métodos PUT e DELETE são recebidos com o mesmo tratamento
            case 'PUT':
            case 'DELETE':
                $header = getallheaders();
                if (isset($header['Content-Type']) && $header['Content-Type'] == 'application/json') {
                    //Pega o JSON e transforma e decodifica para ARRAY
                    $data = json_decode(file_get_contents('php://input'));
                } else {
                    //Pega os dados enviados no php://input e converte de String para um ARRAY de objetos
                    parse_str(file_get_contents('php://input'), $data);
                }

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

    /**
     * Converte um array em uma resposta em JSON escreve na saida da requisição
     *
     * @param [array] $array
     * @return void
     */
    public function returnJson($array)
    {
        //Definindo o cabeçalho da resposta
        header("Content-Type: application/json");
        echo json_encode($this->utf8ize( $array ) );
        exit;
    }

    /**
     * Função para forçar o encode UTF-8 nos caracteres
     *
     * @param [string || array] $d
     * @return [ string || array]
     */
    private function utf8ize($d)
    {
        if (is_array($d)) {
            foreach ($d as $k => $v) {
                $d[$k] = $this->utf8ize($v);
            }
        } else if (is_string($d)) {
            return utf8_encode($d);
        }
        return $d;
    }
}