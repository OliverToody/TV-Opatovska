        
var one = new Vue({
	el:"#vue-app-one",
	data: {
        departures: [],
        hi: "g"		
	},

	mounted: function(){
        this.getDepartures();
	},

	methods: {

		getDepartures: function() {
			axios.get('test.php')
				.then(function(response){
					if(response.data.error){
						console.log(response.data.message);
					}
					else{
                        console.log(response.data);
						one.departures = response.data;
						
					}
				});
		}
    }

});

