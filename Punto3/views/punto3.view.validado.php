<!DOCTYPE html>
<html lang="es">
<head>
    <title><?= $title ?></title>
    <meta charset="utf-8" />
    <link href="<?= statics('main.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= statics('punto1.css') ?>" rel="stylesheet" type="text/css">
</head>
<body>
    <?php require 'nav.view.php' ?>
    <h1><?= $main_title ?></h1>

    <section>
        <h2>Datos validados. Todo correcto!</h2>
        <?php
            foreach ($_GET as $key => $value) {
                $$key = htmlspecialchars($_GET[$key]);
                if($$key <> "Enviar")
                    echo "<p>".$key.' = '.$$key."</p>";	
            }
        ?>
    </section>
</body>
</html>