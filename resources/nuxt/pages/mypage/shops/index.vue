<template>
  <my-shops-template />
</template>

<script>
export default {
  components: {
    MyShopsTemplate: () => import('~/components/templates/MyShopsTemplate'),
  },
}
</script>

<style scoped></style>
