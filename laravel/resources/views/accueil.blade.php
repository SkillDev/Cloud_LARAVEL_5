<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('css/style.css') ?>">
</head>
<body>
    <header>
        <h1><a title="acceuil" href="accueil"><img id="logo" alt="logo" src="<?php echo URL::asset('images/icon.png') ?>"></a></h1>
        <ul>
            <li><span><?php echo "Bonjour " . ucfirst(Auth::user()->username); ?></span></li>
            <li><?php echo HTML::link('upload', 'Uploader un ficher'); ?></li>
            <li><?php echo HTML::link('contact', 'Contact'); ?></li>
            <li><?php echo HTML::link('logout', "Deconnexion"); ?></li>
        </ul>
    </header>

    <div class="content">

     <h2>Mes fichiers</h2>

    <div id="files">
        <ul>
            <li><?php echo HTML::link('photos', 'Photos'); ?></li>
            <li><?php echo HTML::link('videos', 'Videos'); ?></li>
            <li><?php echo HTML::link('music', 'Music'); ?></li>
            <li><?php echo HTML::link('text', 'Text'); ?></li>
            <li><?php echo HTML::link('compressed', 'Compressed files'); ?></li>
        </ul>
    </div>

    </div>
</body>
</html>
