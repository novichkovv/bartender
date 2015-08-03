<?php
	echo '
		<!DOCTYPE html>
		<html>
			<head>
				<link rel="stylesheet" type="text/css" href="block.css">
			</head>
			<body>
				<form method="post" action=""> ' ;	
					for ($i = 1; $i < 10; $i++) {
						$z = mt_rand(1, 10);
						echo " <label> X$i: </label> <input type=\"text\" name=\"$i\" size=\"2\" value=\"$z\" /> &nbsp &nbsp" ; 
						} 
					echo '<input type="submit" value="save"> 
							</form> <br />';
	
						for($z=1; $z <= 10; $z++){
							for ($i = 1; $i < 10; $i++) {
								if($_POST[$i] == $z) {
									$w = ($_POST[$i]*10); //скобки не нужны (умножение имеет приоритет перед присваиванием
									echo " <div class=\"block\" id=\"block$_POST[$i]\"> $i  <br /> $w%</div> ";//Логично перенести строку в коде после <br />
								}			
							}
						}
	echo ' 
			</body>
		</html> ' ;
?>
<!--А вообще есть вариант оформлять следующим образом, чтобы все читалось хорошо (обычно файл с HTML (представление или view) стараются отделить от кода (controller)):-->
<!--Здесь отделять логику нет необходимости, но оформить можно как html файл со вставками php, а не наоборот.-->

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="block.css">
</head>
<body>
    <form method="post" action="">
        <?php for ($i = 1; $i < 10; $i++): ?><!-- обрати внимание на альтернативные выражения для удобной вставки php в html (if, for, foreach)-->
            <?php $z = mt_rand(1, 10); ?>
            <label> X<?php echo $i; ?>: </label>
            <input type="text" name="<?php echo $i; ?>" size="2" value="<?php echo $z; ?>" /> &nbsp; &nbsp;
        <?php endfor; ?>
        <input type="submit" value="save" />
    </form>
    <br />
    <?php for($z=1; $z <= 10; $z++): ?>
        <?php for($i = 1; $i < 10; $i++): ?>
            <?php if($_POST[$i] == $z): ?>
                <div class="block" id="block<?php echo $_POST[$i]; ?>">
                    <?php echo $i; ?>
                    <br />
                    <?php echo $_POST[$i]*10; ?>%
                </div>
            <?php endif; ?>
        <?php endfor; ?>
    <?php endfor; ?>
</body>
</html>

<!-- А вот как бы я это сделал: -->
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="block.css">
</head>
<body>
<form method="post" action="">
    <?php for ($i = 1; $i < 10; $i++): ?>
        <label> X<?php echo $i; ?>: </label>
        <input type="text" name="width[<?php echo $i; ?>]" size="2" value="<?php echo mt_rand(1, 10); ?>" /> &nbsp; &nbsp;
        <!-- посмотри как выглядит аттрибут name (Будет передаваться в виде двухурвнего массива $_POST['name'][$i]). -->
    <?php endfor; ?>
    <input type="submit" value="Sort Ascending" name="sort_ascending_button" />
    <input type="submit" value="Sort Descending" name="sort_descending_button" />
    <!-- если ты в кнопку вставляешь аттрибут name, то обработчик, в случае нажатия этой кнопки, получает еще и значение (аттрибут value) этогй кнопки,
    в данном случае это будет $_POST['sort_ascending_button'] со значением "Sort Ascending" и т.д.
    Таким образом, ты можешь использовать несколько кнопок и знать, какая именно была нажата (См. дальше) -->
</form>
<br />
<?php if($_POST['width']): ?>
    <?php if(isset($_POST['sort_ascending_button'])): ?><!-- если этот элемент массива существует, значит кнопка с name="sort_ascending_button" была нажата -->
        <?php sort($_POST['width']); ?> <!-- встроенная функция php для сортировки массива по значению в порядке возрастания
                                            (есть очень много полезных встроенных функция для работы с массивами) -->
    <?php endif; ?>
    <?php if(isset($_POST['sort_descending_button'])): ?><!-- если этот элемент массива существует, значит кнопка с name="sort_descending_button" была нажата -->
        <?php rsort($_POST['width']); ?> <!-- встроенная функция php для сортировки массива по значению в порядке убывания -->
    <?php endif; ?>
    <?php foreach($_POST['width'] as $i => $width): ?>
        <!-- Конструкция foreach($array as $key => $value) { //code here} позволяет проходить циклом по всем элементам массива,
        даже если мы не знаем их индекс и количество (количество легко узнать с помощью $count = count($array); -->
        <div class="block block-<?php echo $width; ?>">
            <!-- использовать id для задания стилей здесь не самый лучший выбор. Например, если у нас сайт расширился, и стало этих плиток не 10, а тысяча,
            мы же не будем прописывать стили для тысячи плиток по id.
            или мы не знаем заранее количество плиток (например, получаем это значение из базы данных),
            нам тогда надо прописывать стили с запасом, что есть полная бредятина.
            А так нам нужно всего 10 классов плиток, и плиток с одинаковыми классами может быть сколько угодно -->
            <?php echo $i; ?><br />
            <?php echo ($width * 10); ?>%
        </div>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>