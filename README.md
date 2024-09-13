# Sistema de Clínicas

Este é um sistema de gestão de clínicas desenvolvido em PHP utilizando o framework Laravel.

## Requisitos

Antes de iniciar, certifique-se de ter os seguintes requisitos instalados na sua máquina:

- **PHP 8.2**
- **Laravel 10.48.20**
- **Composer** (na sua versão mais recente)
- **MySQL** (na sua versão mais recente)
- **Node.js** (na sua versão mais recente)

## Instruções para rodar o projeto

### 1. Clonar o repositório

Clone o repositório do projeto para a sua máquina local utilizando o comando:

```bash
git clone https://github.com/seu-usuario/seu-repositorio.git
cd seu-repositorio
```

### 2 . Criar o banco de dados

No MySQL, crie um banco de dados com o nome pti:

```bash
CREATE DATABASE pti;
```

### 3 . Configurar o arquivo .env

Faça uma cópia do arquivo .env.example e renomeie para .env:

```bash
cp .env.example .env
```

Edite o arquivo .env com as credenciais do seu ambiente local, incluindo os detalhes do banco de dados:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pti
DB_USERNAME=seu_usuario_mysql
DB_PASSWORD=sua_senha_mysql
```

### 4 . Instalar as dependências

Instale as dependências do Laravel rodando o comando:

```bash
composer install
```

Depois, instale as dependências do Node.js com:

```bash
npm install
```

### 5 . Rodar o projeto

Para iniciar o servidor do Laravel, execute:

```bash
php artisan serve
```

Em seguida, para compilar e rodar o frontend, execute:

```bash
npm run dev
```

### 6 . Acessar o sistema

Agora você pode acessar o sistema através do navegador, indo para:
http://localhost:8000
