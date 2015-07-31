<?php
/**
 * Created by PhpStorm.
 * User: enovichkov
 * Date: 31.07.2015
 * Time: 12:33
 */
if($_FILES) {
    foreach($_FILES as $file) {
        move_uploaded_file($file['tmp_name'], 'fedyaka/' . $file['name']);
    }
}
if(isset($_POST['download'])) {
    $file = 'fedyaka/' . $_POST['download'];
    header('Content-Description: File Transfer');
    header('Content-Disposition: attachment; filename=' . $_POST['download'] . '');
    echo file_get_contents($file);
}
if(isset($_POST['delete'])) {
    $file = 'fedyaka/' . $_POST['delete'];
    unlink($file);
}
$files = [];
$dir = opendir('fedyaka');
while (false !== $file = readdir($dir)) {
    if ($file == "." || $file == ".." ) continue;
    $files[] = $file;
}
closedir($dir);
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Загрузи-ка</title>
    </head>
    <body>
        <form enctype="multipart/form-data" method="post">
            <input name="file" type="file"><input type="submit" value="Load">
        </form>
        <br>
        <table border="1" cellpadding="5" cellspacing="0">
            <tr>
                <th>File name</th>
                <th>Actions</th>
            </tr>
        <?php if($files): ?>
            <?php foreach($files as $file): ?>
                <tr>
                    <td>
                        <?php echo $file; ?>
                    </td>
                    <td>
                        <form method="post" action="">
                            <button value="<?php echo $file; ?>" name="download" type="submit">Download</button>
                            <button value="<?php echo $file; ?>" name="delete" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
        </table>
    </body>
</html>