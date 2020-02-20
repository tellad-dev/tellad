<template>
  <v-btn v-bind="$attrs" @click="$emit('click', $event)">
    <slot />
  </v-btn>
</template>

<script lang="ts">
import { Vue } from 'vue-property-decorator'

export default class BaseButton extends Vue {}
</script>
