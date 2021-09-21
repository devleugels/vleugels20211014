<template>
  <div style="display:flex; justify-content:flex-end" v-show="is_active">
     <p class="cirkel"><slot></slot></p>
  </div>
</template>

<script>
 export default{
    props: ['aantal'],
    
    data() {
      return {
        is_active : this.aantal > 0,
      }
    },
    
    methods:{

    }
 }
</script>

<style scoped>
.cirkel{
   width : 25px;
   height : 25px;
   background-color : red;
   color : white;
   border-radius : 50%;
   font-size : 10px;
   txt-align : center;
   cursor : pointer;
   z-index : 999;
   
}
.circle {
    position: absolute;
    top: 10px;
    color: white;
    background-color: red;
    width: 25px;
    height: 25px;
    border-radius: 50%;
    line-height: 25px;
    font-size: 10px;
    text-align: center;
    cursor: pointer;
    z-index: 999;
}
</style> 