<!doctype html>
<html class="no-js" lang="">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Alex & Flo ♥ 24.06.2017</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <link rel="stylesheet" href="css/normalize.min.css">
        <link rel="stylesheet" href="css/knacss.css">
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <div class="main">
        	<div class="container" id="root">
                <div class="lang">
                    <a href="/fr" title="En français"><img src="img/fr.png"></a><!--
                    --><a href="/it" title="In italiano"><img src="img/it.png"></a>
                </div>
        		<h1 class="titre"><img src="img/titre.png"></h1>
        		<!-- <div class="photo">
        			<img src="img/DSC_0349.JPG">
    			</div> -->
    			<h2>@lang('Nous répondre')</h2>
    			<p>@lang('Nous aimerions beaucoup vous compter parmi nous ! Merci de nous répondre avant le 20 avril en utilisant le formulaire ci-dessous.')</p>
    			<form id="formulaire" class="formulaire txtleft" action="" v-on:submit.prevent="onSubmit">
    				<input type="text"  class="one-quarter" name="prenom" placeholder="@lang('Prénom')" v-model="prenom">
    				<input type="text"  class="one-quarter" name="nom" placeholder="@lang('Nom')" v-model="nom">
    				<input type="text"  class="one-quarter" name="email" placeholder="@lang('Courriel')" v-model="email">
    				<input type="text"  class="three-quarters" name="remarque" v-model="remarque" placeholder="@lang('Remarques (allergique, végétarien, etc.)')">
    				<label class=""><input type="radio" name="presence_id" v-model="presence" value="1">@lang("Je serai là jusqu'au bout de la nuit !")</label>
    				<label class=""><input type="radio" name="presence_id" v-model="presence" value="2">@lang("Malheureusement, je ne pourrai venir qu'au cocktail")</label>
    				<label class=""><input type="radio" name="presence_id" v-model="presence" value="3">@lang("Désolé, mais je ne pourrai pas venir du tout")</label>
	    			<label class="" v-if="present"><input type="checkbox" name="conjoint" v-model="conjoint">@lang("Je serai accompagné de mon/ma conjoint/e")</label>
    				<div v-if="conjoint && present">
	    				<input class="" type="text" name="prenom_conjoint" v-model="prenom_conjoint" placeholder="@lang("Son prénom")">
	    				<input class="" type="text" name="nom_conjoint" v-model="nom_conjoint" placeholder="@lang("Son nom")">
    				</div>
    				<div class="txtcenter"><button class="action bouton-envoyer" type="submit" v-if="!soumis">@lang("Envoyer")</button></div>
	    			<div class="succes" v-show="soumis">@lang("Votre réponse a bien été enregistrée, merci !")</div>
	    			<div class="erreur" v-show="erreur">@lang("Merci de vérifier les données du formulaire. Tous les champs sont requis à l'exception des remarques.")</div>
    			</form>
    			<p>@lang("Par manque de place, nous ne serons malheureusement pas en mesure d'accueillir vos enfants. Ce sera l'occasion pour tout le monde de profiter d'une belle journée entre adultes !")</p>
    			<h2>@lang("Nous retrouver")</h2>
        		<div class="photo">
        			<img src="img/plan.png">
    			</div>
    			<h2>@lang("Nous faire un cadeau")</h2>
    			<p>@lang("Non pas que nous vous en demandions un ! Mais si l'envie vous en prenait... et que vous souhaitiez contribuer à votre façon à nous façonner un petit nid douillet, la voici :")</p>
    			<p><a class="action" href="https://www.ookoodoo.com/list/795398">@lang("Notre liste de mariage")</a></p>
    			<p>@lang("Ou si vous le préférez, voici les coordonnées de notre nouveau compte commun :")</p>
    			<p class="action">IBAN CH36 8021 0000 0081 9268 2<br>
    			Banque Raiffeisen Genève Ouest<br>
    			1242 Satigny - @lang("Suisse")</p>
    			<hr>
    			<div class="footer flex-container small">
    				<span>Alexandra Paccot & Florian Sinatra</span>
    				<span>3, chemin de Champ-Claude</span>
    				<span>1214 Vernier - @lang("Suisse")</span>
    			</div>
        	</div>
        </div>

        <script src="js/es6-promise.auto.js"></script>
        <script src="https://unpkg.com/vue"></script>
        <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
        <!--<script src="js/app.js"></script>-->
        <script src="js/main.js"></script>
    </body>
</html>
