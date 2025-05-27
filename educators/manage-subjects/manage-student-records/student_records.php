<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload New Learning Materials</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/upload_assessment_view-style.css">
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
        <a href="/mtbmalsysfinal/educators/dashboard/dashboard_educators.php"><span class="icon">🏠</span> Dashboard</a>
        <a href="/mtbmalsysfinal/educators/view-subjects/educator_subject-view.php"><span class="icon">📚</span> View Subjects</a>
    </nav>
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
            </div> 
        </div>
    </div>

    <!-- Second Navigation Bar -->
    <div class="second-bar">
    <span>Upload New Learning Materials</span>
        <div class="profile-container" onclick="toggleDropdown2()">
            <div class="profile-circle"></div>
            <div id="dropdown-arrow2" class="dropdown-arrow2 down"></div>

            <!-- Use a unique class or ID here -->
            <div id="profile-dropdown-menu" class="profile-dropdown hidden">
                <div class="dropdown-item">Settings</div>
                <a href="/mtbmalsysfinal/auth/login.php">
                  <div class="dropdown-item">Logout</div>
                </a>
            </div>
        </div>
    </div>

    <!-- Form Header -->
     <div class="form-header">
        <div class="button-group">
            <button class="btn" id="btn-module">Learning Module</button>
            <button class="btn" id="btn-assessment">Learning Assessment</button>
            <button class="btn selected" id="btn-both">Display Both</button>
            <div class="search-wrapper">
                <img src="images/search.png" alt="Search" class="search-icon">
                <input type="text" class="search-box" placeholder="Search Template">
            </div>
        </div>
     </div>

    <!-- Main Form Section -->
    <div class="container">
        <div class="form-section">
        <div class="assessments">
            <?php
                $assessments = [
                    ["title" => "Assessment - 01", "name" => "Quest to Learn", "items" => "10 items", "type" => "Answer the Questions"],
                    ["title" => "Assessment - 02", "name" => "Memory Trace", "items" => "15 items", "type" => "True or False"],
                    ["title" => "Assessment - 03", "name" => "Flip and Match", "items" => "15 items", "type" => "Pair Up Images"]
                ];

                $modules = [
                    ["title" => "Module - 01", "name" => "Text and Media", "type" => "Max: 4 image files and 1 video file"],
                    ["title" => "Module - 02", "name" => "Image Only", "items" => "15 items", "type" => "Pair Up Images"],
                    ["title" => "Module - 03", "name" => "Upload a PDF file", "type" => "Upload a pdf file accessible for students."]
                ];

                foreach ($assessments as $a) {
                    echo "<div class='card'>
                        <div class='card-header'>" . htmlspecialchars($a['title']) . "</div>
                        <div class='card-body'>
                            <strong>" . htmlspecialchars($a['name']) . "</strong><br>
                            " . (isset($a['items']) ? htmlspecialchars($a['items']) . "<br>" : "") . "
                            Text and Images<br>
                            " . htmlspecialchars($a['type']) . "
                            <div class='edit'>Edit <span title='Edit Info'><img src='images/info.png' alt='info logo'></span></div>
                        </div>
                    </div>";
                }

                foreach ($modules as $m) {
                    echo "<div class='card'>
                        <div class='card-header'>" . htmlspecialchars($m['title']) . "</div>
                        <div class='card-body'>
                            <strong>" . htmlspecialchars($m['name']) . "</strong><br>
                            " . (isset($m['items']) ? htmlspecialchars($m['items']) . "<br>" : "") . "
                            " . htmlspecialchars($m['type']) . "
                            <div class='edit'>Edit <span title='Edit Info'><img src='images/info.png' alt='info logo'></span></div>
                        </div>
                    </div>";
                }
            ?>
        </div>
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
        const arrow = document.getElementById('dropdown-arrow2');
        const menu = document.getElementById('profile-dropdown-menu');
        arrow.classList.toggle('down');
        arrow.classList.toggle('up');
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

    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.button-group .btn');

        function setActiveButton(activeId) {
            buttons.forEach(btn => {
                if (btn.id === activeId) {
                    btn.classList.add('selected');
                } else {
                    btn.classList.remove('selected');
                }
            });
        }

    document.getElementById('btn-module').addEventListener('click', () => {
        setActiveButton('btn-module');
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            const title = card.querySelector('.card-header').textContent.toLowerCase();
            card.style.display = title.includes('module') ? 'block' : 'none';
        });
    });

    document.getElementById('btn-assessment').addEventListener('click', () => {
        setActiveButton('btn-assessment');
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            const title = card.querySelector('.card-header').textContent.toLowerCase();
            card.style.display = title.includes('assessment') ? 'block' : 'none';
        });
    });

    document.getElementById('btn-both').addEventListener('click', () => {
        setActiveButton('btn-both');
        const cards = document.querySelectorAll('.card');
        cards.forEach(card => {
            card.style.display = 'block';
        });
    });
});

</script>

</body>
</html>
