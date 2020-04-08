/// <reference path="jquery.min.js"/>

function beauityJSON(data) {
    if (data !== 0 && !data) return '';
    var z;
    if (typeof data === 'string') {
        // json = JSON.stringify(json, undefined, 2);
        if ('[object Object]' === data) return 'is String:: ' + data;
        // throw new Error('beauityJSON: data is damaged');

        data = JSON.parse(data);
    }
    z = syntaxHighlight(data);
    return $('<pre>' + z + '</pre>');
}

function syntaxHighlight(json) {
    if (typeof json != 'string') {
        json = JSON.stringify(json, undefined, 2);
    }
    json = json.replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;');
    return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
        var cls = 'number';
        if (/^"/.test(match)) {
            if (/:$/.test(match)) {
                cls = 'key';
            } else {
                cls = 'string';
            }
        } else if (/true|false/.test(match)) {
            cls = 'boolean';
        } else if (/null/.test(match)) {
            cls = 'null';
        }
        return '<span class="' + cls + '">' + match + '</span>';
    });
}

function bootstrap_equalizer(class1) {
    var heights = $(class1).map(function () {
        return $(this).outerHeight();
    }).get();
    maxHeight = Math.max.apply(null, heights);
    $(class1).css('min-height', maxHeight+'px');
}

$(document).ready(function () {

    // $('.json').each(function (i, e) {
    //     $(e).html(beauityJSON(e.innerHTML));
    // });

});