var token;

document.querySelector('#newsletter').addEventListener('submit', function (event) {
    event.preventDefault();
    var subjectde = document.querySelector('#subjectde');
    var messagede = document.querySelector('#messagede');
    var subjecten = document.querySelector('#subjecten');
    var messageen = document.querySelector('#messageen');
    var xhttp = new XMLHttpRequest()
    xhttp.open("POST", "/assets/php/newsletter/sendToAll.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("subjectde=" + subjectde.value + "&messagede=" + messagede.value + "&subjecten=" + subjecten.value + "&messageen=" + messageen.value + "&token=" + token);
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            getToken();
            console.log('Done');
        }
    }
}, false);

document.addEventListener('DOMContentLoaded', getToken, false);

function getToken() {
    var xhttp = new XMLHttpRequest()
    xhttp.open("POST", "/assets/php/tokenCreator.php", true);
    xhttp.send();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            token = xhttp.responseText;
        }
    }
}