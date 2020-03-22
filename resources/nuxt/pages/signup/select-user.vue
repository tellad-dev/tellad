<template>
  <select-user-template />
</template>

<script>
export default {
  components: {
    SelectUserTemplate: () => import('~/components/templates/SelectUserTemplate'),
  },
}
</script>

<style scoped></style>
