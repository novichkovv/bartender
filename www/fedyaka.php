<!DOCTYPE html>
<html>
    <head>
        <title>
            Пример для Федяки
        </title>
    </head>
    <body>
        <table border="0" width="1350">
            <tr>
               <td colspan="2" bgcolor="black">
                   <a href="">
                       <img src="http://dev.agstrad.com/pma/themes/pmahomme/img/logo_right.png" alt="Logo">
                   </a>
               </td>
            </tr>
            <tr>
                <td width="300" bgcolor="grey" height="500" valign="top" align="center">
                    <a href="http://google.com">GOOGLE</a><br /><br />
                    <a href="http://yandex.ru">YANDEX</a><br /><br />
                    <a href="http://yahoo.com">YAHOO</a><br /><br />
                    <a href="http://facebook.com">FACBOOK</a><br />
                </td>
                <td bgcolor="yellow" valign="top">
                    <h1>Main Header</h1>
                    <h2>Sub header</h2>
                    <ul>
                        <li>
                            Element 1
                        </li>
                        <li>
                            Element 2
                        </li>
                        <li>
                            Element 3
                        </li>
                        <li>
                            Element 4
                        </li>
                    </ul>
                    <form method="post" action="">
                        <label>Name</label><br>
                        <input type="text"><br>
                        <label>Email</label><br>
                        <input type="email"><br>
                        <label>Password</label><br>
                        <input type="password"><br>
                        <label>Gender</label><br>
                        <input name="gender" type="radio" checked> M
                        <input name="gender" type="radio"> F
                        <br>
                        <label>Age</label><br />
                        <select name="age">
                            <?php for($i = 0; $i < 50; $i ++): ?>
                                <option value="" <?php if($i == 25) echo 'selected'; ?>><?php echo $i; ?></option>
                            <?php endfor; ?>
                        </select>
                        <br>
                        <label>Send me emails</label>
                        <input type="checkbox" checked><br>
                        <input type="submit" value="Save form">
                    </form>
                </td>
            </tr>
        </table>
    </body>
</html>