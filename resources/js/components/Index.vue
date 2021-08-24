<template>
    <div>
        <div class="d-flex bd-highlight">
            <vc-navbar></vc-navbar>
            <div class="container">
                </br>
                <vc-home></vc-home>
                </br>
            </div>

            <div class="modal fade" id="modal"  role="dialog">
                <div class="modal-dialog modal-xl">

                <div class="modal-content">
                    <div class="modal-header">

                        <h2 class="modal-title">
                            Links de Redirecionamento<br>
                        </h2>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <small class="text-gray-500">Crie seus links de redirecionamento em poucos passos</small>
                        <vc-index-redirections></vc-index-redirections>
                    </div>
                </div>
                </div>
            </div>
            </div>
    </div>
</template>
<script>
export default {
    name: "Index",
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
