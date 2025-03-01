
# Desafio Dev PP - Eventos

Este repositório contém a solução para o desafio de desenvolvimento de um sistema de gerenciamento de eventos, com funcionalidades de cadastro, edição, filtragem e exclusão de eventos.

## Tecnologias Utilizadas

- **Laravel 11**: Framework PHP para o desenvolvimento do sistema.
- **SQLite**: Banco de dados leve e fácil de configurar, utilizado para armazenar os dados do sistema.
- **Tailwind CSS**: Framework CSS utilizado para o estilo das páginas.
- **JavaScript (Vanilla)**: Usado para a interação no frontend, como a confirmação de exclusão de eventos.

## Funcionalidades

- **Cadastro de Eventos**: Permite criar novos eventos com informações como nome, tipo, descrição, preço, etc.
- **Edição de Eventos**: Permite editar eventos existentes.
- **Exclusão de Eventos**: Permite excluir eventos com uma confirmação.
- **Filtragem**: Permite filtrar os eventos por tipo, nome, endereço, data e preço.

## Como Rodar o Projeto

### 1. Clonar o Repositório

```bash
git clone https://github.com/danieldisner/DesafioDevPPEventos.git
cd DesafioDevPPEventos
```

### 2. Instalar as Dependências

Primeiro, instale as dependências do Composer:

```bash
composer install
```

Depois, instale as dependências do NPM:

```bash
npm install
```

### 3. Configurar o Banco de Dados

Este projeto usa o **SQLite**. Não é necessário configurar um banco de dados MySQL. Apenas crie um banco de dados SQLite:

```bash
touch database/database.sqlite
```

### 4. Configurar o Ambiente

Renomeie o arquivo `.env.example` para `.env`:

```bash
mv .env.example .env
```

No arquivo `.env`, configure a conexão do banco de dados para usar o SQLite:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/path/to/database/database.sqlite
```

### 5. Rodar as Migrations

Agora, execute as migrations para criar as tabelas no banco de dados:

```bash
php artisan migrate
```

### 6. Rodar o Seeder

Para popular o banco de dados com dados fictícios para testes, execute o comando:

```bash
php artisan db:seed --class=EventSeeder
```

Isso irá criar alguns eventos de exemplo para testar as funcionalidades de filtragem e exibição.

### 7. Iniciar o Servidor

Finalmente, inicie o servidor local:

```bash
php artisan serve
```

Agora, o sistema estará disponível em [http://localhost:8000](http://localhost:8000).

## Endpoints

- **GET /events**: Lista os eventos cadastrados, com opção de filtrar por tipo, nome, endereço, data e preço.
- **GET /events/create**: Exibe o formulário para cadastrar um novo evento.
- **POST /events**: Cria um novo evento com os dados fornecidos no formulário.
- **GET /events/{event}/edit**: Exibe o formulário para editar um evento existente.
- **PUT /events/{event}**: Atualiza um evento existente com os novos dados.
- **DELETE /events/{event}**: Exclui um evento após confirmação.

## Observações

- **Filtragem**: Os filtros são aplicados diretamente na lista de eventos. Você pode filtrar por tipo, nome, endereço, data e preço.
- **Exclusão de Eventos**: Ao tentar excluir um evento, o sistema irá perguntar se você tem certeza de que deseja excluir o registro.

## Contribuições

Contribuições são bem-vindas! Caso queira contribuir para este projeto, basta abrir uma *issue* ou enviar um *pull request*.

---

**Desenvolvedor**: Daniel Disner

**Tecnologias**: Laravel, SQLite, Tailwind CSS, JavaScript
