<template>
  <div class="login-form">
    <div v-if="error_message" class="alert alert-danger">
      {{ error_message }}
    </div>
    <div
      v-for="item in validation_errors"
      :key="item"
      class="alert alert-danger"
    >
      {{ item }}
    </div>
    <form action="#" method="post" @submit.prevent="login()">
      <div class="form-group">
        <label>Email Address</label>
        <input
          v-model="login_data.email"
          class="au-input au-input--full"
          type="email"
          name="email"
          placeholder="Email"
        />
      </div>
      <div class="form-group">
        <label>Password</label>
        <input
          v-model="login_data.password"
          class="au-input au-input--full"
          type="password"
          name="password"
          placeholder="Password"
        />
      </div>
      <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">
        sign in
      </button>
    </form>
  </div>
</template>

<script lang="ts">
import Vue from 'vue'

export default Vue.extend({
  name: 'AdminLogin',
  layout: 'AdminLogin',
  data() {
    return {
      login_data: {
        email: '',
        password: '',
      },
      error_message: '',
      validation_errors: [] as any[],
    }
  },

  methods: {
    login() {
      this.validation_errors = []
      this.error_message = ''
      this.clearStorage()
      this.$axios
        .$post('api/login', this.login_data)
        .then((response) => {
          this.saveIntoStorage(response)
          this.$router.push('/')
        })
        .catch((error) => {
          this.error_message = error.response.data.message
          if (error.response.data.errors) {
            for (const key in error.response.data.errors) {
              this.validation_errors.push(error.response.data.errors[key][0])
            }
          }
        })
    },
    clearStorage() {
      this.$cookies.remove('auth_token')
      this.$cookies.remove('user_data')
    },
    saveIntoStorage(response: any) {
      this.$cookies.set('is_authenticated', '1')
      this.$cookies.set('auth_token', response.access_token)
      this.$cookies.set('user_data', JSON.stringify(response.user))
    },
  },
})
</script>

<style scoped></style>
