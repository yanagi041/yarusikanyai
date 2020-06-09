<template>
  <header class="l-header">
    <div class="logo">
      <h1>
        <a href="/mypage">やるしかニャい</a>
      </h1>
    </div>

    <div class="l-header__menu">
      <div class="pc">
        <div>
          <div class="l-header__menu__list" v-if="this.authcheck">
            <li>
              <a href="/mypage">マイページ</a>
            </li>
            <li>
              <a href="/logout">ログアウト</a>
            </li>
          </div>
          <div class="l-header__menu__list" v-else>
            <li>
              <a href="/login">ログイン</a>
            </li>
          </div>
        </div>
      </div>
    </div>

    <!-- https://www.markernet.co.jp/blog/2019/08/19/vue-js-hamburger-menu/ -->
    <div class="l-header__spmenu">
      <div class="sp">
        <div class="l-header__spmenu__line" @click="naviOpen" :class="{'active': active}">
          <span></span>
          <span></span>
          <span></span>
        </div>
        <transition name="navi">
          <nav class="navi" v-show="navi">
            <ul class="navi__wrap">
              <li v-on:click="doLogout">ログアウト</li>
              <li>
                <a href="#">BBB</a>
              </li>
              <li>
                <a href="#">CCC</a>
              </li>
              <li>
                <a href="#">DDD</a>
              </li>
              <li>
                <a href="#">EEE</a>
              </li>
            </ul>
          </nav>
        </transition>
      </div>
    </div>
  </header>
</template>

<script>
export default {
  name: "HeaderComponent",
  data: function() {
    return {
      //スマホヘッダーメニュー用
      isOpenMenu: false,
      active: false,
      navi: false
    };
  },
  props: {
    authcheck: Boolean,
    logout: String,
    user: Object
  },
  computed: {},
  methods: {
    //ログアウト機能
    doLogout: function() {
      //axios使ってlogoutをPOST送信する
      axios
        .post(this.logout)
        .then(function(response) {
          window.location.href = "/";
        })
        .catch(function(error) {
          if (error.response.status === 401 || error.response.status === 500) {
            //認証エラーかシステムエラーの時
            self.$toasted.global.my_error(
              "エラー(" +
                error.response.status +
                "):" +
                error.response.data.message
            );
          } else {
            console.log(console.error.response);
            self.$$toasted.global.my_error("エラーが発生しました");
          }
        });
    },

    naviOpen: function() {
      this.active = !this.active;
      this.navi = !this.navi;
    }
  }
};
</script>
