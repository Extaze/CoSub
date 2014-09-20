var $subs          = $('.sub');
var $textareas     = $subs.find('textarea');
var $statusButtons = $('.sub-buttons .sub-button').not('[data-status="timed"]');
var $timedButtons  = $('.sub-buttons .sub-button[data-status="timed"]');

$subs.first().addClass('active').children('.extras').addClass('active');

// Click swapper
$subs.off('click').click(function () {
    var $this = $(this);
    var $target = $this.children('.extras').add($this);
    var $current = $('.sub:has(.extras.active), .extras.active');

    $current.toggleClass('active');
    $target.toggleClass('active');
});

// Tab and shift-tab swappers
$textareas.off('keydown').keydown(function (e) {
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

// Stauts Change
$statusButtons.off('click').click(function () {
    var $this  = $(this);
    var $others = $this.siblings();
    var status = $this.attr('data-status');
    var id     = $this.parent().parent().parent().attr('data-id');

    // Reset status
    if ($this.hasClass('active') && status !== 'original') {
        $this = $others.filter('[data-status="original"]');
        $others = $this.siblings();
        status = 'original';
    }

    $.post('/sub/status', {
        id: id,
        status: status
    }, function () {
        $others.removeClass('active');
        $this.addClass('active');
        $this.parent().parent().parent().attr('class', 'sub active transition ' + status);
    });
});

$timedButtons.off('click').click(function () {
    var $this  = $(this);
    var id     = $this.parent().parent().parent().attr('data-id');
    var status = ($this.hasClass('active')) ? '0' : '1';

    $.post('/sub/timed', {
        id: id,
        status: status
    }, function () {
        $this.toggleClass('active');
    });
});
