<!DOCTYPE html>
<html>
    <head>
        <title>
            Пример для Федяки
        </title>
        <meta  charset="UTF-8">
    </head>
    <body>
    <form method="post" action="">
        <?php for($i = 1; $i < 9; $i ++): ?>
            <label>x<?php echo $i; ?></label>
            <input style="width: 10px;" name="x[<?php echo $i; ?>]" value="<?php echo rand(1,3); ?>" type="text">
        <?php endfor; ?>
        <input type="submit" name="show">
    </form>
    <div style="width: 100%;">
        <?php if($_POST['show']): ?>
            <?php foreach($_POST['x'] as $k => $width): ?>
                <div style="margin: 1%; float: left; height: 100px; background-color: #63adc5; width: <?php echo (10 * $width - 1*$width); ?>%">
                    <h1 style="text-align: center; margin-top: 20px;"><?php echo $k; ?></h1>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
    </body>
</html>