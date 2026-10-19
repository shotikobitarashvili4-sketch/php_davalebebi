<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 3</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 3</h1>

    <h2>საქაღალდის არსებობის შემოწმება (GET)</h2>
    <form action="3.php" method="get">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="check" required>
        <br>
        <input class="btn" type="submit" value="შემოწმება">
    </form>

    <hr>
    <h2>წაშლა თუ ცარიელია (POST)</h2>
    <form action="3.php" method="post">
        <label>წასაშლელი საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="washla" value="წაშლა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_GET['check'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_GET['check']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        echo "საქაღალდე არსებობს: $saxeli";
    } else {
        echo "საქაღალდე არ არსებობს: $saxeli";
    }
    echo "</div>";
}

if (isset($_POST['washla'])) {
    $saxeli = str_replace(array("..", "/", "\\"), "", $_POST['saxeli']);
    $gza = $base . "/" . $saxeli;
    echo "<div class='msg'>";
    if (is_dir($gza)) {
        $shigtavsi = scandir($gza);
        $raodenoba = count($shigtavsi) - 2;
        if ($raodenoba == 0) {
            rmdir($gza);
            echo "საქაღალდე წაიშალა, რადგან ცარიელი იყო: $saxeli";
        } else {
            echo "საქაღალდე ცარიელი არ არის, ამიტომ ვერ წაიშალა: $saxeli";
        }
    } else {
        echo "ასეთი საქაღალდე არ არსებობს: $saxeli";
    }
    echo "</div>";
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
