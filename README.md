# Antes de executar a aplicação

- Tenha instalado o PHP 7+
- MySQL 5.6+
- Node.js 10+

## Executando a API

Vá até a pasta backend e renomeie o arquivo configurations.php.example para configurations.php. Altere o host, users e password para que o sistema tenha acesso ao banco de dados.

Acesse o seu software de gerencimento MySQL e execute o arquivo schema.sql para que a base de dados e as tabelas sejam criadas.

E por último, usando o Bash, Powershell entre outros, navegue até a backend e execute o comando abaixo:

```sh
php -S localhost:4321 index.php
```
Pronto! Neste exato momento sua API é para estar funcionando corretamente.

## Executando o frontend

Vá até a pasta web usando o Bash, Powershell por exemplo e execute o comando abaixo:

npm start.

[TODO]
- Fazer o frontend se comunicar com a API.
- Inibir o acesso a outras páginas sem o login.
- Criar sessões ao fazer o login.
- Usar máscaras de formatação nos campos.
