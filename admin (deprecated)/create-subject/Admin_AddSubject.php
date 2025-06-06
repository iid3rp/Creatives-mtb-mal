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

<!-- === Form Container === -->
<div class="container"> <!-- Entire form container -->

  <!-- === Form Title Header === -->
  <div class="form-header">Create a Subject</div>

  <!-- === Form Start === -->
  <form action="Admin_CheckSubject.php" method="POST" onsubmit="return validateForm()">

    <!-- === Form Section Wrapper === -->
    <div class="form-section">

      <!-- === Column 1: Create Subject Details === -->
      <div class="column"> <!-- Left form column -->

        <!-- Section Header -->
        <div class="section-header">
          <div class="circle-number">1</div>
          <h3>Create a Subject for MTB-MLE</h3>
        </div>

        <!-- Subject Title -->
        <div class="form-group">
          <label>Subject Title</label>
          <input name="subjectTitle" type="text" placeholder="e.g. Kinder 1 - Tagalog" required>
        </div>

        <!-- Subject Description -->
        <div class="form-group">
          <label for="subject-description"><strong>Subject Description</strong></label>
          <textarea id="subject-description" class="description-box" placeholder="Enter a detailed description of the subject..."></textarea>
        </div>

        <!-- MTB-MLE Language -->
        <div class="form-group">
          <label>MTB-MLE Language</label> 
          <input name="MTB-MLELang" type="text" placeholder="e.g. Tagalog" required>
        </div>

      </div> <!-- End of Column 1 -->

      <!-- === Column 2: Assign Subject Details === -->
      <div class="column"> <!-- Right form column -->

        <!-- Section Header -->
        <div class="section-header">
          <div class="circle-number">2</div>
          <h3>Designate the MTB-MLE Subject</h3>
        </div>

        <!-- School Reference Number -->
        <div class="form-group">
          <label>School’s MTB-MAL Reference Number</label>
          <input name="schoolRefNo" type="text" placeholder="e.g. SH-251584520001" required>
        </div>

        <!-- Educator Reference Number -->
        <div class="form-group">
          <label>Educator’s MTB-MAL Reference Number</label>
          <input name="eduRefNo" type="text" placeholder="e.g. ED-251584520001" required>
        </div>

        <!-- Grade Level -->
        <div class="form-group">
          <label>Subject Created for Grade Level of School Year</label>
          <input name="subjectGradeLevel" type="text" placeholder="e.g. Kinder 1: 2025-2026" required>
        </div>

        <!-- Educator Email -->
        <div class="form-group">
          <label>Email Address (Educator)</label>
          <input name="eduEmail" type="text" placeholder="e.g. john.doe@school.edu" required>
        </div>

        <!-- Admin Reference Number -->
        <div class="form-group">
          <label>Subject Creation In-charge</label>
          <input name="subjectAdmin" type="text" placeholder="Administrator’s MTB-MAL Ref No (e.g. AD-251584520001)" required>
        </div>

        <!-- Form Error Display -->
        <div class="form-group" id="formError" style="color:red;"></div>

      </div> <!-- End of Column 2 -->

    </div> <!-- End of form-section -->

    <!-- === Button Group for Web/Desktop View === -->
    <div class="button-group1">
      <button type="reset" onclick="window.location.href='../dashboard/dashboard_admin.php'" class="cancel-btn">Cancel</button>
      <button type="submit" class="submit-btn">Submit</button>
    </div>

    <!-- === Button Group for Mobile/Responsive View === -->
    <div class="button-group2">
      <button type="submit" class="submit-btn">Submit</button>
      <button type="reset" onclick="window.location.href='../dashboard/dashboard_admin.php'" class="cancel-btn">Cancel</button>
    </div>

  </form> <!-- End of Form -->

</div> <!-- End of Container -->

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
        // Validate password and re-entered password fields
        function validateForm() {
            const pw = document.getElementById('password').value;
            const rePw = document.getElementById('rePassword').value;
            if (pw !== rePw) {
              document.getElementById('formError').innerText = "Passwords do not match.";
              return false;
            }
            return true;
        }
        // Update curriculum input field with selected value
        function setCurriculum() {
            const select = document.getElementById('curriculumSelect');
            const input = document.getElementById('curriculumInput');
            input.value = select.value;
        }
    </script>

</body>
</html>