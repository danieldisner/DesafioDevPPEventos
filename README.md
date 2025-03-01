
# Desafio Dev PP - Eventos

Este repositório contém a solução para o desafio de desenvolvimento de um sistema de gerenciamento de eventos, com funcionalidades de cadastro, edição, filtragem e exclusão de eventos.

## Requisitos

Antes de começar, verifique se você tem os seguintes requisitos instalados:

- PHP 8+  
- Composer  
- Laravel 11  
- SQLite (ou outro banco de dados configurado no Laravel)  
- Node.js e NPM  

## Passos para Executar Localmente

### Clone o repositório:

```sh
git clone https://github.com/danieldisner/DesafioDevPPEventos.git
cd DesafioDevPPEventos
```

### Instale as dependências do Composer:

```sh
composer install
```

### Execute o comando `composer dump-autoload`:

```sh
composer dump-autoload
```

### Instale as dependências do NPM:

```sh
npm install
```

### Compile os ativos front-end:

```sh
npm run dev
```

### Configure o banco de dados:

- O projeto utiliza um banco de dados SQLite.  
- Crie o arquivo `database/database.sqlite` se ele ainda não existir.  
- Certifique-se de que as permissões do banco de dados estão configuradas corretamente.  

### Configuração do arquivo `.env`:

Copie o arquivo `.env.example` para `.env`:

```sh
cp .env.example .env
```

Abra o arquivo `.env` e configure as variáveis de ambiente para o banco de dados SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/caminho/para/seu/projeto/database/database.sqlite
```

### Gere a chave do aplicativo Laravel:

```sh
php artisan key:generate
```

### Execute as migrações:

```sh
php artisan migrate
```

### Execute o Seeder (opcional):

Para popular o banco de dados com dados fictícios para testes:

```sh
php artisan db:seed --class=EventSeeder
```

### Inicie o servidor local:

```sh
php artisan serve
```

O servidor estará disponível em [http://localhost:8000](http://localhost:8000).

## Funcionalidades

- **Cadastro de Eventos**: Permite criar novos eventos com informações como nome, tipo, descrição, preço, etc.
- **Edição de Eventos**: Permite editar eventos existentes.
- **Exclusão de Eventos**: Permite excluir eventos com uma confirmação.
- **Filtragem**: Permite filtrar os eventos por tipo, nome, endereço, data e preço.

## Endpoints

- **GET /events**: Lista os eventos cadastrados, com opção de filtrar por tipo, nome, endereço, data e preço.
- **GET /events/create**: Exibe o formulário para cadastrar um novo evento.
- **POST /events**: Cria um novo evento com os dados fornecidos no formulário.
- **GET /events/{event}/edit**: Exibe o formulário para editar um evento existente.
- **PUT /events/{event}**: Atualiza um evento existente com os novos dados.
- **DELETE /events/{event}**: Exclui um evento após confirmação.

## Contribuindo

Se você deseja contribuir com este projeto, fique à vontade para fazer um fork, criar uma branch e enviar um pull request.

---

Este projeto foi desenvolvido como parte de um desafio técnico para a Próponto utilizando Laravel.
