<style>
</style>

<template>
  <div>
      <div class="row">
            <div class="list-group col-md-7">
                <table class="table table-responsive list-group-item list-group-item-action">
                    <thead>
                        <tr class="row">
                            <th>
                                <h5 class="text-primary"><strong id="count_redirect"></strong> Links</h5>
                            </th>
                            <th class="text-right">
                                <small class="">Clique em temo real</small>
                            </th>
                        </tr>
                    </thead>
                    <tbody v-for="redirec in this.getRedirec">
                        <tr>
                            <td width="70%">
                                <h5><a @click="editRedirect( redirec.id )" data-toggle="collapse" data-target="#collapseExample" >{{ redirec.title }}&nbsp;<small>{{ redirec.create_at }}</small></a></h5>
                                <p>{{ redirec.redirect_url }}</p>
                            </td>
                            <td width="30%">
                                <hr>
                                <h4>10/500</h4>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card col-md-5">

                <button type="button" align="right" class="btn btn-outline-dark" data-toggle="collapse" data-target="#collapseExample">
                    Criar Link
                </button>

                <div class="collapse" id="collapseExample">
                    <div class="row">

                        <vc-create-links></vc-create-links>
                    </div>
                </div>


            </div>

      </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "RedirectsIndex",
  props: {
      redirects : []
  },
  components: {
  },
  computed: {
      getRedirec(){
          return this.redirects;
      },

  },
  methods: {
      redirects(){
        let url = 'http://localhost:8000/redirections'
        axios.get(url)
            .then( response => {
                try {
                    console.log( 'Estou aqui no sucesso do redirections->get()' )
                    console.log( response );
                    this.setRedirects(response.data)
                    document.getElementById('count_redirect').appendChild( document.createTextNode(response.data.length) );
                } catch (error) {
                    console.log( "Erro ao atriburi linsk", error)
                }

            })
            .catch( error => {
                console.log("Error", error)
            });
      },// getLinks()
      setRedirects( value ){
          this.redirects = value;
      },
      editRedirect( id ){
          console.log('Edit do Redirect')
          console.log('Parâmetro ID: ' + id )
          //
          try {
            let url = "http://localhost:8000/redirections/"+id+"/edit";
            axios.get(url)
                .then( response => {
                    try {
                        console.log( 'Sucesso ao Editar' )
                        console.log( response );
                        response.data
                    } catch (error) {
                        console.log( "Erro ao atriburi linsk", error)
                    }

                })
                .catch( error => {
                    console.log("Error", error)
                });
          } catch( error ) {
              console.log('Erro ao buscar' , id)

              console.log( error );
          }
          //
      }

  }, // methods

  mounted() {
    //
    this.redirects()
    //
  }, //mounted()
}; //
</script>
