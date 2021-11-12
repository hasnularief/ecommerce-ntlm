<template>
  <div class="page-wrapper">
    <mobile-header></mobile-header>
    <admin-sidebar></admin-sidebar>
    <div class="page-container">
      <admin-header></admin-header>
      <Nuxt />
    </div>
  </div>
</template>
<script lang="ts">
import Vue from 'vue'
import MobileHeader from '../components/admin/partials/MobileHeader.vue'
import AdminSidebar from '../components/admin/partials/AdminSidebar.vue'
import AdminHeader from '../components/admin/partials/AdminHeader.vue'
import AdminHeaderParameters from '../helpers/AdminHeaderParameters'

export default Vue.extend({
  components: { MobileHeader, AdminHeader, AdminSidebar },
  head: {
    title: 'online shop dashboard',
    bodyAttrs: {},
    meta: [
      { charset: 'utf-8' },
      { name: 'viewport', content: 'width=device-width, initial-scale=1' },
      {
        hid: 'description',
        name: 'description',
        content: 'online shop dashboard',
      },
    ],
    ...AdminHeaderParameters,
  },
  mounted() {
    const script = document.createElement('script')
    script.src = '/js/main.js'
    script.type = 'text/javascript'
    document.head.appendChild(script)

    this.checkUserLogin()
  },
  methods: {
    checkUserLogin() {
      // send request to check if the user is logged otherwise redirect him to login screen
      if (
        this.$cookies.get('auth_token') !== null &&
        this.$cookies.get('auth_token') !== undefined
      ) {
        this.$axios.setHeader(
          'Authorization',
          'Bearer ' + this.$cookies.get('auth_token')
        )

        this.$axios
          .$get('api/check-login')
          .then((response) => {
            if (response.success !== 1) {
              this.$cookies.remove('auth_token')
              this.$cookies.remove('is_authenticated')
              this.$cookies.remove('user_data')

              this.$router.push('/admin/login')
            }
          })
          .catch((_err) => {
            this.$cookies.remove('auth_token')
            this.$cookies.remove('is_authenticated')
            this.$cookies.remove('user_data')

            this.$router.push('/admin/login')
          })
      }
    },
  },
})
</script>
<style scoped></style>
