<template>
  <div>
    <table class="tabelcontainer table">
      <thead>
        <th v-for="item in display">
          {{ item }}
        </th>
      </thead>
      <tbody>
        <tr v-for="item in data">
          <td v-for="dispitem in display">
            <div v-show="dispitem == 'edit'">
              <a :href="getUrl(item, 'edit')" class="tabelknop">edit</a>
            </div>
            <div v-show="dispitem == 'wis'">
              <a :href="getUrl(item, 'wis')" class="tabelknop">wis</a>
            </div>
            <div v-show="dispitem != 'edit' && dispitem != 'wis'">
              {{ getItem(dispitem, item, false) }}
            </div>
          </td> 
        </tr>        
      </tbody>
    </table>

    <!-- hier komt een knop om item toe te voegen -->
    <a :href="getNieuwUrl()" class="tabelknop">Een nieuw item toevoegen</a>

  </div>
</template>

<script> 
import Form from '../utilities/Form.js'


export default{
	props:['data', 'extra', 'display', 'knoppen'],  

  created(){
    this.fillHeader();
  },

  data() {
      return {

      }
  },

  methods: {
    fillHeader(){
      this.display.push('edit');
      this.display.push('wis');
    },

    getItem(dispitem, item, toon = 0){
      // if ( toon ) alert("dispitem = " + dispitem + " en item = " + JSON.stringify(item) + " item[dispitem] = " + item[dispitem]);
      if (dispitem == "edit") return "edit";
      if (dispitem == "wis") return "delete";
      return item[dispitem];
    },

    getUrl( item, type ){
      var ret = this.extra.tabelnaam + '/' +item.id;
      if ( type == 'edit') ret += "/edit";
      if ( type == 'wis') ret += "/delete";
      // alert("[Tabel.vue@getUrl] url = " + ret);
      return ret;  
    },

    getNieuwUrl(){
      return this.extra.tabelnaam + "/create";
    },

  }
}
</script>
