<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8">
    <title><?php echo $tplData['title']?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
    <?php
    foreach ($atom['css'] as $style) {
        echo "$style\n";
    }
    ?>
    </style>
</head>
<body>
<?php echo $atom['html']?>
<script src="<?php echo $feRoot ?>/static/mod.js"></script>
<script>
require(['vip-server-renderer/js/atom', '<?php echo $componentPath ?>'], function (Atom, App) {
    new Atom({
        el: '[atom-root]',
        data: <?php echo json_encode($tplData)?>,
        render: function (createElement) {
            return createElement('App', {
                props: {
                    <?php
                    foreach ($atom['props'] as $index => $prop) {
                        $propName = json_encode($prop);
                        $comma = $index === count($atom['props']) - 1 ? '' : ',';
                        echo "$propName: this[$propName]$comma";
                    }
                    ?>
                }
            });
        },
        components: {
            App: App
        }
    });
});
</script>
</body>
</html>
