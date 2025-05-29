<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>View Subjects</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/educator_subject-view-style.css">
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
    <span>View Subjects</span>
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
      <div class="form-section">
        <div class="column">

              <div class="user-table-header">
                
                <div class="user-table-header button-group">
                  <button class="btn" id="btn-subject">Subjects</button>
                </div>

                <div class="search-container">
                  <input type="text" placeholder="Search MTB-MLE Subject">
                  <img class="search-icon" src="images/search.png" alt="Search Icon">
                </div>
              </div>

              <table class="account-table">
                <thead>
                  <tr>
                    <th>No.</th>
                    <th>Reference Number</th>
                    <th>Subject Title</th>
                    <th>Assigned Educator</th>
                    <th>Total Number of Students</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><strong>1</strong></td>
                    <td>SB-251584520001</td>
                    <td>K1-Tagalog</td>
                    <td>Claire L. Tan</td>
                    <td>20</td>
                    <td>
                    <span class="action-icons">
                      <span class="edit-icon">✏️</span>
                      <img src="images/info.png" alt="Info Icon" onclick="openModal('K1-Tagalog')">
                    </span>
                    </td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>
    </div>

<!--=========================================== 1 =====================================================--->

<!-- K1-Tagalog MENU Modal -->
<div id="K1-Tagalog" class="modal">
  <div class="modal-content">
    <h2>Manage Subject</h2>
    <hr>
    <button class="modal-btn" onclick="openInnerModal('K1TagalogInner')">Subject Learning Materials</button>
    <a class="modal-btn" href="/mtbmalsysfinal/educators/view-subjects/educator_manage-student-records.php?class=K1-Tagalog">Manage Students Records</a>
    <a class="modal-btn" onclick="openInnerModal('Enrollees')">Manage Enrollees</a>
    <button class="modal-close" onclick="closeModal('K1-Tagalog')">Close</button>
  </div>
</div>

<!--=========================================== 2 =====================================================--->


<!-- K1-Tagalog Learning Materials Modal -->
<div id="K1TagalogInner" class="modal">
  <div class="modal-content2">
  <h1>Learning Materials</h1>

  <hr style="width: 70%; height: 2px; background-color: black; border: none; margin: 1rem auto; margin-bottom:20px;">
  <!-- Info Bar Table -->
  <table class="info-bar-table">
    <tr>
      <th>Subject Reference Number</th>
      <th>Subject Title</th>
      <th>Assigned Educator</th>
    </tr>
    <tr>
      <td>SB-251584520001</td>
      <td>K1-Tagalog</td>
      <td>Claire L. Tan</td>
    </tr>
  </table>

  <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <p>
      <div class="user-table-header button-group" style="position:relative; right:5px;">
        <button class="btn" id="btn-module" style="font-size:18px; margin-right:5px;">Learning Module</button>
        <button class="btn" id="btn-assessment" style="font-size:18px; margin-right:5px;">Learning Assessment</button>
        <button class="btn selected" id="btn-both" style="font-size:18px; margin-right:5px;">Display Both</button>
      </div>

      <table class="learning-materials-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Reference Number</th>
            <th>Title</th>
            <th>Creation Timestamp</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
           <tr>
    <td>1</td>
    <td>LA-452250001001</td>
    <td>Quest To Learn</td>
    <td>06-06-2025 09:25:23</td>
    <td>
      <span class="action-icons">
        <span>✏️</span>
        <img src="images/info.png" alt="Info Icon">
      </span>
    </td>
  </tr>
  <tr>
    <td>2</td>
    <td>LA-452250001002</td>
    <td>Flip and Match</td>
    <td>06-09-2025 10:25:23</td>
    <td>
      <span class="action-icons">
        <span>✏️</span>
        <img src="images/info.png" alt="Info Icon">
      </span>
    </td>
  </tr>
      <tr>
        <td>3</td>
        <td>LA-452250001003</td>
        <td>Memory Trace</td>
        <td>06-12-2025 08:25:23</td>
        <td>
          <span class="action-icons">
            <span>✏️</span>
            <img src="images/info.png" alt="Info Icon">
          </span>
        </td>
      </tr>

      <!-- New Tagalog Learning Materials -->
      <tr>
        <td>4</td>
        <td>LM-452250001001</td>
        <td>Pagbuo ng Pangungusap</td>
        <td>06-06-2025 09:25:23</td>
        <td>
          <span class="action-icons">
            <span>✏️</span>
            <img src="images/info.png" alt="Info Icon">
          </span>
        </td>
      </tr>
      <tr>
        <td>5</td>
        <td>LM-452250001002</td>
        <td>Pangngalang Pambalana</td>
        <td>06-09-2025 10:25:23</td>
        <td>
          <span class="action-icons">
            <span>✏️</span>
            <img src="images/info.png" alt="Info Icon">
          </span>
        </td>
      </tr>
      <tr>
        <td>6</td>
        <td>LM-452250001003</td>
        <td>Mga Bilang</td>
        <td>06-12-2025 08:25:23</td>
        <td>
          <span class="action-icons">
            <span>✏️</span>
            <img src="images/info.png" alt="Info Icon">
          </span>
        </td>
      </tr>
        </tbody>
      </table>
    </p>

    <!-- Buttons container -->
    <div class="modal-buttons-row">
      <button class="modal-close2" onclick="closeModal('K1TagalogInner')">Close</button>
      <a href="/mtbmalsysfinal/educators/manage-subjects/subject-learning-materials/upload_template.php" style="text-decoration:none; display: inline-block;">
        <button class="modal-btn2">➕ Upload New Learning Material</button>
      </a>
    </div>
  </div>
