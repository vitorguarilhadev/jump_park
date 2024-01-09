# Projeto de Estacionamento - Jump Park

### 📝 Descrição: 
O Sistema de Gerenciamento de Estacionamento é uma aplicação web desenvolvida em Laravel, que oferece uma solução abrangente para a gestão de serviços em um estacionamento.

### 📚 Principais Funcionalidades:
*    Gerenciamento de serviços: O sistema permite aos usuários listar, cadastrar, editar e excluir ordens de serviço de um estacionamento. As informações dos livros são armazenadas em um banco de dados e podem ser facilmente listadas, atualizadas ou removidas. 
*    Autenticação Segura: O projeto utiliza o JWT Token para garantir a autenticação segura dos usuários. Os usuários podem fazer login e acessar as funcionalidades de gerenciamento de serviços após a autenticação.
*    Hospedagem online: O projeto utiliza o sistema de hospedagem online Heroku.

### ⚙ URL Temporária:
*    URL: https://app-jump-park-bb410bd77458.herokuapp.com/

### 📜 Documentação API's: 
O projeto conta com os seguintes endpoints:
*   ##### AUTENTICAÇÃO: <kbd>POST api/login</kbd> <br>
    - Obtém ou Atualiza o token para utilizar a API.
    - Request body: <br> 
      {        "email": "vitorguarilha@poli.ufrj.br",
              "password": "12345678"        }
    - Resultado. <br>{ <br>
    "access_token": 
"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcHAtanVtcC1wYXJrLWJiNDEwYmQ3NzQ1OC5oZXJva3VhcHAuY29tXC9hcGlcL2xvZ2luIiwiaWF0IjoxNzAxNzA1OTQyLCJleHAiOjE3MDE3MDk1NDIsIm5iZiI6MTcwMTcwNTk0MiwianRpIjoiWXl2cFUxTTNmVlhUZ0dsZCIsInN1YiI6MTksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.66KGH3XHk6YlmGktbf9YthXgxq5p-XRIEIx0otI09XU", <br>
    "token_type": "bearer", <br>
    "expires_in": 3600 <br>
}
    - access_token: É utilizado nos outros endpoint para autenticar a rota. Deverá ser incluso em Authorization -> Bearer Token <br>
*   ##### LISTAR: <kbd>GET api/service_order</kbd> <br>
    - Listagem de todas as ordens de serviço.
    - Parâmetros: <br>
      page: Paginação. <br>
      vehicle_plate: Filtro pela placa do veículo. <br>
*   ##### CADASTRAR: <kbd>POST api/service_order</kbd> <br>
    - Cadastra uma nova ordem de serviço.
    - Request body: <br> { <br> "vehiclePlate": "CNS7777",
      <br> "entryDateTime": "2023-08-02 14:57:02",
      <br> "exitDateTime": "2023-08-02 14:57:02",
      <br> "priceType": "NOITE",
      <br> "price": "100",
      <br> "userId": 19
      <br>       } <br>
*   ##### EDITAR: <kbd>PUT api/service_order/{service_order_id}/</kbd> <br>
    - Atualiza a ordem de serviço.
    - Request body: <br> { <br> "price": "100"
      <br> "vehiclePlate": "CNS7777"
      <br>       } <br>
*   ##### EXCLUIR: <kbd>DELETE api/service_order/{service_order_id}/</kbd> <br>
    - Remoção lógica da ordem de serviço. <br>

*   ##### DOCUMENTAÇÃO VIA SWAGGER:
    - Através da seguinte url é possível rodas os endpoints e ver toda a documentação da API. <br>
    <kbd>https://app-jump-park-bb410bd77458.herokuapp.com/api-documentation/</kbd>
    
### ⌨️ Executando o Projeto:

Através do Postman, importar a collection, arquivo presente na pasta raiz, e rodar os endpoints que já estão configurados. É necessário gerar um um TOKEN através da rota de login e utilizá-lo nas demais rotas através de Authorization -> Bearer Token.

Para utilizar esse Postman Collection, considere a opção abaixo:

* Faça o download do arquivo em formato JSON que está salvo nesse repositório [Jump Park.postman_collection.json](Jump%20Park.postman_collection.json) e importe em seu app postman.

### 📝 Descrição: 
O Sistema de Gerenciamento de Estacionamento é uma aplicação web desenvolvida em Laravel, que oferece uma solução abrangente para a gestão de serviços em um estacionamento.

