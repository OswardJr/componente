<section class="content-header">
  <h1>
    Home
</h1>
</section>

<div class="col-md-12">
  <div class="box box-primary">
    <div class="with-border">
      <h5 align="center" class="box-title"><strong>Quienes Somos</strong></h5>
      <div >
        <img src="public/img/logo.png" class="img-responsive" alt="Image">
    </div>
</div>
<br>
</div>



<script>
    var ctx1 = document.getElementById("myChart1");
    var ctx2 = document.getElementById("myChart3");
    var ctx3 = document.getElementById("myChart2");

    $(document).ready(function() {

        $.ajax({
            url : "http://localhost/componente/?controller=utilidades&action=getchartcompras",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                console.log(data);
                data1 = data;
                var myChart = new Chart(ctx1, {
                    type: 'bar',
                    data: {
                        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                        datasets: [{
                            label: 'Compras realizadas',
                            data: data1,
                            backgroundColor: [
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: [
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)' ,
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log('Error get data from ajax');
          }
      });
        $.ajax({
            url : "http://localhost/componente/?controller=utilidades&action=getchartventas",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                data2 = data;
                var myChart = new Chart(ctx2, {
                    type: 'bar',
                    data: {
                        labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                        datasets: [{
                            label: 'Ventas realizadas',
                            data: data2,
                            backgroundColor: [
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)',
                            'rgba(255, 99, 132, 0.6)',
                            'rgba(54, 162, 235, 0.6)',
                            'rgba(255, 206, 86, 0.6)',
                            'rgba(75, 192, 192, 0.6)',
                            'rgba(153, 102, 255, 0.6)',
                            'rgba(255, 159, 64, 0.6)'
                            ],
                            borderColor: [
                            'rgba(255, 206, 86, 1)',
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)' ,
                            'rgba(255,99,132,1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero:true
                                }
                            }]
                        }
                    }
                });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log('Error get data from ajax');
          }
      });
        $.ajax({
            url : "http://localhost/componente/?controller=utilidades&action=getchartpresupuestos",
            type: "GET",
            dataType: "JSON",
            success: function(data)
            {
                data3 = data;
                var myChart = new Chart(ctx3, {
                    type: 'bar',
                    data: {
                       labels: ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"],
                       datasets: [{
                        label: 'Presupuestos realizados',
                        data: data3,
                        backgroundColor: [
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)',
                        'rgba(255, 99, 132, 0.6)',
                        'rgba(54, 162, 235, 0.6)',
                        'rgba(255, 206, 86, 0.6)',
                        'rgba(75, 192, 192, 0.6)',
                        'rgba(153, 102, 255, 0.6)',
                        'rgba(255, 159, 64, 0.6)'
                        ],
                        borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255,99,132,1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)' ,
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true
                            }
                        }]
                    }
                }
            });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              console.log('Error get data from ajax');
          }
      });


    });

</script>
