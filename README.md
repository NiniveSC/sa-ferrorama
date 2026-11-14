# Ferrorama 🚄

## 1) Nome e descrição

### Nome do projeto
Ferrorama

### Descrição
Sistema de monitoramento ferroviário desenvolvido em PHP, com foco em gestão de trens, sensores, rotas, funcionários e relatórios operacionais. A aplicação permite acompanhar o estado da frota em tempo real, controlar usuários e oferecer uma experiência administrativa para operação de uma ferrovia.

A solução também inclui integração com APIs externas para clima e CEP, além de uma interface de dashboard para centralizar as informações relevantes da operação.

---

## 2) Problema resolvido

A operação ferroviária exige controle eficiente de:
- trens em circulação;
- sensores e falhas;
- rotas cadastradas;
- pessoas envolvidas na operação;
- relatórios e acompanhamento de desempenho.

Sem um sistema centralizado, esse controle tende a ficar disperso, sujeito a erros manuais e difícil de auditar. O Ferrorama resolve isso com um painel administrativo simples e organizado, permitindo registro, consulta e manutenção dos dados essenciais da operação ferroviária.

---

## 3) Objetivos e funcionalidades

### Objetivos principais
- centralizar o cadastro de trens, sensores, rotas e funcionários;
- facilitar a gestão operacional da frota;
- permitir acesso seguro por perfis de usuário;
- oferecer dashboard com visão geral da operação;
- integrar informações de clima e CEP para contexto operacional.

### Funcionalidades
- Login e logout com autenticação de sessão;
- recuperação de senha;
- dashboard com clima em tempo real via Open-Meteo;
- consulta de CEP via ViaCEP;
- cadastro, edição, visualização e exclusão de funcionários;
- cadastro, edição, visualização e exclusão de sensores;
- cadastro, edição, visualização e exclusão de trens;
- cadastro, edição, visualização e exclusão de rotas;
- relatórios gerais da operação;
- restrição de ações por perfil administrativo.

---

## 4) Tecnologias

- PHP 8+
- HTML5
- CSS3
- Bootstrap 5
- JavaScript
- MySQL / MariaDB
- XAMPP
- APIs externas:
  - Open-Meteo
  - ViaCEP
- Git / GitHub

---

## 5) Requisitos

Para executar o projeto, é necessário:
- computador com Windows, Linux ou macOS;
- XAMPP ou equivalente com Apache e MySQL ativados;
- navegador moderno (Chrome, Edge, Firefox);
- acesso à internet para consultas de clima e CEP;
- PHP funcionando no ambiente local;
- banco de dados MySQL com criação da base `SA_Ferrorama`.

---

## 6) Passo a passo de instalação

1. Baixe ou clone o projeto do repositório.
2. Coloque a pasta no diretório do servidor local, normalmente:
   - `C:\xampp\htdocs\sa-ferrorama`
3. Inicie o XAMPP.
4. Ative o Apache e o MySQL.
5. Verifique se a pasta do projeto está acessível no navegador.
6. Acesse a URL principal do sistema:
   - `http://localhost/sa-ferrorama/`
7. Para entrar no sistema administrativo, acesse:
   - `http://localhost/sa-ferrorama/public/login/tela-login.php`

---

## 7) Configuração e importação do banco

O banco de dados fica na pasta `database/`.

### Arquivos do banco
- `database/banco_sa.sql` → estrutura principal da base
- `database/popula_exemplo.sql` → dados de exemplo, caso necessário

### Importação via phpMyAdmin
1. Abra o phpMyAdmin em `http://localhost/phpmyadmin`.
2. Crie o banco chamado `SA_Ferrorama`.
3. Selecione o banco criado.
4. Clique em `Importar`.
5. Escolha o arquivo `database/banco_sa.sql`.
6. Confirme e importe.

### Importação via linha de comando
Se preferir, pode executar:

```bash
mysql -u root -p
CREATE DATABASE SA_Ferrorama;
USE SA_Ferrorama;
SOURCE C:/xampp/mysql/bin/banco_sa.sql;
```

