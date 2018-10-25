<template>
<div class="container">
    <v-form @submit.prevent="login">
       <v-text-field
        label="Email"
        v-model="form.email"
        type="email"
        required
        ></v-text-field>

        <v-text-field
        label="Password"
        v-model="form.password"
        type="password"
        required
        ></v-text-field>

        <v-btn color="primary" dark type="submit" pull-right>
            Login
        </v-btn>
        <router-link to="/signup">
            <v-btn dark color="green">Sign up</v-btn>
        </router-link>
    </v-form>
</div>
</template>

<script>
export default {
    data(){
        return {
            form: {
                email:null,
                password:null
            }
        }
    },
    created(){
        if(User.loggedIn()){
            this.$router.push({name: 'homepage'})
        }
    },
    methods: {
        login(){
            User.login(this.form)
            
        }
    }
}
</script>

<style>
.container {
    width: 50%;
    min-width: 250px;
}
</style>
