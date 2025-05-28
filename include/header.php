<?php
require_once '../config.php';
    session_start();
$username  = isset($_SESSION['user']['username'])   ? $_SESSION['username']   : 'ضيف';
$userImage = isset($_SESSION['user']['image']) ? $_SESSION['image'] : '../assets/images/whatsapp.png';
?>
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Taiz</title>
    <style>
        /* ======= Reset بسيط ======= */
        * { margin: 0; padding: 0; box-sizing: border-box; }

        /* ======= الهيكل الأساسي ======= */
        body { font-family: sans-serif; padding-top: 60px; }

        header.header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #333;
            color: #fff;
            padding: 10px 20px;
            position: fixed;
            inset: 0 auto auto 0;
            z-index: 1000;
        }

        header .logo {
            font-size: 1.2em;
        }

        /* ======= زر تبديل القائمة في الموبايل ======= */
        .nav-toggle {
            display: none;
            font-size: 1.5em;
            cursor: pointer;
        }

        nav.nav-buttons {
            display: flex;
            gap: 20px;
        }
        nav.nav-buttons a {
            color: #fff;
            text-decoration: none;
            padding: 8px 15px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        nav.nav-buttons a:hover {
            background-color: #555;
        }

        /* ======= قسم المستخدم ======= */
        .user-section {
            position: relative;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .user-section img.user-image {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
        }
        .user-section .dropdown {
            display: none;
            position: absolute;
            top: 50px;
            right: 0;
            background-color: #444;
            min-width: 150px;
            box-shadow: 0 8px 16px rgba(0,0,0,0.2);
            z-index: 1;
        }
        .user-section .dropdown.show {
            display: block;
        }
        .user-section .dropdown a,
        .user-section .dropdown span {
            color: #fff;
            padding: 12px 16px;
            display: block;
            text-decoration: none;
            cursor: pointer;
        }
        .user-section .dropdown a:hover {
            background-color: #575757;
        }

        /* ======= استجابة للشاشات الصغيرة ======= */
        @media (max-width: 600px) {
            .nav-toggle { display: block; }

            nav.nav-buttons {
                flex-direction: column;
                position: absolute;
                top: 60px;
                right: 10px;
                background-color: #222;
                padding: 10px;
                border-radius: 5px;
                display: none;
            }
            nav.nav-buttons.show {
                display: flex;
            }
        }
    </style>
</head>
<body>
    <header class="header" role="banner">
        <h1 class="logo">شعار الموقع</h1>
        <div class="nav-toggle" aria-label="قائمة التنقل" onclick="toggleNav()">☰</div>

        <nav class="nav-buttons" role="navigation" aria-label="روابط التنقل">
            <a href="../taizhotel.php">Home</a>
            <a href="#">About/a>
            <a href="../page/room.php">ROOMS</a>
            <a href="#">Call us </a>
        </nav>

        <div class="user-section">
            <img 
                src="<?php echo htmlspecialchars($userImage, ENT_QUOTES, 'UTF-8'); ?>" 
                alt="صورة المستخدم" 
                class="user-image" 
                aria-haspopup="true" 
                aria-expanded="false" 
                aria-controls="userDropdown" 
                onclick="toggleDropdown()"
            >
            <div class="dropdown" id="userDropdown" role="menu" aria-label="قائمة المستخدم">
                <span role="none">مرحبًا، <?php echo htmlspecialchars($username, ENT_QUOTES, 'UTF-8'); ?></span>
                <a href="profile.php" role="menuitem">الملف الشخصي</a>
                <a href="settings.php" role="menuitem">الإعدادات</a>
                <a href="../page/logout.php" role="menuitem">تسجيل الخروج</a>
            </div>
        </div>
    </header>

    <script>
        // تبديل عرض/إخفاء قائمة التنقل في الموبايل
        function toggleNav() {
            document.querySelector('nav.nav-buttons').classList.toggle('show');
        }

        // تبديل قائمة المستخدم
        function toggleDropdown() {
            const dd = document.getElementById('userDropdown');
            const expanded = dd.classList.toggle('show');
            document.querySelector('.user-image')
                    .setAttribute('aria-expanded', expanded);
        }

        // إغلاق القوائم عند النقر خارجها
        window.addEventListener('click', function(event) {
            const nav = document.querySelector('nav.nav-buttons');
            const dd  = document.getElementById('userDropdown');
            const userImg = document.querySelector('.user-image');

            if (!event.target.closest('.nav-toggle') && !event.target.closest('nav.nav-buttons')) {
                nav.classList.remove('show');
            }
            if (!event.target.closest('.user-section')) {
                dd.classList.remove('show');
                userImg.setAttribute('aria-expanded', 'false');
            }
        });

        // إغلاق الـ dropdown عند اختيار رابط منه
        document.querySelectorAll('#userDropdown a').forEach(link => {
            link.addEventListener('click', () => {
                document.getElementById('userDropdown').classList.remove('show');
            });
        });
    </script>
</body>
</html>