

var graph_options = {
    series: {
        lines: {
            show: true
        },
        points: {
            show: true
        }
    },
    legend: {
        noColumns: 2
    },
    xaxis: {
        tickDecimals: 0,
        color: '#7c8c99',
        tickColor: '#7c8c99',
        font: {
            color: '#7c8c99',
            size:'16'
        }
    },
    yaxis: {
        min: 0,
        color: '#ccc',
        show: false,
        font: {
            color: "#ccc"
        }

    },
    selection: {
        mode: "x"
    },
    grid: {
        color: '#fff',
        borderColor: '#3c4349'
    }
};


//From inline


$( ".datepicker" ).datepicker({					
});

$('#btnfilter').click(function () {
if ($('#datepickerfrom').val() != "" && $('#datepickerto').val() != "")
{
var path = window.location.pathname.split('?');
var newURL = window.location.protocol + "//" + window.location.host + path[0] ;
window.location = newURL + '?from='+$('#datepickerfrom').val()+'&to='+$('#datepickerto').val();
}
});

//From inline

$(document).ready(function() {

$("<div id='tooltip'></div>").css({
    position: "absolute",
    display: "none",
    border: "1px solid #fdd",
    padding: "2px",
    "z-index": "3333",
    "background-color": "#fee",
    opacity: 0.80
}).appendTo("body");

//	$(".knob").knob();

$('.open_detail_option').click(function () {
var gc = $(this).closest('.graph_container');
gc.find('.graph_layer').hide();
gc.find('.info_layer').show();
});

$('.close_detail_option').click(function () {
var gc = $(this).closest('.graph_container');
gc.find('.info_layer').hide();
gc.find('.graph_layer').show();
});

$('.toggle_section').click(function () {
var section = $(this).data('section');

if($(this).find('.fa').hasClass('fa-chevron-down'))
{
    $(this).find('.fa').removeClass('fa-chevron-down');
    $(this).find('.fa').addClass('fa-chevron-up');
}
else
{
    $(this).find('.fa').removeClass('fa-chevron-up');
    $(this).find('.fa').addClass('fa-chevron-down');
}

$('#'+section).toggle();
});

// graph numbers
$('.graph_numbers').click(function(ev)
{
ev.preventDefault();

var data_source_str = $(this).data('source');

data_source = eval(data_source_str);

var new_data_source = data_source[0].data;
var months = ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'];

for(var i=0; i<new_data_source.length; i++)
{
    var a = new Date(new_data_source[i][0]);

    var year = a.getFullYear();
    var month = months[a.getMonth()];
    var date = a.getDate();
    var hour = a.getHours();
    var min = a.getMinutes();
    var sec = a.getSeconds();
    var time = date + ' ' + month + ' ' + year + ' ' + hour + ':' + min + ':' + sec ;

    new_data_source[i][0] = time;
}

console.log(new_data_source);

csvGenerator = new CsvGenerator(new_data_source, $(this).data('filename') + '.csv');
csvGenerator.download(true);
});
});

function setup_graph(graph_name, data, options)
{
$(graph_name).data('flot_obj',$.plot($(graph_name), data, options));

$(graph_name).bind('plothover',function (event, pos, item) {


        if (item) {
            var x = item.datapoint[0].toFixed(2),
                y = item.datapoint[1].toFixed(2);

            $("#tooltip").html('Value : ' + y)
                .css({top: item.pageY+5, left: item.pageX+5})
                .fadeIn(200);
        } else {
            $("#tooltip").hide();
        }

});
}



function setup_pies()
{
var data = [
{ label: "Opened",  data: [[1,10]]},
{ label: "Clicked",  data: [[1,30]]},
{ label: "Unopened",  data: [[1,90]]},
{ label: "Bounced",  data: [[1,70]]}
];

$.plot('#pieplaceholder', data, {
series: {
    pie: {
        innerRadius: 0.8,
        show: true
    }
}
});
$.plot('#pieplaceholder2', data, {
series: {
    pie: {
        innerRadius: 0.8,
        show: true
    }
}
});
$.plot('#pieplaceholder3', data, {
series: {
    pie: {
        innerRadius: 0.8,
        show: true
    }
}
});
}