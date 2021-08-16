<template>
    <div class="links">
        <table class="table table-responsive" id="table_url">
            <tbody id="itens_url">

            </tbody>
            <tfoot>
                <tr>
                    <th class="col-1" scope="row">
                        Nº
                    </th>
                    <td class="col-6">
                        URL de redirecionamento
                    </td>
                    <td class="col-4">
                        Nº Clicks
                    </td>
                    <td class="col-1"></td>
                </tr>
            </tfoot>
        </table>
        <vc-create-links></vc-create-links>



    </div>
</template>

<script>

    export default {
        name: "LinksItens",
        props: {},
        components: {},
        computed: {},
        propos: {
            link : []
        },
        methods: {

            //***************************************************
            addLink(
                url_input,
                count,
                extpired
             ) {
                //***********************************************

                var table = document.getElementById('itens_url');
                //
                var tr = document.createElement("tr");
                // Conta Nº de Itens
                let nr_itens =  Number(document.getElementById('itens_url').childElementCount + 1);
                //

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



        },
        mounted() {}, //mounted()
    }
</script>
