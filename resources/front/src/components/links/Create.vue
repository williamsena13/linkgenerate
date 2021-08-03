<template>
    <div class="links">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            Criar Link
                        </div>
                        <form @submit.prevent="LinkStore">
                            <div class="card-body">

                                <div class="form-group">
                                    <label>TITULO</label>
                                    <input type="text" class="form-control" v-model="link.title"
                                           placeholder="Masukkan Title">
                                    <div v-if="validation.title">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.title[0] }}
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>URL</label>
                                    <input type="text" class="form-control" v-model="link.url"
                                           placeholder="Digite URL">
                                    <div v-if="validation.url">
                                        <div class="alert alert-danger mt-1" role="alert">
                                            {{ validation.url[0] }}
                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-md btn-success mr-2">Salvar</button>
                                <button type="reset" class="btn btn-md btn-danger">Reset</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
    import axios from 'axios'

    export default {
        name : "LinksCreate",
        propos : {
            link : [],
            validation : []
        },
        methods: {
            //*************************************************************
            LinkStore() {
                axios.post('http://localhost:8000/links', this.link)
                    .then((response) => {
                        this.$router.push({
                            name: 'links'
                        });
                        console.log(response.data.data);
                    }).catch(error => {
                    this.validation = error.response.data.data;
                });
            },
            //*************************************************************
            async postUserAjax() {
                //
                //var id = 1;
                //var uri = "http://localhost:8000/links";

                this.$http.get('http://cep.infinitysoft.com.br/cep/86801270').then((req) => this.cep = req.cep)

            }
        },
        mounted(){

        }
    }
</script>
