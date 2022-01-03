function getParams(element)
{
    var params = {id: $(element).attr('id'), model: '', action: '', route:''};
    params.id = $(element).attr('recordId');
    params.model = $(element).attr('model');
    params.action = $(element).attr('action');
    params.route = $(element).attr('route');
    return params;
}

function getAttributes(element, customAttributes)
{
    var attributes = {};
    for (var i = 0, atts = element.attributes, n = atts.length, arr = []; i < n; i++) {
        if (customAttributes != null && customAttributes.length > 0)
        {
            if (jQuery.inArray(atts[i].nodeName, customAttributes) !== -1)
            {
                attributes[atts[i].nodeName] = atts[i].nodeValue;
            }
        } else
        {
            attributes[atts[i].nodeName] = atts[i].nodeValue;
        }

    }
    return attributes;
}
function executeRowAction(element) {
    var params = getParams(element);
    var url = '';
    if(params.route === '')
    {
        url = SITE_URL + params.action + params.model;;
    }
    else
    {
        url = params.route;
    }
    var data = {id: params.id, _token: _token};
    if (data.id !== null)
    {
        var helper = new RequestHelper(url, data);
        var response = helper.postRequest();
        console.log(response);
        if (response.success === true)
        {
            window.location.reload();
        }
    }

}
/*
 * Display image on upload
 */
function readURL(input, label, image) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var fileName = input.files[0].name;
        var extension = fileName.split('.').pop().toUpperCase();
        if (extension != "PNG" && extension != "JPG" && extension != "GIF" && extension != "JPEG") {
            $('#' + label).html('Only png,jpg,gif,jpeg images are allowed!');
            $('#' + label).css('color', 'red');
            return 0;
        }
        $('#' + label).html(fileName);
        $('#' + label).css('color', 'inherit');
        reader.onload = function (e) {
            $('#' + image).attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}
function readFileName(input, label) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        var fileName = input.files[0].name;
        $('#' + label).html(fileName);
        $('#' + label).css('color', 'red');
    }
}

function setUrlWithParameter(paramName, paramValue, url)
{
    if(url==null)
    {
        return url;
    }
    if (url === '')
    {
        url = window.location.href;
    }
    if (url.indexOf(paramName + "=") >= 0)
    {
        var prefix = url.substring(0, url.indexOf(paramName));
        var suffix = url.substring(url.indexOf(paramName));
        suffix = suffix.substring(suffix.indexOf("=") + 1);
        suffix = (suffix.indexOf("&") >= 0) ? suffix.substring(suffix.indexOf("&")) : "";
        url = prefix + paramName + "=" + paramValue + suffix;
    } else
    {
        if (url.indexOf("?") < 0)
            url += "?" + paramName + "=" + paramValue;
        else
            url += "&" + paramName + "=" + paramValue;
    }
    return url;
}
function redirect(url,onSamePage) {
    if(onSamePage === true)
    {
        window.location = url;
    }
    else
    {
        window.open(url, '_blank');
    }
}

function validateType(element)
{
    var val = $(element).val().toLowerCase();
    var accept = $(element).attr('accept').replaceAll(' ', '').replaceAll('.', '');

    var regex = new RegExp("(.*?)\.(" + accept.replaceAll(',', '|') + ")$");
    if (!(regex.test(val))) {
        $(element).val('');
        var errorElementId = $(element).attr('errorElementId');
        $('#' + errorElementId).html('only ' + accept + ' types are allowed');
        return false
    }
    return true;
}

function getLastIndex(string, seprator)
{
    var pieces = string.split(seprator);
    return pieces[pieces.length - 1];
}
function getFirstIndex(string, seprator)
{
    var pieces = string.split(seprator);
    return pieces[0];
}

String.prototype.replaceAll = function (search, replacement) {
    var target = this;
    return target.split(search).join(replacement);
};
function inArray(needle, haystack) {
    var length = haystack.length;
    for (var i = 0; i < length; i++) {
        if (haystack[i] == needle)
        {
            return true;
        }
    }
    return false;
}

/*
 * Cofirmation before deletion
 */
$(document).ready(function () {
    $("#dialog").dialog({
        autoOpen: false,
        modal: true
    });
});
$(".confirmAction").click(function (e) {
    e.preventDefault();
    var formID = $(this).attr("deleteFormId");
    var targetUrl = $(this).attr("href");
    var message = $(this).attr("message");
    if (!message)
    {
        message = 'Are you sure to delete this record?';
    }
    $("#dialog").dialog({
        buttons: {
            "Confirm": function () {
                document.getElementById(formID).submit();
//                window.location.href = targetUrl;
            },
            "Cancel": function () {
                $(this).dialog("close");
            }
        }
    });
    $("#dialog").html(message);
    $("#dialog").dialog("open");
});
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}