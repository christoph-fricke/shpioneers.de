document.addEventListener("touchstart", function() {}, true);


var submitButton = document.createElement("input");
submitButton.setAttribute("type", "submit");
submitButton.setAttribute("class", "input-item--submit input-item--edit");
submitButton.setAttribute("value", "Save");

var breakLine = document.createElement("hr");
breakLine.setAttribute("class", "line--fullLength line--inputDevider");

var editHeaderGerman = document.createElement("h2");
editHeaderGerman.setAttribute("class", "input__header");
editHeaderGerman.appendChild(document.createTextNode("Edit German"));
var editHeaderEnglish = document.createElement("h2");
editHeaderEnglish.setAttribute("class", "input__header");
editHeaderEnglish.appendChild(document.createTextNode("Edit English"));
var token;
var submiturl;
var glindex;

var form = document.getElementById("form");

function clearform() {
    while (form.firstChild) {
        form.removeChild(form.firstChild);
    }
}

function getchanges(changes, index) {
    clearform();
	printlanguage(changes.meta, 'meta')
    form.appendChild(editHeaderGerman);
    printlanguage(changes.de, "de");
    form.appendChild(breakLine);

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
		case "number":
		    var numberInput = document.createElement("input");
                    numberInput.setAttribute("type", "number");
                    numberInput.setAttribute("class", "input-item--admin");
                    numberInput.setAttribute("value", this.value);
                    numberInput.setAttribute("name", lang + key);
			numberInput.setAttribute('max', 100);
			numberInput.setAttribute('min',0);

                    label.appendChild(document.createTextNode(key + ":"));
                    form.appendChild(label);
                    form.appendChild(numberInput);

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
                document.getElementById('iframe').contentWindow.location.reload();
            }
        });
	clearform();
    }
);
