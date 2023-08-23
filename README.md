# Sobre o projeto

O objteivo desse projeto é criar uma aplicação que utilize o controle de acesso através do [JWT](https://github.com/firebase/php-jwt).

Esse projeto foi construído utilizando o [CodeIgniter 4](https://github.com/codeigniter4/CodeIgniter4) como backend e o [Vue 3](https://v3.vuejs.org/) como frontend.

## Para rodar a aplicação

Entrar na pasta "backend" e fazer uma cópia do arquivo "env". Renomei para ".env". Por fim, entre no arquivo ".env" e adicione o seguinte conteúdo:

```
JWT_SECRET = 'coloque uma chave secreta aqui'
```

Essa é a chave usada pelo backend para criptografar, descriptografar e validar o token.

Backend:

```bash
cd backend
composer install
php spark serve
```

Frontend:

```bash
cd frontend
pnpm install
pnpm dev
```

Feito isso, entre na aplicação frontend na URL "/login". Nessa tela é possível gerar o token, validar, decodificar e simular um logout da aplicação.

O arquivo do frontend acessado pela url "/login" está na pasta: "frontend/src/pages/Login.vue".
