# Título do projeto

Este projeto foi desenvolvido para participar do Desafio Back-end promovido pela empresa [Maximize](https://maximize.com.br/) visando o ingresso na vaga de desenvolvedor Back-end Júnior.

## 🚀 Começando

A seguir temos os requisitos para executar o projeto em sua máquina local.

### 📋 Pré-requisitos

-   Composer
-   PHP 8+
-   Node (versões recentes)

### 🔧 Instalação

Para executar o projeto localmente será preciso realizar alguns comandos:

Primeiramente:

```
composer install
```

Em seguida:

```
npm install
```

Por fim, caso encontre o erro de Key com o artisan execute o comando:

```
php artisan key:generate
```

### Executando o Projeto

Para executar o projeto é preciso que dois comandos sejam executados simultaneamente em dois terminais diferentes dentro do diretório do projeto:

```
php artisan serve
```

```
npm run dev
```

## 🛠️ Construído com

O projeto foi construido usando 2 grandes frameworks como base e um banco de dados compatível, sendo eles:

-   [Laravel](https://laravel.com/docs) - Framework Back-end.
-   [Vue-js](https://vuejs.org/) - Framework front-end.
-   [Tailwind](https://tailwindcss.com/) - Framework front-end.
-   [MySql](https://www.mysql.com/) - SGBD utilizado.

### Outras libs utilizadas

-   [laravel-vue-pagination](https://laravel-vue-pagination.org/) - Lib que auxilia na paginação de uma tabela.
-   [moment](https://momentjs.com/) - Lib para formatação de data no front-end.
-   [sweetalert2](https://sweetalert2.github.io/) - Lib de alertas personalizados.

## ⚙️ Arquitetura utilizada

No desenvolvimento desse projeto foi utilizada uma arquitetura MVC comum.

A escolha dessa arquitetura se deu principalmente pensando na preservação da simplicidade dentro do projeto, visto que por se tratar de uma regra de negócio simples, a injeção de complexidade dentro da arquitetura do projeto é desnecessária e acabaria dificultando o desenvolvimento sem necessidade.

Em casos de projetos com uma regra de negócio mais complexa a arquitetura que costumo usar é a Hexagonal por ela implementar de melhor forma os conceitos do SOLID e Clean Arch.

### 🔩 Hospedagem do Banco de Dados

Para facilitar o acesso das pessoas que irão acessar esse teste, o Banco de Dados foi hospedado na plataforma [Railway](https://railway.app/) o que acaba por deixar a aplicação um pouco lenta porém retira a necessidade daquele que irá testar se preocupar em configurar um banco.

As credenciais para acesso ao banco estarão anexadas ao email por onde enviarei o link do repositório (Por se tratar de um free-trial não possuo muito espaço, por favor não exagerem ❤)

Caso queiram, podem limpar o banco de dados e executar as migrations novamente, ou executar em um banco de dados local.

O projeto também possui um seeder configurado para cadastrar algumas notícias no sistema automaticamente
Basta rodar o comando:

```
php artisan db:seed
```

## 📚 Regra de negócio

A regra de negócio adotada no sistema foi simples, um usuário administrador precisa ser cadastrado, e cada usuário admin pode cadastrar quantas notícias quiser.
Uma notícia só pode ser cadastrada se existir um usuário criado atrelado a ela.

### 🗜 Rotas

O sistema possui 4 principais rotas:

-   /register - Rota para registrar um usuário administrador
-   /login - Rota de login do sistema admin
-   /web ou / - Rota que encaminha para o portal principal

## Fluxo de Primeiro Acesso

Ao acessar o sistema pela primeira vez (caso o banco tenha sido limpo) se encaminhe para a rota [Register](http://localhost:8000/register) e cadastre seu usuário.
Caso o banco nao tenha sido limpo, vá diretamente para a rota [Login](http://localhost:8000/login) e acesse com o seguinte usuário:

-   login: email@email.com
-   senha: senha123

Após verificar todo o CRUD de matéria, acesse rota de [Web](http://localhost:8000/) e vá para o "Blog".

## 📦 Diagrama de Classes

# Materias

| **Coluna**   | **Tipo**  | **Constraints**          | **Descrição**                                     |
| ------------ | --------- | ------------------------ | ------------------------------------------------- |
| id (PK)      | int       | NOT NULL, AUTO_INCREMENT | Identificador de Usuário.                         |
| nome         | string    | NOT NULL                 | Nome do usuário.                                  |
| email        | string    | NOT NULL, UNIQUE         | E-mail do usuário.                                |
| senha        | string    | NOT NULL                 | Senha do usuário.                                 |
| imagem       | string    |                          | Storage Path da imagem salva no diretório         |
| created_at   | timestamp | NOT NULL                 | Data de criação/publicação da matéria             |
| user_id (FK) | id        | NOT NULL                 | Identificador do usuário que cadastrou a matéria. |

# Users

| **Coluna**   | **Tipo**  | **Constraints**          | **Descrição**                                     |
| ------------ | --------- | ------------------------ | ------------------------------------------------- |
| id (PK)      | int       | NOT NULL, AUTO_INCREMENT | Identificador de Usuário.                         |
| nome         | string    | NOT NULL                 | Nome do usuário.                                  |
| email        | string    | NOT NULL, UNIQUE         | E-mail do usuário.                                |
| senha        | string    | NOT NULL                 | Senha do usuário.                                 |
| created_at   | timestamp | NOT NULL                 | Data de criação/publicação da matéria             |
| user_id (FK) | id        | NOT NULL                 | Identificador do usuário que cadastrou a matéria. |

## 📌 Ideias para melhorias.

Enquanto estava desenvolvendo este projeto tive um certo problema relacionado a coisas que eu adoraria ter adicionado porém não teria tempo para fazer.
A principal dessas ideias está relacionada ao armazenamento das imagens, que está sendo feito diretamente no diretório, porém a melhor forma de realizar seria fazendo o uso de ferramentas como o [Google Cloud Storage](https://cloud.google.com/storage) podendo assim salvar mídias em núvem, poupando o espaço local, o que abriria portar para a implementação até de arquivos de vídeo dentro da plataforma.

Outro ponto seria a adição de um sistema de notificação de usuários a partir do uso de "Push Notifications" para que as pessoas que acessam o site recebessem emails ou outros tipos de notificações, o que acabaria por "fidelizar o usuário".

## ✒️ Autor

-   **Guilherme Beckham** - [Github](https://github.com/BeckhamDev)

## 🎁 Agradecimentos

Por fim, gostaria de agradecer pela oportunidade de participar dessa seleção, este foi um projeto muito divertido de desenvolver e espero poder fazer parte da equipe Maximize no futuro.
Muito Obrigado!
