<?php
echo "
		<!DOCTYPE html>
		<html>
			<head>
				<style type=\"text/css\">
					.block{
						height:60px;
						font-size:20px;
						background-color:#dcd0ff;
						text-align:center;
						margin:0 1% 20px 1%;
						float:left;
						padding-top:10px;}
				</style>
			</head>
			<body>
				<form method=\"post\" action=\"\"> " ;
for ($i = 1; $i < 10; $i++) {
    $z = mt_rand(1, 4);
    echo " <label> X$i: </label> <input type=\"text\" name=\"$i\" size=\"1\" value=\"$z\" /> &nbsp &nbsp" ;
}
echo '<input type="submit" value="save">
							</form> <br />';

for ($i = 1; $i < 10; $i++) {
    $w = ($_POST[$i]*10)-2;
    echo " <div class=\"block\" style=\"width:$w%\"> $i <br />$w%+2%margin </div> ";
}
echo '
			</body>
		</html> ' ;
?>