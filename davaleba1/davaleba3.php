<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სტუდენტის შემოწმება</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>სტუდენტის შემოწმება</h1>
    <p>უპასუხეთ 5 შეკითხვას (3 ტესტური და 2 ღია). გაგზავნა ხდება POST მეთოდით.</p>

    <form action="davaleba3.php" method="post">
        <div class="q">
            <p><b>1.</b> PHP-ში ფორმის მონაცემების გადასაცემად რომელი მეთოდები გამოიყენება?</p>
            <input type="radio" name="q1" value="a" required> GET და POST<br>
            <input type="radio" name="q1" value="b"> PUT და DELETE<br>
            <input type="radio" name="q1" value="c"> FTP და SMTP<br>
            <input type="radio" name="q1" value="d"> HTML და CSS
        </div>

        <div class="q">
            <p><b>2.</b> HTML-ში ცხრილის შესაქმნელად რომელი ტეგი გამოიყენება?</p>
            <input type="radio" name="q2" value="a" required> &lt;div&gt;<br>
            <input type="radio" name="q2" value="b"> &lt;form&gt;<br>
            <input type="radio" name="q2" value="c"> &lt;table&gt;<br>
            <input type="radio" name="q2" value="d"> &lt;span&gt;
        </div>

        <div class="q">
            <p><b>3.</b> CSS-ში ელემენტის ფონის ფერის შესაცვლელად რომელი თვისება გამოიყენება?</p>
            <input type="radio" name="q3" value="a" required> color<br>
            <input type="radio" name="q3" value="b"> background-color<br>
            <input type="radio" name="q3" value="c"> font-size<br>
            <input type="radio" name="q3" value="d"> border
        </div>

        <div class="q">
            <p><b>4.</b> რა არის PHP-ის სრული სახელი? (ჩაწერეთ ტექსტი)</p>
            <input type="text" name="q4" required>
        </div>

        <div class="q">
            <p><b>5.</b> რომელი სიმბოლოთი იწყება PHP-ში ცვლადის სახელი?</p>
            <textarea name="q5" required></textarea>
        </div>

        <input class="btn" type="submit" name="gagzavna" value="შემოწმება">
    </form>

<?php
if (isset($_POST['gagzavna'])) {
    $swori = 0;

    // ტესტური შეკითხვები
    if ($_POST['q1'] == "a") {
        $swori++;
    }
    if ($_POST['q2'] == "c") {
        $swori++;
    }
    if ($_POST['q3'] == "b") {
        $swori++;
    }

    // ღია შეკითხვები
    $q4 = strtolower(trim($_POST['q4']));
    if ($q4 == "php: hypertext preprocessor" || $q4 == "hypertext preprocessor") {
        $swori++;
    }

    $q5 = trim($_POST['q5']);
    if ($q5 == "$") {
        $swori++;
    }
?>
    <p class="score">სწორი პასუხების რაოდენობა: <?php echo $swori; ?>/5</p>
<?php
}
?>
    <p class="back"><a href="index.php">მთავარ გვერდზე</a></p>
</div>
</body>
</html>
