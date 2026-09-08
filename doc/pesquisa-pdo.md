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