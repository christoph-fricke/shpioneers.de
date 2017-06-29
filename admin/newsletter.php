  <!DOCTYPE html>
    <html>

    <head>
        <link rel="stylesheet" href="../../assets/css/webinterface/admin.css" />
        <link rel="stylesheet" href="../../assets/css/materialdesignicons.min.css" />
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Roboto:400,700" />
    </head>

    <body>
        <form id="newsletter" class="newsletter__grid">
            <h2 class="input__header">German mail</h2>
            <input id="subjectde" class="newsletter__input input-item" type="text" name="subjectde" placeholder="Subject" required />
            <textarea id="messagede" class="newsletter__input input-item input-item--textarea" name="messagede" placeholder="Message" required onclick="parent.iframeLoaded()"></textarea>

            <h2 class="input__header">English mail</h2>
            <input id="subjecten" class="newsletter__input input-item" type="text" name="subjecten" placeholder="Subject" required />
            <textarea id="messageen" class="newsletter__input input-item input-item--textarea" name="messageen" placeholder="Message" required onclick="parent.iframeLoaded()"></textarea>
            <input class="input-item--submit" type="submit" value="Submit" />
        </form>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="../../assets/js/sendNewsletter.js"></script>
    </body>

    </html>