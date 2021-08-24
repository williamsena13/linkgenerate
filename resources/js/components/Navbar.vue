<template>
    <div>
        <div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 4.5rem;">
            <a href="/" class="d-block p-3 link-dark text-decoration-none" title="" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-original-title="Icon-only">
                <span class="visually-hidden">Icon-only</span>
            </a>
            <ul class="nav nav-pills nav-flush flex-column mb-auto text-center">
                <li>
                    <a class="nav-link py-3 border-bottom active" data-bs-toggle="modal" data-bs-target="#modal" href="#">
                        <img class="bi" width="40" height="32" src="img/gift-box.png"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom disabled" >
                        <img class="bi" width="40" height="32" src="img/formatura.png"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom disabled" >
                        <img class="bi" width="40" height="32" src="img/trophy.png"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom disabled" >
                        <img class="bi" width="40" height="32" src="img/user.png"/>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-link py-3 border-bottom disabled" >
                        <img class="bi" width="40" height="32" src="img/chat.png"/>
                    </a>
                </li>
            </ul>
            <div class="dropdown border-top">
                <a href="#" class="d-flex align-items-center justify-content-center p-3 link-dark text-decoration-none dropdown-toggle" id="dropdownUser3" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://avatars.githubusercontent.com/u/17604081?v=4" alt="mdo" width="24" height="24" class="rounded-circle">
                </a>
                <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser3">
                    <li>
                        <a class="dropdown-item" href="https://github.com/williamsena13">Github</a>
                    </li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="https://www.linkedin.com/in/william-basseto-sena-b38556b3/">LinkedIn</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: "Navbar",
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

