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
     <h2>Mes musique</h2>

     <div id="files">
        <table>
            <tr>
                <th>Name :</th>
                <th>Music :</th>
                <th>Download :</th>
                <th>Delete</th>
            </tr>
         <?php foreach($donne as $cloud) { ?>
                <?php $ex = substr(strrchr($cloud->file,'.'),1); ?>
                <?php if ($ex == "mp3" || $ex =="MP3" || $ex == "MPEG1" || $ex == "MPEG2") { ?>
                    <tr>
                        <td class="title"><?php echo $cloud->name; ?></td>
                        <td><p><?php echo $cloud->file; ?><p></td>
                        <td><a href="cloud/music/<?php echo $cloud->file; ?>" download="cloud/music/<?php echo $cloud->file; ?>" title="download">Download</a></td>
                        <td><a title="supprimer" href="delete?id=<?php echo $cloud->id; ?>">Delete</a></td>
                    </tr>
                <?php } ?>
        <?php } ?>
        </table>
    </div>

    </div>
</body>
</html>
