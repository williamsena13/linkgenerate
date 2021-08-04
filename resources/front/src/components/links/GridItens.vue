<template>
    <div class="pos">
        <table class="table" id="table_url">
            <tbody id="itens_url">
            </tbody>
            <tfoot>
                <tr>
                    <th scope="row"></th>
                    <td width="60%">
                        <input type="text" @change="button()" class="form-control" id="edit_url" placeholder="Insira a URL original">
                    </td>
                    <td></td>
                    <td  width="50%">
                        <input type="number" class="form-control" id="edit_clicks" placeholder="Qtd cliques">
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

                try {
                    //
                    var td = document.createElement("td");
                    var nr_itens =  document.getElementById('itens_url').childElementCount + 1;
                    var td_value = document.createTextNode( "0" + nr_itens);
                    td.appendChild(td_value);

                    console.log( "aqui", td )


                    tr.appendChild(td);
                    //
                } catch (error) {
                    console.log('Erro ao atribuir Nº de Itens', error)
                }


                try {
                    //
                    let td = document.createElement("td");
                    let url = document.getElementById('edit_url').value;
                    let td_value = document.createTextNode(url);
                    //
                    td.appendChild(td_value);
                    tr.appendChild(td);
                    //
                } catch (error) {
                    console.log('Erro ao atribuir URL', error)
                }

                try {
                    //
                    let td = document.createElement("td");
                    let td_value = document.createTextNode(" ");

                    td.appendChild(td_value);
                    tr.appendChild(td);
                    //
                } catch (error) {
                    console.log('Erro ao atribuir Nº de Itens', error)
                }

                try {
                    let td = document.createElement("td");
                    let count = document.getElementById('edit_clicks').value;
                    let td_value = document.createTextNode(count) ?? 0;

                    td.appendChild(td_value);
                    tr.appendChild(td);


                } catch (error) {
                    console.log('Erro ao atribuir Count', error)
                }

                console.log( tr )

                table.appendChild( tr )

                //td = document.createElement("td")
                //td_value = document.createTextNode(quantidade);
                //td.appendChild(td_value);                              // Append the text to <li>
                //tr.appendChild(td);

                document.getElementById('edit_url').value = '';
                document.getElementById('edit_clicks').value = '';
                document.getElementById('btn_add_url').disabled = true;


                //parent.insertBefore(txt, parent.lastChild);

            },// addLink()
            button(){
                try {
                    console.log( 'Aqui' , document.getElementById('edit_url').value, (document.getElementById('edit_url').value.length > 0) )
                    document.getElementById('btn_add_url').disabled = (document.getElementById('edit_url').value.length < 1)
                } catch (error) {
                    console.log('erro ao validar botão', error)
                }
            }
        }
    }
</script>
