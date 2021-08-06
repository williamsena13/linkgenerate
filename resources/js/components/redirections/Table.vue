<template>
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
                        </tr>
                      </tbody>
                    </table>
</template>
<script>
import axios from "axios";

export default {
  name: "TableRedirections",

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
    async getRedirections () {
      //******************************************************************

      console.log("getLinks()");

      try {
        console.log("VOU FAZER O GET");
        axios
          .get("http://localhost:8000/links")
          .then((response) => {
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

      axios.get('http://127.0.0.1:8000/redirections')
        .then( data => {
            console.log("ESTOU NO SUCESSO JHOW")
            console.log( data )
        })
        .catch(error => {
            console.log('Estou no erro :(')
            console.log( error )
        });
  }, //mounted()
}; //
</script>
