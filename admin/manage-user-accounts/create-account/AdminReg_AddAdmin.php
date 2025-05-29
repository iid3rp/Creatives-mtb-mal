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
  <title>Register Admin</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/AdminReg_AddAdminSchool-style.css">
</head>

<body>
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

<!-- Form Container -->
<div class="container">
  <div class="form-header">Sign up for MTB-MAL</div>

  <form action="AdminReg_CheckAdminSchool.php" method="get" onsubmit="return validateForm()">

    <!-- Form Section -->
    <div class="form-section">

      <!-- Column 1: Administrator Account -->
      <div class="column">

        <!-- Section Header -->
        <div class="section-header">
          <div class="circle-number">2</div>
          <h3>Administrator Account</h3>
        </div>

        <!-- Full Name Input -->
        <div class="form-group">
          <label>Full Name (Last, First M.I.)</label>
          <input name="adminName" required placeholder="e.g., Doe, John A.">
        </div>

        <!-- Employee ID Input -->
        <div class="form-group">
          <label>Employee ID</label>
          <input name="adminID" type="text" placeholder="e.g., EMP12345" required>
        </div>

        <!-- School ID Number Input -->
        <div class="form-group">
          <label>School ID Number</label>
          <input name="adminSchoolID" type="text" placeholder="e.g., 2021001234" required>
        </div>

        <!-- Email Address Input -->
        <div class="form-group">
          <label>Email Address (Admin)</label>
          <input name="adminEmail" type="email" placeholder="e.g., john.doe@school.edu" required>
        </div>

        <!-- Contact Number Input -->
        <div class="form-group">
          <label>Contact Number (Admin)</label>
          <input name="adminContact" type="tel" placeholder="e.g., 09123456789" required>
        </div>

        <!-- Username Input -->
        <div class="form-group">
          <label>Username</label>
          <input name="username" type="text" placeholder="Choose a username" required>
        </div>

        <!-- Password Input -->
        <div class="form-group">
          <label>Password</label>
          <input id="password" name="password" type="password" placeholder="Enter your password" required>
        </div>

        <!-- Re-enter Password Input -->
        <div class="form-group">
          <label>Re-enter Password</label>
          <input id="rePassword" name="rePassword" type="password" placeholder="Re-enter your password" required>
        </div>

        <!-- Error Message Container -->
        <div class="form-group" id="formError" style="color: red;">
          <!-- Error messages will be shown here -->
        </div>

      </div> <!-- End Column -->

    </div> <!-- End Form Section -->

    <!-- Button Group for Desktop -->
    <div class="button-group1">
      <button type="reset" onclick="window.location.href='/mtbmalsysfinal/admin/users/add/add_school/AdminReg_AddSchool.php'" class="cancel-btn">Cancel</button>
      <button type="submit" class="submit-btn">Submit</button>
    </div>

    <!-- Button Group for Responsive -->
    <div class="button-group2">
      <button type="submit" class="submit-btn">Submit</button>
      <button type="reset" onclick="window.location.href='/mtbmalsysfinal/admin/users/add/add_school/AdminReg_AddSchool.php'" class="cancel-btn">Cancel</button>
    </div>

  </form>
</div>
</div>

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