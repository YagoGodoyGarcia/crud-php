# **Índice**

- [**Índice**](#índice)
  - [Visao geral do Projeto](#visao-geral-do-projeto)
  - [Requisitos](#requisitos)
  - [Instalar o XAMP](#instalar-o-xamp)
  - [Clonando o repositório](#clonando-o-repositório)
  - [Iniciando o XAMP e serviços](#iniciando-o-xamp-e-serviços)
  - [Criando o base de dados](#criando-o-base-de-dados)
  - [Criar tabela na base de dados](#criar-tabela-na-base-de-dados)
  - [Criar usuário admin para acessar a aplicação](#criar-usuário-admin-para-acessar-a-aplicação)
  - [Utilizando a aplicação](#utilizando-a-aplicação)
  - [Credenciais de acesso](#credenciais-de-acesso)
  - [Por dentro da aplicação](#por-dentro-da-aplicação)
  - [O que posso fazer após realizar login?](#o-que-posso-fazer-após-realizar-login)
## Visao geral do Projeto
Este projeto foi desenvolvido com a finalidade de criar um crud simples em PHP, afim de me familiarizar mais ainda com a linguagem e tecnologias necessárias para me situar em novos ambientes de trabalho.

## Requisitos
- XAMP
- Clone do Projeto em local específico
- Rodando o projeto no localhost

## Instalar o XAMP 
Instale o XAMP de acordo com seu sistema operacional, acessando o site oficial da ferramenta: [Acessar site oficial - Clique aqui](https://www.apachefriends.org/download.html)


## Clonando o repositório
Clone o repositório dentro do seguinte diretório, será necessário para que o XAMP reconheça corretamente o projeto.
`C:\xampp\htdocs`

**GIT HUB CLI**

Antes de clonar, certifique-se que está no diretório correto e então execute o clone:
`gh repo clone YagoGodoyGarcia/crud-php`

## Iniciando o XAMP e serviços
Abra o XAMP que foi instalado e dê start nos serviço **Apache** e posteriormente **MySQL**. Confirme a liberação do firewall caso solicite.

## Criando o base de dados
Acesse o caminho do phpMyAdmin localmente [`http://localhost/phpmyadmin/`](http://localhost/phpmyadmin/)

Na tela do phpMyAdmin, clique em **novo** e nomeie como **kabum** e clique em **criar**. *OSB:* Caso você escolha outro nome para sua base de dados, abra o arquivo `db_conn.php` no projeto e altere a variável `$db_name = "nomeEscolhido";`.

## Criar tabela na base de dados
Agora, vamos criar as tabelas por meio de um script que fiz, para podermos simular alguns dados.

* Acesse [`http://localhost/crud-php/criartabelas.php`](http://localhost/crud-php/criartabelas.php) e suas tabelas serão criadas automáticamente, são elas`usuarios`, `clientes` e `clientes_enderecos`.
  
## Criar usuário admin para acessar a aplicação
* Acesse **Apenas uma vez** [`http://localhost/crud-php/criaradmin.php`](http://localhost/crud-php/criaradmin.php)

## Utilizando a aplicação
Seguindo todos os passos anteriores corretamente, nessa etapa já é possível acessar a aplicação no link [`http://localhost/crud-php/index.php`](http://localhost/crud-php/index.php)

## Credenciais de acesso
Utilize as seguintes credenciais para realizar login

```
Usuário: admin
Senha: admin
```

## Por dentro da aplicação
Pronto, o projeto já está rodando perfeitamente.

## O que posso fazer após realizar login?
Resumidamente você tem um crud, onde já pode realizar as seguintes ações:
* (`C`reate) Cadastrar: Clientes e endereços
* (`R`ead) Visualizar:  Clientes e endereços
* (`U`pdate) Atualizar: Clientes e endereços
* (`D`elete) Deletar:   Clientes e endereços
