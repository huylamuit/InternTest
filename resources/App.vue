<template>
    <div class="shop-card">
      <OurProducts></OurProducts>
  
    </div>
    <div class="cart">
      <YourCart></YourCart>
    </div>
  </template>
  
  <script>
  import OurProducts from './components/OurProducts.vue';
  import YourCart from './components/YourCart.vue'
  export default {
    name: 'App',
    components: {
      OurProducts,
      YourCart
    }
  }
  </script>
  
  <style>
  
  #app {
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: space-between;
      position: relative;
      flex-wrap: wrap;
      padding: 0 20px;
      max-width: 760px;
      margin: 0 auto;
      font-family: Rubik;
  
  }
  #app::before{
    content: "";
    display: block;
    position: fixed;
    width: 250%;
    height: 100%;
    top: 50%;
    left: 50%;
    border-radius: 100%;
    background-color: #f6c90e;
    transform: translateX(-50%) skewY(-8deg);
  }

  </style>
  