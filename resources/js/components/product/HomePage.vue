<template>
    
    <v-container fluid grid-list-md>
        <v-layout row wrap>
            <v-flex xs8>
                <div class="row mt-2 mb-2">
                    <div class="col-md-10">&nbsp;</div>
                    <div class="col-md-2 text-right">
                        <button class="btn btn-primary" data-toggle="modal" data-target="#cart">
                            <i class="fa fa-shopping-cart"></i><span class="badge badge-light">Cart ({{badge}})</span>
                        </button>
                        
                        <div ref="myModalRefCart" class="modal fade" id="cart">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Your Cart</h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <table class="table table-striped text-left">
                                            <tbody>
                                                <tr v-for="(cart, n) in carts" v-bind:key="cart.id">
                                                    <td>{{cart.name}}</td>
                                                    <td>£{{cart.price}}</td>
                                                    <td width="100"><input type="text" readonly class="form-control" v-model="quantity"></td>
                                                    <td width="60">
                                                        <button @click="removeCart(n)" class="btn btn-danger btn-sm"><i class="fa fa-close"></i>Remove</button>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="modal-footer">
                                        Total Price: £{{amount}}&nbsp;
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#cardform" data-dismiss="modal">
                                        Pay Now
                                        </button>
                                                                             
                                    </div>

                                </div>

                            </div>

                        </div>


                        <div class="modal fade" id="cardform" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Please Enter Your Card Details</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="email">Email</label>
                                        <div class="col-sm-9">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Email Receipt" v-model="email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="card-holder-name">Description</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Credit Card Description" v-model="description">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="card-number">Card Number</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" name="card-number" id="card-number" placeholder="Debit/Credit Card Number" autocomplete="cc-number" v-model="card.card_number">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="expiry-month">Expiration Date</label>
                                        <div class="col-sm-9">
                                        <div class="row">
                                            <div class="col-xs-3" style="min-width:50px">
                                            <select class="form-control col-sm-2" name="expiry-month" id="expiry-month" autocomplete="cc-exp-month" v-model="card.expiry_month">
                                                <option>Month</option>
                                                <option value="01">Jan (01)</option>
                                                <option value="02">Feb (02)</option>
                                                <option value="03">Mar (03)</option>
                                                <option value="04">Apr (04)</option>
                                                <option value="05">May (05)</option>
                                                <option value="06">June (06)</option>
                                                <option value="07">July (07)</option>
                                                <option value="08">Aug (08)</option>
                                                <option value="09">Sep (09)</option>
                                                <option value="10">Oct (10)</option>
                                                <option value="11">Nov (11)</option>
                                                <option value="12">Dec (12)</option>
                                            </select>
                                            </div>
                                            <div class="col-xs-3">
                                            <select class="form-control" name="expiry-year" autocomplete="cc-exp-year" v-model="card.expiry_year">
                                                
                                                <option value="18">2018</option>
                                                <option value="19">2019</option>
                                                <option value="20">2020</option>
                                                <option value="21">2021</option>
                                                <option value="22">2022</option>
                                                <option value="23">2023</option>
                                            </select>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-3 control-label" for="cvv">Card CVV</label>
                                        <div class="col-sm-3">
                                        <input type="text" class="form-control" name="cvv" id="cvv" placeholder="Security Code" autocomplete="cvc" v-model="card.cvv">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-3 col-sm-9">
                                        <button type="button" class="btn btn-success" @click="createCharge">Pay Now</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                
                            </div>
                            </div>
                        </div>
                        </div>

                    </div>
                </div>

                
                <v-card class="mt-2" v-for="product in products" :key="product.id">
        
                    <v-card-title primary-title>
                    <div>
                        <h3 class="headline mb-0">
                            <router-link :to="product.path">
                                {{product.name}} 
                            </router-link>
                        </h3>
                        <span class="grey--text">£{{product.price}}</span><br>
                        <span class="grey--text"><small>Posted {{product.created_at}}</small></span>
                    </div>
                    </v-card-title>
                        <v-card-text>
                            <v-img
                                :src="'http://nellystore.dev/' + product.image"
                                height="300px"
                                contain
                            ></v-img>
                            {{product.description}}
                        </v-card-text>
                        <v-divider light></v-divider>
                    <v-card-actions>
                       
                    <v-btn @click="addCart(product)" dark color="orange">Add to Cart</v-btn>
                    <v-spacer></v-spacer>
                    {{product.user}}
                    </v-card-actions>
                </v-card>
            </v-flex>

            <v-flex xs4>
                <categories></categories>
            </v-flex>
            <nav aria-label="page navigation example">
           
                <ul class="pagination">
                    <li v-bind:class="[{disabled: !paginations.first_link}]"
                        class="page-item"><a class="page-link" href="#"
                        @click="getProducts(paginations.first_link)">&laquo;</a>
                    </li>
                    <li v-bind:class="[{disabled: !paginations.prev_link}]"
                        class="page-item"><a class="page-link" href="#"
                        @click="getProducts(paginations.prev_link)">Previous</a>
                    </li>
                    <li v-for="n in paginations.last_page" v-bind:key="n" v-bind:class="[{active: paginations.current_page == n}]"
                        class="page-item"><a class="page-link" href="#"
                        @click="getProducts(paginations.path_page + n)">{{n}}</a>
                    </li>
                    <li v-bind:class="[{disabled: !paginations.last_link}]"
                        class="page-item"><a class="page-link" href="#"
                        @click="getProducts(paginations.next_link)">Next</a>
                    </li>
                    <li v-bind:class="[{disabled: !paginations.prev_link}]"
                        class="page-item"><a class="page-link" href="#"
                        @click="getProducts(paginations.last_link)">&raquo;</a>
                    </li>
                </ul>
                
            </nav>               
        </v-layout>
    </v-container>
       
