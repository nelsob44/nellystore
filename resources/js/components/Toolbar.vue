<template>
  <v-toolbar>
    <v-toolbar-side-icon></v-toolbar-side-icon>
    <v-toolbar-title>Nellystore</v-toolbar-title>
    <v-spacer></v-spacer>
    <div class="hidden-sm-and-down">
      <router-link 
      v-for="item in items"
      :key="item.title"
      :to="item.to"
      v-if="item.show">
        <v-btn flat>{{item.title}}</v-btn>
      </router-link>
                 
    </div>
  </v-toolbar>
</template>

<script>

export default {
  data(){
    return {
      items: [
      {title: 'Products', to:'/products', show:true},
      {title: 'HomePage', to:'/homepage', show:true},
      {title: 'Categories', to:'/categories', show: User.loggedIn()},
      {title: 'Payments', to:'/payments', show: User.loggedIn()},
      {title: 'Create', to:'/create', show: User.loggedIn()},
      {title: 'Login', to:'/login', show: !User.loggedIn()},
      {title: 'Logout', to:'/logout', show: User.loggedIn()},
    ],
    user: {}
    }
  },
  created(){
    EventBus.$on('logout', () => {
      User.+logout()
    })
  },
  methods: {
    useronline(){
        axios.get('/api/auth/me')
        .then(res => this.user = res.data.data)
        console.log(res.data.data)
  }
}
</script>

<style>

</style>
