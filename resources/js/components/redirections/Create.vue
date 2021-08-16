<template>
  <div>
      <form>
        <div class="card">
            <div class="card-header bg-dark text-white">
                <br>
                <h5>Criação de Link</h5>
                <hr>
            </div>
            <div class="card-body">
                <strong>Link de Entrada</strong>
                <input type="text" class="form-control" placeholder="Link de Entrada" id="redirect_url" disabled>
                <br>

                <strong>Título do Link</strong>
                <input type="text" class="form-control" id="title" name="title" placeholder="Digite um Link">
                <br>
                <div class="form-group">
                    <h5 class="text-primary">URL original</h5>
                    <p class="text-gray">Você poderá inserir uma ou várias URL's, faça como desejar. Lembre-se de inserir a quantidade de cliques junto à URL.</p>
                    <vc-index-links></vc-index-links>
                </div>
                <hr>
                <h5 class="text-primary">URL Default</h5>
                <p class="text-gray">Essa URL será associada ao redirecionamento apenas quando todas as outrsa chegarem ao limite de cliques. Ela será a uma url fix sem limitações.</p>
                <input type="url" class="form-control" id="url_default" placeholder="Insira a URL Default">
            </div>
            <div class="card-footer">
                <button type="button" class="btn btn-primary btn-block pull-right" @click="storeRedirects()">
                    <i class="fa fa-plus"></i> Salvar Redirecionamento
                </button>
            </div>
        </div>
    </form>
  </div>
</template>


<script>
import Axios from 'axios';
import LinksIndex from '../links/Index.vue';

export default {
  name: "RedirectionsCreate",
  propos: {
    link: [],
  },
  methods: {
    //*************************************************************
    generateUrl(){
        try {
            var getUrl = window.location;
            var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" //+ getUrl.pathname.split('/')[1];
            document.getElementById('redirect_url').value = baseUrl + Math.random().toString(16).substring(4)
        } catch (error) {
            console.log("Erro no Generate", error)
        }
    },

    populace( sRedirect_url, sTitle, sDefault_url, nStatus, itens ){
        console.log( "Vou popular" )
        try {
            console.log('Parâmetros', sRedirect_url, sTitle, sDefault_url, nStatus )
            document.getElementById('redirect_url').value = sRedirect_url
            document.getElementById('title').value = sTitle
            document.getElementById('url_default').value = sDefault_url

            console.log( "os links", itens )

            if ( itens ){
                itens.forEach( item => {
                    console.log( "Item", item)
                    LinksIndex.methods.addLink(  
                        item.input_url,
                        item.limit_clicks,
                        item.expires
                    )
                });
            } else {
               console.log( 'não tem links' ) 
            }
            //document.getElementById('').value = 
        } catch (error) {
            console.log("Erro ao popular Redirections", error)
        }
    },


    //*************************************************************
    storeRedirects(){

        if( document.getElementById('itens_url').value < 1 ){
            alert("Adicione algum link de redirecionamento!");
            document.getElementById('itens_url').select();
            document.getElementById('itens_url').focus();
            return false
        }// if

        if( document.getElementById('url_default').value < 1 ){
            document.getElementById('url_default').select();
            document.getElementById('url_default').focus();
            alert("Adicione o link de padrão!");
            return false
        }


        var title = document.getElementById('title').value;

        if ( title.length < 1 ) {
            alert('Favor inserir um titulo');
            document.getElementById('title').focus()
            document.getElementById('title').select();
            return false;
        }

        var redirect_url = document.getElementById('redirect_url').value;

        var default_url = document.getElementById('url_default').value;
        console.log( url_default );

        let obj = {
            title : title,
            redirect_url : redirect_url,
            default_url : default_url
        }
        console.log( 'vou postar o objeto')
        console.log( obj )
        let url = "/redirections";
        Axios.post(url, obj)

        .then((response) => {
            alert('Link de Redirecionamento gerado com Sucesso!');
            
            console.log(response )
            console.log(response.data )
            console.log(response.data.msg )

        })
        .catch((error) => {
            console.log("ERRO AO POSTAR", error)
          this.validation = error.response.data.data;
        });





    },


  },
  mounted() {
      this.generateUrl();
  },
};
</script>
