<template>
    <div>
        <h4>Requisitos funcionais:</h4>
        <ul>
            <li class="text-success">
                O usuário deverá ser capaz de criar um novo “link de
                redirecionamento” podendo escolher seu nome e para o mesmo será
                gerado um “link de entrada” (Ex: “redirect.gdigital.com.br/abc123”). O mesmo poderá adicionar N
                links de saída, sendo que que para cada link de saída o mesmo
                deve configurar uma quantidade maxima de redirecionamento (Ex:
                “google.com.br”, 100; “facebook.com”, 200; “whatsapp.com”, 100)
                e o mesmo também deverá cadastrar um link default (Ex:
                “evernote.com”) e opcionalmente uma data limite de funcionamento
                do link.
            </li>
            <li>
                O sistema deverá redirecionar cada acesso no “link de entrada”
                para o primeiro “link de saída" que ainda não teve seu limite
                atingido e incrementar seu contador.
            </li>
            <li>
                Assim que todos os “links de saída” já tiverem sido esgotados todo acesso será redirecionado para o “link default ”.
            </li>
            <li>
                O usuário poderá editar o nome dos links e a quantidade máxima
                de redirecionamento de cada link após sua criação, podendo
                também adicionar novos “links de saída” na sua edição.
            </li>
            <li>
                Caso a data limite tenha sido configurado e a mesma tenha sido
                atingida o sistema deverá redirecionar para o link default mesmo
                que os “links de saída” ainda não tenham sido esgotados
            </li>
            <li>
                O usuário poderá desativar o “link de redirecionamento” fazendo
                com que o mesmo passe a redirecionar para o link default.
            </li>
        </ul>
    </div>
</template>
<script>
export default {
    name: "Funcionais",
    props: {

    },
    components: {

    },
    computed: {

    },
    methods: {

    },
    mounted(){

    }
}
</script>

