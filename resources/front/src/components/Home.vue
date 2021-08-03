<style>
    .text-gray-500 { color: #a0aec0; }
</style>

<template>

    <div class="links">
        <div class="row">


        </div>
        <div class="container mt-4">
                <div class="card">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-9">
                                <h3 class="card-title">{{ getTitle }}<i class="fa fa-globe"></i></h3>
                            </div>
                        </div>
                        <h6 class="text-gray-500"><small class="text-gray-500">{{ getSubTitle }}</small></h6>
                        <hr>
                        <ul class="nav justify-content-center">
                            <li class="nav-item">
                                <a class="nav-link" href="/links">Links</a>
                            </li>
                        </ul>

                    </div>
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
        subtitle : String
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
          this.title = 'Bem vindo!'
          this.subtitle = 'Crie seus links de redirecionamento em poucos passos'
      },//mounted()

      methods: {

      }// methods
    }//
</script>
