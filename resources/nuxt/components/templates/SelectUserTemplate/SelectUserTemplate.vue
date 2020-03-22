<template>
  <div class="signup grey lighten-4">
    <v-card class="mx-auto signup-card">
      <v-card-title class="align-end justify-center mb-9">
        <h3>新規会員登録</h3>
      </v-card-title>
      <v-row justify="center" no-gutters>
        <FormulateForm v-model="formValues" class="signup-form" @submit="next">
          <p>
            You can place any elements you want inside a form. The inputs themselves can even be deeply nested.
          </p>
          <!-- <FormulateInput name="name" type="text" label="Your name" placeholder="Your name" validation="required" /> -->
          <FormulateInput name="name" type="text" label="氏名" placeholder="お名前" validation="required" />
          <FormulateInput
            type="radio"
            name="type"
            error-behavior="live"
            validation="in:Guest,Host"
            :options="{ Guest: 'ゲストで利用する', Host: 'ホストで利用する' }"
          />
          <div class="submit-button">
            <FormulateInput type="submit" label="次へ進む" />
          </div>
        </FormulateForm>
      </v-row>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    formValues: {
      name: '',
      type: '',
    },
  }),
  methods: {
    next() {
      console.log(this.formValues)

      if (this.formValues.type === 'Guest') {
        this.$router.push({ name: 'user/mypage/profile', params: { id: '' } })
      }

      if (this.formValues.type === 'Host') {
        this.$router.push({ name: '' })
      }
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
