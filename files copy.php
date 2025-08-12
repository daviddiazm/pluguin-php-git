<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title></title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
</head>
<body>
    <h3>Cambios generados por archivo</h3>
    <?php
    $dir = "./";
    $flies = glob('./*.php');
    print_r($flies);
    $command = "git log -p index.php";
    $commitsFile = shell_exec($command);
    echo '<hr>';
    ?>
    <section>
        <p class="w-screen">
            <textarea class="w-screen" name="" id="" value="<?=$commitsFile?>" cols="1000"></textarea>
        </p>
    </section>
</body>

</html>