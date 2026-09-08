## O que é PDO?
PDO é a sigla para PHP Data Objects. Trata-se de uma extensão do PHP que fornece uma interface leve, consistente e orientada a objetos para acessar e manipular bancos de dados relacionais.<br>

Foi introduzido nativamente a partir do PHP 5.1, o PDO funciona como uma camada de abstração de banco de dados. Isso significa que ele fornece uma maneira padronizada de interagir com o banco, independentemente de qual sistema de gerenciamento de banco de dados esteja sendo utilizado por baixo dos panos.

## Para que ele é utilizado no php?
O PDO é utilizado para conectar a aplicação PHP ao banco de dados e realizar operações conhecidas como CRUD:
- Inserir dados;
- Consultar e buscar informações;
- Atualizar registros existentes no banco;
- Excluir informações do banco de dados.<br>

Além disso, ele é amplamente adotado no ecossistema PHP moderno por oferecer segurança nativa contra ataques de SQL Injection e permitir que sistemas sejam desenvolvidos com flexibilidade para trocar de banco de dados no futuro com poucas alterações de código.

## Como funciona uma conexão usando PDO 
A conexão com o PDO é estabelecida instanciando um novo objeto da classe `PDO` e para isso, utiliza-se uma string chamada DSN (Data Source Name), que indica o driver do banco, o servidor e o nome da base de dados, acompanhada do usuário, senha e opções de configuração.<br>

Como falhas na conexão podem acontecer (servidor fora do ar, senha incorreta), a conexão deve ser envolvida em um bloco `try/catch`, capturando exceções como `PDOException`

### Exemplo prático de conexão 
```php
<?php
$host = 'localhost';
$db   = 'ferroramas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$opcoes = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn,$user, $pass,$opcoes);
    echo "Conexão realizada com sucesso!";
} catch (PDOException $e) {
    echo "Erro na conexão: " . $e->getMessage();
}
?>
```

## Quais são suas principais caracteristicas 
- Abstração de Acesso a Dados: Permite utilizar o mesmo padrão de métodos (`prepare()`, `execute()`, `fetch()`) para múltiplos bancos de dados.
- Suporte Nativo a Prepared Statements: Separa a instrução SQL dos dados inseridos pelo usuário, garantindo proteção contra SQL Injection.
- Tratamento de Erros por Exceções: Ao configurar `PDO::ERRMODE_EXCEPTION`, qualquer falha na consulta lança uma exceção, facilitando a depuração e o tratamento refinado de erros.
- Orientação a Objetos: Toda a comunicação é feita através de objetos e métodos limpos e previsíveis.
- Múltiplos Formatos de Retorno (Fetch Modes): Permite buscar dados retornando como array associativo `PDO::FETCH_ASSOC`, objeto `PDO::FETCH_OBJ`, array numérico `PDO::FETCH_NUM` ou mapeando diretamente para instâncias de classes personalizadas `PDO::FETCH_CLASS`.
- Suporte a Transações: Permite agrupar várias operações de banco de dados (`beginTransaction(), commit(), rollBack()`) garantindo que todas sejam concluídas juntas ou canceladas em caso de falha.

## Diferenças entre PDO e MySQLi
PDO:
- É uma extensão do PHP utilizada para conexão e interação com bancos de dados.
- Permite trabalhar com diferentes tipos de bancos de dados, como MySQL, PostgreSQL e SQLite.
- Possui suporte a Prepared Statements, aumentando a segurança contra SQL Injection.
- É mais flexível quando existe a possibilidade de trocar o banco de dados no futuro. <br>

MySQLi:
- É uma extensão do PHP utilizada especificamente para trabalhar com bancos de dados MySQL.
- Possui suporte a Prepared Statements, ajudando na proteção contra SQL Injection.
- Pode ser utilizada tanto no estilo procedural quanto no orientado a objetos.
- É uma opção adequada para sistemas que utilizam exclusivamente MySQL.

## Vantagens e desvantagens de utilizar PDO
Vantagens:
- Permite trabalhar com diferentes bancos de dados, como MySQL, PostgreSQL, SQLite e SQL Server.
- Possui suporte a Prepared Statements, aumentando a segurança contra SQL Injection.
- Possui uma interface padronizada, facilitando o desenvolvimento.
- Permite o tratamento de erros e exceções.
- Possui suporte a transações. <br>

Desvantagens:
- Pode ser necessário instalar ou ativar o driver específico do banco de dados que será utilizado.
- Apesar de facilitar a troca de banco, algumas consultas podem precisar de alterações quando se muda de SGBD, devido às diferenças entre os bancos.
- É exclusivamente orientado a objetos, o que pode ser menos familiar para quem está começando com PHP.

## O que são Prepared Statements e por que são importantes
Prepared Statements são uma forma mais segura de executar comandos SQL. Em vez de colocar diretamente os dados fornecidos pelo usuário dentro da consulta, utilizamos parâmetros, que são preenchidos separadamente.

Exemplo sem Prepared Statement:
```php
$nome = $_POST['nome'];

$sql = "INSERT INTO clientes (nome) VALUES ('$nome')";
$conn->query($sql);
```

Nesse caso, o valor recebido pelo usuário é colocado diretamente dentro da consulta SQL.

Exemplo utilizando Prepared Statement:
```php
$nome = $_POST['nome'];

$sql = "INSERT INTO clientes (nome) VALUES (?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nome);
$stmt->execute();
```
Nesse exemplo, o ? funciona como um espaço reservado para o valor. O bind_param() informa qual dado será colocado nesse espaço.


Prepared Statements são importantes principalmente porque aumentam a segurança da aplicação, ajudando a proteger o banco de dados contra SQL Injection.

Por exemplo, para realizar uma busca:
```php
$email = $_POST['email'];

$sql = "SELECT * FROM clientes WHERE email = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $email);
$stmt->execute();

$resultado = $stmt->get_result();
```
Nesse caso, o e-mail é tratado como dado, e não como parte do comando SQL. Isso dificulta que uma entrada maliciosa seja interpretada como um comando pelo banco de dados.

## Em quais situações o PDO pode ser uma boa escolha
- Quando é necessário mais segurança: o PDO permite utilizar Prepared Statements, ajudando a proteger o sistema contra SQL Injection.
- Quando o projeto pode utilizar diferentes bancos de dados: o PDO possui suporte a bancos como MySQL, PostgreSQL, SQLite, Oracle e SQL Server.
- Quando o sistema possui muitas consultas ao banco: seus recursos ajudam a manter o código mais organizado e fácil de manter.
- Quando é necessário trabalhar com transações: o PDO permite controlar operações que precisam ser executadas juntas, garantindo maior segurança dos dados.