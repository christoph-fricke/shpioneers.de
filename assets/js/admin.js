var submitButton = document.createElement("input");
submitButton.setAttribute("type", "submit");
submitButton.setAttribute("class", "input-item--admin input-item--submit");
submitButton.setAttribute("value", "Save");

var breakLine = document.createElement("hr");
breakLine.setAttribute("class", "line--fullLength line--inputDevider");

var token;
var submiturl;
var glindex;

var form = document.getElementById("form");

function getchanges(changes, index) {
    while (form.firstChild) {
        form.removeChild(form.firstChild);
    }
    printlanguage(changes.de, "de");
    form.appendChild(breakLine);
    printlanguage(changes.en, "en");
    form.appendChild(submitButton);
    token = changes.token;
    submiturl = changes.submit;
    glindex = index;
}

function printlanguage(langspecific, lang) {
    $.each(langspecific,
        function (key, value) {
            var label = document.createElement("label");
            label.setAttribute("for", lang + key);

            switch (this.type) {
                case "input":
                    var textSingle = document.createElement("input");
                    textSingle.setAttribute("type", "text");
                    textSingle.setAttribute("class", "input-item--admin");
                    textSingle.setAttribute("value", this.value);
                    textSingle.setAttribute("name", lang + key);

                    form.appendChild(label); //Not sure how to acces the innerhtml of this element yet... Still has to be done. The innerHtml would be the key.
                    $("#form label").last().html = key; // If we ask for the last one we should always get the latest created. At least in theory... Does not work...
                    form.appendChild(textSingle);
                    break;
                case "textarea":
                    var textMulti = document.createElement("textarea");
                    textMulti.setAttribute("class", "input-item--admin input-item--textarea");
                    textMulti.appendChild(document.createTextNode(this.value));
                    textMulti.setAttribute("name", lang + key);

                    form.appendChild(label); //Not sure how to acces the innerhtml of this element yet... Still has to be done. The innerHtml would be the key.
                    form.appendChild(textMulti);
                    break;
            }
        }
    );
}
// submit the changes
$(form).submit(
    function (e) {
        e.preventDefault();
        $.ajax({
            url: submiturl,
            type: 'POST',
            data: $(form).serialize() + '&token=' + token + '&index=' + glindex,
            success: function (data, a, b) {
                if (data == "suc") {
                    $('.success').addClass('active');
                    setTimeout(function () {
                        $('.success').removeClass('active');
                    }, 2000);
                } else {
                    $('.failure').addClass('active');
                    setTimeout(function () {
                        $('.failure').removeClass('active');
                    }, 2000);
                }
            }
        });
    }
);