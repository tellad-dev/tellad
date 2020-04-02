<template>
  <div>
    <section class="page-top">
      <h1 class="page-title">店舗詳細</h1>
    </section>

    <div class="ad grey lighten-4" style="position: relative">
      <section class="wrapper my-0">
        <v-row>
          <v-col sm="3" class="pa-4">
            <my-page-menu />
          </v-col>

          <v-col sm="9" class="pa-4">
            <v-card class="mx-auto ad-card" :elevation="0">
              <section class="page-top mt-0">
                <div class>
                  <v-carousel cycle height="600px" hide-delimiters hide-delimiter-background :show-arrows="false">
                    <v-carousel-item v-for="(image, i) in images" :key="i" :src="image.src" />
                  </v-carousel>
                </div>
              </section>

              <v-row justify="center" no-gutters>
                <FormulateForm v-model="formValues" class="ad-form" @submit="save">
                  <!-- <FormulateInput name="name" type="text" label="Your name" placeholder="Your name" validation="required" /> -->
                  <FormulateInput name="name" type="text" label="店舗名" placeholder="店舗名" validation="required" />
                  <FormulateInput name="url" type="text" label="店舗URL" placeholder="URL" validation="required" />
                  <FormulateInput name="industry" type="text" label="業種" placeholder="業種" validation="required" />
                  <FormulateInput
                    name="url"
                    type="url"
                    label="会社URL"
                    placeholder="https://example.com"
                    help="Sample url help text"
                    validation="required"
                  />
                  <div class="double-wide">
                    <FormulateInput
                      name="zipcode"
                      type="text"
                      label="郵便番号"
                      placeholder="xxx-xxxx"
                      validation="required"
                    />
                    <div class="auto-button">
                      <FormulateInput type="button" label="住所を自動で入力" />
                    </div>
                  </div>
                  <FormulateInput name="sheet" type="text" label="席数" placeholder="" validation="required" />
                  <FormulateInput name="visitors" type="text" label="来客者数" placeholder="" validation="required" />
                  <FormulateInput
                    name="reference"
                    type="text"
                    label="来客者参考物"
                    placeholder=""
                    validation="required"
                  />
                  <FormulateInput
                    name="customerUnitPrice"
                    type="text"
                    label="顧客単価"
                    placeholder=""
                    validation="required"
                  />
                  <FormulateInput
                    name="customerAge"
                    type="text"
                    label="顧客の年齢"
                    placeholder=""
                    validation="required"
                  />
                  <FormulateInput
                    name="customerSexPercentage"
                    type="text"
                    label="顧客の性別割合"
                    placeholder=""
                    validation="required"
                  />
                  <FormulateInput
                    type="radio"
                    name="type"
                    label="顧客層（属性）"
                    error-behavior="live"
                    validation="in:CoupleA,CoupleB,CoupleC,CoupleD"
                    :options="{ CoupleA: 'CoupleA', CoupleB: 'CoupleB', CoupleC: 'CoupleC', CoupleD: 'CoupleD' }"
                  />
                  <FormulateInput
                    type="radio"
                    name="type"
                    label="店舗の特徴"
                    error-behavior="live"
                    validation="in:Osyare,Ekichika,Jutakuchi,Wakamonogaoi"
                    :options="{ Osyare: 'おしゃれ', Ekichika: '駅近', Jutakuchi: '住宅地', Wakamonogaoi: '若者が多い' }"
                  />
                  <div class="submit-button">
                    <FormulateInput type="submit" label="保存" />
                  </div>
                </FormulateForm>
              </v-row>
            </v-card>
          </v-col>
        </v-row>
      </section>
    </div>
  </div>
</template>

<script>
export default {
  components: {
    MyPageMenu: () => import('~/components/organisms/MyPageMenu'),
  },
  data: () => ({
    images: [
      {
        src: '/hero-1.png',
      },
      {
        src: '/hero-2.png',
      },
      {
        src: '/hero-1.png',
      },
    ],
    formValues: {},
  }),

  methods: {
    save() {},
  },
}
</script>

<style scoped>
.ad {
  height: 100%;
  padding: 0 40px 48px;
}

.ad .ad-card {
  /* width: 550px;
  margin-top: 20px; */
  padding: 30px 48px;
}

.ad-form {
  padding: 2em;
  /* border: 1px solid #a8a8a8;
  border-radius: 0.5em; */
  max-width: 500px;
  box-sizing: border-box;
}
.form-title {
  margin-top: 0;
}
.ad::v-deep .formulate-input .formulate-input-element {
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
