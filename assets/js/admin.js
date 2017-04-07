var submitButton = document.createElement("input");
submitButton.setAttribute("type", "submit");
submitButton.setAttribute("class", "input-item--admin input-item--submit");
submitButton.setAttribute("value", "Save");

var breakLine = document.createElement("hr");
breakLine.setAttribute("class", "line--fullLength line--inputDevider");

var token; 
var submiturl;

var form = document.getElementById("form");

function getchanges(changes) {
    while (form.firstChild) {
        form.removeChild(form.firstChild);
    }
    printlanguage(changes.de, "de");
    form.appendChild(breakLine);
    printlanguage(changes.en, "en");
    form.appendChild(submitButton);
	token = changes.token;
	submiturl = changes.submit;
}

function printlanguage(langspecific, lang) {
    $.each(langspecific,
        function (key, value) {
            switch (this.type) {
                case "input":
                    var textSingle = document.createElement("input");
                    textSingle.setAttribute("type", "text");
                    textSingle.setAttribute("class", "input-item--admin");
                    textSingle.setAttribute("value", this.value);
                    textSingle.setAttribute("name", lang + key);
                    form.appendChild(textSingle);
                    break;
                case "textarea":
                    var textMulti = document.createElement("textarea");
                    textMulti.setAttribute("class", "input-item--admin input-item--textarea");
                    textMulti.appendChild(document.createTextNode(this.value));
                    textMulti.setAttribute("name", lang + key);
                    form.appendChild(textMulti);
                    break;
            }
        }
    );
}
