<template>
    <div class="cart-item">
       
        <div class="item-image" :style="{ backgroundColor: color}">
            <img v-bind:src="image" alt="">
        </div>
        <div class="item-info">
            <h4>{{name}}</h4>
            <h3>${{ price }}</h3>
            <div class="item-btn">
                <div class="btn-option">
                    <button type="button" @click="decreaseQty"><img src="../assets/minus.png" alt=""></button>
                    <span>{{ qty }}</span>
                    <button type="button" @click="increaseQty"><img src="../assets/plus.png" alt=""></button>
                </div>
                <button type="button" class="delete-btn" @click="removeProduct"><img src="../assets/trash.png" alt=""></button>
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
                qty:1
            }
        },
        methods:{
            removeProduct(){
                EventBus.$emit('remove',{
                    id:this.pid,
                    qty:this.qty,
                    price:this.price
                })
            },
            decreaseQty(){
                this.qty--;
                if(this.qty <= 0){
                    this.removeProduct()
                }
                
                
                EventBus.$emit('decreaseQty', this.price)
            },
            increaseQty(){
                this.qty++;
           
                EventBus.$emit('increaseQty', this.price)
            }
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
    .cart-item{
      
        display: flex;
        padding: 10px 0;

    }
    .item-image{
        box-sizing: content-box;
        border-radius: 100%;
        width: 90px;
        height: 90px;
        display: flex;
        align-items: center;
        margin-right: 30px;
        animation: fade-in 0.5s ease-in-out;

    }
    .item-image img{
        display: block;
        width: 130%;
        transform: rotate(-25deg) translateY(-20px);
        filter: drop-shadow(0 30px 20px rgba(0,0,0,.2));

    }
    .item-info{
        display: block;
        width: 60%;
        animation: slide-in 1s ease-in-out ;
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
    .btn-option{
        display: flex;
        justify-content: space-around;
    }
    .item-btn{
        display: flex;
        justify-content: space-between;
    }
    .item-btn button{
        cursor: pointer;
        width: 30px;
        height: 30px;
        border-radius: 100%;
        border: none;

    }
    .item-btn img{
        width:10px;
        height: 10px;
    }
    .item-btn .delete-btn{
        background-color: #F6C90E;
        display: flex;
        justify-content: center;
        align-items:center;
       
    }
    .delete-btn img{
        width: 20px;
        height: 20px;
    }
    @keyframes fade-in {
        from {
            opacity: 0;
        }
        to {
            opacity: 1;
        }
    }
    @keyframes slide-in {
        from {
            transform: translateX(100%);
        }
        to {
            transform: translateX(0);
        }
    }
</style>