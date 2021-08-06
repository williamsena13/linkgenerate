<style>
</style>

<template>
  <div>
      <div class="row">

            <div class="list-group col-md-6">


                    <table class="table table-responsive list-group-item list-group-item-action">
                        <thead>
                            <tr class="row">
                                <th>
                                    <h5 class="text-primary">00 Links</h5>
                                </th>
                                <th class="text-right">
                                    <small class="">Clique em temo real</small>
                                </th>
                            </tr>
                        </thead>
                        <tbody v-for="link in this.links">

                            <tr>
                                <td width="70%">
                                    <h5>Link Legal&nbsp;<small>04/03/2021</small></h5>
                                    <p>https://getbootstrap.com/docs/4.1/components/list-group/</p>
                                </td>
                                <td width="30%">
                                    <hr>
                                    <h4>02/250</h4>
                                </td>
                            </tr>
                        </tbody>
                    </table>

            </div>
            <div class="card col-md-6">


            </div>

      </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  props: {
      links : [],
  },
  components: {
  },
  computed: {
      getLinks(){
          return this.links;
      }
  },
  methods: {
      retrivelinks(){

        axios.get('http://localhost:8000/links')
            .then( response => {
                console.log( this.links )
                try {
                    this.links = response
                } catch (error) {
                    console.log( "Erro ao atriburi linsk", error)
                }

            })
            .catch( error => {
                console.log("Error", error)
            });
      }// getLinks()
  }, // methods

  mounted() {
    //
    //
  }, //mounted()
}; //
</script>
