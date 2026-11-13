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
    $controller = $_POST['controller'];
    $non_conformity = $_POST['non_conformity'];
    $defect = $_POST['defect'];
    $action = $_POST['action'];
    $team = $_POST['team'];

    // دستور ذخیره در جدول جدید
    $sql = "INSERT INTO Daily_QC (ReportDate, Shift, ControllerName, NonConformity, Defect, ActionTaken, TeamFormed) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $params = array($date, $shift, $controller, $non_conformity, $defect, $action, $team);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "<p style='color:green; text-align:center; font-weight:bold;'>اطلاعات گزارش روزانه با موفقیت ذخیره شد!</p>";
        } else {
        echo "<p style='color:red; text-align:center;'>خطا در ذخیره سازی!</p>";
        die(print_r(sqlsrv_errors(), true)); // این خط رو اضافه کن
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>گزارش روزانه کنترل کیفیت</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 20px; border-radius: 8px; max-width: 600px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select, textarea { width: 100%; padding: 10px; margin: 8px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-family: Tahoma; }
        button { background: #007bff; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-family: Tahoma; font-size: 16px; margin-top: 10px;}
        button:hover { background: #0056b3; }
        .link { text-align: center; display: block; margin-top: 15px; text-decoration: none; color: #555;}
    </style>
</head>
<body>

<div class="form-box">
    <h2 style="text-align:center; color:#333;">گزارش روزانه کنترل کیفیت (QC-F1101)</h2>
    <form method="POST" action="">
        
        <label>تاریخ:</label>
        <input type="text" name="date" required placeholder="مثلا 1404/05/01">

        <label>شیفت:</label>
        <select name="shift">
            <option value="صبح">صبح</option>
            <option value="عصر">عصر</option>
            <option value="شب">شب</option>
        </select>

        <label>نام کنترل‌کننده:</label>
        <input type="text" name="controller" required>

        <label>عدم انطباق:</label>
        <textarea name="non_conformity" rows="2"></textarea>

        <label>عیب:</label>
        <textarea name="defect" rows="2"></textarea>

        <label>اقدامات صورت گرفته:</label>
        <textarea name="action" rows="2"></textarea>

        <label>تشکیل کارگروه:</label>
        <select name="team">
            <option value="بله">بله</option>
            <option value="خیر">خیر</option>
        </select>

        <button type="submit">ذخیره گزارش روزانه</button>
    </form>
    <a href="index.php" class="link">بازگشت به فرم کوره</a>
</div>

</body>
</html>