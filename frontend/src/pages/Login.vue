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
          <button class="btn btn-primary">Entrar</button>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
let user = '';
let password = '';
</script>

<style lang="scss" scoped></style>
