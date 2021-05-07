<?php
?>

<script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/jquery-1.4.3.min.js" ?>></script>
<script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/fancybox/jquery.mousewheel-3.0.4.pack.js" ?>></script>
<script type="text/javascript" src=<?= GALLERY_FILE_DIR . "scripts/fancybox/jquery.fancybox-1.3.4.pack.js" ?>></script>
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
