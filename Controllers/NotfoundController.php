<?php
    namespace Controllers;

    use \Core\Controller;

    class NotfoundController extends Controller{
        public function index(){
            //Retornando um JSON vazio
            return $this->returnJson(array());
        }
    }