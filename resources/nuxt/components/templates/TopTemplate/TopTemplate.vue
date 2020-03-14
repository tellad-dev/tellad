<template>
  <div>
    <section class="page-top">
      <div class>
        <v-carousel cycle height="600px" hide-delimiters hide-delimiter-background :show-arrows="false">
          <v-carousel-item v-for="(image, i) in images" :key="i" :src="image.src">
            <v-row class="lightbox white--text pa-2 fill-height">
              <v-col>
                <div v-if="i == 0" class="display-4 text-center font-weight-bold">Tell + Ad</div>
                <div v-if="i == 1" class="display-4 text-center font-weight-bold">Tell + Ad</div>
                <div v-if="i == 2" class="display-4 text-center font-weight-bold">Tell + Ad</div>
              </v-col>
            </v-row>
          </v-carousel-item>
        </v-carousel>
      </div>
    </section>

    <section class="space">
      <h1>エリアから探す</h1>
      <v-row justify="center">
        <v-col v-for="(space, index) in spaces" :key="index" :data-index="index" sm="3" class="pa-4">
          <v-card class="card-outter" height="100%">
            <v-img height="200px" :src="space.image" />
            <v-row justify="center" no-gutters class="mb-0 card-space font-weight-default">
              <v-col sm="10" no-gutters class="text-center">{{ space.name }}</v-col>
              <v-col sm="10" offset-md="1" no-gutters class="body-2">{{ space.area }}</v-col>
              <v-col sm="10" offset-md="1" no-gutters class="body-2">{{ space.price }}</v-col>
            </v-row>

            <v-card-actions class="pa-0 card-actions">
              <base-button
                tile
                large
                color="primary"
                elevation="0"
                class="button-action white--text font-weight-default"
              />
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>

      <h1>カテゴリから探す</h1>
      <v-row justify="center">
        <v-col v-for="(space, index) in spaces" :key="index" :data-index="index" sm="3" class="pa-4">
          <v-card class="card-outter" height="100%">
            <v-img height="200px" :src="space.image" />
            <v-row justify="center" no-gutters class="mb-0 card-space font-weight-default">
              <v-col sm="12" no-gutters class="text-center">{{ space.name }}</v-col>
              <v-col sm="10" offset-md="1" no-gutters class="body-2">{{ space.area }}</v-col>
              <v-col sm="10" offset-md="1" no-gutters class="body-2">{{ space.price }}</v-col>
            </v-row>

            <v-card-actions class="pa-0 card-actions">
              <base-button
                tile
                large
                color="primary"
                elevation="0"
                class="button-action white--text font-weight-default"
              />
            </v-card-actions>
          </v-card>
        </v-col>
      </v-row>
    </section>
  </div>
</template>

<script>
export default {
  components: {
    BaseButton: () => import('~/components/atoms/buttons/BaseButton'),
  },
  data: () => ({
    images: [
      {
        src: 'hero-1.png',
      },
      {
        src: 'hero-2.png',
      },
      {
        src: 'hero-1.png',
      },
    ],
    spaces: [
      {
        name: 'お店',
        area: '兵庫',
        price: '1000',
        image: 'building.jpg',
      },
      {
        name: 'お店',
        area: '兵庫',
        price: '1000',
        image: 'curtains.jpg',
      },
      {
        name: 'お店',
        area: '兵庫',
        price: '1000',
        image: 'sky.jpg',
      },
      {
        name: 'お店',
        area: '兵庫',
        price: '1000',
        image: 'wall.jpg',
      },
    ],
  }),
}
</script>

<style scoped>
.page-top {
  width: 100%;
  margin: 0;
  padding: 0;
  background: #f1f1d9;
}

.page-top .v-image {
  max-width: 480px;
}

.space {
  padding: 0 10%;
}
</style>
