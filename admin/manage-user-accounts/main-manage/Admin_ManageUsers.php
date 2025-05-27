<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>User Management</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/Admin_ManageUsers-style.css">
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
        <a href="/mtbmalsysfinal/admin/dashboard/dashboard_admin.php"><span class="icon">🏠</span> Dashboard</a>
        <a href="/mtbmalsysfinal/admin/create-subject/Admin_AddSubject.php"><span class="icon">✏️</span> Create a Subject</a>
        <a href="/mtbmalsysfinal/admin/manage-user-accounts/main-manage/Admin_ManageUsers.php"><span class="icon">👥</span> Manage User Accounts</a>
        <a href="/mtbmalsysfinal/admin/view-subjects/admin_subject-view.php"><span class="icon">📚</span> View Subjects</a>
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
    <span>Manage User Accounts</span>
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
        <!-- Manage User Cards -->
        <div class="manage-user-container">

            <div class="user-card" onclick="openModal()">
                <div class="card-icon">➕</div>
                <div class="card-text">Create an account for another user</div>
            </div>

            <div class="user-card" onclick="location.href='/mtbmalsysfinal/admin/manage-user-accounts/manage-account/AdminManage.php';">
                <div class="card-icon">✏️</div>
                <div class="card-text">Manage registered user accounts</div>
            </div>

        </div>
    </div>

    <!-- Create Account Modal -->
    <div id="createAccountModal" class="modal">
        <div class="modal-content">
            <h2>Create an account for</h2>
            <hr>
            <a class="modal-btn" href="/mtbmalsysfinal/admin/manage-user-accounts/create-account/AdminReg_AddAdminOnly.php">School Administrator</a>
            <a class="modal-btn" href="/mtbmalsysfinal/admin/manage-user-accounts/create-account/AdminReg_AddEducator.php">Educator</a>
            <a class="modal-btn" href="/mtbmalsysfinal/admin/manage-user-accounts/create-account/AdminReg_AddStudent.php">Student</a>
            <button class="modal-close" onclick="closeModal()">Close</button>
        </div>
    </div>
    
        <!-- Footer -->
        <footer class="footer">
            Mother Tongue-Based Multilingual Assessment and Learning System © 2025
        </footer>

  <!-- Dropdown and Options Script -->
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


        function openModal() {
            document.getElementById("createAccountModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("createAccountModal").style.display = "none";
        }

    </script>

</body>
</html>