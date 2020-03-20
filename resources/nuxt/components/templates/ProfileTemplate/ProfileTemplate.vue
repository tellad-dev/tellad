<template>
  <div class="signup grey lighten-4">
    <v-card class="mx-auto signup-card">
      <v-card-title class="align-end justify-center mb-9">
        <h3>プロフィール登録</h3>
      </v-card-title>
      <v-row justify="center" no-gutters>
        <FormulateForm v-model="formValues" class="signup-form" @submit="save">
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
          <FormulateInput name="company" type="text" label="会社名" placeholder="会社名" validation="required" />
          <FormulateInput name="industry" type="text" label="業種" placeholder="業種" validation="required" />
          <FormulateInput
            name="url"
            type="url"
            label="会社URL"
            placeholder="https://example.com"
            help="Sample url help text"
            validation="required"
          />
          <FormulateInput name="phone" type="tel" label="電話番号" placeholder="xxx-xxxx-xxxx" validation="required" />
          <FormulateInput name="industry" type="text" label="業種" placeholder="業種" validation="required" />
          <FormulateInput
            name="summary"
            type="textarea"
            label="事業概要"
            validation="required|max:500,length"
            validation-name="tweet"
            error-behavior="live"
          />
          <div class="double-wide">
            <FormulateInput name="zipcode" type="text" label="郵便番号" placeholder="xxx-xxxx" validation="required" />
            <div class="auto-button">
              <FormulateInput type="button" label="住所を自動で入力" />
            </div>
          </div>
          <FormulateInput name="address" type="text" label="住所" placeholder="住所" validation="required" />
          <div class="submit-button">
            <FormulateInput type="submit" label="登録" />
          </div>
        </FormulateForm>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    formValues: {},
  }),
  methods: {
    save() {
      console.log(this.formValues)
      this.$router.push({ name: 'index' })
    },
  },
}
</script>

<style scoped>
.signup {
  height: 100%;
  padding: 68px 0;
}

.signup .signup-card {
  width: 550px;
  margin-top: 20px;
  padding: 30px 48px;
}

.signup-form {
  padding: 2em;
  border: 1px solid #a8a8a8;
  border-radius: 0.5em;
  max-width: 500px;
  box-sizing: border-box;
}
.form-title {
  margin-top: 0;
}
.signup::v-deep .formulate-input .formulate-input-element {
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
