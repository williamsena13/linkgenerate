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
                    <tbody v-for="redirec in this.getRedirects">
                        <tr>
                            <td width="70%">
                                <h5><a @click="editRedirect( redirec.id )" data-toggle="collapse" data-target="#collapseExample" >{{ redirec.title }}&nbsp;<small>{{ redirec.create_at }}</small></a></h5>
                                <p>{{ redirec.redirect_url }}</p>
                            </td>
                            <td width="30%">
                                <hr>
                                <h5>
                                    {{ redirec.count_clicks }} / {{ redirec.limit_clicks }}
                                </h5>
                             </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="card col-md-5">

                <button type="button" align="right" class="btn btn-outline-dark" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                    Criar Link
                </button>

                <hr>

                <div class="card visually-hidden" id="card-hidden">

                    <div class="card-body">
                        <vc-create-redirections></vc-create-redirections>
                    </div>
                </div>






            </div>


            <div class="offcanvas offcanvas-end" tabindex="2" id="offcanvasRight">
                <div class="offcanvas-header bg-dark text-white">
                    <h5>Criação de Link</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <vc-create-redirections></vc-create-redirections>
                </div>
            </div>

      </div>
  </div>
</template>


<script>
import axios from "axios";

import LinksCreate from './Create.vue';
export default {
  name: "RedirectsIndex",
  props: {
      redirects : []
  },
  components: {
  },
  computed: {
      getRedirects(){
          return this.redirects;
      },

  },
  methods: {
      setRedirects( value ){
          this.redirects = value;
      },
      redirects(){
        let url = '/redirections' //'http://localhost:8000/redirections'
        axios.get(url)
            .then( response => {
                try {
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

      editRedirect( id ){
          console.log('Edit do Redirect')
          console.log('Parâmetro ID: ' + id )
          //
          try {
            let url = "/redirections/"+id+"/edit";//"http://localhost:8000/redirections/"+id+"/edit";

            document.getElementById('card-hidden').className = "card visually-hidden";
            axios.get(url)
                .then( response => {
                    try {
                        document.getElementById('card-hidden').className = "card";
                        console.log( 'Sucesso ao Editar' )
                        console.log( response );
                        let object = response.data;
                        LinksCreate.methods.populace( object.redirect_url, object.title, object.default_url, object.itens)
                    } catch (error) {
                        console.log( "Erro ao atriburi linsk", error)
                        document.getElementById('card-hidden').className = "card visually-hidden";
                    }

                })
                .catch( error => {
                    console.log("Error", error)
                    document.getElementById('card-hidden').className = "card visually-hidden";
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
