<template>
  <v-btn v-bind="$attrs" @click="$emit('click', $event)">
    <slot />
  </v-btn>
</template>

<script>
export default {
  name: 'BaseButton',
}
</script>
