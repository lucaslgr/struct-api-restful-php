<a href="./LICENSE">![GitHub](https://img.shields.io/badge/license-MIT-green)</a>

# ESTRUTURA DE UMA API RESTful EM PHP PURO

## :rocket: Tecnologias utilizadas

<li>PHP 7.4</li>
<li>MVC - padrão de projeto </li>

## :loudspeaker: Apresentação

Este repositório é um projeto com uma estrutura padrão para a criação de APIs RESTful com PHP.

## ⚙ Features

- [x] Não utiliza frameworks, apenas PHP puro.

## :clipboard: Instruções para rodar o projeto

### Pré-requisitos

- Antes de começar, você vai precisar ter instalado em sua máquina as seguintes ferramentas:

<li>![Git](https://git-scm.com)</li>
<li>![Apache](https://www.apachefriends.org/pt_br/index.html)</li>
<li>Caso não tenha, instle um editor, eu indico o <b>[VSCode](https://code.visualstudio.com/)</li>

### Instalando:

- 1º: Você pode clonar este repositório OU baixar o .zip
  
  ```bash
  # Clonando este repositório
  $ git clone https://github.com/lucaslgr/struct-api-restful-php
  ```

- 2º: Ao descompactar, é necessário rodar o **composer** pra instalar as dependências e gerar o *autoload*.
  Vá até a pasta do projeto, pelo *prompt/terminal* e execute:
  
  ```bash
  #Instalando as dependências
  $ composer install      
  ```

- 3º: Inicie o Apache via XAMPP ou via terminal e abra no navegador

### Configurando:

- OBS: Todas as **configurações** estão nos arquivos **/config.php** e **/environment.php**.

- No arquivo **/environment.php**, comente uma das duas definições da constante **ENVIRONMENT** de acordo com a sua necessidade

- As configurações de Banco de Dados e URL estão no arquivo **/config.php**, tanto para **ENVIRONMENT=development** e **ENVIRONMENT=production**:

```php
    define('BASE_URL', 'http://127.0.0.1/struct-api-restful-php/'); //Configurar corretamente a BASE_URL de acordo com o local onde vai ser alocado o projeto
    $config['dbname'] = 'project-struct-api-restful'; //banco de exemplo
    $config['host'] = '127.0.0.1'; //ou 'localhost'
    $config['dbuser'] = 'root'; //login BD exemplo
    $config['dbpass'] = ''; //senha BD exemplo
```

- É importante configurar corretamente a constante *BASE_URL* dentro do **config.php**:
  
  > define('BASE_URL', 'http://127.0.0.1/struct-api-restful-php/'); //EXEMPLO 

## :man_technologist: Autoria

Lucas Guimarães

https://lucaslgr.github.io/

https://www.linkedin.com/in/lucas-guimar%C3%A3es-rocha-a30282132/

## :male_detective: Referências

https://www.php.net/
