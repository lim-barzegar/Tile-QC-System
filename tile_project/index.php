<?php
$serverName = "localhost"; 
$connectionOptions = array(
    "Database" => "TileQC_DB",
    "CharacterSet" => "UTF-8"
    // ما اینجا Uid و PWD رو نمی‌نویسیم تا از ویندوز استفاده کنه
);

$conn = sqlsrv_connect($serverName, $connectionOptions);


if ($conn === false) {
    die(print_r(sqlsrv_errors(), true));
}

// اگر فرم پر شده بود (دکمه ذخیره زده شد)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $date = $_POST['date'];
    $shift = $_POST['shift'];
    $design = $_POST['design'];
    $operator = $_POST['operator'];

    // دستور ذخیره در دیتابیس
    $sql = "INSERT INTO Kiln_Reports (ReportDate, Shift, DesignName, OperatorName) VALUES (?, ?, ?, ?)";
    $params = array($date, $shift, $design, $operator);
    $stmt = sqlsrv_query($conn, $sql, $params);

    if ($stmt) {
        echo "<p style='color:green; text-align:center;'>اطلاعات با موفقیت ذخیره شد!</p>";
    } else {
        echo "<p style='color:red; text-align:center;'>خطا در ذخیره سازی!</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>فرم کوره</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .form-box { background: white; padding: 20px; border-radius: 8px; max-width: 500px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input, select { width: 100%; padding: 10px; margin: 10px 0; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; }
        button { background: #28a745; color: white; padding: 12px; border: none; width: 100%; cursor: pointer; border-radius: 4px; font-family: Tahoma; font-size: 16px; }
        button:hover { background: #218838; }
    </style>
</head>
<body>

<div class="form-box">
    <h2 style="text-align:center; color:#333;">ثبت گزارش کوره</h2>
    <form method="POST" action="">
        <label>تاریخ:</label>
        <input type="text" name="date" required placeholder="مثلا 1404/05/01">

        <label>شیفت:</label>
        <select name="shift">
            <option value="صبح">صبح</option>
            <option value="عصر">عصر</option>
            <option value="شب">شب</option>
        </select>

        <label>نام طرح:</label>
        <input type="text" name="design" required>

        <label>نام کنترل‌کننده:</label>
        <input type="text" name="operator" required>

        <button type="submit">ذخیره در دیتابیس</button>
    </form>
</div>

</body>
</html>