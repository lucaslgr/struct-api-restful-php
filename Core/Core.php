<?php
    namespace Core;

    class Core {
        public function run() {
            $url = '/';

            if (isset($_GET['url']) && !empty($_GET['url'])) {
                $url .= $_GET['url']; //Contatenando com o que foi enviado
            }

            //Verifica se a URL de requisição do cliente bate com alguma das rotas e retorna a rota que bateu
            $url = $this->checkRoutes($url);

            $currentAction = 'index';
            $params = array();
            if (!empty($url) && $url != '/') {
                $url = explode('/',$url);
                
                //Tirando apenas a primeira parte da url que é a parte antes da / sem nada
                array_shift($url);

                //Identificando o controller
                if (isset($url[0]) && $url[0] != '/') {
                    $currentController = $url[0].'Controller';
                    array_shift($url);
                }

                //Identificando a action
                if(isset($url[0]) && !empty($url[0])) {
                    $currentAction = $url[0];
                    array_shift($url);
                }

                //Identificando os Parâmetros
                if (count($url) > 0) {
                    $params = $url;
                }

            }
            else {
                $currentController = 'HomeController';
                $currentAction = 'index';
            }

            $currentController = ucfirst($currentController); //Transoforma a primeira letra em maiúscula
            $prefix = '\Controllers\\';

            if (!file_exists('Controllers/'.$currentController.'.php') ||
                !method_exists($prefix.$currentController, $currentAction)) {
                $currentController = 'NotfoundController';
                $currentAction = 'index';
            }

            //Instanciando o controller identificado
            $namespaceController = $prefix.$currentController;
            $c = new $namespaceController;
            //Executando a respectiva action
            call_user_func_array(
                array($c, $currentAction),
                $params
            );
        }

        //Checa se a URL da requisição do client bate com alguma das rotas
        private function checkRoutes($url)
        {
            global $routes;

            foreach($routes as $pt => $newurl){
                //Etapa 1
                //Identifica os argumentos e substitui por regex
                $pattern = preg_replace('(\{[a-z0-9-]{1,}\})', '([a-z0-9-]{1,})',$pt);
                // echo 'Padrão substituído: '.$pattern.'<br>';
                
                //Verificando qual das rotas que batem com a url digitada pelo cliente
                if(preg_match('#^('.$pattern.')*$#i', $url, $matches) === 1){
                    
                    array_shift($matches); //Retirando primeiro resultado
                    array_shift($matches); //Retirando segundo resultado
                    // echo '<pre>';
                    // print_r($matches); //Resultado que nos interessa

                    //Pega todos os argumentos entre {} para associar
                    $items = array();
                    if(preg_match_all('(\{[a-z0-9]{1,}\})',$pt,$m)){
                        // echo '<pre>';
                        // print_r($m);
                        
                        //Substituindo todo caso de chave aberta e fechada por nada
                        $items = preg_replace('(\{|\})','',$m[0]);
                        // print_r($items);
                    }

                    $arg = array();
                    foreach ($matches as $key => $match) {
                        $arg[$items[$key]] = $match;
                    }
                    // echo '<pre>';
                    // print_r($arg);

                    foreach ($arg as $argkey => $argvalue) {
                        $newurl =  str_replace(':' . $argkey, $argvalue, $newurl);
                        // echo $newurl.'<br>';
                    }
                    $url = $newurl;
                    break;
                }
            }
            return $url;
        }
    }
?>