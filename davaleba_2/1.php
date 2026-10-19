<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>დავალება 1</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>დავალება 1</h1>
    <p>POST-ით შეიყვანეთ საქაღალდის სახელი. თუ არ არსებობს, შეიქმნება. შემდეგ GET პარამეტრით show=1 გამოჩნდება შედეგი.</p>

    <form action="1.php" method="post">
        <label>საქაღალდის სახელი:</label>
        <input type="text" name="saxeli" required>
        <br>
        <input class="btn" type="submit" name="sheqmna" value="შექმნა">
    </form>

<?php
$base = "folders";
if (!file_exists($base)) {
    mkdir($base);
}

if (isset($_POST['sheqmna'])) {
    $saxeli = $_POST['saxeli'];
    $saxeli = str_replace("..", "", $saxeli);
    $saxeli = str_replace("/", "", $saxeli);
    $saxeli = str_replace("\\", "", $saxeli);
    $gza = $base . "/" . $saxeli;

    if ($saxeli != "" && !file_exists($gza)) {
        mkdir($gza);
        header("Location: 1.php?show=1&ok=1&saxeli=" . urlencode($saxeli));
        exit;
    } else {
        header("Location: 1.php?show=1&ok=0&saxeli=" . urlencode($saxeli));
        exit;
    }
}

if (isset($_GET['show']) && $_GET['show'] == "1") {
    echo "<div class='msg'>";
    if (isset($_GET['ok']) && $_GET['ok'] == "1") {
        echo "საქაღალდე წარმატებით შეიქმნა: " . $_GET['saxeli'];
    } else {
        echo "საქაღალდე ვერ შეიქმნა (უკვე არსებობს ან სახელი არასწორია): " . $_GET['saxeli'];
    }
    echo "</div>";
}
?>

    <p class="back"><a href="index.php">მენიუ</a></p>
</div>
</body>
</html>
