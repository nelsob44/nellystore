<template>
  
      <v-card class="mt-2">
        
        <v-card-title primary-title>
          <div>
            <h3 class="headline mb-0">
                <router-link :to="product.path">
                    {{product.name}}
                </router-link>
            </h3>
            <div class="grey--text">{{product.user}} said {{product.created_at}}</div>
          </div>
        </v-card-title>
            <v-card-text>
                {{product.price}}
            </v-card-text>
            <v-card-text>
                {{product.description}}
            </v-card-text>
        <v-card-actions>
          <v-btn flat color="orange">Share</v-btn>
          <v-btn flat color="orange">Explore</v-btn>
        </v-card-actions>
      </v-card>
    
</template>

<script>
export default {
    props:['product']
}
</script>

<style>

</style>
