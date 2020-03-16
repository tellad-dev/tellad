<template>
  <signup-template />
</template>

<script>
export default {
  components: {
    SignupTemplate: () => import('~/components/templates/SignupTemplate'),
  },
}
</script>
