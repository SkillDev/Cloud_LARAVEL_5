<!DOCTYPE html>
<html>
<head>
    <title>Laravel</title>
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('css/style.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo URL::asset('css/dropezone.css') ?>">
</head>
<body>
    <header>
        <h1><a title="acceuil" href="accueil"><img id="logo" alt="logo" src="<?php echo URL::asset('images/icon.png') ?>"></a></h1>
        <ul>
            <li><span><?php echo "Bonjour " . ucfirst(Auth::user()->username); ?></span></li>
            <li><?php echo HTML::link('accueil', 'Acceuil'); ?></li>
            <li><?php echo HTML::link('logout', "Deconnexion"); ?></li>
        </ul>
    </header>
    <div class="content">
        <h2>Contact</h2>
        <div id="form_upload">
            <?php echo Form::open(array('method' => 'post')); ?>
                <ul>
                    <li><?php echo Form::label('email','Votre email :'); ?></li>
                    <li><?php echo Form::text('email', Auth::user()->email); ?></li>
                    <li><?php echo Form::label('message','Votre message :'); ?></li>
                    <li><?php echo Form::textarea('message') ?></li>
                    <li><?php echo Form::submit("Envoyer"); ?></li>
                </ul>
            <?php echo Form::close(); ?>
        </div>

    </div>
</body>
</html>
