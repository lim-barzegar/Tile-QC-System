<?php
$serverName = "localhost"; 
$connectionOptions = array(
    "Database" => "TileQC_DB",
    "CharacterSet" => "UTF-8"
);
$conn = sqlsrv_connect($serverName, $connectionOptions);

if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $shift = $_POST['shift'];
    $mill_no = $_POST['mill_no'];
    $moisture = $_POST['moisture'];
    $density = $_POST['density'];
    $viscosity = $_POST['viscosity'];
    $residue = $_POST['residue'];
    $notes = $_POST['notes'];

    $sql = "INSERT INTO BallMill (ReportDate, Shift, MillNumber, MaterialMoisture, SlipDensity, SlipViscosity, Residue, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($date, $shift, $mill_no, $moisture, $density, $viscosity, $residue, $notes);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "<p style='color:green; text-align:center; font-weight:bold;'>اطلاعات بالمیل با موفقیت ذخیره شد!</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>خطا در ذخیره سازی!</p>";
        die(print_r(sqlsrv_errors(), true)); 
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>شرایط بالمیل بدنه</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: Tahoma; }
        button { background: #ff9800; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-family: Tahoma; font-size: 16px; margin-top: 10px;}
        button:hover { background: #e68a00; }
        .link { text-align: center; display: block; margin-top: 15px; text-decoration: none; color: #555;}
    </style>
</head>
<body>

<div class="form-box">
    <h2 style="text-align:center; color:#333;">شرایط بالمیل بدنه (QC-F0100)</h2>
    <form method="POST" action="">
        
        <label>تاریخ:</label>
        <input type="text" name="date" required placeholder="مثلا 1404/05/01">

        <label>شیفت:</label>
        <select name="shift">
            <option value="صبح">صبح</option>
            <option value="عصر">عصر</option>
            <option value="شب">شب</option>
        </select>

        <label>شماره بالمیل:</label>
        <input type="text" name="mill_no" required>

        <label>رطوبت مواد (%):</label>
        <input type="text" name="moisture">

        <label>دانسیته دوغاب:</label>
        <input type="text" name="density">

        <label>ویسکوزیته:</label>
        <input type="text" name="viscosity">

        <label>مانده روی الک:</label>
        <input type="text" name="residue">

        <label>توضیحات:</label>
        <textarea name="notes" rows="2"></textarea>

        <button type="submit">ذخیره شرایط بالمیل</button>
    </form>
    
    <a href="index.php" class="link">بازگشت به فرم کوره</a>
    <a href="daily_qc.php" class="link">رفتن به گزارش روزانه</a>
</div>

</body>
</html>