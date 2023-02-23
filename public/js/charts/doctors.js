const chart = Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Medicos mas activos por mes'
    },
   
    xAxis: {
        categories: [
      
        ],
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cita atendidas'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y} </b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
 
    series: [

    ]
});

function fetchData(){
//fecha Api

fetch('/reports/doctors/column/data')
.then(function(response){
 return response.json();
})
.then(function(data){
    //console.log(data);
    chart.xAxis[0].setCategories(data.categories);
    chart.addSeries(data.series[0]);//ateendidas
    chart.addSeries(data.series[1]);//cancelads
});
}

$(function(){
fetchData();
});