var $subs      = $('.sub');
var $textareas = $subs.find('textarea');

$subs.first().children('.extras').addClass('active');

$subs.click(function () {
    var $target = $(this).children('.extras');
    var $current = $('.extras.active');

    $current.toggleClass('active');
    $target.toggleClass('active');
});

$textareas.keydown(function (e) {
    if (e.keyCode === 9 && !e.ctrlKey && !e.altKey && !e.metaKey) {
        var $nextTextarea;
        if (e.shiftKey) {
            $nextTextarea = $(this).parent().parent().parent().prev().click().find('textarea');
        } else {
            $nextTextarea = $(this).parent().parent().parent().next().click().find('textarea');
        }

        if ($nextTextarea.length === 1) {
            setTimeout($nextTextarea[0].focus.bind($nextTextarea[0]), 200);
        }
    }
});