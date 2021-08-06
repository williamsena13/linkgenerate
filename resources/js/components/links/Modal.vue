<style>
    .modal-lg { max-width: 95%; }
    .text-gray-500 {
  color: #a0aec0;
}
</style>

<template>
    <div>
        <button type="button" class="nav-link" data-toggle="modal" data-target=".bd-example-modal-lg">Criar Link</button>

        <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header d-flex">
                        <h5 class="modal-title h4" id="myLargeModalLabel">
                            Links de Redirecionamento!</br>
                            <small class="text-gray-500">Crie seus links de redirecionamento em poucos passos</small>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <vc-index-redirections></vc-index-redirections>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from "axios";

export default {
  name: "ModalItens",
  props: {},
  components: {},
  methods: {}, // methods
  computed: {},
  mounted() {}, //mounted()
}; //
</script>
