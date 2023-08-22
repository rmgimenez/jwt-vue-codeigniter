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

const authStore = useAuthStore();

const handleClickBtnEntrar = async () => {
  const resp = await http.post('/login', {
    user: userInput,
    password: passwordInput,
  });

  console.log(resp);

  if (resp.data.message == 'Success') {
    // seta o usuário no store
    authStore.setUser(userInput);

    // seta o token no store
    authStore.setToken(resp.data.token);
    console.log('logado');

    // checa se o token é válido
    const respValidacao = await http.post('/validar-token', {
      token: resp.data.token,
    });

    console.log('respValidacao', respValidacao);
  } else {
    console.log('erro');
  }
};
</script>

<style lang="scss" scoped></style>
