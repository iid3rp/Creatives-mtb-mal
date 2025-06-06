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
<div id="sidebar" class="sidebar"> <!-- Sidebar container -->
    <div class="logo2" onclick="toggleSidebar()"> <!-- Sidebar logo -->
        <img src="images/MTB-MAL_logo_side.png" alt="MTB-MAL Logo" />
    </div>
    <nav class="nav-links"> <!-- Sidebar navigation links -->
        <a href="/mtbmalsysfinal/admin/dashboard/dashboard_admin.php"><span class="icon"> 
            🏠 </span> Dashboard </a>
        <a href="/mtbmalsysfinal/admin/create-subject/Admin_AddSubject.php"><span class="icon"> 
            ✏️ </span> Create a Subject </a>
        <a href="/mtbmalsysfinal/admin/manage-user-accounts/main-manage/Admin_ManageUsers.php"><span class="icon"> 
            👥 </span> Manage User Accounts </a>
        <a href="/mtbmalsysfinal/admin/view-subjects/admin_subject-view.php"><span class="icon"> 
            📚 </span> View Subjects </a>
    </nav>
</div>

<div id="sidebar-overlay" class="sidebar-overlay" onclick="toggleSidebar()"></div> <!-- Sidebar overlay -->
<div class="main-content"> <!-- Main content wrapper -->

    <!-- Top Bar -->
    <div class="topbar"> <!-- Top bar container -->

        <div class="left"> <!-- Left section of top bar -->
            <div class="logo-topbar" onclick="toggleSidebar()"> <!-- Top bar logo -->
                <img src="images/MTB-MAL_logo-alt.png" alt="MTB-MAL Logo">
            </div>
            <div class="system-title"> <!-- System title text -->
                Mother Tongue-Based Multilingual Assessment and Learning System
            </div>
        </div>

        <div class="right"> <!-- Right section of top bar -->
            <div class="button">Cookies Notice</div>
            <div class="language-selector" onclick="toggleDropdown1()"> <!-- Language selector dropdown -->
                <div class="language">🌐 English</div> 
                <div id="dropdown-arrow1" class="dropdown-arrow1 down"></div>

                <div id="lang-dropdown-menu" class="lang-dropdown hidden"> <!-- Language dropdown menu -->
                    <div class="dropdown-item">Feature Available Soon</div>
                </div>
            </div> 
        </div>
    </div>

    <!-- Second Navigation Bar -->
    <div class="second-bar"> <!-- Second bar title & profile -->
    <span>Create a Subject</span> 
        <div class="profile-container" onclick="toggleDropdown2()"> <!-- Profile container -->
            <div class="profile-circle"></div>
            <div id="dropdown-arrow2" class="dropdown-arrow2 down"></div>

            <div id="profile-dropdown-menu" class="profile-dropdown hidden"> <!-- Profile dropdown menu -->
                <div class="dropdown-item">Settings</div>
                <a href="/mtbmalsysfinal/auth/login.php">
                  <div class="dropdown-item">Logout</div>
                </a>
            </div>
        </div>
    </div>

<!-- Form Container -->
<div class="container"> <!-- Entire form container -->

  <!-- Form Section -->
  <div class="form-section"> <!-- Form content section -->

    <div class="column"> <!-- Single column layout -->

      <!-- Registration Confirmation Box -->
      <div class="registration-box">

        <!-- Success Checkmark Image -->
        <div class="checkmark-image">
          <img src="images/checkmark.png" alt="Checkmark">
        </div>

        <!-- Confirmation Title and Subtitle -->
        <h2 class="registration-title">Registration Complete!</h2>
        <p class="registration-subtitle">Please save the details below for future reference.</p>

        <!-- Subject Reference Display (Read-only) -->
        <div class="input-group">
          <label class="label-text">Subject Reference Number:</label>
          <input type="text" readonly value="SB-202501158452" class="reference-input" />
        </div>

        <!-- Done Button -->
        <button type="button" onclick="window.location.href='../dashboard/dashboard_admin.php'" class="done-button">
          Done
        </button>

      </div> <!-- End of registration-box -->

    </div> <!-- End of column -->

  </div> <!-- End of form-section -->

</div> <!-- End of container -->

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