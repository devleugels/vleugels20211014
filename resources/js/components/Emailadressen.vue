<template>
    <div class="w-full text-2xl">

        <form class="formclass" method="POST"
              @submit.prevent="onSubmit"
              @keydown="form.errors.clear($event.target.name)">

              <div class="formrij">
                <div class="formelement">
                    <label class="formlabel" for="naam">naam</label>
                    <input type="text" id="naam" class="forminput"
                        v-model="form.naam" >
            
                    <div class="formfout" v-if="form.errors.has('naam')"
                        v-text="form.errors.get('naam')"></div> 
                </div>   

                <div class="formelement">
                    <label class="formlabel" for="email">email</label>
                    <input type="email" id="email" class="forminput"
                        v-model="form.email" >
            
                    <div class="formfout" v-if="form.errors.has('email')"
                        v-text="form.errors.get('email')"></div> 
                </div>                                  
              </div>

                <!-- knop spaar -->
                <div class="formrij">
                    <button class="formknop">{{ getKnoptekst() }}</button>
                </div>              
        </form>
    </div>
    
</template>

<script> 
import Form from '../utilities/Form.js'

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
			// alert("[Emailadressen.vue@onSubmit] ok");

			if ( this.form.id == 0)
			{
				// alert("[Emailadressen.vue@onSubmit] id = 0");
				this.form.post('/emailadressen')
				  .then( response => {
					  // alert("[Emailadressen.vue@onSubmit] response = " + JSON.stringify(response) );
					  var url = "https://" + window.location.hostname + "/" + this.extra.urlterug;
					  // alert("[Emailadressen.vue@onSubmit] url " + url);
					  window.location = url;
				  })
				  .catch( error => {
					  alert("[Emailadressen.vue@onSubmit] error = " + JSON.stringify(error) );
				  })
			} else {
                // de update uitvoeren ....
				// alert("[Emailadressen.vue@onSubmit] id != 0");
                this.form.patch('/emailadressen/' + this.form.id)
                  .then( response => {
                      // alert("[Emailadressen.vue@onSubmit] response = " + JSON.stringify(response) );
                      var url = "https://" + window.location.hostname + "/";
                      if ( response.fout){
                          url += 'showFout';
                      } else {
                          url += this.extra.urlterug;
                      }
                      
                      window.location = url;

                  })
                  .catch( error => {
                      alert("[Emailadressen.vue@onSubmit] error = " + JSON.stringify(error) );
                  })
			}		
		},

        getKnoptekst(){
            if ( this.form.id == 0)
                return "spaar";
            else
                return "wijziging bevestigen";
        }
		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style>
