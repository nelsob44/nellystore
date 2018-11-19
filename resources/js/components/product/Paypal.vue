<template>
  <div>
  <div id="paypal-button"></div>
  <div v-if="success" class="alert alert-success">
     <strong>Success!</strong> Payment successfuly done
  </div>
  <div v-if="error" class="alert alert-danger">
     <strong>Ooops!</strong>  something went wrong
  </div>
</div>
</template>


<script>
export default {
    
}
/*paypal.Button.render({
                                  // Configure environment
                                  env: 'sandbox',
                                  client: {
                                    sandbox: 'AWsEtsKtaawOoCZ9KmK9xedbggnuAs_MBn1BEimVwsivLbmgcMNCSl1llM5xEuB3U3UxLoo2_E8cP-Bv',
                                    
                                  },
                                  // Customize button (optional)
                                  locale: 'en_US',
                                  style: {
                                    size: 'small',
                                    color: 'gold',
                                    shape: 'pill',
                                  },
                                  // Set up a payment
                                  payment: function (data, actions) {
                                    return actions.payment.create({
                                      transactions: [{
                                        amount: {
                                          total: this.amount,
                                          currency: 'GBP'
                                        }
                                      }]
                                    });
                                  },
                                  // Execute the payment
                                  onAuthorize: function (data, actions) {
                                                window.alert('Thank you for your purchase!');
                                                },
                                     
                                  
                                }, '#paypal-button');*/


    /*let  client = {
    sandbox:'AWsEtsKtaawOoCZ9KmK9xedbggnuAs_MBn1BEimVwsivLbmgcMNCSl1llM5xEuB3U3UxLoo2_E8cP-Bv',
    }

    let  payment = (data, actions) => {
    // Make a call to the REST api to create the payment
        return actions.payment.create({
        payment: {
            transactions: [
                {
                amount: { total: this.amount, currency: 'USD' }
                } 
            ]
        }
        });
    }

    let  onAuthorize = (data) => {
        var data = {
        
                amount: this.amount
            };
        window.alert('Thank you for your purchase!');
    }

    paypal.Button.render({
    env: 'sandbox', // sandbox | production
    commit: true,
    client,
    payment,
    onAuthorize
    }, '#paypal-button');*/


</script>

<style>

</style>
