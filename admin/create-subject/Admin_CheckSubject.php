<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>Registration Complete! </title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/Admin_AddSubject-style.css">
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
    <span>Create a Subject</span>
        <div class="profile-container" onclick="toggleDropdown2()">
            <div class="profile-circle"></div>
            <div id="dropdown-arrow2" class="dropdown-arrow2 down"></div>

            <!-- Use a unique class or ID here -->
            <div id="profile-dropdown-menu" class="profile-dropdown hidden">
                <div class="dropdown-item">Settings</div>
                <div class="dropdown-item">Logout</div>
            </div>
        </div>
    </div>

  <!-- Form Container -->
  <div class="container">
      <!-- Form Section -->
      <div class="form-section">

        <!-- Column 1: Check -->
        <div class="column">

          <div class="registration-box">
            <div class="checkmark-image">
                <img src="images/checkmark.png" alt="Checkmark">
            </div>

            <h2 class="registration-title">Registration Complete!</h2>
            <p class="registration-subtitle">Please save the details below for future reference.</p>

            <div class="input-group">
                <label class="label-text">Subject Reference Number:</label>
                <input type="text" readonly value="SB-202501158452" class="reference-input">
            </div>

          <button type="button" onclick="window.location.href='/mtbmalsysfinal/admin/dashboard/dashboard_admin.php'" class="done-button">Done</button>
        </div>

        </div>
      </div>
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