<template>
    <div class="product-card">
       
        <div class="card-image" :style="{ backgroundColor: color}">
            <img v-bind:src="image" alt="">
        </div>
        <div class="card-info">
            <h3>{{name}}</h3>
            <p class="card-description">
                {{description}}
            </p>
            <div class="card-footer">
                <h3 class="price">${{price}}</h3>
                
                <div v-if="isAdded" class= "added"><img src="../assets/check.png" alt=""></div>
                <button v-else @click="addProduct" class= "add-btn">ADD TO CART</button>
            </div>
        </div>
    </div>
</template>

<script>

import EventBus from '../EventBus';

    export default{
        name:"ProductCart",
        props:{
            pid:Number,
            image: String,
            name: String,
            description: String,
            price: Number,
            color: String,
        },
        data(){
            return{
                isAdded:false
            }
        },
        emits:['addProduct'],
        methods:{
            addProduct(){
                this.isAdded = true;
                EventBus.$emit('addProduct', {
                    id:this.pid,
                    image: this.image,
                    name: this.name,
                    price: this.price,
                    color: this.color,
                    qty: 1
                })
            },
            toggleAdded(data){
                if(this.pid === data.id){
                    this.isAdded=false;
                }
            }
        
        },
        mounted(){
            EventBus.$on('remove',this.toggleAdded)
        }
    }
</script>

<style>
    h3{
        font-size: 24px;
        font-weight: 700;
        margin: 16px 0;
        position: relative;
    }
    .product-card{
        width: 100%;
        height: auto;
        padding-top:10px;
        text-align: left;
    }
    .card-image{
        border-radius: 30px;
        height: 380px;
        display: flex;
        align-items: center;
        overflow: hidden;
        
    }
    .card-image img{
        display: block;
        width: 100%;
        transform: rotate(-25deg);
        filter: drop-shadow(0 30px 20px rgba(0,0,0,.2));
        margin-left: -16px;
    }
    .card-description{
        font-size: 13px;
        color: #777;
        line-height: 1.8;
        margin-bottom: 20px;
    }
    .card-footer{
        display: flex;
        justify-content: space-between;
    }
    .add-btn{
        background-color:  #F6C90E;
        border: none;
        border-radius: 30px;
        width: auto;
        height: 50px;
        font-size: 14px;
        font-weight: 600;
        padding:  14px 20px;
        cursor: pointer;
    }
    .added{
        width:50px;
        height: 50px;
        background-color:  #F6C90E;
        border-radius: 100%;
        display: flex;
        justify-content: center;
        align-items:center;
    }
    .added img{
        width:30px;
        height: 30px;
        
    }
</style>