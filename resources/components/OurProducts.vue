<template>
    <div class="our-shop">
        <div class="header">
            <h3>Our Products</h3>
        </div>
        <div class="card-body">
            <div v-for="product in products" :key="product.id">
                <ProductCard :pid="product.id" :image="product.image" :name="product.name" :description="product.description" :price="product.price" :color="product.color" />
            </div>

        </div>

    </div>
</template>

<script>
import ProductCard from "../organisms/ProductCard.vue"
    export default{
        name:"OurProducts",
        components:{
            ProductCard
        },
        props:{
      
        },
        data(){
            return{
                products:[
               
                ]
            }
        },
        mounted () {
            fetch('http://127.0.0.1:8000/api/products')
            .then(response => response.json())
            .then(data => this.products = data)

        }
    }
</script>

<style>
    .our-shop{
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
    .our-shop::before{
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
    .card-body{
        height: calc(100% - 98px);
    position: relative;
    overflow-y: scroll;
    }
</style>