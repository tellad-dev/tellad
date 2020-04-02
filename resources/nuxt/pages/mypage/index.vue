<template>
  <my-page-template />
</template>

<script>
export default {
  components: {
    MyPageTemplate: () => import('~/components/templates/MyPageTemplate'),
  },
}
</script>

<style scoped></style>
