var $buttonDetail    = $('.buttonDetail');
var $buttonTranslate = $('.buttonTranslate');
var $page1           = $('.page1');
var $page2           = $('.page2');
var $h3              = $('.modeButtons > h3');
var $pieProgress     = $('#pie-progress');
var $pieErrors       = $('#pie-errors');
var $pieLocked       = $('#pie-locked');
var $activityGraph   = $('#activity');

$buttonDetail.click(function (e) {
    e.preventDefault();
    $h3.first().addClass('active');
    $h3.last().removeClass('active');
    $page1.removeClass('fadeOutLeft').addClass('animated fadeInLeft');
    $page2.addClass('animated fadeOutLeft');
});

$buttonTranslate.click(function (e) {
    e.preventDefault();
    $h3.first().removeClass('active');
    $h3.last().addClass('active');
    $page1.addClass('animated fadeOutLeft');
    $page2.removeClass('fadeOutLeft').addClass('animated fadeInLeft');
});

// Charts
var options = {
    segmentStrokeWidth: 0,
    percentageInnerCutout : 75,
    animateRotate : false,
    animateScale : false,
};

Chart.types.Doughnut.extend({
    showTooltip: function () {
        return;
    }
});
Chart.types.Line.extend({
    showTooltip: function () {
        return;
    }
});

function showPie (elem, from, color) {
    var pie = elem[0].getContext('2d');
    var data = [{
        value: parseInt(from, 10),
        color: color,
        highlight: color
    }, {
        value: 100 - parseInt(from, 10),
        color: '#DEDEDE',
        highlight: '#CCC'
    }];
    new Chart(pie).Doughnut(data, options);
}

showPie($pieProgress, progress, '#5CB85C');
showPie($pieErrors, errors, '#F0AD4E');
showPie($pieLocked, locked, '#777');

var values = [];
var keys = Object.keys(activity);
for (var i = 0; i < keys.length; i++) {
    values.push(activity[keys[i]]);
}
var realActivity = {
    labels: Object.keys(activity),
    datasets: [
        {
            label: '',
            fillColor: 'rgba(151,187,205,0.2)',
            strokeColor: 'rgba(151,187,205,1)',
            pointColor: 'rgba(151,187,205,1)',
            pointStrokeColor: '#FFF',
            pointHighlightFill: 'rgba(151,187,205,1)',
            pointHighlightStroke: '#FFF',
            pointHitDetectionRadius: 0,
            data: values
        }
    ]
};

// Auto-resize
function onResize () {
    if ($activityGraph[0].width !== $activityGraph.parent().width()) {
        $activityGraph.replaceWith($('<div>').append($activityGraph.clone()).html());
        $activityGraph = $('#activity');
        $activityGraph[0].width = $activityGraph.parent().width();
        $activityGraph.attr('style', '')
        new Chart($activityGraph[0].getContext('2d')).Line(realActivity);
    }

    setTimeout(onResize, 200);
}

onResize();