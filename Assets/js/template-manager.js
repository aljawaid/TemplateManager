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

$( document ).ready(function() {
    var clipboard = new ClipboardJS('.copy-global-template');

    // COPY TO CLIPBOARD SCRIPT - SUCCESS/ERROR STATES
    clipboard.on('success', function(e) {
        $(e.trigger).html("<strong class='copied'>&#10004;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html('<i class="fa fa-clipboard" aria-hidden="true"></i> Copy');
        }, 1500);
    });
    clipboard.on('error', function(e) {
        $(e.trigger).html("<strong>&#10008;</strong>");
        console.info('Action:', e.action);
        console.info('Text:', e.text);
        console.info('Trigger:', e.trigger);
        e.clearSelection();
        setTimeout(function() {
            $(e.trigger).html('<i class="fa fa-clipboard" aria-hidden="true"></i> Copy');
        }, 3500);
    });
});

KB.onClick('.js-template-title', function (e) {
    var template = KB.dom(e.target).data('template');
    var target = KB.dom(e.target).data('templateTarget');
    var targetField = KB.find(target);
    var template2 = KB.dom(e.target).data('templatetitle');
    var target2 = KB.dom(e.target).data('templatetitleTarget');
    var targetField2 = KB.find(target2);

    if (targetField) {
        targetField.build().value = template;
    }
    if (targetField2) {
        targetField2.build().value = template2;
    }

    _KB.controllers.Dropdown.close();
});

KB.onClick('.js-template-comment', function (e) {
    var template = KB.dom(e.target).data('template');
    var target = KB.dom(e.target).data('templateTarget');
    var targetField = KB.find(target);

    if (targetField) {
        targetField.build().value = template;
    }
});
