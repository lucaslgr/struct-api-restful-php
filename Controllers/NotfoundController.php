<?php
/**
 * =============================================================================================
 *                                      Controller para tratar 404
 * =============================================================================================
 */
namespace Controllers;

use \Core\Controller;

class NotfoundController extends Controller{
    /**
     * Por padrão escreve na saida um JSON vazio
     *
     * @return void
     */
    public function index(){
        //Retornando um JSON vazio
        return $this->returnJson(array());
    }
}