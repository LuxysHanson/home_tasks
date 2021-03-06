<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Моя галерея</title>
    <link rel="stylesheet" type="text/css" href=<?= GALLERY_FILE_DIR . "style.css" ?> />
    <script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/jquery-1.4.3.min.js" ?>></script>
    <script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/fancybox/jquery.mousewheel-3.0.4.pack.js" ?>></script>
    <script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/fancybox/jquery.fancybox-1.3.4.pack.js" ?>></script>
    <link rel="stylesheet" type="text/css" href=<?= GALLERY_FILE_DIR . "scripts/fancybox/jquery.fancybox-1.3.4.css" ?> media="screen"/>
    <script type="text/javascript">
        $(document).ready(function () {
            $("a.photo").fancybox({
                transitionIn: 'elastic',
                transitionOut: 'elastic',
                speedIn: 500,
                speedOut: 500,
                hideOnOverlayClick: false,
                titlePosition: 'over'
            });
        }); </script>

</head>
<body>
    <div id="main">
        <div class="post_title">
            <h2><?= $attributes['title'] ?></h2>
        </div>
        <div class="gallery">
            <? foreach ($attributes['galleries'] as $item) : ?>
                <a rel="gallery" class="photo" href="<?= IMG_DIRECTORY . 'big/' . $item ?>">
                    <img src="<?= IMG_DIRECTORY . 'small/' . $item ?>" width="150" height="100" />
                </a>
            <? endforeach; ?>
        </div>
    </div>
</body>
</html>
