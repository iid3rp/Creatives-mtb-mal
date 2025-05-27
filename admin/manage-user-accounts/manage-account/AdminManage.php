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
    <span>Manage Registered User Accounts</span>
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

  <div class="container">
      <div class="form-section">
        <div class="column">

              <div class="user-table-header">
                
                <div class="user-table-header button-group">
                  <button class="btn selected" id="btn-admin">School Administrator</button>
                  <button class="btn" id="btn-educator">Educator</button>
                  <button class="btn" id="btn-student">Student</button>
                  <button class="btn" id="btn-school">About School</button>
                </div>

                <div class="search-container">
                  <input type="text" placeholder="Search Registered Account">
                  <img class="search-icon" src="images/search.png" alt="Search Icon">
                </div>
              </div>

              <table class="account-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Reference Number</th>
                    <th>Name</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>1</strong></td>
                    <td>AD-250115845201</td>
                    <td>Juan G. Dela Cruz</td>
                    <td>
                      <span class="action-icons">✏️ 👤 🗑️</span>
                    </td>
                  </tr>
                  <tr>
                    <td><strong>2</strong></td>
                    <td>AD-250115845202</td>
                    <td>Jennie K. Alasad</td>
                    <td>
                      <span class="action-icons">✏️ 👤 🗑️</span>
                    </td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>
    </div>


  <!-- Footer -->
        <footer class="footer">
            Mother Tongue-Based Multilingual Assessment and Learning System © 2025
        </footer>

  <!-- Validation Script -->
<script>
  function validateForm() {
    const pw = document.getElementById('password').value;
    const rePw = document.getElementById('rePassword').value;
    if (pw !== rePw) {
      document.getElementById('formError').innerText = "Passwords do not match.";
      return false;
    }
    return true;
  }

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

  function setCurriculum() {
    const select = document.getElementById('curriculumSelect');
    const input = document.getElementById('curriculumInput');
    input.value = select.value;
  }

  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebar-overlay');
    const logoImg = document.querySelector('.logo2 img');

    sidebar.classList.toggle('visible');
    overlay.classList.toggle('visible');

    logoImg.src = 'images/MTB-MAL_logo_side.png';
  }

  function filterTableRows(prefix) {
    const rows = document.querySelectorAll('.account-table tbody tr');
    rows.forEach(row => {
      const refNumber = row.children[1].textContent.trim(); // Reference Number column
      row.style.display = refNumber.startsWith(prefix) ? '' : 'none';
    });
  }

  document.addEventListener('DOMContentLoaded', function () {
    const buttons = document.querySelectorAll('.button-group .btn');

    function setActiveButton(activeId) {
      buttons.forEach(btn => {
        btn.classList.toggle('selected', btn.id === activeId);
      });
    }

    document.getElementById('btn-admin').addEventListener('click', () => {
      setActiveButton('btn-admin');
      filterTableRows('AD');
    });

    document.getElementById('btn-educator').addEventListener('click', () => {
      setActiveButton('btn-educator');
      filterTableRows('ED');
    });

    document.getElementById('btn-student').addEventListener('click', () => {
      setActiveButton('btn-student');
      filterTableRows('ST');
    });

    document.getElementById('btn-school').addEventListener('click', () => {
      setActiveButton('btn-school');
      filterTableRows('SH');
    });
  });
</script>


</body>
</html>