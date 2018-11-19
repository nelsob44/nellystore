<template>
    <v-container class="create">
        
            <v-form @submit.prevent="create">
                <input type="file"
                @change="imageChanged">
                <v-text-field
                v-model="product.name"
                label="Name"
                required
                ></v-text-field>
                <v-text-field
                v-model="product.description"
                label="Description"
                required
                ></v-text-field>
                
                <v-text-field
                v-model="product.price"
                label="Price"
                required
                ></v-text-field>
                
                <v-btn color="success" dark type="submit" pull-right>
                        Create
                </v-btn>
            </v-form>
        
    </v-container>
    
    
    
    
</template>

<script>
export default {
    data (){
        return {
            product: {
                name: '',
                price: '',
                description: '',
                image: ''
                
            }
        }
    },
    
    methods: {
        imageChanged(e){
            
            var fileReader = new FileReader()

            fileReader.readAsDataURL(e.target.files[0])
            fileReader.onload = e => {
                this.product.image = e.target.result
                console.log(this.product.image)
            }
            
        },
        create () {
                axios.post('api/product', this.product)
                .then(response => {
                    this.$router.push({name: 'homepage'})
                })
            
            
        }
    }
}
</script>

<style scoped>
.create {
    max-width: 500px;
}
</style>
