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
          <button class="btn btn-primary" @click="handleClickBtnEntrar">Entrar</button>
          <button class="btn btn-danger" @click="handleClickChecarLogin">
            Chechar se está logado
          </button>
          <button class="btn btn-warning" @click="handleClickSair">Sair</button>
          <button class="btn btn-warning" @click="handleClickDecodificarToken">
            Decodificar token
          </button>
          <button class="btn btn-warning" @click="handleClickChecarToken">Checar Token</button>
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
  } else {
    console.log('erro');
  }
};

const handleClickChecarLogin = async () => {
  console.log('checar login 1', authStore);
  console.info(authStore.isUserLoggedIn);
  console.log('checar login 2', authStore);
};

const handleClickSair = () => {
  console.log('logout 1', authStore);
  authStore.logout();
  console.log('logout 2', authStore);
};

const handleClickDecodificarToken = async () => {
  const resp = await http.post('/decodificar-token', {
    token: authStore.getToken,
  });

  console.log(resp);
};

const handleClickChecarToken = async () => {
  const resp = await http.post('/checar-token', {
    token: authStore.getToken,
  });

  console.log('checar token', resp);
};
</script>

<style lang="scss" scoped></style>
