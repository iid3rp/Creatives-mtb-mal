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
  <title>Register School</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/AdminReg_AddAdminSchool-style.css">
</head>

<body>
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
            </div> <br>
            <div class="profile-container">
                <div class="profile-circle" onclick="toggleDropdown2()"></div>

                <div id="profile-dropdown-menu" class="profile-dropdown hidden">
                    <div class="dropdown-item">Settings</div>
                    <a href="/mtbmalsysfinal/auth/login.php">
                        <div class="dropdown-item">Logout</div>
                    </a>
                </div>
            </div>
        </div>
    </div>

  <!-- Form Container -->
  <div class="container">
    <div class="form-header">Sign up for MTB-MAL</div>

    <form action="AdminReg_AddAdmin.php" method="get" onsubmit="return validateForm()">

      <!-- Form Section -->
      <div class="form-section">

        <!-- EDIT THE FORMS HERE -->
        <!-- Column 1: School Profile -->
        <div class="column">

          <div class="section-header">
            <div class="circle-number">1</div>
            <h3>School Profile</h3>
          </div>

          <div class="form-group">
            <label>School Name</label>
            <input name="schoolName" type="text" placeholder="e.g., ABC National High School" required>
          </div>    

          <div class="form-group">
            <label>Short Name</label>
            <input name="shortName" type="text" placeholder="e.g., ABC NHS" required>
          </div>

          <div class="form-group">
            <label>School ID Number</label>
            <input name="schoolID" type="text" placeholder="e.g., 305432" required>
          </div>

          <div class="form-group">
            <label>Email Address (School)</label>
            <input name="schoolEmail" type="email" placeholder="e.g., abcnhs@school.edu" required>
          </div>

          <div class="form-group">
            <label>Contact Number (School)</label>
            <input name="schoolContact" type="tel" placeholder="e.g., 09123456789 or (02) 8123-4567" required>
          </div>

          <div class="form-group">
            <label>Curricular Offering</label>
            <select id="curriculumSelect" name="curriculumOffering" onchange="setCurriculum()" required>
              <option value="" disabled selected>Select an option</option>
              <option value="Public">Public</option>
              <option value="Private">Private</option>
            </select>
          </div>

          <div class="form-group">
            <label>School Classification</label>
            <input name="schoolClass" type="text" placeholder="e.g., Junior High School, Senior High School" required>
          </div>

          <div class="form-group">
            <label>Location Address</label>
            <input name="address" type="text" placeholder="Street, District, City, Province" required>
          </div>

          <div class="form-group">
            <label>Region</label>
            <input name="region" type="text" placeholder="e.g., Region IV-A" required>
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
</div>

<!-- Footer -->
        <footer class="footer">
            Mother Tongue-Based Multilingual Assessment and Learning System © 2025
        </footer>

  <!-- Dropdown and Options Script -->
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
    </script>

</body>
</html>