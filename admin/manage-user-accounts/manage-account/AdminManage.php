<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>Manage Accounts</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/AdminManage-style.css">
</head>

<body>

<!-- Sidebar Toggle Button -->
<button onclick="toggleSidebar()" class="toggle-btn" style="cursor: pointer;"></button>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <div class="logo2" onclick="toggleSidebar()">
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
    <span>Manage Registered User Accounts</span> 
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

<!-- === Form Container === -->
<div class="container"> <!-- Entire form container -->

  <!-- === Form Section === -->
  <div class="form-section"> <!-- Form main section wrapper -->

    <!-- === Column Layout Wrapper === -->
    <div class="column"> <!-- Single column layout -->

      <!-- === Header Section for User Table === -->
      <div class="user-table-header">

        <!-- === Button Group for Account Types === -->
        <div class="user-table-header button-group">
          <button class="btn selected" id="btn-admin">School Administrator</button>
          <button class="btn" id="btn-educator">Educator</button>
          <button class="btn" id="btn-student">Student</button>
          <button class="btn" id="btn-school">About School</button>
        </div>

        <!-- === Search Bar Section === -->
        <div class="search-container">
          <input type="text" placeholder="Search Registered Account">
          <img class="search-icon" src="images/search.png" alt="Search Icon">
        </div>

      </div> <!-- End of user-table-header -->

      <!-- === Account Table === -->
      <table class="account-table">
        <thead>
          <tr> <!-- === Table Header Row === -->
            <th>No.</th>
            <th>Reference Number</th>
            <th>Name</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          <!-- === Table Row 1 === -->
          <tr>
            <td><strong>1</strong></td>
            <td>AD-250115845201</td>
            <td>Juan G. Dela Cruz</td>
            <td>
              <span class="action-icons">✏️ 👤 🗑️</span>
            </td>
          </tr>

          <!-- === Table Row 2 === -->
          <tr>
            <td><strong>2</strong></td>
            <td>AD-250115845202</td>
            <td>Jennie K. Alasad</td>
            <td>
              <span class="action-icons">✏️ 👤 🗑️</span>
            </td>
          </tr>
        </tbody>

      </table> <!-- End of account-table -->

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

        function filterTableRows(prefix) {
          const rows = document.querySelectorAll('.account-table tbody tr');
          rows.forEach(row => {
            const refNumber = row.children[1].textContent.trim(); // Reference Number column
            row.style.display = refNumber.startsWith(prefix) ? '' : 'none';
          });
        }
        // Wait for the DOM to fully load before executing the script
        document.addEventListener('DOMContentLoaded', function () {
          // === Element Selectors ===
          const buttons = document.querySelectorAll('.button-group .btn'); 
          // === Function: Set Active Button ===
          function setActiveButton(activeId) {
            buttons.forEach(btn => {
              btn.classList.toggle('selected', btn.id === activeId);
            });
          }

          // === Filter Admin Button ===
          document.getElementById('btn-admin').addEventListener('click', () => {
            setActiveButton('btn-admin');
            filterTableRows('AD');
          });
          // === Filter Educator Button ===
          document.getElementById('btn-educator').addEventListener('click', () => {
            setActiveButton('btn-educator');
            filterTableRows('ED');
          });
          // === Filter Student Button ===
          document.getElementById('btn-student').addEventListener('click', () => {
            setActiveButton('btn-student');
            filterTableRows('ST');
          });
          // === Filter School Button ===
          document.getElementById('btn-school').addEventListener('click', () => {
            setActiveButton('btn-school');
            filterTableRows('SH');
          });
        });
      </script>

</body>
</html>