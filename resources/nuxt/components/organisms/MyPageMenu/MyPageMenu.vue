<template>
  <div>
    <v-card class="mx-auto" :elevation="0">
      <v-list class="pt-0 pb-0">
        <template v-for="(item, i) in items">
          <v-list-item :key="i" link @click="$router.push({ name: item.url })">
            <v-list-item-content>
              <v-list-item-title class="font-weight-bold body-2">{{ item.title }}</v-list-item-title>
            </v-list-item-content>

            <v-list-item-icon>
              <v-icon>{{ 'mdi-chevron-right' }}</v-icon>
            </v-list-item-icon>
          </v-list-item>
          <v-divider v-if="i + 1 < items.length" :key="i" />
        </template>
      </v-list>
    </v-card>

    <h3 class="mt-10 font-weight-bold body-1">ゲスト</h3>

    <v-card class="mx-auto" :elevation="0">
      <v-list class="pt-0 pb-0">
        <template v-for="(item, i) in guestItems">
          <v-list-item :key="i" link>
            <v-list-item-content>
              <v-list-item-title class="font-weight-bold body-2">{{ item.title }}</v-list-item-title>
            </v-list-item-content>

            <v-list-item-icon>
              <v-icon>{{ 'mdi-chevron-right' }}</v-icon>
            </v-list-item-icon>
          </v-list-item>
          <v-divider v-if="i + 1 < items.length" :key="i" />
        </template>
      </v-list>
    </v-card>

    <h3 class="mt-10 font-weight-bold body-1">ホスト</h3>

    <v-card class="mx-auto" :elevation="0">
      <v-list class="pt-0 pb-0">
        <template v-for="(item, i) in hostItems">
          <v-list-item :key="i" link>
            <v-list-item-content>
              <v-list-item-title class="font-weight-bold body-2">{{ item.title }}</v-list-item-title>
            </v-list-item-content>

            <v-list-item-icon>
              <v-icon>{{ 'mdi-chevron-right' }}</v-icon>
            </v-list-item-icon>
          </v-list-item>
          <v-divider v-if="i + 1 < items.length" :key="i" />
        </template>
      </v-list>
    </v-card>
  </div>
</template>

<script>
export default {
  data: () => ({
    items: [
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
    ],
    guestItems: [
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
    ],
    hostItems: [
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
      {
        title: 'マイページ',
        url: 'mypage',
      },
    ],
  }),
}
</script>

<style scoped></style>
