<style>
.text-gray-500 {
  color: #a0aec0;
}
</style>

<template>
  <div class="links">
    <div class="row">
        <!-- -->

        <!-- -->
    </div>



    <div class="row">

        <div class="col-md-6">
<div class="container mt-4">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-sm-9">
              <h3 class="card-title">
                {{ getTitle }}<i class="fa fa-globe"></i>
              </h3>
              <p class="text-gray-500">
                <small class="text-gray-500">{{ getSubTitle }}</small>
              </p>
            </div>

            <div class="col-sm-3">
                <button class="btn btn-outline-primary btn-block" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    Criar um Link
                </button>
            </div>
          </div>

          <hr />

          <div class="row">
            <div class="col-6">
              <div class="row">
                <div class="col-8">
                  <h5 class="text-blue">Aqui</h5>
                </div>
                <div class="col-4">
                  <small>Click em tempo real</small>
                </div>
              </div>
              <hr />
              <div class="row">
                <div
                  class="card"
                  style="width: 18rem"
                  v-for="link in links"
                  :key="link.id"
                >
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
                    <p class="card-text">
                      Some quick example text to build on the card title and
                      make up the bulk of the card's content.
                    </p>
                    <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Another link</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-6">
              <h4>04 Links</h4>
            </div>
          </div>
        </div>
        <div class="card-footer">
          <a href="/" class="btn btn-md btn-outline-dark mr-2">voltar</a>
        </div>
      </div>
    </div>
    <div class="container mt-5">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">Links</div>
            <div class="card-body">
              <hr />

              <div class="table-responsive mt-2">
                <table class="table table-hover table-bordered">
                  <thead>
                    <tr>
                      <th>Link</th>
                      <th>Default</th>
                      <th>Clicks</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="link in links" :key="link.id">
                      <td>{{ link.title }}</td>
                      <td>{{ link.url }}</td>
                      <td class="text-center">
                        <router-link
                          :to="{ name: 'edit', params: { id: link.id } }"
                          class="btn btn-sm btn-primary mr-2"
                          >EDIT</router-link
                        >
                        <button
                          @click.prevent="linkDelete(link.id)"
                          class="btn btn-sm btn-danger"
                        >
                          HAPUS
                        </button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

        </div>

        <div class="col-md-6">
            <div class="collapse" id="collapseExample">
                <card-create></card-create>
            </div>
        </div>
    </div>
  </div>
</template>


<script>
import axios from "axios";

export default {
  name: "LinksIndex",

  props: {
    links: [],
    title: String,
    subtitle: String,
  },

  components: {},
  methods: {
    //**********************************************************************
    created() {
      //******************************************************************
      try {
        axios.get("http://localhost:8000/links").then((response) => {
          this.links = response.data;
        });
      } catch (error) {
        console.log("Erro ao buscar Links", error);
      }
    },
    //**********************************************************************
    setLinks(data) {
      //******************************************************************
      this.link = data;
    },
    //**********************************************************************
    async getLinks() {
      //******************************************************************

      console.log("getLinks()");


      try {
        console.log('VOU FAZER O GET')
        axios.get("http://localhost:8000/links").then((response) => {
            alert("Estou no sucesso do link");
            console.log(response);
          })
          .catch((error) => {
            alert("Estou no catch do link");
            console.log(error);
          });
      } catch (err) {
        console.log(">> ERRO AO BUSCAR LINK << ", err);
      }

      /*
                axios.get('http://localhost:8000/links')
                .then(response => {
                    this.links = response.data.data;
                });
                */
    },
    click() {},
  }, // methods
  computed: {
    getTitle() {
      return this.title;
    },
    getSubTitle() {
      return this.subtitle;
    },
  },
  mounted() {
    this.title = "Links de Redirecionamento!";
    this.subtitle = "Crie seus links de redirecionamento em poucos passos";
  }, //mounted()
}; //
</script>
