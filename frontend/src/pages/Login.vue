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
import { http } from './../axios';

let user = '';
let password = '';

const handleClickBtnEntrar = async () => {
  console.log('inicio');

  http.post('/login', {
    user: user,
    password: password,
  });

  // faz a requisição post passando o usuário e senha como parametro e evita problema com cors
};
</script>

<style lang="scss" scoped></style>
