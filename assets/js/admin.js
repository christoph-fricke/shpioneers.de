var submitButton = document.createElement("input");
submitButton.setAttribute("type", "submit");
submitButton.setAttribute("class", "input-item--submit");
submitButton.setAttribute("value", "Save");

var breakLine = document.createElement("hr");
breakLine.setAttribute("class", "line--fullLength line--inputDevider");

var editHeaderGerman = document.createElement("h2");
editHeaderGerman.setAttribute("class", "input__header");
var editHeaderEnglish = document.createElement("h2");
editHeaderEnglish.setAttribute("class", "input__header");

var token;
var submiturl;
var glindex;

var form = document.getElementById("form");

function getchanges(changes, index) {
    while (form.firstChild) {
        form.removeChild(form.firstChild);
    }

    editHeaderGerman.appendChild(document.createTextNode("Edit German"));
    form.appendChild(editHeaderGerman);
    printlanguage(changes.de, "de");
    form.appendChild(breakLine);

    editHeaderEnglish.appendChild(document.createTextNode("Edit English"));
    form.appendChild(editHeaderEnglish);
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
            label.setAttribute("class", "input__label")

            switch (this.type) {
                case "input":
                    var textSingle = document.createElement("input");
                    textSingle.setAttribute("type", "text");
                    textSingle.setAttribute("class", "input-item--admin");
                    textSingle.setAttribute("value", this.value);
                    textSingle.setAttribute("name", lang + key);

                    label.appendChild(document.createTextNode(key + ":"));
                    form.appendChild(label); 
                    form.appendChild(textSingle);
                    break;
                case "textarea":
                    var textMulti = document.createElement("textarea");
                    textMulti.setAttribute("class", "input-item--admin input-item--textarea");
                    textMulti.appendChild(document.createTextNode(this.value));
                    textMulti.setAttribute("name", lang + key);

                    label.appendChild(document.createTextNode(key + ":"));
                    form.appendChild(label); 
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
