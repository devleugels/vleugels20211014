<template>
    <div class="w-full max-w-sm text-2xl">

        <form class="form-sample" method="POST"  
            @submit.prevent="onSubmit"
            @keydown="form.errors.clear($event.target.name)">

            <form.test>We testen form.test</form.test>
			<form.input veldnaam="voornaam" v-model="form.voornaam"></form.input>

             

        </form>
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

		},
		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style>