<template>
  <div class="row">
    <div class="col">
      <h1>Login</h1>
      <div class="row">
        <div class="col">
          <!-- input para digitar o nome do usuário -->
          <input type="text" class="form-control" v-model="user" />
          <!-- input para digitar a senha -->
          <input type="password" class="form-control" v-model="password" />
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button class="btn btn-primary" v-on:click="handleClickBtnEntrar">Entrar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
// import axios
import axios from 'axios';

let user = '';
let password = '';

const handleClickBtnEntrar = async () => {
  console.log('inicio');

  // faz a requisição post passando o usuário e senha como parametro
  // const response = await axios.post('http://localhost:8080/api/login', {
  //   user: user,
  //   password: password,
  // });

  // faz o fetch na api passando o user e password
  const response = await fetch('http://localhost:8080/api/login', {
    method: 'POST',
    headers: {
      'Content-Type': 'application/json',
    },
    body: JSON.stringify({
      user: user,
      password: password,
    }),
  });

  console.log(response);
};
</script>

<style lang="scss" scoped></style>
