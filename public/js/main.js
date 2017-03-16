var app = new Vue({
  el: '#formulaire',

  data: {
    conjoint: false,
    presence: 4,
    prenom: '',
    nom: '',
    email: '',
    remarque: '',
    prenom_conjoint: '',
    nom_conjoint: '',
    soumis: false,
    erreur: false,
  },

  methods: {
  	onSubmit: function(event){
  		formData = new FormData(event.target);

  		axios.post('/api/reponses', formData)
		  .then(this.onSuccess)
		  .catch(this.onError);
  	},

  	onSuccess: function (response) {
	    console.log(response);
	    this.soumis = true;
	    this.erreur = false;
	},

  	onError: function (response) {
	    console.log(response);
	    this.erreur = true;
	},

  },

  computed: {
  	present: function() {
  		if(this.presence < 3){
  			return true;
  		} else {
  			this.conjoint = false;
  			return false;
  		}
  	},
  },
})