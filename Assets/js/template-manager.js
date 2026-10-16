// Provides clipboard and template-field interactions without exposing copied content in logs.

(function () {
    'use strict';

    function copyWithFallback(text) {
        if (navigator.clipboard && window.isSecureContext) {
            return navigator.clipboard.writeText(text);
        }

        return new Promise(function (resolve, reject) {
            var temporaryField = document.createElement('textarea');
            temporaryField.value = text;
            temporaryField.setAttribute('readonly', '');
            temporaryField.style.position = 'fixed';
            temporaryField.style.opacity = '0';
            document.body.appendChild(temporaryField);
            temporaryField.select();

            try {
                if (document.execCommand('copy')) {
                    resolve();
                } else {
                    reject(new Error('Copy command was not accepted.'));
                }
            } catch (error) {
                reject(error);
            } finally {
                document.body.removeChild(temporaryField);
            }
        });
    }

    function updateCopyButton(button, successful) {
        var label = successful ? button.dataset.copiedLabel : button.dataset.copyErrorLabel;
        var defaultLabel = button.dataset.copyLabel || '';
        var status = document.querySelector('.template-manager-copy-status');
        var stateIcon = document.createElement('strong');
        var stateLabel = document.createElement('span');

        stateIcon.className = successful ? 'copied' : '';
        stateIcon.setAttribute('aria-hidden', 'true');
        stateIcon.textContent = successful ? '\u2714' : '\u2718';
        stateLabel.textContent = label || '';
        button.replaceChildren(stateIcon, document.createTextNode(' '), stateLabel);

        if (status) {
            status.textContent = label || (successful ? 'Copied' : 'Copy failed');
        }

        window.setTimeout(function () {
            var defaultIcon = document.createElement('i');
            var defaultText = document.createElement('span');

            defaultIcon.className = 'fa fa-clipboard';
            defaultIcon.setAttribute('aria-hidden', 'true');
            defaultText.textContent = defaultLabel;
            button.replaceChildren(defaultIcon, document.createTextNode(' '), defaultText);
        }, successful ? 1500 : 3500);
    }

    document.addEventListener('click', function (event) {
        var button = event.target.closest('.copy-comment-template, .copy-global-template');

        if (!button) {
            return;
        }

        event.preventDefault();
        copyWithFallback(button.dataset.clipboardText || '').then(function () {
            updateCopyButton(button, true);
        }).catch(function () {
            updateCopyButton(button, false);
        });
    });
}());

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
