<template>
  <v-container>
    <v-form>
      <v-card>
        <!-- <v-alert v-show="is_error" type="error">
          メールアドレスとパスワードの組みが正しくありません
        </v-alert> -->
        <v-card-title primary-title>
          <h3 class="headline mb-0">ログイン</h3>
        </v-card-title>
        <v-card-text>
          <v-text-field v-model="email" label="メールアドレス" required />
          <v-text-field v-model="password" label="パスワード" required />
        </v-card-text>
        <v-row>
          <v-col cols="5" offset="5">
            <v-btn class="ma-10" x-large color="primary" @click="login">ログイン</v-btn>
          </v-col>
        </v-row>
      </v-card>
    </v-form>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    email: '',
    password: '',
  }),
  methods: {
    async login() {
      await this.$store.dispatch('auth/signup', {
        email: this.email,
        password: this.password,
      })
      if (!window.localStorage) {
        alert('お使いのブラウザはlocalstorageに対応してません。')
      } else {
        alert('お使いのブラウザはlocalstorageに対応しています。')
      }
      // トップページに移動する
      this.$router.push('/')
    },
  },
}
</script>
