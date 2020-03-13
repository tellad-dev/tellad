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
import { RepositoryFactory } from '~/repository/RepositoryFactory.js'
const AuthRepository = RepositoryFactory.get('auth')

export default {
  data: () => ({
    email: '',
    password: '',
  }),
  methods: {
    async login() {
      const response = await AuthRepository.login({
        /* something form data */
        email: this.email,
        password: this.password,
      })
      if (response.data.success) {
        this._sendSuccess(response)
      } else {
        this._sendError(response.data.message)
      }
    },
  },
}
</script>
