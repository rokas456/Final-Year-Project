$(document).ready(function() {
    // Create Machinery

    

    //Ending Ajax
});

function getCharts(){
$(function () {
    chart = new Highcharts.Chart({

        chart: {
            renderTo: "container",
            type: 'bar'
        },
        title: {
            text: 'Bar Chart for Big Plantsss'
        },
        subtitle: {
            text: 'Source: <a href="http://localhost/ProcessManagment/admin/export.php">Download Data</a>'
        },
        xAxis: {
            categories: ['Remove Plug Valve', 'Replace O-Rring', 'Clean Vent A', 'Clean Vent B', 'Replace X'],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Test Count',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ' millions'
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 80,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Failure',
            data: [107, 31, 635, 203, 2]
        }, {
            name: 'Success',
            data: [133, 156, 947, 408, 6]
        }]
    });
//containerPie
$('#containerPie').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Browser market shares January, 2015 to May, 2015'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            name: 'Brands',
            colorByPoint: true,
            data: [{
                name: 'Microsoft Internet Explorer',
                y: 56.33
            }, {
                name: 'Chrome',
                y: 24.03,
                sliced: true,
                selected: true
            }, {
                name: 'Firefox',
                y: 10.38
            }, {
                name: 'Safari',
                y: 4.77
            }, {
                name: 'Opera',
                y: 0.91
            }, {
                name: 'Proprietary or Undetectable',
                y: 0.2
            }]
        }]
    });

});

}

// Inputting Data Logic
//Retrieves Processes for Machinery
function getProcesses(){
    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/input/retrieveProcess",
        data: {type:"processInfo", plantName: localStorage.getItem('pName'), plantMachinery: localStorage.getItem('mName')},
        type:"POST",
        dataType: 'json',
              success: function(data){
                                         
                    for (i = 0; i < data.length; i++) { 
                          var name = data[i].name;
                          array1 = name.split( data[i]);
                          array1 = $.unique(array1);

                          var id = data[i].id;
                          array2 = id.split( data[i]);
                          array2 = $.unique(array2);

                          $('#selectPlantProcessNames').append('<option id= '+array2+' onclick="checkId(this.id)">'+array1+'</option>');
                    }
                    
                    },
                    error: function(){
                        console.log('Failed to load data');   
                    }
                });

}

function checkId(id){
//processInputFirst
    var name = document.getElementById('selectPlantProcessNames').value;
    document.getElementById('inputProcessDataTitle').innerHTML = "Input Data For: "+name;
    localStorage.setItem('processID', id);
}


function disableProcess(){

    var valueSelect = document.getElementById('selectPlantProcessNames').value;
    //document.getElementById(localStorage.getItem('processID')).disabled = true;
    document.getElementById(localStorage.getItem('processID')).setAttribute('style', 'font-weight: bold; color: green;');

    var processTestResult;
   
    if($('#processOutcome').val() == "Success"){
        processTestResult = 1;
     
    }else{
        processTestResult = 2;
    }

    $.ajax({
        url: "http://localhost:8080/PharmaMachinery/input/dataFeedback",
        data: {type:"processTestSubmit", plantName: localStorage.getItem('pName'), plantMachinery: localStorage.getItem('mName'),
               processOutcome: processTestResult, possibleReason: $('#possibleReason').val(), failedSubParts: $('#machSubpartsfailed').val(),
               processComments: $('#processComment').val(), processID: localStorage.getItem('processID'), processTestDate: $('#currentDate').val()},
        type:"POST",
              success: function(data){
                    $('#processInputFeedback').append(data);
                    console.log(data);
                    //console.log(data);
                    // for (i = 0; i < data.length; i++) { 
                    //      var text = data[i].name;
                    //       array1 = text.split( data[i]);
                    //       array1 = $.unique(array1);
                    //       $('#selectPlantProcess').append('<option>'+array1+'</option>');
                    // }
                     clearFields();
                    },
                    error: function(){
                        console.log('Failed to load data');   
                    }
                });

    
}