<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>ნიშნების უწყისი</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>ნიშნების უწყისი</h1>
    <p>შეავსეთ სტუდენტის მონაცემები. დამუშავება ხდება POST მეთოდით.</p>

    <form action="davaleba2.php" method="post">
        <label>სტუდენტის სახელი:</label>
        <input type="text" name="saxeli" required>

        <label>სტუდენტის გვარი:</label>
        <input type="text" name="gvari" required>

        <label>კურსი:</label>
        <select name="kursi">
            <option>I</option>
            <option>II</option>
            <option>III</option>
            <option>IV</option>
        </select>

        <label>სემესტრი:</label>
        <select name="semestri">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
            <option>6</option>
            <option>7</option>
            <option>8</option>
        </select>

        <label>სასწავლო კურსი (საგანი):</label>
        <input type="text" name="sagani" required>

        <label>მიღებული ნიშანი (0-100):</label>
        <input type="number" name="nishani" min="0" max="100" required>

        <label>ლექტორის სახელი:</label>
        <input type="text" name="leqtori_saxeli" required>

        <label>ლექტორის გვარი:</label>
        <input type="text" name="leqtori_gvari" required>

        <label>დეკანის სახელი:</label>
        <input type="text" name="dekani_saxeli" required>

        <label>დეკანის გვარი:</label>
        <input type="text" name="dekani_gvari" required>

        <br>
        <input class="btn" type="submit" name="gagzavna" value="გაგზავნა">
    </form>

<?php
if (isset($_POST['gagzavna'])) {
    $saxeli = $_POST['saxeli'];
    $gvari = $_POST['gvari'];
    $kursi = $_POST['kursi'];
    $semestri = $_POST['semestri'];
    $sagani = $_POST['sagani'];
    $nishani = $_POST['nishani'];
    $leqtori_saxeli = $_POST['leqtori_saxeli'];
    $leqtori_gvari = $_POST['leqtori_gvari'];
    $dekani_saxeli = $_POST['dekani_saxeli'];
    $dekani_gvari = $_POST['dekani_gvari'];

    if ($nishani >= 91) {
        $shefaseba = "A";
        $ganmarteba = "ფრიადი";
    } else if ($nishani >= 81) {
        $shefaseba = "B";
        $ganmarteba = "ძალიან კარგი";
    } else if ($nishani >= 71) {
        $shefaseba = "C";
        $ganmarteba = "კარგი";
    } else if ($nishani >= 61) {
        $shefaseba = "D";
        $ganmarteba = "დამაკმაყოფილებელი";
    } else if ($nishani >= 51) {
        $shefaseba = "E";
        $ganmarteba = "საკმარისი";
    } else if ($nishani >= 41) {
        $shefaseba = "FX";
        $ganmarteba = "ვერ ჩააბარა";
    } else {
        $shefaseba = "F";
        $ganmarteba = "ჩაჭრილი";
    }
?>
    <h2>შედეგი</h2>
    <table>
        <tr>
            <th>ველი</th>
            <th>მნიშვნელობა</th>
        </tr>
        <tr>
            <td>სტუდენტის სახელი</td>
            <td><?php echo $saxeli; ?></td>
        </tr>
        <tr>
            <td>სტუდენტის გვარი</td>
            <td><?php echo $gvari; ?></td>
        </tr>
        <tr>
            <td>კურსი</td>
            <td><?php echo $kursi; ?></td>
        </tr>
        <tr>
            <td>სემესტრი</td>
            <td><?php echo $semestri; ?></td>
        </tr>
        <tr>
            <td>სასწავლო კურსი</td>
            <td><?php echo $sagani; ?></td>
        </tr>
        <tr>
            <td>მიღებული ნიშანი</td>
            <td><?php echo $nishani; ?></td>
        </tr>
        <tr>
            <td>შეფასება</td>
            <td><?php echo $shefaseba; ?> — <?php echo $ganmarteba; ?></td>
        </tr>
        <tr>
            <td>ლექტორი</td>
            <td><?php echo $leqtori_saxeli . " " . $leqtori_gvari; ?></td>
        </tr>
        <tr>
            <td>დეკანი</td>
            <td><?php echo $dekani_saxeli . " " . $dekani_gvari; ?></td>
        </tr>
    </table>
<?php
}
?>
    <p class="back"><a href="index.php">მთავარ გვერდზე</a></p>
</div>
</body>
</html>
