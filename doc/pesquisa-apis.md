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
