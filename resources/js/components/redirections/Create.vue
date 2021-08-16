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


    //*************************************************************
    storeRedirects(){

        if( document.getElementById('itens_url').value < 1 ){
            alert("Adicione algum link de redirecionamento!");
            document.getElementById('itens_url').select();
            document.getElementById('itens_url').focus();
            return false
        }// if

        if( document.getElementById('default_url').value < 1 ){
            alert("Adicione algum link de redirecionamento!");
            document.getElementById('default_url').select();
            document.getElementById('default_url').focus();
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

        let obj = {
            title : title,
            redirect_url : redirect_url,
            default_url : default_url
        }
        console.log( 'vou postar o objeto')
        console.log( obj )

        Axios.post("http://localhost:8000/redirections", obj)

        .then((response) => {
            console.log( 'Sucesso do post do redirections')
            console.log(response )
            console.log(response.data )
            console.log(response.data.msg )
            console.log(response.data.request_all)

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
