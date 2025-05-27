<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/subject_dashboard-style.css">
</head>

<body>

<!-- Sidebar Toggle Button (you can place this at top left corner of your app) -->
    <button onclick="toggleSidebar()" class="toggle-btn" style="cursor: pointer;"></button>

    <!-- Sidebar Toggle Button -->
<button onclick="toggleSidebar()" class="toggle-btn" style="cursor: pointer;"></button>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="logo2" onclick="toggleSidebar()">
        <img src="images/MTB-MAL_logo_side.png" alt="MTB-MAL Logo" />
    </div>

    <nav class="nav-links">
        <a href="/mtbmalsysfinal/students/dashboard/dashboard_students.php">
            <span class="icon">🏠</span> Dashboard
        </a>
        <a href="/mtbmalsysfinal/students/dashboard/subject_dashboard.php">
            <span class="icon">📘</span> Subjects
        </a>
    </nav>

    <!-- Add bunny GIF here -->
    <div class="bunny-gif">
        <img src="images/bunny.gif" alt="Bunny Animation" />
        <div class="chatbox">Choose a subject!</div>
    </div>
</div>

<!-- Overlay -->
<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div>

<div class="main-content">

    <!-- Top Bar -->
    <div class="topbar">
        <div class="left">
            <div class="logo-topbar" onclick="toggleSidebar()">
                <img src="images/MTB-MAL_logo-alt.png" alt="MTB-MAL Logo">
            </div>
            <div class="system-title">
                Mother Tongue-Based Multilingual Assessment and Learning System
            </div>
        </div>
        <div class="right">
            <div class="button">Cookies Notice</div>
            <div class="language-selector" onclick="toggleDropdown1()">
                <div class="language">🌐 English</div> 
                <div id="dropdown-arrow1" class="dropdown-arrow1 down"></div>

                <!-- Use a unique class or ID here -->
                <div id="lang-dropdown-menu" class="lang-dropdown hidden">
                    <div class="dropdown-item">Feature Available Soon</div>
                </div>
            </div> <br>
            <div class="profile-container">
                <div class="profile-circle" onclick="toggleDropdown2()"></div>

                <div id="profile-dropdown-menu" class="profile-dropdown hidden">
                    <div class="dropdown-item">Settings</div>
                    <a href="/mtbmalsysfinal/auth/login.php">
                        <div class="dropdown-item">Logout</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

   <!-- Subject Cards -->
    <div class="subject-cards-container">
        <div class="subject-card blue" onclick="location.href='/mtbmalsysfinal/students/subjects/subject_view.php'" style="cursor: pointer;">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Kinder 1</div>
                <div class="subject">Tagalog</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>

        <div class="subject-card orange">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Kinder 2</div>
                <div class="subject">Matigsalug</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>

        <div class="subject-card yellow">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Grade 1</div>
                <div class="subject">Cebuano</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>

        <div class="subject-card red">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Grade 2</div>
                <div class="subject">Tagabawa</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>

        <div class="subject-card green">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Grade 3</div>
                <div class="subject">Matigsalug</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>

        <div class="subject-card teal">
            <div class="avatar-bg"></div>
            <div class="avatar-circle"></div>
            <div class="subject-info">
                <div class="grade">Grade 1</div>
                <div class="subject">Tagabawa</div>
            </div>
            <div class="card-bunny"><img src="images/bunny_card-1.png"></div>
        </div>
    </div>
</div>

  <!-- Footer -->
        <footer class="footer">
            Mother Tongue-Based Multilingual Assessment and Learning System © 2025
        </footer>

    <script>
    function toggleDropdown1() {
        const arrow = document.getElementById('dropdown-arrow1');
        const menu = document.getElementById('lang-dropdown-menu');
        arrow.classList.toggle('down');
        arrow.classList.toggle('up');
        menu.classList.toggle('hidden');
    }

    function toggleDropdown2() {
        const menu = document.getElementById('profile-dropdown-menu');
        menu.classList.toggle('hidden');
    }

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const logoImg = document.querySelector('.logo2 img');

        sidebar.classList.toggle('visible');
        overlay.classList.toggle('visible');

        logoImg.src = 'images/MTB-MAL_logo_side.png';
    }
</script>

</body>
</html>