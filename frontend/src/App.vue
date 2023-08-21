<script setup></script>

<template>
  <div class="container">
    <p>
      <!-- use the router-link component for navigation. -->
      <!-- specify the link by passing the `to` prop. -->
      <!-- `<router-link>` will render an `<a>` tag with the correct `href` attribute -->
      <router-link to="/">Go to Home</router-link>
      <router-link to="/dashboard">Dashboard</router-link>
      <router-link to="/about">Go to About</router-link>
      <router-link to="/login">Login</router-link>
    </p>
    <router-view></router-view>
  </div>
</template>

<style scoped></style>
