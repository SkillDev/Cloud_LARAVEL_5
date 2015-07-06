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
            <li><?php echo HTML::link('logout', "Deconnexion"); ?></li>
        </ul>
    </header>

    <div class="content">
     <?php $donne = DB::select('select * from files where id_user = ?', [Auth::user()->id]); ?>
     <h2>Mes photos</h2>

     <div id="files">
        <table>
            <tr>
                <th>Name :</th>
                <th>Photo :</th>
                <th>Download</th>
                <th>Delete</th>
            </tr>
         <?php foreach($donne as $cloud) { ?>
                <?php $ex = substr(strrchr($cloud->file,'.'),1); ?>
                <?php if ($ex == "BMP" || $ex == "PNG" || $ex == "JPEG" || $ex == "JPG" || $ex == "jpg" || $ex == "jpeg" || $ex == "png" || $ex == "bmp") { ?>
            <tr>
                    <td class="title"><?php echo $cloud->name; ?></td>
                    <td><a title="view" href="view?id=<?php echo $cloud->id;?>"><img class="img" alt="image" src="cloud/images/<?php echo $cloud->file; ?>"></a></td>
                    <td><a href="cloud/images/<?php echo $cloud->file; ?>" download="cloud/images/<?php echo $cloud->file; ?>" title="download">Download</a></td>
                    <td><a title="supprimer" href="delete?id=<?php echo $cloud->id; ?>">Delete</a></td>
            </tr>
                <?php } ?>
        <?php } ?>
        </table>
    </div>

    </div>
</body>
</html>
