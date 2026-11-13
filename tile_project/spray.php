<?php
$serverName = "localhost"; 
$connectionOptions = array("Database" => "TileQC_DB", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) { die(print_r(sqlsrv_errors(), true)); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $shift = $_POST['shift'];
    $spray_no = $_POST['spray_no'];
    $formula = $_POST['formula'];
    $residue = $_POST['residue'];
    $temp_in = $_POST['temp_in'];
    $temp_out = $_POST['temp_out'];
    $moisture = $_POST['moisture'];
    $density = $_POST['density'];

    $sql = "INSERT INTO SprayDryer (ReportDate, Shift, SprayNumber, BodyFormula, BodyResidue, TempIn, TempOut, GranuleMoisture, GranuleDensity) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($date, $shift, $spray_no, $formula, $residue, $temp_in, $temp_out, $moisture, $density);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) { echo "<p style='color:green; text-align:center; font-weight:bold;'>اطلاعات اسپری ذخیره شد!</p>"; } 
    else { echo "<p style='color:red; text-align:center;'>خطا!</p>"; die(print_r(sqlsrv_errors(), true)); }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>عملکرد اسپری</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: Tahoma; }
        button { background: #009688; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-family: Tahoma; font-size: 16px; margin-top: 10px;}
        button:hover { background: #00796b; }
        .link { text-align: center; display: block; margin-top: 15px; text-decoration: none; color: #555;}
    </style>
</head>
<body>
<div class="form-box">
    <h2 style="text-align:center; color:#333;">گزارش عملکرد اسپری (QC-F0800)</h2>
    <form method="POST" action="">
        <label>تاریخ:</label> <input type="text" name="date" required>
        <label>شیفت:</label> 
        <select name="shift"><option value="صبح">صبح</option><option value="عصر">عصر</option><option value="شب">شب</option></select>
        
        <label>شماره اسپری:</label> <input type="text" name="spray_no" required>
        
        <h3 style="color:#009688; margin-top:20px; border-bottom: 1px solid #ccc; padding-bottom:5px;">مشخصات دوغاب</h3>
        <label>فرمول بدنه:</label> <input type="text" name="formula">
        <label>مانده روی الک بدنه:</label> <input type="text" name="residue">

        <h3 style="color:#009688; margin-top:20px; border-bottom: 1px solid #ccc; padding-bottom:5px;">شرایط اسپری و گرانول</h3>
        <label>دمای ورودی:</label> <input type="text" name="temp_in">
        <label>دمای خروجی:</label> <input type="text" name="temp_out">
        <label>رطوبت گرانول (%):</label> <input type="text" name="moisture">
        <label>دانسیته گرانول:</label> <input type="text" name="density">

        <button type="submit">ذخیره گزارش اسپری</button>
    </form>
    <a href="glaze_line.php" class="link">فرم خط لعاب</a>
</div>
</body>
</html>