### 📚 Principais Funcionalidades:
*    Gerenciamento de serviços: O sistema permite aos usuários listar, cadastrar, editar e excluir ordens de serviço de um estacionamento. As informações dos livros são armazenadas em um banco de dados e podem ser facilmente listadas, atualizadas ou removidas. 
*    Autenticação Segura: O projeto utiliza o JWT Token para garantir a autenticação segura dos usuários. Os usuários podem fazer login e acessar as funcionalidades de gerenciamento de serviços após a autenticação.
*    Hospedagem online: O projeto utiliza o sistema de hospedagem online Heroku.

### ⚙ URL Temporária:
*    URL: https://app-jump-park-bb410bd77458.herokuapp.com/

### 📜 Documentação API's: 
O projeto conta com os seguintes endpoints:
*   ##### AUTENTICAÇÃO: <kbd>POST api/login</kbd> <br>
    - Obtém ou Atualiza o token para utilizar a API.
    - Request body: <br> 
      {        "email": "vitorguarilha@poli.ufrj.br",
              "password": "12345678"        }
    - Resultado. <br>{ <br>
    "access_token": 
"eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9hcHAtanVtcC1wYXJrLWJiNDEwYmQ3NzQ1OC5oZXJva3VhcHAuY29tXC9hcGlcL2xvZ2luIiwiaWF0IjoxNzAxNzA1OTQyLCJleHAiOjE3MDE3MDk1NDIsIm5iZiI6MTcwMTcwNTk0MiwianRpIjoiWXl2cFUxTTNmVlhUZ0dsZCIsInN1YiI6MTksInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.66KGH3XHk6YlmGktbf9YthXgxq5p-XRIEIx0otI09XU", <br>
    "token_type": "bearer", <br>
    "expires_in": 3600 <br>
}
    - access_token: É utilizado nos outros endpoint para autenticar a rota. Deverá ser incluso em Authorization -> Bearer Token <br>
*   ##### LISTAR: <kbd>GET api/service_order</kbd> <br>
    - Listagem de todas as ordens de serviço.
    - Parâmetros: <br>
      page: Paginação. <br>
      vehicle_plate: Filtro pela placa do veículo. <br>
*   ##### CADASTRAR: <kbd>POST api/service_order</kbd> <br>
    - Cadastra uma nova ordem de serviço.
    - Request body: <br> { <br> "vehiclePlate": "CNS7777",
      <br> "entryDateTime": "2023-08-02 14:57:02",
      <br> "exitDateTime": "2023-08-02 14:57:02",
      <br> "priceType": "NOITE",
      <br> "price": "100",
      <br> "userId": 19
      <br>       } <br>
*   ##### EDITAR: <kbd>PUT api/service_order/{service_order_id}/</kbd> <br>
    - Atualiza a ordem de serviço.
    - Request body: <br> { <br> "price": "100"
      <br> "vehiclePlate": "CNS7777"
      <br>       } <br>
*   ##### EXCLUIR: <kbd>DELETE api/service_order/{service_order_id}/</kbd> <br>
    - Remoção lógica da ordem de serviço. <br>

*   ##### DOCUMENTAÇÃO VIA SWAGGER:
    - Através da seguinte url é possível rodas os endpoints e ver toda a documentação da API. <br>
    <kbd>https://app-jump-park-bb410bd77458.herokuapp.com/api-documentation/</kbd>
    
### ⌨️ Executando o Projeto:

Através do Postman, importar a collection, arquivo presente na pasta raiz, e rodar os endpoints que já estão configurados. É necessário gerar um um TOKEN através da rota de login e utilizá-lo nas demais rotas através de Authorization -> Bearer Token.

Para utilizar esse Postman Collection, considere qualquer uma das opções abaixo:

* Acesse o arquivo em formato JSON que está salvo nesse repositório [Jump Park.postman_collection.json](Jump%20Park.postman_collection.json)
* Clique no botão abaixo e abra a configuração direto no Postman instalado em seu computador

[<img src="https://run.pstmn.io/button.svg" alt="Run In Postman" style="width: 128px; height: 32px;">](https://god.gw.postman.com/run-collection/6161625-30eedcb4-4ef8-41d2-8b2f-cc3afca2e956)

### 🔧 Tecnologias utilizadas: 
*   PHP 7.4.27
*   Laravel Framework 8.83.27
*   MySql
*   Heroku

### 🎯 Status do projeto:
Concluído.

### 🐛 Issues:
* Email: vitorguarilha@poli.ufrj.br   )

### 🔧 Tecnologias utilizadas: 
*   PHP 7.4.27
*   Laravel Framework 8.83.27
*   MySql
*   Heroku

### 🎯 Status do projeto:
Concluído.

### 🐛 Issues:
* Email: vitorguarilha@poli.ufrj.br   
