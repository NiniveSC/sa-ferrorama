# Relatório de uso de IA no desenvolvimento do Ferrorama

## 1. Ferramenta utilizada

A equipe utilizou o GitHub Copilot como agente de apoio para:
- pesquisar soluções de integração com APIs;
- estruturar a landing page e os blocos de conteúdo;
- revisar a organização do código PHP;
- sugerir ajustes de estilo e validações de entrada; e
- verificar erros de sintaxe e inconsistências de fluxo.

## 2. Objetivo das utilizações

### Uso 1 — pesquisa e comparação de APIs
- Objetivo: selecionar uma API gratuita e estável para clima e outra para consulta de CEP.
- Resultado esperado: usar dados reais de produção e reduzir o risco de telas estáticas.

### Uso 2 — desenvolvimento das interfaces
- Objetivo: definir estrutura visual da landing page e do dashboard, mantendo a identidade da marca Ferrorama.
- Resultado esperado: criar páginas com boa hierarquia visual, responsividade e consistência com o sistema.

### Uso 3 — validação e correção
- Objetivo: revisar erros de PHP, ajustar nomes de arquivos, corrigir formatação e tratar mensagens de erro.
- Resultado esperado: reduzir falhas de execução e garantir que as integrações funcionassem corretamente.

## 3. Principais instruções e prompts

Exemplos dos prompts usados durante o desenvolvimento:

- "Crie uma landing page para um sistema de monitoramento ferroviário com foco em segurança, eficiência e operação, mantendo a identidade visual do projeto."
- "Desenvolva uma integração em PHP com a API Open-Meteo para exibir temperatura atual, condição climática e data/hora da atualização para a cidade de São Paulo."
- "Monte uma página de consulta de CEP em PHP e valide erros, CEPs inexistentes, ausência de resposta e entradas inválidas."
- "Revise o código PHP e corrija erros de sintaxe e compatibilidade com o projeto vigente."

## 4. Trechos e arquivos produzidos com auxílio da IA

Os principais arquivos influenciados pelo uso da IA foram:
- `infra/api_clima.php`
- `infra/api_cep.php`
- `public/landing/landing-page.php`
- `public/cep/consulta-cep.php`
- `public/dashboard/tela-geral-home.php`
- `assets/style/style.css`
- `README.md`

## 5. Alterações realizadas pela equipe

A equipe revisou e ajustou o conteúdo gerado para se alinhar ao contexto real do projeto. Foram feitas mudanças como:
- adaptação do layout para a identidade visual já existente;
- inclusão de navegação consistente com as páginas do sistema;
- correção de nomes de rotas e caminhos de arquivos;
- validação da presença da sessão do usuário;
- ajustes de texto para manter linguagem coerente com o projeto; e
- inclusão de mensagens de erro e fallback para falhas de comunicação com as APIs.

## 6. Testes executados

Durante o desenvolvimento foram realizados os seguintes testes:

1. Validação sintática de arquivos PHP com `php -l`.
2. Testes de comunicação real com as APIs externas via `curl` e `file_get_contents`.
3. Verificação da resposta para CEP válido e inválido.
4. Verificação do fluxo de login e de acesso à página de dashboard.
5. Conferência da renderização das páginas HTML e do comportamento dos formulários.

## 7. Problemas identificados e correções

### Problema 1 — caminho inexistente para o CSS
- Identificação: a página usava um caminho de estilo inconsistente com o caminho real do projeto.
- Correção: ajustamos o include para `assets/style/style.css`.

### Problema 2 — consulta a API de clima sem tratamento de erro
- Identificação: a resposta da API poderia falhar e não havia mensagem útil para o usuário.
- Correção: incluímos validações e mensagens de fallback no arquivo `infra/api_clima.php`.

### Problema 3 — CEP inválido sem validação semântica
- Identificação: entradas vazias ou com caracteres inválidos poderiam gerar consultas quebradas.
- Correção: sanitizamos a entrada e validamos o formato antes de consultar a API.

### Problema 4 — uma página estática poderia ser confundida com funcionalidade real
- Identificação: era necessário liberar uma integração genuína com dados externos.
- Correção: implementamos consultas reais com a API Open-Meteo e ViaCEP.

## 8. Reflexão sobre a contribuição da IA

A IA foi útil para acelerar a pesquisa e estabelecer um ponto inicial coerente para o código, principalmente em aspectos de estrutura, estilo e integração. Também ajudou a reduzir retrabalho na revisão inicial da arquitetura de páginas.

No entanto, a IA não substitui a validação humana. A equipe foi responsável por:
- revisar cada trecho gerado;
- confirmar que os fluxos do sistema eram compatíveis com a estrutura existente;
- ajustar os textos para o contexto real do projeto; e
- verificar que as APIs devolviam dados reais e com tratamento de erro.

Esse processo mostrou que a ferramenta pode acelerar o desenvolvimento, mas a responsabilidade técnica e a revisão crítica continuam sendo humanas.

## 9. Documentação oficial das APIs

- Open-Meteo: https://open-meteo.com/en/docs
- ViaCEP: https://viacep.com.br/

## 10. Coautoria

As alterações integradas ao projeto foram revisadas e validadas pela equipe. Quando a IA gerou trechos incorporados ao código, a coautoria foi registrada no commit correspondente com o identificador do agente utilizado: `GitHub Copilot`.
