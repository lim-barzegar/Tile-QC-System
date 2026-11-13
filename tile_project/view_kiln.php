<?php
$serverName = "localhost"; 
$connectionOptions = array("Database" => "TileQC_DB", "CharacterSet" => "UTF-8");
$conn = sqlsrv_connect($serverName, $connectionOptions);
if ($conn === false) { die(print_r(sqlsrv_errors(), true)); }

$sql = "SELECT * FROM Kiln_Reports ORDER BY ID DESC";
$stmt = sqlsrv_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>مشاهده گزارش‌های کوره</title>
    <style>
        body { font-family: Tahoma; background: #f4f4f4; padding: 20px; }
        .table-box { background: white; padding: 20px; border-radius: 8px; margin: auto; box-shadow: 0 0 10px rgba(0,0,0,0.1); overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; margin-top: 10px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: center; }
        th { background: #28a745; color: white; }
        tr:nth-child(even) { background: #f9f9f9; }
        .btn { display: inline-block; padding: 10px 20px; background: #007bff; color: white; text-decoration: none; border-radius: 5px; margin-bottom: 20px; }
    </style>
</head>
<body>
<div class="table-box">
    <a href="dashboard.php" class="btn">بازگشت به داشبورد</a>
    <h2 style="text-align:center;">لیست گزارش‌های کوره</h2>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>تاریخ</th>
                <th>شیفت</th>
                <th>نام طرح</th>
                <th>کنترل‌کننده</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = sqlsrv_fetch_array($stmt, SQLSRV_FETCH_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['ID'] . "</td>";
                echo "<td>" . $row['ReportDate'] . "</td>";
                echo "<td>" . $row['Shift'] . "</td>";
                echo "<td>" . $row['DesignName'] . "</td>";
                echo "<td>" . $row['OperatorName'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>
</body>
</html>