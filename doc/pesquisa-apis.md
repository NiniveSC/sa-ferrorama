# Pesquisa sobre APIs

## 1. O que é uma API e qual é sua finalidade?
API significa Interface de Programação de Aplicações. Ela permite que diferentes sistemas e programas se comuniquem e troquem informações.

A principal finalidade de uma API é facilitar a integração entre sistemas, permitindo que um programa utilize funções ou informações de outro sem precisar conhecer todos os detalhes de seu funcionamento.

Por exemplo, um sistema de uma empresa pode utilizar uma API para consultar informações de entrega de uma transportadora.

## 2. Como funciona a comunicação entre sistemas por meio de APIs?
A comunicação acontece quando um sistema faz uma requisição para uma API, solicitando uma informação ou uma ação. A API recebe o pedido, processa a solicitação e retorna uma resposta.

Por exemplo, um sistema pode solicitar a lista de trens cadastrados. A API consulta as informações e devolve os dados para o sistema que fez o pedido.

Esse processo permite que sistemas diferentes troquem informações de maneira organizada.

## 3. O que são APIs REST?
APIs REST são interfaces que seguem um conjunto de princípios para facilitar a comunicação entre sistemas pela internet. Geralmente, utilizam o protocolo HTTP para enviar requisições e receber respostas.

Elas organizam os dados em recursos, como usuários, produtos, trens e sensores. Cada recurso pode ser acessado por um endereço específico, chamado endpoint.

As APIs REST são bastante utilizadas porque facilitam a integração entre aplicações e permitem que diferentes tecnologias trabalhem juntas.

## 4. O papel dos métodos HTTP
Os métodos HTTP indicam qual ação o sistema deseja realizar na API.

- GET: utilizado para consultar ou buscar informações.
- POST: utilizado para cadastrar ou enviar novas informações.
- PUT: utilizado para substituir completamente as informações de um recurso existente.
- PATCH: utilizado para alterar apenas uma parte das informações de um recurso.
- DELETE: utilizado para excluir um recurso.

Esses métodos ajudam a organizar as operações realizadas pelas APIs.

## 5. O que são requisições e respostas HTTP?
Uma requisição HTTP é uma solicitação enviada de um sistema para outro. Ela pode conter o método utilizado, o endereço do recurso e informações necessárias para realizar a operação.

A resposta HTTP é o retorno enviado pelo servidor após receber e processar a requisição. Ela pode conter os dados solicitados e um código de status que indica o resultado.
Alguns exemplos de códigos de status são:

- 200 OK: a solicitação foi realizada com sucesso.
- 201 Created: um novo recurso foi criado.
- 400 Bad Request: a requisição apresenta algum problema.
- 401 Unauthorized: é necessário se autenticar para acessar o recurso.
- 404 Not Found: o recurso solicitado não foi encontrado.
- 500 Internal Server Error: ocorreu um erro interno no servidor.

Esses códigos ajudam a identificar se uma operação funcionou ou se houve algum problema.

## 6. O que são endpoints?
Endpoints são endereços específicos de uma API usados para acessar informações ou realizar operações. Eles são escritos como caminhos, por exemplo, /usuarios ou /produtos/1.

Esses endereços podem ser utilizados com métodos HTTP, como GET para consultar informações e POST para enviar dados.

## 7. O que é JSON?
JSON significa JavaScript Object Notation. É um formato de texto usado para organizar e trocar dados entre sistemas. Ele permite representar informações com pares de chave e valor.

Exemplo de dados de um trem:
```json
{
  "id_trem": 1,
  "nome_trem": "Trem Regional",
  "tipo_trem": "Passageiros",
  "status_trem": "Ativo"
}
```
Nesse exemplo, cada informação possui uma chave e um valor. O sistema que recebe o JSON pode interpretar esses dados e utilizá-los.

## 8. Diferença entre API e sistema web tradicional
Um sistema web tradicional geralmente apresenta páginas prontas para o usuário, com textos, formulários e botões. Já uma API normalmente disponibiliza dados ou funcionalidades para que outros sistemas utilizem.

Por exemplo, uma página pode mostrar a lista de trens em uma tabela, enquanto uma API pode retornar os mesmos trens em JSON para outro sistema apresentar essas informações.

## 9. Como uma aplicação PHP pode consumir uma API?
O PHP pode enviar requisições HTTP para uma API e interpretar a resposta. Isso pode ser feito usando recursos como cURL ou file_get_contents(). Quando a resposta está em JSON, a função json_decode() pode transformar os dados em uma estrutura que o PHP consegue utilizar.

Exemplo simples:
```php
<?php
$url = "https://exemplo.com/api/trens";

$resposta = file_get_contents($url);
$trens = json_decode($resposta, true);

if ($trens !== null) {
    print_r($trens);
}
?>
```
Esse código demonstra a ideia de consultar uma API e interpretar o JSON. O endereço é fictício e o exemplo depende de a API existir e permitir a consulta.

## 10. Como uma API disponibiliza informações?
Uma API pode receber uma requisição, consultar o banco de dados, processar as informações e devolver uma resposta ao sistema cliente. Dessa forma, diferentes aplicações podem acessar os mesmos dados sem precisar utilizar diretamente o banco de dados umas das outras.

## 11. Autenticação, autorização e segurança
A autenticação verifica a identidade de quem está fazendo a requisição. A autorização verifica quais informações ou ações essa pessoa ou sistema pode acessar.

Para proteger uma API, é importante usar HTTPS, controlar as permissões, proteger senhas e tokens e validar os dados recebidos. Essas medidas ajudam a evitar acessos indevidos e a exposição de informações.

## 12. Exemplos de APIs em empresas
As APIs são utilizadas em diferentes situações, como:

- Financeiro: consultar pagamentos e transações.
- Comércio eletrônico: integrar pedidos, estoque e entregas.
- Recursos humanos: compartilhar informações entre sistemas de funcionários e folha de pagamento.
- Logística: consultar entregas e acompanhar transportes.
- Sistemas ferroviários: compartilhar dados de trens, rotas e sensores com outros sistemas.

Assim, as APIs ajudam a automatizar tarefas, integrar serviços e evitar o cadastro repetido de informações.
