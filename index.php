<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Project/PHP/PHPProject.php to edit this template
-->
<html>

<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>

<!-- <body class=" flex flex-col justify-center items-center bg-[url(https://is1-ssl.mzstatic.com/image/thumb/Purple116/v4/75/48/07/754807a6-f18a-0ab8-28dc-c1649676deb4/AppIcon-0-0-1x_U007emarketing-0-10-0-85-220.png/1200x630wa.png)] bg-cover bg-bottom bg-no-repeat bg-fixed "> -->
<!-- <body class=" flex flex-col justify-center items-center bg-[url(https://cariai.com/agentui/img/login-home.png)] bg-cover bg-center bg-no-repeat bg-fixed "> -->
<!-- <body class=" flex flex-col justify-center items-center bg-[url(https://play-lh.googleusercontent.com/TJFqyNxIYEZxgAEM2fhIgJRzPeVINUb5xkS67cfUANwvPiAQLl6cXXRXrvmU7da5UA3H)] bg-cover bg-bottom bg-no-repeat bg-fixed "> -->
<body class=" flex flex-col justify-center items-center bg-[url(https://i.ytimg.com/vi/kBsNrkMwp-I/maxresdefault.jpg)] bg-cover bg-center bg-no-repeat bg-fixed ">
    <h1 class="text-3xl font-bold p-8 ">
        Visualizador de commits
    </h1>
    <?php
    $commitArray = [];
    $comando = 'git log --pretty=format:"%h %s DATEMAKE:(%cd) - MERGELOG%d ENDLOG"';
    $terminalLog = (string) shell_exec($comando);

    $arrLog = explode("ENDLOG", $terminalLog);
    foreach ($arrLog as $key => $value) {
        $initPostDate = strpos($value, "DATEMAKE");
        $initMerge = strpos($value, "MERGELOG");
        $commitId = substr($value, 0, 8);
        $msg = substr($value, 8, $initPostDate - 8);
        $date = substr($value, $initPostDate + 10, 24);
        $merge = substr($value, $initMerge + 9, 100);
        if($merge === "") {
            $merge = "(main)";
        }
        $info = [
            "commitId" => $commitId,
            "msg" => $msg,
            "date" => $date,
            "merge" => $merge
        ];
        $commitArray[] = $info;
    }
    ?>
    
    <section class=" h-168 overflow-auto flex justify-center flex-wrap w-full rounded-2xl bg-[#ffffff9c] backdrop-blur-sm ">
        <?php 
        foreach ($commitArray as $key => $commitInfo) { ?>
            <section class="  bg-[#ffffff9c] backdrop-blur-2xl w-96 m-2 min-h-64 rounded-sm " >
                <h3 class="font-bold p-2 hover:text-blue-500"> <a target="_blank" href="commitId.php?id=<?=$commitInfo['commitId']?>"><?=$commitInfo['commitId']?></a> </h3>
                <section class="bg-[#ffffff9c] backdrop-blur-2xl rounded-md h-83/100 p-3">
                    <p class="text-bold "><span class="font-semibold">Fecha</span> = <?= $commitInfo['date']?></p>
                    <p class="text-bold "><span class="font-semibold">Rama</span> = <?= $commitInfo['merge'] ?></p>
                    <p class="text-bold h-3/4 bg-white p-2 rounded-md "><?= $commitInfo['msg']?></p>
                </section>
            </section>
        <?php
        }
        ?>
    </section>
</body>

</html>