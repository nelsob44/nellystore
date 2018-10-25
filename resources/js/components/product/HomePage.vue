<template>
    
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <v-card class="mt-2" v-for="product in products" :key="product.id">
        
                    <v-card-title primary-title>
                    <div>
                        <h3 class="headline mb-0">
                            <router-link :to="product.path">
                                {{product.name}} 
                            </router-link>
                        </h3>
                        <div class="grey--text">£{{product.price}} {{product.created_at}}</div>
                    </div>
                    </v-card-title>
                        <v-card-text>
                            <v-img
                                src="https://cdn.vuetifyjs.com/images/cards/desert.jpg"
                                height="200px"
                                contain
                            ></v-img>
                            {{product.description}}
                        </v-card-text>
                        <v-divider light></v-divider>
                    <v-card-actions>
                    <v-btn flat color="orange">Share</v-btn>
                    <v-btn flat color="orange">Explore</v-btn>
                    </v-card-actions>
                </v-card>
            </v-flex>

            <v-flex xs4>
                <categories></categories>
            </v-flex>
            sidebar
        </v-layout>
    </v-container>
       
</template>

<script>
import Categories from './Categories'
export default {
    components:{Categories},
    data(){
        return {
            products:{}
        }
    },
    
    created(){
        axios.get('/api/product')
        .then(res => this.products = res.data.data)
        console.log(res.data.data)
        //.catch(error => console.log(error.response.data))
    }
}
</script>

<style>

</style>
