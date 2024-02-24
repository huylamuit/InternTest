<template>
    <div class="your-cart">
        <div class="cart-header">
            <h3>Your Cart</h3>
            <h3>${{ formattedPrice }}</h3>
        </div>
        <div class="card-body">
            <div v-for="product in products" :key="product.id">
                <CartItem  :pid="product.id" :image="product.image" :name="product.name" :description="product.description" :price="product.price" :color="product.color"  :qty="product.qty"/>
            </div>

        </div>

    </div>
</template>

<script>
import CartItem from "../organisms/CartItem.vue"
import EventBus from "../EventBus.js"

    export default{
        name:"OurProducts",
        components:{
            CartItem
        },
        data(){
            return{
                products:[
                ],
                total:0.00
            
            }
        },
        computed: {
            formattedPrice() {
                return this.total.toFixed(2);
            },
        },
        methods: {
            addProduct(data) {
                this.products.push(data);
                this.total += data.price
                
            },
            removeProduct(data){
                this.products = this.products.filter(p => p.id !== data.id);
                let totalRemove = data.price * data.qty
                this.total -= totalRemove
            },
            decreaseQty(data){
                this.total -= data
            },
            increaseQty(data){
                this.total+= data   
            }
            
        },
        created() {
            EventBus.$on('addProduct', this.addProduct);
            EventBus.$on('remove',this.removeProduct)
            EventBus.$on('decreaseQty', this.decreaseQty)
            EventBus.$on('increaseQty', this.increaseQty)
        },
        beforeUnmount() {
            EventBus.$off('addProduct', this.addProduct);
        }


    }
</script>

<style>
    .your-cart{
        background-color: #fff;
        box-sizing: border-box;
        width: 360px;
        height: 600px;
        box-shadow: 0 3.2px 2.2px rgba(0,0,0,.02), 0 7px 5.4px rgba(0,0,0,.028), 0 12.1px 10.1px rgba(0,0,0,.035), 0 19.8px 18.1px rgba(0,0,0,.042), 0 34.7px 33.8px rgba(0,0,0,.05), 0 81px 81px rgba(0,0,0,.07);
        border-radius: 30px;
        overflow: hidden;
        padding: 0 28px;
        position: relative;
        margin-bottom: 20px;
        
    }
    .your-cart::before{
        content: "";
        display: block;
        position: absolute;
        border-radius: 100%;
        width: 325px;
        height: 325px;
        background-color: #f6c90e;
        top: -20%;
        left: -50%;
        z-index: 0;
    }
    .cart-header{
        display: flex;
        justify-content: space-between;
    }
    .card-body{
        height: calc(100% - 98px);
    position: relative;
    overflow-y: scroll;
    }
</style>