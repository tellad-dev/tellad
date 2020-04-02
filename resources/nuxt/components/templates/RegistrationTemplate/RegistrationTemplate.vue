<template>
  <div class="profile grey lighten-4" style="position: relative">
    <section class="wrapper my-0">
      <v-row>
        <v-col sm="9" class="pa-4">
          <profile-form :title="title" @submit="$listeners['submit']" />
        </v-col>
      </v-row>
    </section>
  </div>
</template>

<script>
export default {
  components: {
    ProfileForm: () => import('~/components/organisms/forms/ProfileForm'),
  },
  props: ['title'],
}
</script>

<style scoped>
.profile {
  height: 100%;
  padding: 0 40px 48px;
}
</style>
