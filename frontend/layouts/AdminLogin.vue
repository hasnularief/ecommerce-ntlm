<template>
  <div class="page-wrapper">
    <div class="page-content--bge5">
      <div class="container">
        <div class="login-wrap">
          <div class="login-content">
            <div class="login-logo">
              <a href="#"> <strong>Online Shop</strong> Admin Login </a>
            </div>

            <Nuxt />
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'
import AdminHeaderParameters from '../helpers/AdminHeaderParameters'

export default Vue.extend({
  name: 'AdminLogin',
  head: {
    title: 'online shop login',
    bodyAttrs: {},
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: 'online shop login',
      },
    ],
    ...AdminHeaderParameters,
  },
})
</script>

<style scoped>
.login-logo a {
  color: #6c757d;
  font-size: 31px;
}
</style>
