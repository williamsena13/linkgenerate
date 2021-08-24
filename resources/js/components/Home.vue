<style>
.text-gray-500 {
  color: #a0aec0;
}
</style>

<template>
    <div>
        <div class="row justify-content-md-center">
            <div class="col-2 col-lg-2"></div>
                <div class="col-md-auto">
                    <vc-requisitos-tecnicos></vc-requisitos-tecnicos>
                    <hr>
                    <vc-requisitos-funcionais></vc-requisitos-funcionais>
                </div>
                <div class="col-2 col-lg-2"></div>
            </div>
        </div>
    </div>
</template>


<script>
export default {
  name: "Index",

  props: {
    links: [],
    title: String,
    subtitle: String,
    user: Object,
  },
  components: {},
  computed: {
    getTitle() {
      return this.title;
    },
    getSubTitle() {
      return this.subtitle;
    },
  },
  mounted() {
    console.log(this.user.name);
  }, //mounted()

  methods: {}, // methods
}; //
</script>
