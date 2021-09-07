<template>
    <div class="md:flex md:items-center mb-6">
        <form.label :veldnaam="this.veldnaam">{{ this.veldnaam }}</form.label>
        <div class="md:w-2/3">
            <!-- input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                   id="this.veldnaam"
                   type="text"
                   :value="modelValue"
                   @input="$emit('updatae:modelValue', $event.target.value)"" / -->
        <input v-model="value"></input>

        </div>
    </div>
    
</template>

<script>
/**  import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {
        
    },
})
**/
props: ['modelValue'],
emits: ['update.modelValue'],
computed:{
    value: {
        get() {
            return this.modelValue
        },
        set( value ){
            this.$emit('update.modelValue', value)
        }
    }
}
</script>

<!--
app.component('custom-input', {
  props: ['modelValue'],
  emits: ['update:modelValue'],
  template: `
    <input v-model="value">
  `,
  computed: {
    value: {
      get() {
        return this.modelValue
      },
      set(value) {
        this.$emit('update:modelValue', value)
      }
    }
  }
})    
app.component('custom-input', {
  props: ['modelValue'],
  emits: ['update:modelValue'],
  template: `
    <input
      :value="modelValue"
      @input="$emit('update:modelValue', $event.target.value)"
    >
  `
})
 <div class="md:flex md:items-center mb-6">
    <div class="md:w-1/3">
      <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
        Full Name
      </label>
    </div>
    <div class="md:w-2/3">
      <input class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" value="Jane Doe">
    </div>
  </div>
props(['name'])

<x-form.field>
    <x-form.label name="{{ $name }}"/>

    <input class="border border-gray-200 p-2 w-full rounded"
           name="{{ $name }}"
           id="{{ $name }}"
           {{ $attributes(['value' => old($name)]) }}
    >

    <x-form.error name="{{ $name }}"/>
</x-form.field>
-->


<!-- script> 
import Form from '../../utilities/Form.js'

export default{
	props:['veldnaam', 'modelValue'],  
    emits:['update:modelValue'],
	
	data(){
		return {
		
		}
	},
		
	methods:{ 

		
	},
}
</script>

<style scoped>
.invalid-feedback{
   display: block;
}
</style -->