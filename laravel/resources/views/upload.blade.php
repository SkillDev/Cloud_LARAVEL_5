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
        <?php echo Form::open(array('method' => 'post', 'files'=>true)); ?>
        <div id="form_upload">

            <ul>
                <li><?php echo Form::label('name','Nom du fichier :'); ?></li>
                <li><?php echo Form::text('name', null); ?></li>
            </ul>
        </div>
        <div id="space">
            <span><?php echo Form::label('file', 'Fichier : '); ?></span>
            <span><?php echo Form::file('file', array('class' => 'dropzone', 'id' => 'drag_space', 'name' => 'file')); ?></span>
            <?php echo Form::submit("Ajouter au Cloud"); ?>
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}">
        </div>
        <?php echo Form::close(); ?>
    </div>
    <script src="<?php echo URL::asset('js/dropezone.js') ?>"> </script>
</body>
</html>
