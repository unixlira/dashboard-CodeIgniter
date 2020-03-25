DashBord de Alunos OM30
==========

Sistem de Cadastro de alunos feito em codeigniter com validação de formulário, máscara de CPF e CEP com webservice de cep, criação, edição,exclusão e listagem de alunos.

Instalação
============
Fazer o clone no diretório do Apache

```
git clone https://github.com/unixlira/om30.git
```
Instalação Banco de Dados

```
CREATE TABLE db_OM30;
```

Após criação do Banco de Dados rodar a Query das tabelas na pasta DumpMySQL que se encontra na Raiz do projeto e
alterar o arquivo database.php que fica no diretório applications/config e iserir seu usuario e senha de acesso ao banco de dados

```
'hostname' => 'localhost',
'username' => 'seuusuario',
'password' => 'suasenhamysql',
'database' => 'db_OM30',
```


Como Usar
=====

No menu lateral selecionar listar ou criar aluno


TODO
====

* Work in OM30!
