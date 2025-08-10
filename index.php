<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        echo "<h3>hola</h3>";
        echo "<h3>esto va en el segundo commit</h3>";
        echo "<h3>este es un cambio desde la rama de robledo</h3>";

        // $comando = 'git log --pretty=format:"%h%d %s (%cd) - ENDLOG"';
        $comando = 'git log --pretty=format:"%h %s DATEMAKE:(%cd) - MERGELOG%d ENDLOG"';
        $salida = (string) shell_exec($comando);

        $arrSalida = explode("ENDLOG", $salida);
        foreach ($arrSalida as $key => $value) {
            $initPostDate = strpos($value, "DATEMAKE");
            $initMerge = strpos($value, "MERGELOG");
            $commitId = substr($value,0,8);
            $msg = substr($value, 8, $initPostDate - 8 );
            $date = substr($value, $initPostDate + 9, 32 );
            $merge = substr($value, $initMerge + 9, 100 );
            $info = [
                "commitId"=> $commitId,
                "msg"=> $msg,
                "date"=> $date,
                "merge"=> $merge
            ];
            echo "<hr>";

            // echo "<p>$value</p>";
            echo $info['commitId'];
            echo "<p></p>";
            echo $info['msg'];
            echo "<p></p>";
            echo $info['date'];
            echo "<p></p>";
            echo $info['merge'];
        }
        echo "<hr>";

        ?>
    </body>
</html>
