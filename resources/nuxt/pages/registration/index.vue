<template>
  <registration-template />
</template>

<script>
export default {
  components: {
    RegistrationTemplate: () => import('~/components/templates/RegistrationTemplate'),
  },
}
</script>
