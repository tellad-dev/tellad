<template>
  <my-shop-detail-template />
</template>

<script>
export default {
  components: {
    MyShopDetailTemplate: () => import('~/components/templates/MyShopDetailTemplate'),
  },
}
</script>

<style scoped></style>
