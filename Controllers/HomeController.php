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
        
        $response = [
            'name' => 'Lucas Guimarães',
            'github' => 'https://github.com/lucaslgr',
            'linkedin' => 'https://www.linkedin.com/in/lucas-guimar%C3%A3es-rocha-a30282132/'
        ];

        $status_code = 200;

        $this->returnJson($response, $status_code);
    }
}