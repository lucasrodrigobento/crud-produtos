# Teste Prático - Laravel 11 com Filament, Livewire e PHP 8

Este projeto é um sistema de gerenciamento de produtos desenvolvido com **Laravel 11**, **Filament**, **Livewire** e **PHP 8.3**, como parte do teste prático. 

## Tecnologias Utilizadas

- **Laravel 11**
- **Filament** (Painel Administrativo)
- **Livewire**
- **PHP 8.3**
- Banco de Dados: MySQL

---

## Funcionalidades Implementadas

1. **CRUD de Produtos**:
   - Campos: `nome`, `descrição`, `preço`, `status (Ativo/Inativo)`.
   - CRUD implementado usando o **Filament**.
   - Migrações criadas para os campos mencionados.

2. **Tabela de Produtos**:
   - Configurada com campos básicos e suporte para **Soft Deletes**.

3. **DTO (Data Transfer Object)**

4. **Busca Dinâmica com Debounce (Livewire)**

---

## Configuração e Instalação do Projeto

### Requisitos

Certifique-se de que seu ambiente possui:

- **PHP 8.3**
- **Composer**
- **MySQL**

### Passo a Passo para Configuração

1. **Clonar o Repositório**
```bash
   git clone https://github.com/lucasrodrigobento/crud-produtos
   cd produto-gestao
   composer install
   cp .env.example .env
```
2. **Abra o arquivo .env e configure os detalhes do banco de dados:**

3. **Configurar o BD**
```sql
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=produto_gestao
DB_USERNAME=seu_usuario
DB_PASSWORD=sua_senha
```

4. **Gerar a Chave da Aplicação**
```bash
php artisan key:generate
```

5. **Rodar Migrações**
```bash
php artisan migrate
```

6. **Instalar o Filament**
```bash
php artisan make:filament-panel
```

7. **Executar**

```bash
php artisan serve
```

**Rotas da Aplicação:**

http://127.0.0.1:8000/login

http://127.0.0.1:8000/register

http://127.0.0.1:8000/logout

http://127.0.0.1:8000/forgot-password

http://127.0.0.1:8000/admin

http://127.0.0.1:8000/admin/products

http://127.0.0.1:8000/admin/products/create

http://127.0.0.1:8000/admin/products/{id}/edit

