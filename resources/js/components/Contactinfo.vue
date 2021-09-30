<template>
    <div class="formcontainer">

        <form class="formclass" method="POST"
              @submit.prevent="onSubmit"
              @keydown="form.errors.clear($event.target.name)">

              <!-- banknaam / iban / bic -->
              <div class="formrij">
                  <div class="formelement w-3/12">
                      <label class="formlabel" for="banknaam">banknaam</label>
                      <input type="text" id="banknaam" class="forminput"
                             v-model="form.banknaam" >
                      <div class="formfout" v-if="form.errors.has('banknaam')"
                           v-text="form.errors.get('banknaam')" />
                  </div>

                  <div class="formelement w-6/12">
                      <label class="formlabel" for="iban">iban</label>
                      <input type="text" id="iban" class="forminput"
                             v-model="form.iban" >
                      <div class="formfout" v-if="form.errors.has('iban')"
                           v-text="form.errors.get('iban')" />
                  </div>

                  <div class="formelement w-3/12">
                      <label class="formlabel" for="bic">bic</label>
                      <input type="text" id="bic" class="forminput"
                             v-model="form.bic" >
                      <div class="formfout" v-if="form.errors.has('bic')"
                           v-text="form.errors.get('bic')" />
                  </div>                                    
              </div>

              <!-- afzendernaam -->
              <div class="formrij">
                  <div class="formelement w-6/12">
                      <label class="formlabel" for="afzendernaam">afzendernaam</label>
                      <input type="text" id="afzendernaam" class="forminput"
                             v-model="form.afzendernaam" >
                      <div class="formfout" v-if="form.errors.has('afzendernaam')"
                           v-text="form.errors.get('afzendernaam')" />
                  </div>                   
              </div>
              <!-- straat / huisnummer -->
              <div class="formrij">
                  <div class="formelement w-8/12">
                      <label class="formlabel" for="straat">straat</label>
                      <input type="text" id="straat" class="forminput"
                             v-model="form.straat" >
                      <div class="formfout" v-if="form.errors.has('straat')"
                           v-text="form.errors.get('straat')" />
                  </div>  

                  <div class="formelement w-4/12">
                      <label class="formlabel" for="huisnummer">huisnummer</label>
                      <input type="text" id="huisnummer" class="forminput"
                             v-model="form.huisnummer" >
                      <div class="formfout" v-if="form.errors.has('huisnummer')"
                           v-text="form.errors.get('huisnummer')" />
                  </div>                                      
              </div>              
              <!-- postcode / gemeente -->              
              <div class="formrij">
                  <div class="formelement w-4/12">
                      <label class="formlabel" for="postcode">postcode</label>
                      <input type="text" id="postcode" class="forminput"
                             v-model="form.postcode" >
                      <div class="formfout" v-if="form.errors.has('postcode')"
                           v-text="form.errors.get('postcode')" />
                  </div>  

                  <div class="formelement w-8/12">
                      <label class="formlabel" for="gemeente">gemeente</label>
                      <input type="text" id="gemeente" class="forminput"
                             v-model="form.gemeente" >
                      <div class="formfout" v-if="form.errors.has('gemeente')"
                           v-text="form.errors.get('gemeente')" />
                  </div>                                      
              </div>

              <!-- telefoon / e-mail -->
              <div class="formrij">
                  <div class="formelement">
                      <label class="formlabel" for="telefoon">telefoon</label>
                      <input type="text" id="telefoon" class="forminput"
                             v-model="form.telefoon" >
                      <div class="formfout" v-if="form.errors.has('telefoon')"
                           v-text="form.errors.get('telefoon')" />
                  </div>  

                  <div class="formelement">
                      <label class="formlabel" for="email_id">e-mail</label>
                      <!-- input type="text" id="email" class="forminput"
                             v-model="form.email" -->
                      <select class="forminput" id="email_id" name="email_id"
                              v-model="form.email_id">
                        <option v-for="optie in emailadressen"
                                v-bind:value="optie.id">
                            {{ optie.naam }} : {{ optie.email }}
                        </option>
                      </select>
                      <div class="formfout" v-if="form.errors.has('email_id')"
                           v-text="form.errors.get('email_id')" />
                  </div>                                      
              </div>              

                <!-- knop spaar -->
                <div class="formrij">
                    <button class="formknop">Bevestig wijziging</button>
                </div>              
        </form>
    </div>
    
</template>

<script> 
import Form from '../utilities/Form.js'

export default{
	props:['data', 'extra', 'emailadressen'],  
	
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
		    // alert("[Contactinfo.vue@onSubmit] ok");

			if ( this.form.id == 0)
			{
                alert("[Contactinfo.vue@onSubmit] id = 0 - hier mag je nooit komen / spring naar foutpagina")
			} else {
                // de update uitvoeren ....
				// alert("[Contactinfo.vue@onSubmit] id != 0");
                this.form.patch('/contactinfo/' + this.form.id)
                  .then( response => {
                      // alert("[Contactinfo.vue@onSubmit] response = " + JSON.stringify(response) );
                      var url = "https://" + window.location.hostname + "/" + this.extra.urlterug;
                      window.location = url;

                  })
                  .catch( error => {
                      alert("[Contactinfo.vue@onSubmit] error = " + JSON.stringify(error) );
                  })
			}		
		},
		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style>
