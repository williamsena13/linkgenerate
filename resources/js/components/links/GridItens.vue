<template>
    <div class="pos">
        <table class="table" id="table_url">
            <tbody id="itens_url">

            </tbody>
            <tfoot>
                <tr>
                    <th class="col-1" scope="row">
                        Nº
                    </th>
                    <td class="col-6">
                        <input type="text" @change="button()" class="form-control" id="url_input" placeholder="Insira a URL original">
                    </td>


                    <td class="col-4">
                        <input type="number" min="0" class="form-control" id="clicks" placeholder="Qtd cliques">
                    </td>
                    <td class="col-1">
                        .
                    </td>
                </tr>
            </tfoot>
        </table>
        <small>Expira em</small>
        <input type="date" min="0" class="form-control" id="expires" placeholder="Expira em">
        <hr>

        <button type="button" class="btn btn-outline-primary" id="btn_add_url" @click="postLink()" disabled><i class="fa fa-plus"></i> Adicionar mais URL</button>
    </div>
</template>

<script>
import Axios from 'axios';
    export default {
        methods: {
            //***************************************************
            addLink() {
                //***********************************************

                var table = document.getElementById('itens_url');
                //
                var tr = document.createElement("tr");
                //
                let nr_itens =  Number(document.getElementById('itens_url').childElementCount + 1);
                let url_input = document.getElementById('url_input').value;
                let count = document.getElementById('clicks').value.slice(-3);



                //
                if ( nr_itens < 10 ) {
                    nr_itens = "00" + nr_itens
                }else
                if ( nr_itens < 100 ) {
                    nr_itens = "0" + nr_itens
                }

                let td_value = document.createTextNode(nr_itens );
                let th = document.createElement("th");
                th.scope = "row";
                th.className = "col-1"
                th.appendChild(td_value);
                tr.appendChild(th);
                //console.log( "aqui", td )

                let td = document.createElement("td");

                td_value = document.createTextNode(url_input);
                td.appendChild(td_value);
                tr.appendChild(td);

                /*
                td = document.createElement("td");
                var sdate = " ";
                if (document.getElementById('limit_date').value.length > 0  ){
                    sdate = document.getElementById('limit_date').value;
                }
                td_value = document.createTextNode( new Date(sdate).toLocaleDateString("pt-br") );
                td.appendChild(td_value);
                tr.appendChild(td);
                */

                td = document.createElement("td");
                td.className = "col-3"

                if ( count < 10 ) {
                    count = "00" + count
                }else
                if ( count < 100 ) {
                    count = "0" + count
                }

                td_value = document.createTextNode(count);
                td.appendChild(td_value);
                tr.appendChild(td);


                //


                try {
                    //
                    let td = document.createElement("td");
                    td.className = "col-1"
                    let div = document.createElement( 'div' )
                    div.className="btn-group me-2";
                    div.role="group";



                    let button = document.createElement("button" );
                    button.type = "button"
                    button.className = "btn btn-outline-secondary"
                    let i = document.createElement("i" );
                    i.className = 'fa fa-edit'
                    button.appendChild( i )
                    div.appendChild(button);


                    let button1 = document.createElement("button" );
                    button1.type = "button"
                    button1.className = "btn btn-outline-danger"
                    let i1 = document.createElement("i" );
                    i1.className = 'fa fa-trash'
                    button1.appendChild( i1 )
                    div.appendChild(button1);



                    //let td_value = document.createTextNode();
                    td.appendChild( div )
                    tr.appendChild(td);
                    //
                } catch (error) {
                    console.log('Erro ao atribuir Nº de Itens', error)
                }


                table.appendChild( tr )

                //td = document.createElement("td")
                //td_value = document.createTextNode(quantidade);
                //td.appendChild(td_value);                              // Append the text to <li>
                //tr.appendChild(td);

                document.getElementById('url_input').value = '';
                document.getElementById('clicks').value = '';
                document.getElementById('expires').value = '';
                document.getElementById('btn_add_url').disabled = true;


                //parent.insertBefore(txt, parent.lastChild);

            },// addLink()
            //***************************************************
            postLink(){
                //***********************************************

                //let link =
                let input_url = document.getElementById('url_input').value;
                let count = document.getElementById('clicks').value.slice(-3);
                let redirect_url = document.getElementById('redirect_url').value;
                let expires = document.getElementById('expires').value;

                let link = {
                    'url' : redirect_url,
                    'input_url' : input_url,
                    'limit_clicks' : count,
                    'expires' : expires
                }
                console.log( "VOu gerar o OBjeto" );
                console.log( link )

                Axios.post("http://localhost:8000/links", link)
                        .then((response) => {
                            console.log("SALVO COM SUCESSO SAPORRA");
                            console.log(response)

                            try {
                                this.addLink();
                            } catch (error) {
                                console("ERRO AO PRENCHER A GRID", error);
                            }

                            console.log(response.data);
                            console.log(response.data.data);
                        })
                        .catch((error) => {
                            //this.validation = error.response.data.data;z
                            console.log( "ERRO AO POSTAR", error )
                        });

            },// postLink

            button(){
                try {
                    console.log( "BUTTON()" )
                    document.getElementById('btn_add_url').disabled = (document.getElementById('url_input').value.length < 1)
                } catch (error) {
                    console.log('erro ao validar botão', error)
                }
            }
        }
    }
</script>
