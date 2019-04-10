        
var one = new Vue({
	el:"#vue-app-one",
	data: {
        departures: [],
				jedalen: "",
				oznam: "Ziadne oznamy na dnes",
				weather: []
	},

	mounted: function(){
	this.getDepartures();
	this.getLunch();
	this.getWeather();
	this.getOznam();
	setInterval(this.getDepartures, 120000);
	},

	methods: {

		getDepartures: function() {
			axios.get('test.php')
				.then(function(response){
					if(response.data.error){
						console.log(response.data.message);
					}
					else{
						one.departures = response.data;
						
					}
				});
		},
		getLunch: function() {
			axios.get('jedalen.php')
				.then(function(response){
					if(response.data.error){
						console.log(response.data.message);
					}
					else{
						one.jedalen = response.data;
						
					}
				});
		},
		getWeather: function() {
			axios.get('weather.php')
				.then(function(response){
					if(response.data.error){
						console.log(response.data.message);
					}
					else{
						one.weather = response.data;	
					}
				});
		},
		getOznam: function() {
			$("#oznam").load("oznam.txt");
			console.log($("#oznam").load("oznam.txt"));
		}
    }

});

