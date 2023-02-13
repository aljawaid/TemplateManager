// KANBOARD PLUGIN - JS FILE

$( document ).ready(function() {
    var clipboard = new ClipboardJS('.copy-comment-template');

    // COPY TO CLIPBOARD SCRIPT - SUCCESS/ERROR STATES
    clipboard.on('success', function(e) {
        $(e.trigger).html("<strong class='copied'>&#10004;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html('<i class="fa fa-clipboard" aria-hidden="true"></i>');
        }, 1500);
    });
    clipboard.on('error', function(e) {
        $(e.trigger).html("<strong>&#10008;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html('<i class="fa fa-clipboard" aria-hidden="true"></i>');
        }, 3500);
    });
});
