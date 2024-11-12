
# BookStore 

**BookStore** é uma aplicação para gerenciamento e venda de livros, construída com Laravel 11. Possui funcionalidades de autenticação com permissões de **Admin** e **Cliente**, permitindo que o administrador gerencie o inventário de livros (adicionar, editar e excluir), enquanto os clientes podem visualizar e comprar livros.

## Pré-Requisitos

- **PHP 8.2** (Instalado com Laragon)
- **Composer**  para gerenciar dependência
- **MySQL** (Instalado com Laragon)
- **Laravel 11** (Instalado com Laragon)

## Instalações

1. Instale as dependências do projeto
   
    Com o Laragon, o Composer já estará configurado. No terminal do Laragon, execute:

    ```Bash
    composer install
    ```
    
2. Configure o banco de dados
   
    Crie um banco de dados com o nome bookstore.Em seguida execute as migrações para gerar as tabelas:

    ```Bash
    php artisan migrate
    ```

3. Inicie o servidor

    ```Bash
    php artisan serve
    ```

    

 
