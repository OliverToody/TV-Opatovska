/**
 * Example of starting a plugin with options.
 * I am just passing some of the options in the following example.
 * you can also start the plugin using $('.marquee').marquee(); with defaults
*/
$('.marquee').marquee({
	//duration in milliseconds of the marquee
	duration: 15000,
	//gap in pixels between the tickers
	gap: 50,
	//time in milliseconds before the marquee will start animating
	delayBeforeStart: 0,
	//'left' or 'right'
	direction: 'left',
	//true or false - should the marquee be duplicated to show an effect of continues flow
    duplicated: true,
    speed: 90
});

var request = new XMLHttpRequest();

// Open a new connection, using the GET request on the URL endpoint
request.open('GET', 'https://samples.openweathermap.org/data/2.5/forecast?lat=48.7164&lon=21.2611&appid=b6907d289e10d714a6e88b30761fae22', true);

request.onload = function () {
    var data = JSON.parse(this.response)

    data.forEach(movie => {
      // Log each movie's title
      console.log(movie.title)
		})  }
		


		var myVar = setInterval(myTimer ,1000);
function myTimer() {
  var d = new Date();
  document.getElementById("time").innerHTML = d.toLocaleTimeString().slice(0,-3);
}
