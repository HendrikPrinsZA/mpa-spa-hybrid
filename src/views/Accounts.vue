<template>
  <v-container>
    <v-card v-for="(account, i) in accounts" :key="i" :title="account.title" :subtitle="account.subtitle" class="ma-10" elevation="10">
      <v-card-actions>
        <v-btn variant="outlined" rounded text>Button</v-btn>
      </v-card-actions>
    </v-card>
  </v-container>
</template>

<script>
export default {
  data: () => ({
    accounts: [
      {
        title: 'Account 1',
        subtitle: 'Description of account 1'
      },
      {
        title: 'Account 2',
        subtitle: 'Description of account 2'
      },
      {
        title: 'Account 3',
        subtitle: 'Description of account 3'
      },
      {
        title: 'Account 4',
        subtitle: 'Description of account 4'
      },
      {
        title: 'Account 5',
        subtitle: 'Description of account 5'
      },
      {
        title: 'Account 6',
        subtitle: 'Description of account 6'
      }
    ]
  })
}
</script>