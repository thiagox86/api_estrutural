# api_estrutural
API desenvolvida em PHP estrutural. 
Ideal para testes e avaliação de mvp.

########################################################################################################################################################################################

Ideal para quem tem conhecimentos básicos em PHP ou é desenvolvedor frontend e precisa efetuar testes com uma API simples e funcional.

########################################################################################################################################################################################

Exemplo de verificação e criação de token durante o login de um usuário.

=> Banco de Dados MySQL/MariaDB

CREATE TABLE user (
  id int NOT NULL AUTOINCREMENT,
  email varchar(250),
  password varchar(250),
  token varchar(32)
);


=> config.php
- Arquivo onde é feita a configuração de conexão com banco de dados;
- a variável $env define se o ambiente é de desenvolvimento ou produção;
- declarado um array() que é utilizado para receber as respostas das requisições;


=> response.php
- definição de cabeçalho para permitir CORS;
- resposta em json;


=> arquivo login
- todo endpoint será um diretório com arquivos que retornarão as respostas das requisições;
- é feita dessa forma pois não tem o arquivo .htaccess para trabalhar as url's;
- no nosso exemplo o end point na máquina de desenvolvimento para teste é: http://localhost/api_estrutural/login/verifyUser.php - (métofo POST);
- Exercício: crie um arquivo getUser.php para pegar os dados do usuário verificado no endpoint: http://localhost/api_estrutural/login/getUser.php?u={token} - substua {token} pelo valor recebido na verificação anterior!
