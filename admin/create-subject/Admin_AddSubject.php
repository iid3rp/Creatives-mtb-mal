<!--
NOTICE TO AUTOMATED SCANNERS AND REVIEWERS:

This form is part of a learning project for educational/school purposes ONLY.
It is NOT intended for phishing, spamming, or any malicious activity.
Please do NOT flag this site or form as suspicious based solely on the presence of this form.

Thank you for understanding.
-->

<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>Create Subject</title>
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
                <a href="/mtbmalsysfinal/auth/login.php">
                  <div class="dropdown-item">Logout</div>
                </a>
            </div>
        </div>
    </div>

  <!-- Form Container -->
  <div class="container">
    <div class="form-header">Create a Subject</div>

    <form action="Admin_CheckSubject.php" method="get" onsubmit="return validateForm()">

      <!-- Form Section -->
      <div class="form-section">

        <!-- EDIT THE FORMS HERE -->
        <!-- Column 1: Create a Subject for MTB-MLE -->
        <div class="column">

          <div class="section-header">
            <div class="circle-number">1</div>
            <h3>Create a Subject for MTB-MLE</h3>
          </div>

          <div class="form-group">
            <label>Subject Title</label>
          <input name="subjectTitle" type="text" placeholder="e.g. Kinder 1 - Tagalog" required>
          </div>

          <div class="form-group">
              <label for="subject-description"><strong>Subject Description</strong></label>
              <textarea id="subject-description" class="description-box" placeholder="Enter a detailed description of the subject..."></textarea>
          </div>

          <div class="form-group">
            <label>MTB-MLE Language</label>
            <input name="MTB-MLELang" type="text" placeholder="e.g. Tagalog" required>
          </div>

        </div>

        <!-- Column 2: Designate the MTB-MLE Subject -->
        <div class="column">

          <div class="section-header">
            <div class="circle-number">2</div>
            <h3>Designate the MTB-MLE Subject</h3>
          </div>

          <div class="form-group">
            <label>School’s MTB-MAL Reference Number</label>
            <input name="schoolRefNo" type="text" placeholder="e.g. SH-251584520001" required>
          </div>

          <div class="form-group">
            <label>Educator’s MTB-MAL Reference Number</label>
            <input name="eduRefNo" type="text" placeholder="e.g. ED-251584520001" required>
          </div>

          <div class="form-group">
            <label>Subject Created for Grade Level of School Year</label>
            <input name="subjectGradeLevel" type="text" placeholder="e.g. Kinder 1: 2025-2026" required>
          </div>

          <div class="form-group">
            <label>Email Address (Educator)</label>
            <input name="eduEmail" type="text" placeholder="e.g. john.doe@school.edu" required>
          </div>

          <div class="form-group">
            <label>Subject Creation In-charge</label>
            <input name="subjectAdmin" type="text" placeholder="Administrator’s MTB-MAL Ref No (e.g. AD-251584520001)" required>
          </div>

          <div class="form-group" id="formError" style="color:red;">
          </div>
        </div>

      </div>

      <!-- Button Group Web -->
      <div class="button-group1">
        <button type="reset" onclick="window.location.href='/mtbmalsysfinal/admin/dashboard/dashboard_admin.php'" class="cancel-btn">Cancel</button>
        <button type="submit" class="submit-btn">Submit</button>
      </div>

      <!-- Button Group Responsive -->
      <div class="button-group2">
        <button type="submit" class="submit-btn">Submit</button>
        <button type="reset" onclick="window.location.href='/mtbmalsysfinal/admin/dashboard/dashboard_admin.php'" class="cancel-btn">Cancel</button>
      </div>

    </form>
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
    </script>

</body>
</html>