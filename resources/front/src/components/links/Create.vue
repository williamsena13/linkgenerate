<template>
  <div class="row">
      <form >
    <div class="card">
        <div class="card-header bg-dark text-white">
            <h5>Criação de Link</h5>
        </div>
        <div class="card-body">
            <strong>Título do Link</strong>
            <input type="text" class="form-control" placeholder="Link de Entrada" id="edit_input_link" disabled>
            <br>

            <strong>Título do Link</strong>
            <input type="text" class="form-control" placeholder="Digite um Link">
            <br>
            <div class="form-group">
                <h5 class="text-primary">URL original</h5>
                <p>Você poderá inserir uma ou várias URL's, faça como desejar. Lembre-se de inserir a quantidade de cliques junto à URL.</p>
                <grid-itens></grid-itens>
            </div>
            <br>
            <h5 class="text-primary">URL original</h5>
            <p>Você poderá inserir uma ou várias URL's, faça como desejar. Lembre-se de inserir a quantidade de cliques junto à URL.</p>
            <input type="url" class="form-control" id="exampleInputPassword1" placeholder="Insira a URL Default">
        </div>
        <div class="card-footer">
            <a href="/links" class="btn btn-default"><i class="fa fa-arrow-left"></i> Voltar</a>
            <button class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Salvar Link</button>
        </div>
    </div>
</form>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "LinksCreate",
  propos: {
    link: [],
    validation: [],
  },
  methods: {
    //*************************************************************
    LinkStore() {
      axios
        .post("http://localhost:8000/links", this.link)
        .then((response) => {
          this.$router.push({
            name: "links",
          });
          console.log(response.data.data);
        })
        .catch((error) => {
          this.validation = error.response.data.data;
        });
    },
    //*************************************************************
    async postUserAjax() {
      //
      //var id = 1;
      //var uri = "http://localhost:8000/links";

      this.$http
        .get("http://cep.infinitysoft.com.br/cep/86801270" )
        .then((req) => (this.cep = req.cep));
    },
    //*************************************************************
    addLink(){
        console.log( document.getElementById('edit_url').value );
        console.log( document.getElementById('edit_clicks').value );
    },
    generate(){
        document.getElementById('edit_input_link').value = "https://www.meudominio.com/" +  Math.random().toString(30)
    }

  },
  mounted() {
      this.generate();
  },
};
</script>