</div>

<!--=========================================== 3 =====================================================--->


<!-- === Enrollees Modal === -->
<div id="Enrollees" class="modal">

  <div class="modal-content2">
    <h1>Manage Enrollees</h1>

    <hr style="width: 70%; height: 2px; background-color: black; border: none; margin: 1rem auto 20px;">

    <!-- === Info Bar Table === -->
    <table class="info-bar-table" style="position: relative; right:-0px">
      <tr>
        <th>Subject Reference Number</th>
        <th>Subject Title</th>
        <th>Grade Level and School Year</th>
      </tr>
      <tr>
        <td>SB-251584520001</td>
        <td>K1-Tagalog</td>
        <td>Kinder 1 : 2025-2026</td>
      </tr>
    </table>

    <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <!-- === Enrollment Form === -->
    <form id="enroll-student-form">
      
      <!-- Learner Reference Number (LRN) -->
      <div class="form-group">
        <label for="lrn">Learner Reference Number (LRN)</label>
        <input type="text" id="lrn" name="lrn" placeholder="e.g. SB-251584520001" required>
      </div>

      <!-- Student MTB-MAL Reference Number -->
      <div class="form-group">
        <label for="mtb-ref">Student MTB-MAL Reference Number</label>
        <input type="text" id="mtb-ref" name="mtb_ref" placeholder="e.g. K1-Tagalog" required>
      </div>

      <!-- Student’s Full Name -->
      <div class="form-group">
        <label for="student-name">Student's Full Name</label>
        <input type="text" id="student-name" name="student_name" placeholder="e.g. John Doe" required>
      </div>

      <!-- Parent/Guardian Email Address -->
      <div class="form-group">
        <label for="guardian-email">Parent/Guardian Email Address</label>
        <input type="email" id="guardian-email" name="guardian_email" placeholder="e.g. parent@example.com" required>
      </div>

<!-- Checkbox: I hereby confirm all details are correct -->
<div class="form-group" style="display: flex; justify-content: center;">
  <div style="display: flex; align-items: center; width: 100%; max-width: 500px; position: relative;">
    <input type="checkbox" id="confirm-details" name="confirm_details" required style="margin-right: 10px;">
    <label for="confirm-details" style="white-space: nowrap; font-weight: bold;">
      I hereby confirm all the above details are correct.
    </label>
  </div>
