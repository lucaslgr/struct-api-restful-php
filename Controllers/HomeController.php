<?php
/**
 * =============================================================================================
 *                                      Model de exemplo 
 * =============================================================================================
 */

namespace Controllers;

use \Core\Controller;

class HomeController extends Controller{
    public function index() {
        
        //Teste
        $array = array(
            'nome' => 'Lucas',
            'sobrenome' =>'Guimaraes'
        );

        $this->returnJson($array);
    }
}