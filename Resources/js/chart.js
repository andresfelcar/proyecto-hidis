window.addEventListener("load",function(){
    Consult();
});
setTimeout(Mapa,1000);



function Insert() {
  $.ajax({
    url:
      "http://localhost/proyecto-hidis/index.php?view=chargrap&op=insert",
    type: "POST",
    success: function (response) {
      Consult();
    },
  });
}


function Consult() {
  $.ajax({
    url:
      "http://localhost/proyecto-hidis/index.php?view=chargrap&op=consult",
    type: "GET",
    success: function (response) {
      var datos = JSON.parse(response);
      console.log(datos);
      var fechas= [];
      var bpm=[];
      datos.forEach(dato => {
          fechas.push(dato['date']);
          bpm.push(dato['bpm']);
      });
      var ctx = document.getElementById("ChartPulse").getContext("2d");
      var myChart = new Chart(ctx, {
        type: "line",
        data: {
          //TIEMPO
          labels: fechas,
          datasets: [
            {
              label: "Pulso",
              //Pulsaciones
              data: bpm,
              borderColor: "#2a536ef5",
              lineTension: 0.1,
            },
          ],
        },
        options: {
          scales: {
            yAxes: [
              {
                ticks: {
                  beginAtZero: false,
                },
              },
            ],
            /* xAxes: [
        {
          gridLines: {
            display: false,
          },
        },
      ],
          },
          title: {
            display: true,
            text: "Tus pulsaciones",
            fontSize: 25,
            padding: 40,
            fontColor: " #2a536ef5",
            fontFamily: "'Quicksand', sans-serif",*/
          },
          legend: {
            display: false,
            /*position: "bottom",
      labels: {
        padding: 20,
        boxWidth: 15,
        fontFamily: "'Quicksand', sans-serif",
        fontSize: 15,
        fontColor: "black",
      },*/
          },
          layout: {
            padding: {
              right: 50,
              bottom: 40,
            },
          },
          tooltips: {
            titleFontFamily: "'Quicksand', sans-serif",
            bodyFontFamily: "'Quicksand', sans-serif",
            backgroundColor: "#000",
            titleFontSize: 20,
            xPadding: 15,
            yPadding: 15,
            bodyFontSize: 15,
            bodySpacing: 10,
            mode: "x",
          },
          elements: {
            line: {
              borderWidth: 8,
              fill: false,
            },
            point: {
              radius: 6,
              borderWidth: 4,
              backgroundColor: "red",
              hoverRadius: 8,
              hoverBorderWidth: 4,
            },
          },
        },
      });
    },
  });
}

var activator = document.getElementById("activator");
var flag = false;

activator.addEventListener('click',function(){
  switch (flag) {
    case true:
        stopgrap();
        activator.innerHTML="Iniciar";
      break;
    case false:
        startgrap();
        activator.innerHTML="Detener";
      break;
  }
});

var grapstart;

function startgrap(){
  grapstart=setInterval(Insert,10000);
  flag=true;
}
function stopgrap() {
  clearInterval(grapstart);
  flag=false;
}








function Mapa(){

  var map;
  var mapOptions= {
    zoom: 15,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  map = new google.maps.Map(document.getElementById("google-canvas"), mapOptions);
  navigator.geolocation.getCurrentPosition(function(position){
  var geolocate = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

    if (geolocate!=null) {
      var infoW = new google.maps.InfoWindow({
        map: map, 
        position: geolocate, 
        content: '<p id="content-map-title">Esta es tu ubicación<p>' + '<p>Latitud:'+position.coords.latitude+'<p>' + '<p>Longitud:'+position.coords.longitude+'<p>'
      });
      var marker = new google.maps.Marker({
        position: geolocate,
        map: map
      });
      map.setCenter(geolocate);
    } else {
      let contenedor = document.getElementById("google-canvas");
      contenedor.style.display = "none";
      alert("No se encontró su ubicación");
    }
    
  });
}
