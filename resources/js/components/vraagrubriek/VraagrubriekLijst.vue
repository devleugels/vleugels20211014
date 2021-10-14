<template>
  <div class="container">
      <div class="row justify-content-center">
          <div class="col-md-10">
              <div class="card">
                  <div class="card-body">
                      test
                  </div>
              </div>
          </div>
      </div>
  </div>


     
</template>

<script> 

import Form from '../../utilities/Form.js'

export default{
	props:['data', 'extra'],  
	
	data(){
		return {
			form : this.CalcForm(), 		
		}
	},
		
	methods:{ 
		CalcForm(){ 
			return new Form(this.data);
		}, 

		
		onSubmit(){
			alert("[vraagrubrieklijst.Fiche.vue@onSubmit] ok");
		},
		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style>
