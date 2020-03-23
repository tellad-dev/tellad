<template>
  <v-app-bar app color="primary darken-2" dark>
    <brand-logo />

    <v-spacer />

    <base-button text @click="$router.push({ name: 'about' })"> Telladとは </base-button>
    <base-button text @click="$router.push({ name: 'mypage' })">
      利用の流れ
    </base-button>
    <base-button text @click="$router.push({ name: 'qa' })">
      よくある質問
    </base-button>
    <base-button text @click="$router.push({ name: 'message' })">
      メッセージ
    </base-button>
    <!-- <v-menu v-if="isLogin()" open-on-hover top offset-y> -->
    <v-menu open-on-click top offset-y>
      <template v-slot:activator="{ on }">
        <v-btn text v-on="on">
          マイページ
        </v-btn>
      </template>
      <v-navigation-drawer permanent>
        <v-system-bar />
        <v-list>
          <!-- <v-list-item>
            <v-list-item-avatar>
              <v-img src="https://cdn.vuetifyjs.com/images/john.png" />
            </v-list-item-avatar>
          </v-list-item> -->

          <v-list-item link>
            <v-list-item-content>
              <v-list-item-title class="title">MIchihiro Doi</v-list-item-title>
              <v-list-item-subtitle>aaaaa@tellad.jp</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-action>
              <v-icon>mdi-menu-down</v-icon>
            </v-list-item-action>
          </v-list-item>
        </v-list>
        <v-divider />
        <v-list nav dense>
          <v-list-item-group v-model="item" color="primary">
            <v-list-item v-for="(item, i) in items" :key="`user${i}`" @click="$router.push({ name: item.url })">
              <!-- <v-list-item-icon>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-item-icon> -->

              <v-list-item-content>
                <v-list-item-title v-text="item.title" />
              </v-list-item-content>
            </v-list-item>
            <v-list-item-content>
              <v-list-item-title class="ml-1">ゲスト</v-list-item-title>
            </v-list-item-content>
            <v-divider />
            <v-list-item v-for="(item, i) in guestItems" :key="`guest${i}`" @click="$router.push({ name: item.url })">
              <!-- <v-list-item-icon>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-item-icon> -->

              <v-list-item-content>
                <v-list-item-title v-text="item.title" />
              </v-list-item-content>
            </v-list-item>
            <v-list-item-content>
              <v-list-item-title class="ml-1">ホスト</v-list-item-title>
            </v-list-item-content>
            <v-divider />
            <v-list-item v-for="(item, i) in hostItems" :key="`host${i}`" @click="$router.push({ name: item.url })">
              <!-- <v-list-item-icon>
                <v-icon v-text="item.icon"></v-icon>
              </v-list-item-icon> -->

              <v-list-item-content>
                <v-list-item-title v-text="item.title" />
              </v-list-item-content>
            </v-list-item>
          </v-list-item-group>
        </v-list>
      </v-navigation-drawer>
      <!-- <v-list>
        <v-list-item v-for="(item, index) in items" :key="index" @click="$router.push({ name: item.title })">
          <v-list-item-title>{{ item.title }}</v-list-item-title>
        </v-list-item>
      </v-list> -->
    </v-menu>
    <base-button v-if="!isLogin()" text @click="$router.push({ name: 'login' })">
      ログイン
    </base-button>
    <base-button v-if="!isLogin()" text @click="$router.push({ name: 'signup' })">
      会員登録
    </base-button>
    <base-button v-if="isLogin()" text @click="$router.push({ name: 'logout' })">
      ログアウト
    </base-button>
  </v-app-bar>
</template>

<script>
export default {
  name: 'TheHeader',
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
    BrandLogo: () => import('~/components/atoms/BrandLogo'),
  },
  data: () => ({
    item: 0,
    items: [
      {
        title: 'プロフィールの編集',
        url: 'mypage-profile',
      },
      {
        title: 'クレジットカードの登録',
        url: 'mypage-payments',
      },
      {
        title: 'リクエストの管理',
        url: 'mypage-requests',
      },
    ],
    guestItems: [
      {
        title: '広告の管理',
        url: 'mypage-ads',
      },
      {
        title: '広告の登録',
        url: 'mypage-ads-registration',
      },
    ],
    hostItems: [
      {
        title: 'スペースの管理',
        url: 'mypage-spaces',
      },
      {
        title: 'スペースの登録',
        url: 'mypage-spaces-registration',
      },
    ],
  }),
  mounted() {
    this.isLogin()
  },

  // ログイン済みかどうか
  methods: {
    isLogin() {
      // return authStore.user.key != ''
      return false
    },
    // logout() {
    //   authStore.logout()
    //   .then(() => {
    //   })
    //   .catch(error => {
    //     console.log(error)
    //   })
    // }
  },
}
</script>

<style></style>
