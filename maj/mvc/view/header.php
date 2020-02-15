<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="media/css/bootstrap-theme.min.css"/>
        <link rel="stylesheet" href="media/css/bootstrap.min.css"/>
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="media/css/styles.css"/>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <title>Hydratis - Administration</title>

        <!-- <script src="//code.jquery.com/jquery-1.11.2.min.js"></script> -->
        <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <script type="text/javascript" src="media/tinymce/tinymce.min.js"></script>
        <script type="text/javascript">
           tinymce.init({
                selector: "textarea.tiny",
                theme: "modern",
                content_css : "media/css/stylTiny.css",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern jbimages"
                ],
                toolbar1: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
                toolbar2: "print preview media | forecolor backcolor emoticons | jbimages",
                image_advtab: true,
                width: "84%",
                height: "200",
                relative_urls: false,
            });
        </script>

        <script src="media/js/script.js"></script>

    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div style="position:absolute;top:0;bottom:0;" class="col-xs-2 bg-warning">
                    <a href="index.php" id="logo"><img src="media/img/logoE.png" alt="E-partenaire" /></a>

                        <div class="menu-title"><a href="index.php?titre=liste-pages">Pages</a></div>
                        <div class="menu-title"><a href="index.php?titre=liste-actualites">Actualité</a></div>
                        <div class="menu-title"><a href="index.php?titre=liste-devis">Devis</a></div>


                </div>
