<div>

    <div class="container">
        <h1>Liste Sensor</h1>

        <table class="table">
            <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Adresse MAC</th>
                <th scope="col">Gateway</th>
                <th scope="col">Etat</th>
                <th scope="col">Graphe</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($sensors as $sensor)
                    <tr>
                        <td>{{ $sensor->name }}</td>
                        <td>{{ $sensor->mac }}</td>
                        <td>{{ $sensor->gateway->name }}</td>
                        <td>etat</td>
                        <td><div id="chart"></div></td>
                        <td></td>
                    </tr>
                @endforeach

            </tbody>
        </table>

    <script>
        const d3 = new Date();
        const date_time = d3.getTime();
        const temperature = [{
            x: 0,
            y: 0
          }, {
            x: 0,
            y: 0
          },
          {
            x: date_time,
            y: 5
          }
        ];
        const humidity = [{
            x: 0,
            y: 0
          }, {
            x: 0,
            y: 0
          },
          {
            x: date_time,
            y: 10
          }
        ]

        var options = {
            series: [
                {
                    name:"Temperature",
                    data: temperature
                },
                {
                    name:"Humidité",
                    data: humidity
                }
              ],
            chart: {
            id: 'realtime',
            height: 300,
            width:400,
            type: 'area',
            animations: {
              enabled: true,
              easing: 'linear',
              dynamicAnimation: {
                speed: 1000
              }
            },
            toolbar: {
              show: false
            },
            zoom: {
              enabled: false
            }
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            curve: 'smooth'
          },
          markers: {
            size: 0
          },
          xaxis: {
            type: 'datetime',
          },
          yaxis: [
            {
              title: {
                text: "Temperature"
              },
            },
            {
              opposite: true,
              title: {
                text: "Humidité"
              }
            }
          ],
          legend: {
            show: false
          },
          };

          var chart = new ApexCharts(document.querySelector("#chart"), options);
          chart.render();


          temps= 1;
          window.setInterval(function () {
            const start = Date.now();
          //  const date_time2 = start.getTime();
            console.log(start + 'start');
            const newhumidity = { x: start,y: 5 + temps}
            console.log(start);
            const newtemperature = { x: start,y: 50 + temps * 0.5}
            console.log(start);
            humidity[0] = humidity[1]
            humidity[1] = humidity[2]
            humidity[2] = newhumidity;
           // temperature[3]= newtemperature;
            temperature[0] = humidity[1]
            temperature[1] = humidity[2]
            temperature[2] = newtemperature;


            chart.updateSeries([
                {
                    name:"Temperature",
                    data: temperature
                },
                {
                    name:"Humidité",
                    data: humidity
                }
              ])

            temps++;
                console.log(temperature);
                console.log(humidity);
          }, 1000)
    </script>


</div>