Observação: o script contém a criação das tabelas, chaves estrangeiras e também um usuário administrador inicial já cadastrado.

---

## 8) Como iniciar

Depois de importar o banco e iniciar o Apache/MySQL:

1. Acesse:
   - `http://localhost/sa-ferrorama/`
2. Na landing page, você pode ver a apresentação do projeto.
3. Para entrar no sistema administrativo, use:
   - `http://localhost/sa-ferrorama/public/login/tela-login.php`

### Credencial padrão do administrador
- Email: `admin@admin.com`
- Senha: `admin123` (ou a senha cadastrada na base, conforme a versão do banco importada)

Se a senha for alterada no banco, use a senha atual do usuário administrador.

---

## 9) Perfis de acesso

O sistema possui dois perfis principais:

### 1. Administrador
- perfil com acesso total;
- pode cadastrar, editar e excluir funcionários;
- pode gerenciar trens, rotas e sensores;
- visualiza relatórios completos;
- tem controle total do painel.

### 2. Funcionário
- perfil de uso operacional;
- acessa dashboard e recursos de leitura;
- pode consultar registros e relatórios;
- não pode realizar ações sensíveis de exclusão/edição em áreas restritas.

A lógica de permissão é feita em `infra/permissoes.php`, e o acesso é validado por `ehAdministrador()`.

---

## 10) Estrutura de pastas

```text
sa-ferrorama/
├── assets/
│   ├── img/
│   └── style/
├── database/
│   ├── banco_sa.sql
│   └── popula_exemplo.sql
├── doc/
│   ├── guia-usuario.md
│   └── outros documentos de estudo
├── infra/
│   ├── api_cep.php
│   ├── api_clima.php
│   ├── conexao.php
│   ├── permissoes.php
│   ├── seguranca.php
│   └── verifica_sessao.php
├── public/
│   ├── cep/
│   ├── dashboard/
│   ├── funcionarios/
│   ├── landing/
│   ├── login/
│   ├── relatorios/
│   ├── rotas/
│   ├── sensores/
│   └── trens/
├── script/
│   └── tela-login.js
├── index.php
├── LICENSE
├── README.md
└── .gitignore
```

---

## 11) Integrantes e contribuições

### Integrantes
- Maria Clara de Brito
- Ninive Simon Cararro

### Contribuições principais
- estrutura do projeto e organização das telas;
- desenvolvimento do sistema em PHP;
- criação das páginas administrativas e dashboard;
- integração com APIs auxiliares;
- modelagem e importação do banco de dados;
- implementação de regras de autenticação e perfis de acesso;
- documentação do projeto.

---

## 12) Prints da tela final

Abaixo, alguns exemplos visuais das telas principais da aplicação.

### Tela de login


### Layout geral do sistema


### Ícones e elementos do dashboard




---

## 13) Limitações conhecidas

- O sistema foi desenvolvido para ambiente local e não foi pensado como solução multiusuário em produção massiva;
- a autenticação e permissões são simples e baseadas em sessão do PHP;
- as APIs externas dependem de internet e podem falhar em ambientes sem conexão;
- a aplicação usa dados de exemplo e estrutura local, e pode exigir ajustes para deploy em servidor externo;
- a validação e segurança seguem boas práticas básicas do PHP, mas não substituem uma revisão de segurança profissional para ambiente de produção;
- o projeto ainda possui foco em operação local/administrativa, sem módulo avançado de monitoramento em tempo real com WebSocket ou serviço em background.

---

## Conclusão

O Ferrorama é uma solução prática para gestão ferroviária local, com foco em controle administrativo, rastreio de ativos e apoio à operação. O sistema une interface amigável, banco de dados estruturado e integração com APIs externas para entregar um painel funcional e útil para o contexto proposto.

Se quiser evoluir o projeto, os próximos passos naturais são:
- criar mais módulos operacionais;
- melhorar relatórios em PDF/Excel;
- adicionar alertas automáticos de falhas;
- implementar autenticação mais robusta para produção;
- expandir para arquitetura web com banco em servidor externo.

