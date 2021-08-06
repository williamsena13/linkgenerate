<template>
    <div class="pos">
        <table class="table" id="table_url">
            <tbody id="itens_url">

            </tbody>
            <tfoot>
                <tr>
                    <th scope="row"></th>
                    <td width="60%">
                        <input type="text" @change="button()" class="form-control" id="url" placeholder="Insira a URL original">
                    </td>

                    <td>
                        <input type="date" class="form-control" id="limit_date" placeholder="data_limite">
                    </td>
                    <td width="20%">
                        <input type="number" min="0" class="form-control" id="clicks" placeholder="Qtd cliques">
                    </td>
                    <td width="10%">
                    </td>
                </tr>
            </tfoot>
        </table>
        <button type="button" class="btn btn-outline-primary" id="btn_add_url" @click="addLink()" disabled><i class="fa fa-plus"></i> Adicionar mais URL</button>
    </div>
</template>

<script>
    export default {
        methods: {
            //***************************************************
            addLink() {
                //***********************************************

                var table = document.getElementById('itens_url');
                console.log( table )


                var tr = document.createElement("tr");

                //
                let nr_itens =  Number(document.getElementById('itens_url').childElementCount + 1);
                if ( nr_itens < 10 ) {
                    nr_itens = "00" + nr_itens
                }else
                if ( nr_itens < 100 ) {
                    nr_itens = "0" + nr_itens
                }

                let td_value = document.createTextNode(nr_itens );
                let th = document.createElement("th");
                th.scope = "row";
                th.appendChild(td_value);
                tr.appendChild(th);
                //console.log( "aqui", td )

                let td = document.createElement("td");
                let url = document.getElementById('url').value;
                td_value = document.createTextNode(url);
                td.appendChild(td_value);
                tr.appendChild(td);


                td = document.createElement("td");
                var sdate = " ";
                if (document.getElementById('limit_date').value.length > 0  ){
                    sdate = document.getElementById('limit_date').value;
                }
                td_value = document.createTextNode( new Date(sdate).toLocaleDateString("pt-br") );
                td.appendChild(td_value);
                tr.appendChild(td);

                 td = document.createElement("td");
                let count = 0;
                if (document.getElementById('clicks').value.length > 0  ){
                    count = document.getElementById('clicks').value.slice(-3);
                    if ( count < 10 ) {
                        count = "00" + count
                    }else
                    if ( count < 100 ) {
                        count = "0" + count
                    }
                }
                td_value = document.createTextNode(count);
                td.appendChild(td_value);
                tr.appendChild(td);


                //


                try {
                    //
                    let td = document.createElement("td");

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

                console.log( tr )

                table.appendChild( tr )

                //td = document.createElement("td")
                //td_value = document.createTextNode(quantidade);
                //td.appendChild(td_value);                              // Append the text to <li>
                //tr.appendChild(td);

                document.getElementById('url').value = '';
                document.getElementById('clicks').value = '';
                document.getElementById('btn_add_url').disabled = true;


                //parent.insertBefore(txt, parent.lastChild);

            },// addLink()
            button(){
                try {
                    console.log( 'Aqui' , document.getElementById('url').value, (document.getElementById('url').value.length > 0) )
                    document.getElementById('btn_add_url').disabled = (document.getElementById('url').value.length < 1)
                } catch (error) {
                    console.log('erro ao validar botão', error)
                }
            }
        }
    }
</script>
