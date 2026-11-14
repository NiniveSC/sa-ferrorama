# Guia visual do sistema Ferrorama

Este guia foi pensado para pessoa leiga, com passo a passo simples e telas ilustradas para facilitar a navegação.

## 1) Como acessar o sistema

1. Abra o XAMPP.
2. Inicie o Apache e o MySQL.
3. Abra o navegador.
4. Acesse:
   - http://localhost/sa-ferrorama/public/login/tela-login.php

![Tela de login](../assets/img/login.png)

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

![Logout do usuário](../assets/img/logout.png)

---

## 3) Como entender o Dashboard

Depois do login, a página inicial é o Dashboard.

Ele mostra:
- boas-vindas ao usuário;
- clima em tempo real da região;
- painel de relatórios/gráficos;
- atalhos para os módulos do sistema.

![Dashboard principal](../assets/img/dashboard.png)

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

![Lista de funcionários cadastrados](../assets/img/funcionarios.png)

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

![Cadastro de funcionário](../assets/img/ca-func.png)

### Como editar ou excluir

- Clique em "Editar" para alterar os dados;
- Clique em "Excluir" para remover o cadastro.

![Editar funcionário](../assets/img/ed-func.png)
![Excluir funcionário](../assets/img/ex-funci.png)

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

![Lista de sensores cadastrados](../assets/img/sensores.png)

### Como cadastrar

1. Clique em "+ Novo sensor";
2. Preencha tipo, status, localização;
3. Se necessário, informe trem ou rota relacionada;
4. Clique em "Cadastrar".

![Cadastro de sensor](../assets/img/ca-sensor.png)

### Como visualizar e editar

- "Visualizar" mostra detalhes do sensor;
- "Editar" permite alterar status ou localização;
- "Excluir" remove o registro do sistema.

![Detalhes do sensor](../assets/img/det-sensor.png)
![Editar sensor](../assets/img/ed-sensor.png)
![Excluir sensor](../assets/img/ex-sensor.png)

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

![Lista de trens cadastrados](../assets/img/trens.png)

### Como cadastrar

1. Clique em "+ Novo trem";
2. Informe nome, tipo, localização, status;
3. Escolha o responsável, se existir;
4. Salve o cadastro.

![Cadastro de trem](../assets/img/ca-trem.png)

### Como editar

- Clique em "Editar";
- Ajuste os dados;
- Salve para confirmar.

![Detalhes do trem](../assets/img/det-trem.png)
![Editar trem](../assets/img/ed-trem.png)

### Como excluir

- Clique em "Excluir";
- O sistema impede exclusão se o trem estiver ligado a rota ou dependências importantes.

![Excluir trem](../assets/img/ex-trem.png)

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

![Lista de rotas cadastradas](../assets/img/rotas.png)

### Como cadastrar

1. Clique em "+ Nova rota";
2. Informe nome, descrição, distância, duração e trem vinculado;
3. Clique em Cadastrar.

![Cadastro de rota](../assets/img/ca-rota.png)

### Como visualizar

- "Visualizar" mostra detalhes completos da rota, trem associado e descrição.

![Detalhes da rota](../assets/img/det-rota.png)

### Como editar ou excluir

- "Editar" permite alterar os dados da rota;
- "Excluir" remove a rota do sistema.

![Editar rota](../assets/img/ed-rota.png)
![Excluir rota](../assets/img/ex-rota.png)

---

## 8) Relatórios

Acesse o módulo de "Relatórios" no menu para ver o resumo geral do sistema.

A tela apresenta:
- quantidade de funcionários;
- quantidade de trens;
- quantidade de rotas;
- quantidade de sensores;
- falhas abertas;
- falhas totais.

![Relatório geral do sistema](../assets/img/relatorios.png)

Também é possível gerar o relatório em PDF.

![Relatório em PDF](../assets/img/gerar-pdf.png)

---

## 9) Consulta de CEP

No menu, clique em "CEP" para consultar endereço por CEP.

1. Digite o CEP;
2. Clique em "Consultar CEP";
3. O sistema preenche automaticamente os campos de endereço.

![Consulta de CEP](../assets/img/cep.png)

---

## 10) O que só o Admin pode fazer

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

## 11) Dicas práticas

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

## 12) Fluxo resumido do uso

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

Este guia serve como referência visual para o primeiro uso do sistema.


