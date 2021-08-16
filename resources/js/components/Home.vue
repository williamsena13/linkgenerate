<style>
    .text-gray-500 { color: #a0aec0; }
</style>

<template>

    <div class="bd-example bd-example-tabs">
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item">
                <a class="nav-link active show" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Home</a>
            </li>
            <li class="nav-item">
                <vc-modal-redirections></vc-modal-redirections>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Desenvolvedor</a>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane active show fade" id="home" role="tabpanel" aria-labelledby="home-tab">
                <div class="card">
            <div class="card-header">
                <h3>Bem vindo <small><strong>{{ user.name }}</strong></small></h3>
            </div>

            <div class="card-body">
                <h4>Requisitos Tecnicos:</h4>
                <ul>
                    <li class="text-info">Backend utilizando o framework Laravel ^7.0</li>
                    <li style="text-decoration: line-through;" class="text-danger">Backend utilizando o framework Lumen ^7.0.</li>
                    <li class="text-success">Frontend utilizando o framework Vue.js ^2.6</li>
                    <li class="text-success">Utilizar como banco de dados MySQL ^8.0</li>
                    <li class="text-success">Realizar o versionamento do projeto utilizando Git.</li>
                    <li class="text-success">Tentar seguir ao máximo o protótipo fornecido no final deste documento</li>

                </ul>

                <h4>Requisitos funcionais:</h4>
                <ul>
                    <li>O usuário deverá ser capaz de criar um novo “link de redirecionamento” podendo escolher seu nome e para o mesmo será gerado um “link de entrada” (Ex: “redirect.gdigital.com.br/abc123”). O mesmo poderá adicionar N links de saída, sendo que que para cada link de saída o mesmo deve configurar uma quantidade maxima de redirecionamento (Ex: “google.com.br”, 100; “facebook.com”, 200; “whatsapp.com”, 100) e o mesmo também deverá cadastrar um link default  (Ex: “evernote.com”) e opcionalmente uma data limite de funcionamento do link.</li>
                    <li>O sistema deverá redirecionar cada acesso no “link de entrada” para o primeiro “link de saída" que ainda não teve seu limite atingido e incrementar seu contador.</li>
                    <li>Assim que todos os “links de saída” já tiverem sido esgotados todo acesso será redirecionado para o “link default ”.</li>
                    <li>O usuário poderá editar o nome dos links e a quantidade máxima de redirecionamento de cada link após sua criação, podendo também adicionar novos “links de saída” na sua edição.</li>
                    <li>Caso a data limite tenha sido configurado e a mesma tenha sido atingida o sistema deverá redirecionar para o link default  mesmo que os “links de saída” ainda não tenham sido esgotados</li>
                    <li>O usuário poderá desativar o “link de redirecionamento” fazendo com que o mesmo passe a redirecionar para o link default.</li>
                </ul>
            </div>
        </div>
            </div>
            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                <div class="card">

                </div>
            </div>
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <vc-contato></vc-contato>

            </div>
        </div>



    </div>

</template>


<script>

    export default {
        name: "Index",

      props: {
        links: [],
        title : String,
        subtitle : String,
        user : Object
      },
      components:{
      },
      computed : {
          getTitle(){
              return this.title;
          },
          getSubTitle(){
              return this.subtitle;
          },

      },
      mounted() {
          console.log(this.user.name);

      },//mounted()

      methods: {

      }// methods
    }//
</script>
