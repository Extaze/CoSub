var $buttonDetail    = $('.buttonDetail');
var $buttonTranslate = $('.buttonTranslate');
var $page1           = $('.page1');
var $page2           = $('.page2');
var $h2              = $('.modeButtons > h2');
var $pieProgress     = $('#pie-progress')
var $pieErrors       = $('#pie-errors')
var $pieLocked       = $('#pie-locked')

$buttonDetail.click(function (e) {
    e.preventDefault();
    $page1.addClass('active');
    $page2.removeClass('active');
    $h2.first().addClass('active');
    $h2.last().removeClass('active');
});

$buttonTranslate.click(function (e) {
    e.preventDefault();
    $page1.removeClass('active');
    $page2.addClass('active');
    $h2.first().removeClass('active');
    $h2.last().addClass('active');
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
