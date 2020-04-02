<template>
  <div class="mypage grey lighten-4" style="position: relative">
    <section class="wrapper my-0">
      <v-row>
        <v-col sm="3" class="pa-4">
          <my-page-menu />
        </v-col>

        <v-col sm="9" class="pa-4">
          <v-card class="mx-auto mypage-card" :elevation="0">
            <v-img src="https://cdn.vuetifyjs.com/images/lists/ali.png" height="300px" dark>
              <!-- <v-row class="fill-height"> -->
              <!-- <v-card-title> -->
              <!-- <v-btn dark icon>
                    <v-icon>mdi-chevron-left</v-icon>
                  </v-btn>

                  <v-spacer />

                  <v-btn dark icon class="mr-4">
                    <v-icon>mdi-pencil</v-icon>
                  </v-btn>

                  <v-btn dark icon>
                    <v-icon>mdi-dots-vertical</v-icon>
                  </v-btn>
                </v-card-title> -->

              <!-- <v-spacer /> -->

              <v-card-title class="font-weight-bold body-2 align-center">
                <div>名前</div>
              </v-card-title>
              <!-- </v-row> -->
            </v-img>

            <v-list two-line>
              <v-list-item @click="a">
                <v-list-item-icon>
                  <v-icon color="indigo">mdi-phone</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>(650) 555-1234</v-list-item-title>
                  <v-list-item-subtitle>Mobile</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                  <v-icon>mdi-message-text</v-icon>
                </v-list-item-icon>
              </v-list-item>

              <v-list-item @click="a">
                <v-list-item-action />

                <v-list-item-content>
                  <v-list-item-title>(323) 555-6789</v-list-item-title>
                  <v-list-item-subtitle>Work</v-list-item-subtitle>
                </v-list-item-content>

                <v-list-item-icon>
                  <v-icon>mdi-message-text</v-icon>
                </v-list-item-icon>
              </v-list-item>

              <v-divider inset />

              <v-list-item @click="a">
                <v-list-item-icon>
                  <v-icon color="indigo">mdi-email</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>aliconnors@example.com</v-list-item-title>
                  <v-list-item-subtitle>Personal</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>

              <v-list-item @click="a">
                <v-list-item-action />

                <v-list-item-content>
                  <v-list-item-title>ali_connors@example.com</v-list-item-title>
                  <v-list-item-subtitle>Work</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>

              <v-divider inset />

              <v-list-item @click="a">
                <v-list-item-icon>
                  <v-icon color="indigo">mdi-map-marker</v-icon>
                </v-list-item-icon>

                <v-list-item-content>
                  <v-list-item-title>1400 Main Street</v-list-item-title>
                  <v-list-item-subtitle>Orlando, FL 79938</v-list-item-subtitle>
                </v-list-item-content>
              </v-list-item>
            </v-list>
          </v-card>
        </v-col>
      </v-row>
    </section>
  </div>
</template>

<script>
export default {
  components: {
    MyPageMenu: () => import('~/components/organisms/MyPageMenu'),
  },
}
</script>

<style scoped>
.mypage {
  height: 100%;
  padding: 0 40px 48px;
}

.mypage .mypage-card {
  /* width: 550px; */
  /* margin-top: 20px; */
  padding: 30px 48px;
}
</style>
