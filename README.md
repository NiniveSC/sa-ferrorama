# SA - Ferrorama 🚄

Este projeto consiste em um sistema de monitoramento de um ferrorama em tempo real, desenvolvido como protótipo para uma empresa de tecnologia especializada em mobilidade urbana inteligente. O sistema utiliza de sensores IoT para capturar e processar dados críticos de locomotivas e trilhos.

## 📝 Proposta do Sistema

Este sistema tem como proposta simular como seria um software de controle de um ferrorama, onde por meio de sensores IoT serão captados em tempo real informações sobre velocidade, temperatura e falhas. Além do software permitir o cadastro de novos funcionarios, novos sensores, novos trens e permitir tambem a visualização das respectivas informações sempre que necessario.

Por meio do sistema também será possível a emissão de relatorios operacionais sempre que solicitado, ajudando então na tomada de decisões, com foco em desempenho, manutenção preditiva e segurança.

## 👥 Equipe
- **Maria Clara de Brito**
- **Ninive Simon Cararro**

## ✅ Funcionalidades Previstas

- Página de login
- Recuperação de senha
- Cadasto de novos funcionarios
- Cadastro de sensores
- Cadastro de trens
- Cadastro de rotas
- Geração de relatórios
- Visualização de sensores
- Visualização de trens
- Visualização de rotas
- Visualização de relatórios

## 🖥️ Tecnologias 

Durante a execução do projeto, serão usados as seguintes tecnologias 

- **HTML** - Estrutura das páginas
- **CSS** - Personalização da interface
- **Bootstrap** - Desenvolvimento e estilização da interface
- **Java Script** - Interatividade e funcionalidades do sistema
- **PHP** - Desenvolvimento do sistema e funcionalidades do Back-end
- **MySQL** - Armazenamento e gerenciamento de banco de dados 
- **XAMPP** - Ambiente de desenvolvimento local
- **Git e GitHub** - Versionamento e colaboração da equipe

## 🏛️ Estrutura do Projeto

```text
SA-Ferrorama/
│
├── assets/
│   ├── img/
│   ├── style/
│       └── css/
│
├── doc/
│   └── Documentações e pesquisas
│
├── infra/
│   └── Configurações do banco de dados
│
├── public/
│   └── Páginas do sistema em PHP
│
├── Script/
│   └── Codigos em JS
|
├── index.php
└── README.md

```

## 🗂️ Organização das Pastas

| Pasta/Arquivo  | Descrição                                               |
| -------------  | ------------------------------------------------------- |
| `assets/`      | Arquivos de personalização do sistema                   |
| `assets/img/`  | Arquivos de imagem e recursos visuais                   |
| `assets/style/`| Arquivo de estilização                                  |
| `doc/`         | Documentações, pesquisas e materiais do projeto         |
| `infra/`       | Arquivos relacionados à infraestrutura e banco de dados |
| `public/`      | Páginas do sistema em PHP                               |
| `script/`      | Codigos em JS                                           |
| `index.php`    | Página inicial do sistema                               |
| `README.md`    | Documentação principal do projeto                       |


## 🎲 Padrão de nomenclatura 

Para manter a organização durante o projeto e facilitar o trabalho colaborativo, serão adotados padrões de nomenclatura:

- **Arquivos** - nomes em minusculo e separados por ´-´ quando necessário
- **Pastas** - nomes em minúsculo
- **Variáveis** - utilizar nomes descritivos separados por ´-´ quando necessário
- **Banco de Dados** - nomes em maiúsculo
- **IDs e Classes HTML/CSS** -  nomes relacionados a função ou ao elemento

## ✅Requisitos funcionais

## Autenticação

| Código | Descrição |
|--------|-----------|
| RF01 | O sistema deve permitir que o administrador faça login com e-mail e senha. |
| RF02 | O sistema deve criar uma sessão ao autenticar o usuário e destruí-la ao realizar o logout, redirecionando-o automaticamente para a tela de login. |

## Sensores

| Código | Descrição |
|--------|-----------|
| RF03 | O sistema deve permitir registrar sensores. |
| RF04 | O sistema deve permitir a visualização detalhada de um sensor específico a partir da listagem principal. |
| RF05 | O sistema deve permitir a remoção de sensores, apresentando uma tela de confirmação antes da exclusão definitiva. |
| RF06 | O sistema deve exibir dados atualizados vindos dos sensores IoT, como velocidade do trem, localização no mapa e status operacional (normal, alerta ou falha). |

## Relatórios

| Código | Descrição |
|--------|-----------|
| RF07 | O sistema deve permitir a geração de relatórios sobre a operação ferroviária, incluindo gráficos interativos e análise de tendências. |
| RF08 | O sistema deve permitir a consulta de relatórios gerados anteriormente, com filtros por período e tipo de falha. |

## Locomotivas 

| Código | Descrição |
|--------|-----------|
| RF09 | O sistema deve permitir o cadastro das locomotivas (trens) que compõem a frota. |
| RF10 | O sistema deve permitir editar as locomotivas (trens) cadastrados. |
| RF11 | O sistema deve permitir excluir as locomotivas (trens) cadastrados. |
| RF12 | O sistema deve permitir visualizar as locomotivas (trens) cadastrados. |

## Funcionários

| Código | Descrição |
|--------|-----------|
| RF13 | O sistema deve permitir visualizar os funcionários cadastrados. |
| RF14 | O sistema deve permitir cadastrar novos funcionários. |
| RF15 | O sistema deve permitir editar os funcionários cadastrados. |
| RF16 | O sistema deve permitir excluir os funcionários cadastrados. |

## Rotas

| Código | Descrição |
|--------|-----------|
| RF17 | O sistema deve permitir cadastrar rotas. |
| RF18 | O sistema deve permitir editar rotas. |
| RF19 | O sistema deve permitir listar rotas. |
| RF20 | O sistema deve permitir excluir rotas. |



## 🧮 Metodologia de trabalho da equipe

Para desenvolver esse trabalho, optamos pela utilização de duas metodologias de trabalho o **KANBAN** e o **SCRUM** pelos seguintes motivos:

- **KANBAN**: Achamos que era uma maneira eficiente de organizar tudo que temos para fazer e ir acompanhando o processo de desenvolvimento ao longo de todo o projedo, desde a criação de uma task até a finalização dela
- **SCRUM**: Utlizamos pois dessa forma conseguimos definir melhor nossas prioridades no projeto, objetivos e prazos, de forma que conseguimos sempre estar em dia com as atividades propostas de forma que não sobrecarrega nenhum integrante da equipe. 

---
*Projeto desenvolvido para ser o trabalho final do técnico de Desenvolvimento de Sistemas*

