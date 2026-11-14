# Guia visual do sistema Ferrorama

Este guia foi pensado para pessoa leiga, com passo a passo simples e telas ilustradas em formato de mockup para facilitar a navegação.

## 1) Como acessar o sistema

1. Abra o XAMPP.
2. Inicie o Apache e o MySQL.
3. Abra o navegador.
4. Acesse:
   - http://localhost/sa-ferrorama/public/login/tela-login.php

Mockup da tela de login:


Se o usuário já tiver conta cadastrada, basta digitar email e senha e clicar em Entrar.

---

## 2) Como fazer login e logout

### Login

- Digite o email cadastrado;
- Digite a senha;
- Clique em Entrar.

Se os dados estiverem corretos, você será levado para o Dashboard.

### Logout

No canto superior direito, clique no nome do usuário e depois em "Sair".

Mockup:


---

## 3) Como entender o Dashboard

Depois do login, a página inicial é o Dashboard.

Ele mostra:
- boas-vindas ao usuário;
- clima em tempo real da região;
- painel de relatórios/gráficos;
- atalhos para os módulos do sistema.

Mockup do Dashboard:



O Dashboard funciona como o centro de navegação da aplicação.

---

## 4) Módulo de Funcionários

### Como acessar

No menu, clique em "Funcionário".

### Como consultar

A tela lista todos os funcionários cadastrados com:
- nome;
- email;
- telefone;
- cargo.

Mockup:



### O que o Admin pode fazer

Somente um usuário com perfil de Administrador pode:
- cadastrar novo funcionário;
- editar funcionário;
- excluir funcionário.

Na tela, o botão de ações aparece para o admin.

### Como cadastrar

1. Clique em "+ Novo funcionário";
2. Preencha nome, cargo, CPF, telefone, email;
3. Clique em cadastrar.

### Como editar ou excluir

- Clique em "Editar" para alterar os dados;
- Clique em "Excluir" para remover o cadastro.

Observação: ações de edição/exclusão são bloqueadas para usuários comuns.

---

## 5) Módulo de Sensores

### Como acessar

No menu, clique em "Sensores".

### Como consultar

A tela mostra uma tabela com:
- ID do sensor;
- localização;
- status;
- tipo.

Mockup:



### Como cadastrar

1. Clique em "+ Novo sensor";
2. Preencha tipo, status, localização;
3. Se necessário, informe trem ou rota relacionada;
4. Clique em "Cadastrar".

### Como visualizar e editar

- "Visualizar" mostra detalhes do sensor;
- "Editar" permite alterar status ou localização;
- "Excluir" remove o registro do sistema.

---

## 6) Módulo de Trens

### Como acessar

No menu, clique em "Trens".

### Como consultar

A tela lista:
- ID do trem;
- localização;
- status;
- tipo;
- responsável.

Mockup:


### Como cadastrar

1. Clique em "+ Novo trem";
2. Informe nome, tipo, localização, status;
3. Escolha o responsável, se existir;
4. Salve o cadastro.

### Como editar

- Clique em "Editar";
- Ajuste os dados;
- Salve para confirmar.

### Como excluir

- Clique em "Excluir";
- O sistema impede exclusão se o trem estiver ligado a rota ou dependências importantes.

---

## 7) Módulo de Rotas

### Como acessar

No menu, clique em "Rotas".

### Como consultar

A tela traz:
- nome da rota;
- distância;
- duração estimada;
- ações de visualização/edição.

Mockup:



### Como cadastrar

1. Clique em "+ Nova rota";
2. Informe nome, descrição, distância, duração e trem vinculado;
3. Clique em Cadastrar.

### Como visualizar

- "Visualizar" mostra detalhes completos da rota, trem associado e descrição.

### Como editar ou excluir

- "Editar" permite alterar os dados da rota;
- "Excluir" remove a rota do sistema.

---

## 8) O que só o Admin pode fazer

No sistema, o perfil administrativo é identificado pela função de Administrador.

O administrador tem acesso especial para:
- cadastrar funcionários;
- editar funcionários;
- excluir funcionários;
- adicionar, alterar e remover trens;
- adicionar, alterar e remover rotas;
- adicionar, alterar e remover sensores;
- acessar todas as áreas do sistema.

Na prática, o usuário comum pode:
- visualizar listas e detalhes;
- acompanhar a operação;
- consultar dashboard e relatórios;
- mas não pode alterar ou remover registros importantes.

Regra implementada no projeto:
- `ehAdministrador()` valida se `id_perfil` é igual a 1;
- somente esse perfil consegue acessar páginas de cadastro/edição/exclusão.

---

## 9) Dicas práticas

- Sempre faça login antes de acessar qualquer funcionalidade.
- Use o Dashboard como ponto de partida.
- Revise o clima e os relatórios para entender melhor a operação.
- Use o módulo correto para cada ação:
  - Funcionários = pessoas do sistema;
  - Sensores = equipamentos de monitoramento;
  - Trens = frota e mobilidade;
  - Rotas = itinerários e deslocamento;
- Se não for administrador, o sistema não mostra botões de edição e exclusão.

---

## 10) Fluxo resumido do uso

```text
Acessar login
   ↓
Fazer login
   ↓
Entrar no Dashboard
   ↓
Escolher módulo
   ↓
Consultar / Cadastrar / Editar / Excluir
   ↓
Logout ao finalizar
```

Este guia serve como referência visual para o primeiro uso do sistema. Se você quiser, pode ser expandido com prints reais da interface após a aplicação estar rodando em ambiente local.
