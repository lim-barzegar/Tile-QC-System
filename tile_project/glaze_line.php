<?php
$serverName = "localhost"; 
$connectionOptions = array("Database" => "TileQC_DB", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) { die(print_r(sqlsrv_errors(), true)); }

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $shift = $_POST['shift'];
    $controller = $_POST['controller'];
    $normal = $_POST['normal'];
    $engobe_d = $_POST['engobe_d'];
    $engobe_v = $_POST['engobe_v'];
    $glaze_d = $_POST['glaze_d'];
    $glaze_v = $_POST['glaze_v'];
    $water = $_POST['water'];

    $sql = "INSERT INTO GlazeLine (ReportDate, Shift, ControllerName, NormalSlipWeight, EngobeDensity, EngobeViscosity, GlazeDensity, GlazeViscosity, WaterWeight) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $params = array($date, $shift, $controller, $normal, $engobe_d, $engobe_v, $glaze_d, $glaze_v, $water);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) { echo "<p style='color:green; text-align:center; font-weight:bold;'>اطلاعات خط لعاب ذخیره شد!</p>"; } 
    else { echo "<p style='color:red; text-align:center;'>خطا!</p>"; die(print_r(sqlsrv_errors(), true)); }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>کنترل خط لعاب</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: Tahoma; }
        button { background: #9c27b0; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-family: Tahoma; font-size: 16px; margin-top: 10px;}
        button:hover { background: #7b1fa2; }
        .link { text-align: center; display: block; margin-top: 15px; text-decoration: none; color: #555;}
    </style>
</head>
<body>
<div class="form-box">
    <h2 style="text-align:center; color:#333;">گزارش کنترل خط لعاب (QC-F0700)</h2>
    <form method="POST" action="">
        <label>تاریخ:</label> <input type="text" name="date" required>
        <label>شیفت:</label> 
        <select name="shift"><option value="1">شیفت ۱</option><option value="2">شیفت ۲</option><option value="3">شیفت ۳</option></select>
        <label>کنترل‌کننده:</label> <input type="text" name="controller" required>
        
        <h3 style="color:#9c27b0; margin-top:20px; border-bottom: 1px solid #ccc; padding-bottom:5px;">مشخصات دوغاب</h3>
        <label>وزن دوغاب نرمال:</label> <input type="text" name="normal">
        <label>دانسیته انگوب:</label> <input type="text" name="engobe_d">
        <label>ویسکوزیته انگوب:</label> <input type="text" name="engobe_v">
        
        <h3 style="color:#9c27b0; margin-top:20px; border-bottom: 1px solid #ccc; padding-bottom:5px;">مشخصات لعاب</h3>
        <label>دانسیته لعاب:</label> <input type="text" name="glaze_d">
        <label>ویسکوزیته لعاب:</label> <input type="text" name="glaze_v">
        <label>وزن آب:</label> <input type="text" name="water">

        <button type="submit">ذخیره خط لعاب</button>
    </form>
    <a href="ball_mill.php" class="link">فرم بالمیل</a>
</div>
</body>
</html>