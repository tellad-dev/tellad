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
import axios from 'axios'
export default {
  data() {
    return {
      email: '',
      password: '',
    }
  },
  methods: {
    login() {
      axios
        .post('http://localhost:8080/api/login', {
          email: this.email,
          password: this.password,
        })
        .then(res => {
          const token = res.data.access_token
          axios.defaults.headers.common.Authorization = 'Bearer ' + token
          this.$router.push({ path: '/' })
        })
        .catch(error => {
          this.isError = console.log(error)
        })
    },
  },
}
</script>
