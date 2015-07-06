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
            <li><?php echo HTML::link('logout', "Deconnexion"); ?></li>
        </ul>
    </header>

    <div class="content">
    <p><?php echo HTML::link('upload', 'Uploader un ficher'); ?></li></p>
    <?php $donne = DB::select('select * from files where id_user = ? and id = ?', [Auth::user()->id, $_GET['id']]); ?>
    <h2>Mes photos</h2>

     <div id="files">
        <?php foreach($donne as $cloud) { ?>
                <p class="title"><?php echo $cloud->name; ?></p>
                <?php echo HTML::link('photos', "Retour"); ?>
                <?php $lol = substr(strrchr($cloud->file,'.'),1); ?>
                <?php if ($lol == "PNG" || $lol == "BNP" || $lol == "JPEG" || $lol == "JPG" || $lol == "jpg" || $lol == "jpeg" || $lol == "png" || $lol == "bmp") { ?>
                    <li><a href="view?id=<?php echo $cloud->id;?>"><img class="view" alt="image" src="cloud/images/<?php echo $cloud->file; ?>"></a></li>
                <?php } ?>
        <?php } ?>
    </div>

    </div>
</body>
</html>
