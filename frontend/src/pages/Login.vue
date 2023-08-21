<template>
  <div class="row">
    <div class="col">
      <h1>Login</h1>
      <div class="row">
        <div class="col">
          <!-- input para digitar o nome do usuário -->
          <input type="text" class="form-control" v-model="userInput" />
          <!-- input para digitar a senha -->
          <input type="password" class="form-control" v-model="passwordInput" />
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
import { useAuthStore } from './../stores/auth';

let userInput = '555';
let passwordInput = '123456';

const { user, token, setUser, setToken } = useAuthStore();

const handleClickBtnEntrar = async () => {
  console.log('inicio');

  const resp = await http.post('/login', {
    user: userInput,
    password: passwordInput,
  });

  setUser(userInput);

  console.log('resp.data.token', resp.data.token);
  setToken(resp.data.token);

  console.log(token);

  // faz a requisição post passando o usuário e senha como parametro e evita problema com cors
};
</script>

<style lang="scss" scoped></style>
