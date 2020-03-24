<template>
  <my-space-detail-template />
</template>

<script>
export default {
  components: {
    MySpaceDetailTemplate: () => import('~/components/templates/MySpaceDetailTemplate'),
  },
}
</script>

<style scoped></style>
