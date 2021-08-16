<template>
    <div class="edit-links">
        <small>Insira a URL de Redirecionamento</small>
        <input type="text" @change="button()" class="form-control" id="url_input" placeholder="Insira a URL original">
        <hr>
        <div class="row">
            <div class="col-6">
                <small>Nº de Clicks</small>
                <input type="number" min="0" max="9999" class="form-control" id="clicks" placeholder="Nº de Clicks">
            </div>
            <div class="col-6">
                <small>Expira em</small>
                <input type="date" min="0" class="form-control" id="expires" placeholder="Expira em">
            </div>
        </div>

        <hr>
        <button type="button" class="btn btn-outline-primary" id="btn_add_url" @click="post()" disabled>
            <i class="fa fa-plus"></i>
            Adicionar mais URL
        </button>
    </div>
</template>

<script>
    import LinksItens from './Index.vue';
    import Axios from 'axios';
    export default {
        name : "LinksCreate",
        propos : {

        },
        components : {

        },
        methods : {
            button(){
                try {
                    document.getElementById('btn_add_url').disabled = (document.getElementById('url_input').value.length < 1)
                } catch (error) {
                    console.log('erro ao validar botão', error)
                }
            },
            post(){

                const OBJ_THIS = this;
                let input_url = document.getElementById('url_input').value;
                let count = document.getElementById('clicks').value.slice(-3);
                let redirect_url = document.getElementById('redirect_url').value;
                let expires = document.getElementById('expires').value;

                var link = {
                    'url' : redirect_url,
                    'input_url' : input_url,
                    'limit_clicks' : count,
                    'expires' : expires
                }

                console.log( 'Vou postar esse link', link )
                let url = "/links";
                Axios.post(url, link)
                .then((response) => {
                    console.log( 'sucesso nos links', response );
                    
                    if ( response.msg ){
                        console.log("success", response.msg);
                    }
                    console.log(response)

                    try {
                        let url_input = document.getElementById('url_input').value;
                        let count = document.getElementById('clicks').value.slice(-3);
                        let extpired = document.getElementById('expires').value;
                        LinksItens.methods.addLink( url_input, count, extpired );
                        //this.addLink();
                    } catch (error) {
                        console.log("Erro ao popular grid", error);
                    }

                })
                .catch((error) => {
                    //this.validation = error.response.data.data;z
                    console.log( "Erro ao postar Link", error )
                });

                LinksItens.props.postLink( link )
            }
        },
        mounted(){

        }

    }
</script>
