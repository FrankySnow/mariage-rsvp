<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Réponses ♥ 24.06.2017</title>
        <meta name="robots" content="noindex, nofollow, noarchive">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/knacss.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="main">
            <div class="container" id="root">
                <h1 class="titre"><img src="img/titre.png"></h1>
                <div class="txtcenter"><button class="action bouton-envoyer" v-on:click="fetch()">Fetch !</button></div>
                <p class="action encadre" v-for="reponse in reponses" v-text="reponse"></p>
            </div>
        </div>

        <script src="js/es6-promise.auto.js"></script>
        <script src="https://unpkg.com/vue/dist/vue.js"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <script>
            var app = new Vue({
                el: '#root',

                data: {
                    reponses: []
                },

                methods: {
                    success (response) {
                        this.reponses = response.data.data
                    },

                    failure (response) {
                        alert(response)
                    },
                },

                created () {
                    axios.get('/api/reponses')
                        .then(this.success)
                        .catch(this.failure)
                },
            });
        </script>
    </body>
</html>
