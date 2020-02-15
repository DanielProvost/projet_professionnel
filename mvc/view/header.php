<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $meta_desc; ?>">
    <meta name="author" content="e-partenaire.fr">
    <meta name="keyword" content="Hydratis">
    <meta name="robots" content="all">
    <title><?php echo $meta_title; ?></title>
    
    <!-- Bootstrap Core CSS -->
    <link href="/media/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/media/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600|Roboto+Slab:300,400,700|Roboto:100,400,700&display=swap" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="/media/css/animate.css" rel="stylesheet">
    <link href="/media/css/main.css?<?php echo filemtime('media/css/main.css'); ?>" rel="stylesheet">
    <link href="/media/vendor/slider/style.css" rel="stylesheet"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="/media/css/jquery.cookiebar.css" />
    <link rel="stylesheet" type="text/css" href="/media/css/jquery.fancybox.min.css" />

    <script src="/media/vendor/jquery/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <!-- Recaptcha -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-fixed-top">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <?php include('inc-nav1-'.$langue.'.php');?>
    </nav>
