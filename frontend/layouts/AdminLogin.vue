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

export default Vue.extend({
  name: 'AdminLogin',
})
</script>

<style scoped>
.login-logo a {
  color: #6c757d;
  font-size: 31px;
}
</style>
