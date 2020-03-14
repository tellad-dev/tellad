<template>
  <div class="registration grey lighten-4">
    <v-card class="mx-auto registration-card">
      <v-card-title class="align-end justify-center mb-9">
        <h3>会員登録</h3>
      </v-card-title>
      <v-row justify="center" no-gutters>
        <FormulateForm v-model="formValues" class="login-form">
          <p>
            You can place any elements you want inside a form. The inputs themselves can even be deeply nested.
          </p>
          <FormulateInput name="name" type="text" label="Your name" placeholder="Your name" validation="required" />
          <FormulateInput
            name="email"
            type="email"
            label="Email address"
            placeholder="Email address"
            validation="required|email"
          />
          <div class="double-wide">
            <FormulateInput
              name="password"
              type="password"
              label="Password"
              placeholder="Your password"
              validation="required"
            />
            <FormulateInput
              name="password_confirm"
              type="password"
              label="Confirm your password"
              placeholder="Confirm password"
              validation="required|confirm"
              validation-name="Confirmation"
            />
          </div>
          <div class="submit-button">
            <FormulateInput type="submit" label="登 録" />
          </div>
        </FormulateForm>
      </v-row>
    </v-card>
  </div>
</template>

<script>
import { RepositoryFactory } from '~/repository/RepositoryFactory.js'
const AuthRepository = RepositoryFactory.get('auth')

export default {
  data: () => ({
    valid: false,
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

<style scoped>
.registration {
  padding: 48px 0;
}

.registration .registration-card {
  width: 550px;
  margin-top: 20px;
  padding: 30px 48px;
}

.login-form {
  padding: 2em;
  border: 1px solid #a8a8a8;
  border-radius: 0.5em;
  max-width: 500px;
  box-sizing: border-box;
}
.form-title {
  margin-top: 0;
}
.login-form::v-deep .formulate-input .formulate-input-element {
  max-width: none;
}
.submit-button {
  text-align: center;
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
</style>
