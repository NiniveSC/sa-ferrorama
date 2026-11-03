# Ferrorama 🚄

Sistema de monitoramento ferroviário com painel administrativo, integração de clima em tempo real e consulta de CEP por API.

## Visão geral

O Ferrorama é uma solução voltada para monitoramento operacional de trens, sensores, rotas e funcionários. A aplicação combina uma interface administrativa acessível com uma landing page de apresentação do projeto e integra dados externos para oferecer contexto adicional à operação.

## Funcionalidades entregues

- Página de apresentação da solução (landing page)
- Dashboard administrativo com boas-vindas e navegação intuitiva
- Consulta real de clima com Open-Meteo
- Consulta real de CEP com ViaCEP
- Tratamento de erros e mensagens amigáveis para falhas de comunicação
- Login e recuperação de senha já presentes no projeto
- Navegação responsiva com identidade visual consistente

## APIs integradas

### Open-Meteo
- Documentação oficial: https://open-meteo.com/en/docs
- Objetivo: obter temperatura atual, condições climáticas, data e hora da última atualização para a região de São Paulo.
- Uso no sistema: a página de dashboard consulta a API e exibe temperatura, condição do clima e localização.

### ViaCEP
- Documentação oficial: https://viacep.com.br/
- Objetivo: consultar CEPs brasileiros e preencher automaticamente logradouro, bairro, cidade e UF.
- Uso no sistema: a página de CEP recebe um valor informado pelo usuário, valida o formato e retorna os dados da API.

## Estrutura principal

```text
SA-Ferrorama/
├── assets/
│   ├── img/
│   └── style/
├── docs/
│   └── relatorio-uso-ia.md
├── infra/
│   ├── api_cep.php
│   ├── api_clima.php
│   ├── conexao.php
│   ├── permissoes.php
│   └── verifica_sessao.php
├── public/
│   ├── cep/
│   ├── dashboard/
│   ├── landing/
│   ├── login/
│   ├── relatorios/
│   ├── rotas/
│   ├── sensores/
│   └── trens/
├── script/
├── index.php
├── README.md
└── LICENSE
```

## Como executar

1. Abra o projeto em um ambiente com PHP e Apache, como XAMPP.
2. Coloque a pasta do projeto em `htdocs`.
3. Inicie o Apache e o MySQL.
4. Acesse o sistema por:
   - `http://localhost/sa-ferrorama/` para a landing page
   - `http://localhost/sa-ferrorama/public/login/tela-login.php` para o login
5. Utilize o sistema com as credenciais cadastradas no banco `SA_Ferrorama`.

## Observações importantes

- As APIs externas dependem de acesso à internet no ambiente de execução.
- Caso a API de clima ou a de CEP não esteja disponível, o sistema exibe mensagens amigáveis em vez de falhar silenciosamente.
- O dashboard exibe o clima para a cidade de São Paulo, conforme o foco de operação e a localização do projeto.

## IA e documentação de uso

O relatório completo de uso da IA foi registrado em:
- `docs/relatorio-uso-ia.md`

## Equipe

- Maria Clara de Brito
- Ninive Simon Cararro

## Tecnologias

- PHP
- HTML
- CSS
- Bootstrap
- JavaScript
- MySQL
- XAMPP
- Git / GitHub

## Status

Projeto em desenvolvimento e com integrações reais funcionando em ambiente local com acesso à internet.

