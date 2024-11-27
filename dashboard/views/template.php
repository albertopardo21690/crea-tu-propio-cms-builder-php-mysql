<?php

// Capturar parámetros de la URL

$routesArray = explode("/", $_SERVER["REQUEST_URI"]);
array_shift($routesArray);

foreach ($routesArray as $key => $value) {
    $routesArray[$key] = explode("?", $value)[0];
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!--=============================================
	CUSTOM JS SERVER
	===============================================-->

    <script src="/views/assets/js/alerts/alerts.js"></script>

    <!--=============================================
	PLUGINS CSS
	===============================================-->

    <!-- https://www.w3schools.com/bootstrap5/ -->
    <link rel="stylesheet" href="/views/assets/plugins/bootstrap5/bootstrap.min.css">
    <!-- https://fontawesome.com/v5/search -->
    <link rel="stylesheet" href="/views/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- https://icons.getbootstrap.com/ -->
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.3/font/bootstrap-icons.min.css">
    <!-- https://www.jqueryscript.net/demo/Google-Inbox-Style-Linear-Preloader-Plugin-with-jQuery-CSS3/#google_vignette -->
    <link rel="stylesheet" href="/views/assets/plugins/material-preloader/material-preloader.css">
    <!-- https://codeseven.github.io/toastr/demo.html -->
    <link rel="stylesheet" href="/views/assets/plugins/toastr/toastr.min.css">
    <!--  https://www.daterangepicker.com/ -->
    <link rel="stylesheet" href="/views/assets/plugins/daterangepicker/daterangepicker.css">
    <!-- https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/ -->
    <link rel="stylesheet" href="/views/assets/plugins/tags-input/tags-input.css">
    <!-- https://select2.org/ -->
    <link rel="stylesheet" href="/views/assets/plugins/select2/select2.min.css">
    <link rel="stylesheet" href="/views/assets/plugins/select2/select2-bootstrap4.min.css">
    <!-- https://xdsoft.net/jqplugins/datetimepicker/ -->
    <link rel="stylesheet" href="/views/assets/plugins/datetimepicker/datetimepicker.min.css">
    <!-- https://summernote.org -->
    <link rel="stylesheet" href="/views/assets/plugins/summernote/summernote-bs4.min.css">
    <link rel="stylesheet" href="/views/assets/plugins/summernote/summernote.min.css">
    <link rel="stylesheet" href="/views/assets/plugins/summernote/emoji.css">
    <!-- https://codemirror.net/ -->
    <link rel="stylesheet" href="/views/assets/plugins/codemirror/codemirror.css">
    <link rel="stylesheet" href="/views/assets/plugins/codemirror/monokai.css">

    <!--=============================================
	PLUGINS JS
	===============================================-->

    <!-- https://jquery.com/ -->
    <script src="/views/assets/plugins/jquery/jquery.min.js"></script>
    <!-- https://jqueryui.com/ -->
    <script src="/views/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- https://www.w3schools.com/bootstrap5/ -->
    <script src="/views/assets/plugins/bootstrap5/bootstrap.bundle.min.js"></script>
    <!-- https://sweetalert2.github.io/ -->
    <script src="/views/assets/plugins/sweetalert/sweetalert.min.js"></script>
    <!-- https://www.jqueryscript.net/demo/Google-Inbox-Style-Linear-Preloader-Plugin-with-jQuery-CSS3/ -->
    <script src="/views/assets/plugins/material-preloader/material-preloader.js"></script>
    <!-- https://codeseven.github.io/toastr/demo.html -->
    <script src="/views/assets/plugins/toastr/toastr.min.js"></script>
    <!-- http://josecebe.github.io/twbs-pagination/ -->
    <script src="/views/assets/plugins/twbs-pagination/twbs-pagination.min.js"></script>
    <!-- https://momentjs.com/ -->
    <script src="/views/assets/plugins/moment/moment.min.js"></script>
    <script src="/views/assets/plugins/moment/moment-with-locales.min.js"></script>
    <!--  https://www.daterangepicker.com/ -->
    <script src="/views/assets/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/examples/ -->
    <script src="/views/assets/plugins/tags-input/tags-input.js"></script>
    <!-- https://select2.org/ -->
    <script src="/views/assets/plugins/select2/select2.full.min.js"></script>
    <!-- https://xdsoft.net/jqplugins/datetimepicker/ -->
    <script src="/views/assets/plugins/datetimepicker/datetimepicker.full.min.js"></script>
    <!-- https://summernote.org -->
    <script src="/views/assets/plugins/summernote/summernote.min.js"></script>
    <script src="/views/assets/plugins/summernote/summernote-bs4.js"></script>
    <script src="/views/assets/plugins/summernote/summernote-code-beautify-plugin.js"></script>
    <script src="/views/assets/plugins/summernote/emoji.config.js"></script>
    <script src="/views/assets/plugins/summernote/tam-emoji.min.js"></script>
    <!-- https://codemirror.net/ -->
    <script src="/views/assets/plugins/codemirror/codemirror.js"></script>
    <script src="/views/assets/plugins/codemirror/xml.js"></script>
    <script src="/views/assets/plugins/codemirror/formatting.js"></script>
    <!-- https://www.chartjs.org/ -->
    <script src="/views/assets/plugins/chartjs/chartjs.min.js"></script>

    <!--=============================================
	CUSTOM CSS
	===============================================-->
    <link rel="stylesheet" href="/views/assets/css/custom/custom.css">


</head>

<body>


    <!--=============================================
	CUSTOM JS
	===============================================-->

    <script src="/views/assets/js/forms/forms.js"></script>


</body>

</html>