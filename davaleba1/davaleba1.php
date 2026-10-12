<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>სახელფასო უწყისი</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="box">
    <h1>სახელფასო უწყისი</h1>
    <p>შეავსეთ თანამშრომლის მონაცემები. გაანგარიშება ხდება GET მეთოდით.</p>

    <form action="davaleba1.php" method="get">
        <label>სახელი:</label>
        <input type="text" name="saxeli" required>

        <label>გვარი:</label>
        <input type="text" name="gvari" required>

        <label>დაკავებული თანამდებობა:</label>
        <input type="text" name="tanamdeboba" required>

        <label>ხელფასის რაოდენობა (ლარი):</label>
        <input type="number" name="xelfasi" min="0" step="0.01" required>

        <label>აირჩიეთ საშემოსავლო გადასახადის პროცენტი (მე-2 შემთხვევისთვის):</label>
        <select name="procenti">
            <option value="5">5%</option>
            <option value="10">10%</option>
            <option value="15">15%</option>
            <option value="20" selected>20%</option>
            <option value="25">25%</option>
        </select>

        <br>
        <input class="btn" type="submit" name="gagzavna" value="გაგზავნა">
    </form>

<?php
if (isset($_GET['gagzavna'])) {
    $saxeli = $_GET['saxeli'];
    $gvari = $_GET['gvari'];
    $tanamdeboba = $_GET['tanamdeboba'];
    $xelfasi = $_GET['xelfasi'];
    $procenti = $_GET['procenti'];

    // პირველი შემთხვევა - ფიქსირებული 20%
    $fix_procenti = 20;
    $fix_gada = $xelfasi * $fix_procenti / 100;
    $fix_xelze = $xelfasi - $fix_gada;

    // მეორე შემთხვევა - არჩეული პროცენტი
    $arch_gada = $xelfasi * $procenti / 100;
    $arch_xelze = $xelfasi - $arch_gada;
?>
    <h2>შედეგი</h2>
    <table>
        <tr>
            <th>ველი</th>
            <th>მნიშვნელობა</th>
        </tr>
        <tr>
            <td>სახელი</td>
            <td><?php echo $saxeli; ?></td>
        </tr>
        <tr>
            <td>გვარი</td>
            <td><?php echo $gvari; ?></td>
        </tr>
        <tr>
            <td>თანამდებობა</td>
            <td><?php echo $tanamdeboba; ?></td>
        </tr>
        <tr>
            <td>დარიცხული ხელფასი</td>
            <td><?php echo $xelfasi; ?> ლარი</td>
        </tr>
        <tr>
            <th colspan="2">შემთხვევა 1: ფიქსირებული საშემოსავლო 20%</th>
        </tr>
        <tr>
            <td>საშემოსავლო გადასახადი (20%)</td>
            <td><?php echo $fix_gada; ?> ლარი</td>
        </tr>
        <tr>
            <td>ხელზე ასაღები ხელფასი</td>
            <td><?php echo $fix_xelze; ?> ლარი</td>
        </tr>
        <tr>
            <th colspan="2">შემთხვევა 2: არჩეული პროცენტი <?php echo $procenti; ?>%</th>
        </tr>
        <tr>
            <td>საშემოსავლო გადასახადი (<?php echo $procenti; ?>%)</td>
            <td><?php echo $arch_gada; ?> ლარი</td>
        </tr>
        <tr>
            <td>ხელზე ასაღები ხელფასი</td>
            <td><?php echo $arch_xelze; ?> ლარი</td>
        </tr>
    </table>
<?php
}
?>
    <p class="back"><a href="index.php">მთავარ გვერდზე</a></p>
</div>
</body>
</html>
