<template>
  <v-card class="mx-auto signup-card" :elevation="0">
    <v-card-title class="align-end justify-center mb-6">
      <h3>新規会員登録</h3>
    </v-card-title>

    <v-divider />

    <v-row justify="center" no-gutters>
      <v-row justify="space-between" no-gutters class="sns-button my-6 mx-8">
        <base-button
          tile
          x-large
          color="#385185"
          elevation="0"
          class="white--text font-weight-default sign-up-button"
          @click="signInFacebook()"
        >
          <img src="/facebook-f-brands.png" width="14" />&nbsp;&nbsp;Facebookで登録
        </base-button>

        <base-button
          tile
          x-large
          color="#DB4437"
          elevation="0"
          class="white--text font-weight-default sign-up-button"
          @click="signInGoogle()"
        >
          <img src="/google-brands.png" width="20" />&nbsp;&nbsp;Googleで登録
        </base-button>
      </v-row>
      <FormulateForm v-model="formValues" class="signup-form" @submit="$emit('submit', formValues)">
        <p>
          You can place any elements you want inside a form. The inputs themselves can even be deeply nested.
        </p>

        <!-- <FormulateInput name="name" type="text" label="Your name" placeholder="Your name" validation="required" /> -->
        <FormulateInput
          name="email"
          type="email"
          label="メールアドレス"
          placeholder="Email address"
          validation="required|email"
        />
        <div class="double-wide">
          <FormulateInput
            name="password"
            type="password"
            label="パスワード"
            placeholder="Your password"
            validation="required"
          />
          <FormulateInput
            name="password_confirm"
            type="password"
            label="確認用パスワード"
            placeholder="Confirm password"
            validation="required|confirm"
            validation-name="Confirmation"
          />
        </div>
        <div class="submit-button">
          <FormulateInput type="submit" label="次へ進む" />
        </div>
      </FormulateForm>
    </v-row>
  </v-card>
</template>

<script>
export default {
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
  },
  data: () => ({
    formValues: {
      email: '',
      password: '',
      password_confirm: '',
    },
  }),
}
</script>

<style scoped>
.signup-card {
  width: 100%;
  margin-top: 20px;
  padding: 30px 48px;
}

.signup-form {
  padding: 2em;
  /* border: 1px solid #a8a8a8;
  border-radius: 0.5em;
  max-width: 500px; */
  /* box-sizing: border-box; */
}
.form-title {
  margin-top: 0;
}
.signup::v-deep .formulate-input .formulate-input-element {
  max-width: none;
}
/* .submit-button {
  text-align: center;
} */

.sign-up-button {
  width: 46%;
}

@media (min-width: 420px) {
  .double-wide {
    display: flex;
  }
  .double-wide .formulate-input {
    flex-grow: 1;
    width: calc(50% - 0.5em);
  }
  .double-wide .formulate-input:first-child {
    margin-right: 0.5em;
  }
  .double-wide .formulate-input:last-child {
    margin-left: 0.5em;
  }
}

@media screen and (min-width: 768px) {
  .signup-card {
    width: 700px;
    margin: 0 auto;
  }
}
</style>