</template>

<script>
import Categories from './Categories'

export default {
    components:{
        'categories':Categories
        
    },
    data(){
        return {
            products:{
                id: '',
                name: '',
                description: '',
                price: '',
                user:'',
                path: ''
            },
            add: true,
            edit: false,
            carts: [],
            cartadd: {
                id: '',
                name: '',
                price: '',
            },
            badge: '0',
            quantity: '1',
            totalprice: '0',
            paginations: {},
            user: '',
            amount: '0',
            card: {
                card_number: '',
                expiry_year: '',
                expiry_month: '',
                cvv: ''
            },
            email: '',
            user_id: ''
                                                
        }
    },
    
    created(){
        this.getProducts();
        this.viewCart();
        this.user = User.name()
        this.showButton()
        
        
    },
    methods: {
        viewCart(){
            if(localStorage.getItem('carts')){
                this.carts = JSON.parse(localStorage.getItem('carts'));
                this.badge = this.carts.length;
                this.amount = this.carts.reduce((total, item) => {
                    return total + this.quantity * item.price;
                }, 0);
            }
        },
        addCart(pro){
            this.cartadd.id = pro.id;
            this.cartadd.name = pro.name;
            this.cartadd.price = pro.price;
            this.carts.push(this.cartadd);
            this.cartadd = {},
            this.storeCart();

        },
        
        showButton(){
            if(this.username = localStorage.getItem('user')){
                this.mine = true;
            }
        },
        removeCart(pro){
            this.carts.splice(pro, 1);
            this.storeCart();
        },
        storeCart(){
            let parsed = JSON.stringify(this.carts);
            localStorage.setItem('carts', parsed);
            this.viewCart();
        },
        getProducts(page_url){
            //let v$this = this;
            page_url = page_url || '/api/product';
            axios.get(page_url)
            .then(res => {
                this.products = res.data.data;
                this.user_id = res.data.data.user_id;
                this.paginations = {
                    current_page: res.data.meta.current_page,
                    last_page: res.data.meta.last_page,
                    from_page: res.data.meta.from,
                    to_page: res.data.meta.to,
                    total_page: res.data.meta.total,
                    path_page: res.data.meta.path+"?page=",
                    first_link: res.data.links.first,
                    last_link: res.data.links.last,
                    prev_link: res.data.links.prev,
                    next_link: res.data.links.next,
                                                        
                };
                
            })
                        
        },

        createCharge(){
            axios.post('/api/charge', {card: this.card, amount: this.amount, description: this.description})
            .then(res =>{
                alert('Success!')
            }).catch(function(error){
                alert(error.message);
            });
        },
              
    }
}
</script>

<style>
#exampleModalLabel{
    text-align: center;
}
</style>
