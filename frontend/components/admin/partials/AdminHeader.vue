<template>
  <header class="header-desktop">
    <div class="section__content section__content--p30">
      <div class="container-fluid">
        <div class="header-wrap">
          <form class="form-header" action="" method="POST">
            <input
              class="au-input au-input--xl"
              type="text"
              name="search"
              placeholder="Search for data..."
            />
            <button class="au-btn--submit" type="submit">
              <i class="zmdi zmdi-search"></i>
            </button>
          </form>
          <div class="header-button">
            <div class="noti-wrap">
              <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-email"></i>
                <span class="quantity">1</span>
                <div class="email-dropdown js-dropdown">
                  <div class="email__title">
                    <p>You have 3 New Emails</p>
                  </div>
                  <div class="email__item">
                    <div class="image img-cir img-40">
                      <img src="images/avatar.png" alt="Cynthia Harvey" />
                    </div>
                    <div class="content">
                      <p>Meeting about new dashboard...</p>
                      <span>Cynthia Harvey, 3 min ago</span>
                    </div>
                  </div>
                  <div class="email__item">
                    <div class="image img-cir img-40">
                      <img src="images/avatar.png" alt="Cynthia Harvey" />
                    </div>
                    <div class="content">
                      <p>Meeting about new dashboard...</p>
                      <span>Cynthia Harvey, Yesterday</span>
                    </div>
                  </div>
                  <div class="email__item">
                    <div class="image img-cir img-40">
                      <img src="images/avatar.png" alt="Cynthia Harvey" />
                    </div>
                    <div class="content">
                      <p>Meeting about new dashboard...</p>
                      <span>Cynthia Harvey, April 12,,2018</span>
                    </div>
                  </div>
                  <div class="email__footer">
                    <a href="#">See all emails</a>
                  </div>
                </div>
              </div>
              <div class="noti__item js-item-menu">
                <i class="zmdi zmdi-notifications"></i>
                <span class="quantity">3</span>
                <div class="notifi-dropdown js-dropdown">
                  <div class="notifi__title">
                    <p>You have 3 Notifications</p>
                  </div>
                  <div class="notifi__item">
                    <div class="bg-c1 img-cir img-40">
                      <i class="zmdi zmdi-email-open"></i>
                    </div>
                    <div class="content">
                      <p>You got a email notification</p>
                      <span class="date">April 12, 2018 06:50</span>
                    </div>
                  </div>
                  <div class="notifi__item">
                    <div class="bg-c2 img-cir img-40">
                      <i class="zmdi zmdi-account-box"></i>
                    </div>
                    <div class="content">
                      <p>Your account has been blocked</p>
                      <span class="date">April 12, 2018 06:50</span>
                    </div>
                  </div>
                  <div class="notifi__item">
                    <div class="bg-c3 img-cir img-40">
                      <i class="zmdi zmdi-file-text"></i>
                    </div>
                    <div class="content">
                      <p>You got a new file</p>
                      <span class="date">April 12, 2018 06:50</span>
                    </div>
                  </div>
                  <div class="notifi__footer">
                    <a href="#">All notifications</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="account-wrap">
              <div class="account-item clearfix js-item-menu">
                <div class="image">
                  <img src="images/avatar.png" alt="John Doe" />
                </div>
                <div class="content">
                  <a class="js-acc-btn" href="#">{{ getUserData().name }}</a>
                </div>
                <div class="account-dropdown js-dropdown">
                  <div class="info clearfix">
                    <div class="image">
                      <a href="#">
                        <img src="images/avatar.png" alt="John Doe" />
                      </a>
                    </div>
                    <div class="content">
                      <h5 class="name">
                        <a href="#">{{ getUserData().name }}</a>
                      </h5>
                      <span class="email">{{ getUserData().email }}</span>
                    </div>
                  </div>
                  <div class="account-dropdown__body">
                    <div class="account-dropdown__item">
                      <a href="#"> <i class="zmdi zmdi-account"></i>Account</a>
                    </div>
                  </div>
                  <div class="account-dropdown__footer">
                    <a href="#" @click.prevent="logout()">
                      <i class="zmdi zmdi-power"></i>Logout</a
                    >
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script lang="ts">
import Vue from 'vue'
// import { $cookies } from '../../../helpers/initializer'

export default Vue.extend({
  name: 'AdminHeader',
  methods: {
    getUserData(): any {
      const vm = this
      return vm.$cookies.get('user_data') || {}
    },
    logout() {
      const vm = this
      this.$axios.setHeader(
        'Authorization',
        'Bearer ' + vm.$cookies.get('auth_token')
      )
      this.$axios
        .get('/api/logout')
        .then((response) => {
          if (response.data.success) {
            vm.$cookies.remove('auth_token')
            vm.$cookies.remove('is_authenticated')
            vm.$cookies.remove('user_data')
            this.$router.push('/admin/login')
          }
        })
        .catch((_err) => {
          // console.log(_err.response)
        })
    },
  },
})
</script>
