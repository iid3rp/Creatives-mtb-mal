<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/dashboard_educators-style.css">
</head>

<body>

<!-- Sidebar Toggle Button -->
<button onclick="toggleSidebar()" class="toggle-btn" style="cursor: pointer;"></button>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="logo2" onclick="toggleSidebar()">
        <img src="images/MTB-MAL_logo_side.png" alt="MTB-MAL Logo" />
    </div>
    <nav class="nav-links">
        <a href="/mtbmalsysfinal/educators/dashboard/dashboard_educators.php"><span class="icon">
          🏠 </span> Dashboard </a>
        <a href="/mtbmalsysfinal/educators/view-subjects/educator_subject-view.php"><span class="icon">
          📚 </span> View Subjects </a>
        <a href="/mtbmalsysfinal/educators/view-subjects/educator_manage-student-records.php"><span class="icon">
          👤 </span> Manage Student Records </a>
        <a href="/mtbmalsysfinal/educators/manage-subjects/subject-learning-materials/upload_template.php"><span class="icon">
          📤 </span> Upload New Subject Materials </a>
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
    <span>Dashboard</span>
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

    <!-- Container -->
    <div class="container">
        <!-- Dashboard Cards -->
        <div class="dashboard-container">
            <a href="/mtbmalsysfinal/educators/view-subjects/educator_subject-view.php" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>View Subjects</h2>
                        <span class="icon">📚</span>
                    </div>
                    <div class="card-body">
                        <p><strong>See the lists of subjects you are handling.</strong></p>
                        <p>Educators can check which subjects they are assigned to, view class details, and access tools for managing students and materials.</p>
                    </div>
                </div>
            </a>

            <a href="/mtbmalsysfinal/educators/view-subjects/educator_manage-student-records.php" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>Manage Student Records</h2>
                        <span class="icon">👤</span>
                    </div>
                    <div class="card-body">
                        <p><strong>Access and update student enrollment and performance data.</strong></p>
                        <p>View and manage student records, including enrollment info, academic performance, and class participation for each subject you handle.</p>
                    </div>
                </div>
            </a>

            <a href="/mtbmalsysfinal/educators/manage-subjects/subject-learning-materials/upload_template.php" class="dashboard-card-link">
                <div class="dashboard-card">
                    <div class="card-header">
                        <h2>Upload New Subject Materials</h2>
                        <span class="icon">📤</span>
                    </div>
                    <div class="card-body">
                        <p><strong>Upload and manage learning materials for your subject.</strong></p>
                        <p>Easily submit lesson templates, activity sheets, or reference files that students can access and use in class or online.</p>
                    </div>
                </div>
            </a>

        </div>
    </div>

<!--=========================================== 2 =====================================================--->

    <!-- Footer -->
    <footer class="footer"> <!-- Footer container -->
      Mother Tongue-Based Multilingual Assessment and Learning System © 2025
    </footer>

        <script>
            // Toggle language dropdown visibility
            function toggleDropdown1() {
            const arrow = document.getElementById('dropdown-arrow1');
            const menu = document.getElementById('lang-dropdown-menu');
            arrow.classList.toggle('down');
            arrow.classList.toggle('up');
            menu.classList.toggle('hidden');
            }
            // Toggle profile dropdown visibility
            function toggleDropdown2() {
            const arrow = document.getElementById('dropdown-arrow2');
            const menu = document.getElementById('profile-dropdown-menu');
            arrow.classList.toggle('down');
            arrow.classList.toggle('up');
            menu.classList.toggle('hidden');
            }
            // Toggle sidebar and overlay visibility
            function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('sidebar-overlay');
            const logoImg = document.querySelector('.logo2 img');

            sidebar.classList.toggle('visible');
            overlay.classList.toggle('visible');

            // Reset logo image when sidebar is toggled
            logoImg.src = 'images/MTB-MAL_logo_side.png';
            }
        </script>

</body>
</html>