</div>
      <!-- Submit Button -->
      <div class="form-group">
        <!-- Buttons container -->
        <div class="modal-buttons-row">
          <button class="modal-close2" onclick="closeModal('Enrollees')" style="position:relative; right:-80px;">Close</button>
          <button type="submit" class="modal-btn2" style="width:500px; position:relative; right:-100px;">Enroll Student</button>
        </div>
      </div>

    </form>

  </div> <!-- End .modal-content2 -->
</div> <!-- End #Enrollees.modal -->

<!--=========================================== 4 =====================================================--->

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
            // Function to open a modal by ID
            function openModal(modalId) {
              document.getElementById(modalId).style.display = "flex";
            }
            // Function to close a modal by ID
            function closeModal(modalId) {
              document.getElementById(modalId).style.display = "none";
            }
            // Function to open an inner modal by ID (nested modal)
            function openInnerModal(innerModalId) {
              document.getElementById(innerModalId).style.display = "flex";
            }
            // === Filter rows in .account-table based on prefix (e.g. "SB") ===
            function filterTableRows(prefix) {
              const rows = document.querySelectorAll('.account-table tbody tr');
              rows.forEach(row => {
                const refNumber = row.children[1].textContent.trim(); // Reference Number column
                row.style.display = refNumber.startsWith(prefix) ? '' : 'none';
              });
            }
            // === Set up button click behavior for .account-table ===
            document.addEventListener('DOMContentLoaded', function () {
              const buttons = document.querySelectorAll('.button-group .btn');

              // Toggle 'selected' class on clicked button
              function setActiveButton(activeId) {
                buttons.forEach(btn => {
                  btn.classList.toggle('selected', btn.id === activeId);
                });
              }
              // Filter .account-table rows starting with 'SB' when 'btn-subject' is clicked
              document.getElementById('btn-subject').addEventListener('click', () => {
                setActiveButton('btn-subject');
                filterTableRows('SB');
              });
            });
            // === Open modal with specified ID ===
            function openInnerModal(innerModalId) {
              document.getElementById(innerModalId).style.display = "flex";
            }
            // === Set active button by ID and apply 'selected' class ===
            function setActiveButton(buttonId) {
              document.querySelectorAll('.btn').forEach(btn => btn.classList.remove('selected'));
              document.getElementById(buttonId).classList.add('selected');
            }
            // === Renumber visible rows in .learning-materials-table ===
            function renumberVisibleRows() {
              const visibleRows = document.querySelectorAll('.learning-materials-table tbody tr');
              let count = 1;
              visibleRows.forEach(row => {
                if (row.style.display !== 'none') {
                  row.children[0].textContent = count++;
                }
              });
            }
            // === Filter .learning-materials-table rows based on prefix and renumber ===
            function filterTableRows(prefix) {
              const rows = document.querySelectorAll('.learning-materials-table tbody tr');
              rows.forEach(row => {
                const refNumber = row.children[1].textContent.trim();
                row.style.display = refNumber.startsWith(prefix) ? '' : 'none';
              });
              renumberVisibleRows();
            }
            // === Button handlers for filtering .learning-materials-table ===
            document.getElementById('btn-module').addEventListener('click', () => {
              setActiveButton('btn-module');
              filterTableRows('LM'); // Show only modules
            });

            document.getElementById('btn-assessment').addEventListener('click', () => {
              setActiveButton('btn-assessment');
              filterTableRows('LA'); // Show only assessments
            });

            document.getElementById('btn-both').addEventListener('click', () => {
              setActiveButton('btn-both');
              const rows = document.querySelectorAll('.learning-materials-table tbody tr');
              rows.forEach(row => row.style.display = ''); // Show all
              renumberVisibleRows();
            });
          </script>

</body>
</html>