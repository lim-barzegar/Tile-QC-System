<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>داشبورد سیستم کنترل کیفیت</title>
    <style>
        body { font-family: Tahoma; background: #e9ecef; padding: 40px; text-align: center; }
        h1 { color: #333; margin-bottom: 40px; }
        .menu-container { display: flex; flex-wrap: wrap; justify-content: center; gap: 20px; }
        .menu-card { 
            background: white; padding: 30px; width: 200px; border-radius: 10px; 
            text-decoration: none; color: #333; box-shadow: 0 4px 6px rgba(0,0,0,0.1); 
            transition: transform 0.2s; 
        }
        .menu-card:hover { transform: translateY(-5px); box-shadow: 0 8px 15px rgba(0,0,0,0.2); }
        .menu-card h3 { margin: 0; font-size: 18px; color: #007bff; }
        .menu-card p { font-size: 12px; color: #777; margin-top: 10px;}
    </style>
</head>
<body>

    <h1>سیستم دیجیتال کنترل کیفیت (کارخانه کاشی)</h1>

    <div class="menu-container">
      
        <a href="daily_qc.php" class="menu-card">
            <h3>گزارش روزانه</h3>
            <p>QC-F1101</p>
        </a>

        <a href="ball_mill.php" class="menu-card">
            <h3>شرایط بالمیل</h3>
            <p>QC-F0100</p>
        </a>

        <a href="glaze_line.php" class="menu-card">
            <h3>خط لعاب</h3>
            <p>QC-F0700</p>
        </a>

        <a href="spray.php" class="menu-card">
            <h3>عملکرد اسپری</h3>
            <p>QC-F0800</p>
        </a>

        <a href="index.php" class="menu-card">
            <h3>فرم کوره</h3>
            <p>QC-F0300</p>
        </a>
       
        <a href="view_daily.php" class="menu-card">
            <h3>گزارش روزانه</h3>
            <p>QC-F1101</p>
        </a>

        <a href="view_ball_mill.php" class="menu-card">
            <h3>گزارش بالمیل</h3>
            <p>QC-F0100</p>
        </a>

        <a href="view_glaze.php" class="menu-card">
            <h3>گزارش خط لعاب</h3>
            <p>QC-F0700</p>
        </a>

        <a href="view_spray.php" class="menu-card">
            <h3>گزارش اسپری</h3>
            <p>QC-F0800</p>
        </a>

        <a href="view_kiln.php" class="menu-card">
            <h3>گزارش کوره</h3>
            <p>QC-F0300</p>
        </a>
       

        
    </div>

</body>
</html>