<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>Manage Student Records</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/educator_subject-view-style.css">
</head>

<body>

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
    <span>Manage Student Records</span>
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

        <!-- Class Filter Buttons -->
        <div class="user-table-header button-group">
          <button class="btn selected" onclick="filterByClass('all')">All</button>
          <button class="btn" onclick="filterByClass('K1-Tagalog')">K1-Tagalog</button>
          <button class="btn" onclick="filterByClass('Gr3-Matigsalug')">Gr3-Matigsalug</button>
        </div>

        <!-- Search Field -->
        <div class="search-container">
          <input type="text" id="searchInput" placeholder="Search Student Account" onkeyup="searchStudent()">
          <img class="search-icon" src="images/search.png" alt="Search Icon">
        </div>
      </div>

      <!-- Reference Numbers and Grade Levels (Tagalog) -->
      <div class="reference-header" data-class="K1-Tagalog">
        <div class="reference-item">
          <label><strong>Subject Reference Number:</strong></label>
          <span class="reference-value">SB-251584520001</span>
        </div>
        <div class="reference-item2">
          <label><strong>Grade Level & School Year:</strong></label>
          <span class="reference-value">Kinder 1 : 2025-2026</span>
        </div>
        <hr style="width: 99%; height: 1px; background-color: black; border: none;">
      </div>

      <!-- Reference Numbers and Grade Levels (Matigsalug) -->
      <div class="reference-header" data-class="Gr3-Matigsalug">
        <div class="reference-item">
          <label><strong>Subject Reference Number:</strong></label>
          <span class="reference-value">SB-232674343435</span>
        </div>
        <div class="reference-item2">
          <label><strong>Grade Level & School Year:</strong></label>
          <span class="reference-value">Grade 3 : 2025-2026</span>
        </div>
        <hr style="width: 99%; height: 1px; background-color: black; border: none;">
      </div>

      <!-- Student Table -->
      <table class="account-table" id="studentsTable">
        <thead>
          <tr>
            <th>No.</th>
            <th>Reference Number</th>
            <th>Subject Title</th>
            <th>Assigned Educator</th>
          </tr>
        </thead>
        <tbody>
          <tr data-class="K1-Tagalog">
            <td>1</td>
            <td>ST-115845200001</td>
            <td>Maria T. De Leon</td>
            <td><a href="#" onclick="openModal('Grades-Maria')">View Grades</a> <a href="#" onclick="openModal('Profile-Maria')">View Profile</a></td>
          </tr>
          <tr data-class="Gr3-Matigsalug">
            <td>2</td>
            <td>ST-115845200002</td>
            <td>John Carl S. Aguilar</td>
            <td><a href="#" onclick="openModal('Grades-John')">View Grades</a> <a href="#" onclick="openModal('Profile-John')">View Profile</a></td>
          </tr>
        </tbody>
      </table>

    </div>
  </div>
</div>

<!--=========================================== 1 =====================================================--->

<!-- Grades Modal -->
<div id="Grades-Maria" class="modal">
  <div class="modal-content2">
  <h1>Student's Progress</h1>

  <hr style="width: 70%; height: 2px; background-color: black; border: none; margin: 1rem auto; margin-bottom:20px;">
  <!-- Info Bar Table -->
  <table class="info-bar-table" style="position: relative; right:-30px;">
    <tr>
      <th>Full Name</th>
      <th>MTB-MAL Reference Number</th>
      <th>Learner Reference Number</th>
    </tr>
    <tr>
      <td>Maria T. De Leon</td>
      <td>ST-115845200001</td>
      <td>124560098070</td>
    </tr>
  </table>

  <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <p>
      <table class="learning-materials-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Learning Material Reference Number</th>
            <th>Title</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
           <tr>
            <td>1</td>
            <td>LA-452250001002</td>
            <td>Quest To Learn</td>
            <td>10/10</td>
          </tr>
          <tr>
            <td>2</td>
            <td>LA-452250001004</td>
            <td>Flip and Match</td>
            <td>15/15</td>
          </tr>
          <tr>
            <td>3</td>
            <td>LA-452250001006</td>
            <td>Memory Trace</td>
            <td>15/15</td>
          </tr>            
        </tbody>
      </table>
    </p>

    <!-- Buttons container -->
    <div class="modal-buttons-row">
      <button class="modal-close2" onclick="closeModal('Grades-Maria')">Okay</button>
    </div>
  </div>
</div>

<!--=========================================== 2 =====================================================--->

<!-- Grades Modal -->
<div id="Grades-John" class="modal">
  <div class="modal-content2">
    <h1>Student's Progress</h1>

    <hr style="width: 70%; height: 2px; background-color: black; border: none; margin: 1rem auto; margin-bottom:20px;">
    
    <!-- Info Bar Table -->
    <table class="info-bar-table" style="position: relative; right:-30px;">
      <tr>
        <th>Full Name</th>
        <th>MTB-MAL Reference Number</th>
        <th>Learner Reference Number</th>
      </tr>
      <tr>
        <td>John Carl S. Aguilar</td>
        <td>ST-115845200002</td>
        <td>124560098071</td>
      </tr>
    </table>

    <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <p>
      <table class="learning-materials-table">
        <thead>
          <tr>
            <th>No.</th>
            <th>Learning Material Reference Number</th>
            <th>Title</th>
            <th>Score</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1</td>
            <td>LA-452250001003</td>
            <td>Word Builder</td>
            <td>9/10</td>
          </tr>
          <tr>
            <td>2</td>
            <td>LA-452250001005</td>
            <td>Picture Sort</td>
            <td>14/15</td>
          </tr>
          <tr>
            <td>3</td>
            <td>LA-452250001007</td>
            <td>Sound Matcher</td>
            <td>13/15</td>
          </tr>
        </tbody>
      </table>
    </p>

    <!-- Buttons container -->
    <div class="modal-buttons-row">
      <button class="modal-close2" onclick="closeModal('Grades-John')">Okay</button>
    </div>
  </div>
</div>

<!--=========================================== 3 =====================================================--->

<!-- Profile Modal -->
<div id="Profile-Maria" class="modal">
  <div class="modal-content2" style="padding-top: 0px; padding-bottom: 10px;">
  <h1>Student's Progress</h1>

  <hr style="position:relative; right: -160px; width:70%; height: 2px; background-color: black; border: none; margin: 1rem 0;">

  <!-- ADD SQUARE FOR STUDENT PROFILE PICTURE HERE -->
  <div class="profile-picture-placeholder">
    Photo
  </div>

  <h3> Student Profile </h3>
  <table class="info-bar-table" style="position: relative; right:-60px;">
    <tr>
      <th style="position: relative; right:90px;">Full Name</th>
      <th>Date of Birth</th>
      <th style="position: relative; right:20px;">Learner Reference Number</th>
    </tr>
    <tr>
      <td style="position: relative; right:90px;">Maria T. De Leon</td>
      <td>03-29-2020</td>
      <td style="position: relative; right:20px;">124560098070</td>
    </tr>
  </table>

  <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

  <table class="info-bar-table" style="position: relative; right: 60px;">
    <tr>
      <th>School Identification Number</th>
      <th>MTB-MAL Reference Number</th>
      <th>Username</th>
    </tr>
    <tr>
      <td>158452</td>
      <td>ST-115845200001</td>
      <td>studentMTD02</td>
    </tr>
  </table>

  <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

  <h3> Parent/Guardian Profile </h3>
  <table class="info-bar-table" style="position: relative; right:-15px;">
    <tr>
      <th style="position: relative; right:60px;">Full Name</th>
      <th>Marital Status</th>
      <th>Relationship to Student</th>
    </tr>
    <tr>
      <td style="position: relative; right:60px;">Amor A. Cagabcab</td>
      <td>Single</td>
      <td>Guardian</td>
    </tr>
  </table>

  <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

  <table class="info-bar-table" style="position: relative; right: -25px;">
    <tr>
      <th style="position: relative; right:35px;">Date of Birth</th>
      <th>Email Address</th>
      <th style="position: relative; right:40px;">Contact Number</th>
    </tr>
    <tr>
      <td style="position: relative; right:35px;">05-08-1999</td>
      <td>amor_99@gmail.com</td>
      <td style="position: relative; right:40px;">09228799881</td>
    </tr>
  </table>

    <!-- Buttons container -->
    <div class="modal-buttons-row">
      <button class="modal-close2" onclick="closeModal('Profile-Maria')" style="position: relative; right:10px;">Okay</button>
    </div>
  </div>
</div>

<!--=========================================== 4 =====================================================--->

<!-- Profile Modal -->
<div id="Profile-John" class="modal">
  <div class="modal-content2" style="padding-top: 0px; padding-bottom: 10px;">
    <h1>Student's Progress</h1>

    <hr style="position:relative; right: -160px; width:70%; height: 2px; background-color: black; border: none; margin: 1rem 0;">

    <!-- Profile Picture Placeholder -->
    <div class="profile-picture-placeholder">
      Photo
    </div>

    <h3> Student Profile </h3>
    <table class="info-bar-table" style="position: relative; right:-40px;">
      <tr>
        <th style="position: relative; right:80px;">Full Name</th>
        <th>Date of Birth</th>
        <th style="position: relative; right:10px;">Learner Reference Number</th>
      </tr>
      <tr>
        <td style="position: relative; right:80px;">John Carl S. Aguilar</td>
        <td>07-15-2020</td>
        <td style="position: relative; right:10px;">124560098071</td>
      </tr>
    </table>

    <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <table class="info-bar-table" style="position: relative; right: 60px;">
      <tr>
        <th>School Identification Number</th>
        <th>MTB-MAL Reference Number</th>
        <th>Username</th>
      </tr>
      <tr>
        <td>158453</td>
        <td>ST-115845200002</td>
        <td>studentJMA03</td>
      </tr>
    </table>

    <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <h3> Parent/Guardian Profile </h3>
    <table class="info-bar-table" style="position: relative; right:-15px;">
      <tr>
        <th style="position: relative; right:60px;">Full Name</th>
        <th>Marital Status</th>
        <th>Relationship to Student</th>
      </tr>
      <tr>
        <td style="position: relative; right:60px;">Roberto M. Aguilar</td>
        <td>Married</td>
        <td>Father</td>
      </tr>
    </table>

    <hr style="height: 1px; background-color: black; border: none; margin: 1rem 0;">

    <table class="info-bar-table" style="position: relative; right: -25px;">
      <tr>
        <th style="position: relative; right:35px;">Date of Birth</th>
        <th>Email Address</th>
        <th style="position: relative; right:40px;">Contact Number</th>
      </tr>
      <tr>
        <td style="position: relative; right:35px;">02-10-1988</td>
        <td>roberto88@gmail.com</td>
        <td style="position: relative; right:40px;">09123456789</td>
      </tr>
    </table>

    <!-- Buttons container -->
    <div class="modal-buttons-row">
      <button class="modal-close2" onclick="closeModal('Profile-John')" style="position: relative; right:10px;">Okay</button>
    </div>
  </div>
</div>

<!--=========================================== 5 =====================================================--->

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

        // Search for students in the table based on input text
        function searchStudent() {
          const input = document.getElementById("searchInput").value.toLowerCase();
          const rows = document.querySelectorAll("#studentsTable tbody tr");

          rows.forEach(row => {
            const rowText = row.textContent.toLowerCase();
            row.style.display = rowText.includes(input) ? "" : "none";
          });
        }
        // Function to open a modal by ID
        function openModal(modalId) {
          document.getElementById(modalId).style.display = "flex";
        }

        // Function to close a modal by ID
        function closeModal(modalId) {
          document.getElementById(modalId).style.display = "none";
         }

        // Open a modal with specified ID
        function openInnerModal(innerModalId) {
          document.getElementById(innerModalId).style.display = "flex";
        }

        // Set active button by ID
        function setActiveButton(buttonId) {
          document.querySelectorAll('.btn').forEach(btn => btn.classList.remove('selected'));
          document.getElementById(buttonId).classList.add('selected');
        }

        // Renumber visible rows in the students table
        function renumberVisibleRows() {
          const rows = document.querySelectorAll('#studentsTable tbody tr');
          let count = 1;
          rows.forEach(row => {
            if (row.style.display !== 'none') {
              row.children[0].textContent = count++;
            }
          });
        }

        function filterByClass(className) {
        // Highlight the selected button
        const buttons = document.querySelectorAll('.button-group .btn');
        buttons.forEach(btn => {
          btn.classList.remove('selected');
          if (btn.textContent === className || (className === 'all' && btn.textContent === 'All')) {
            btn.classList.add('selected');
          }
        });

        // Hide all reference headers
        const headers = document.querySelectorAll('.reference-header');
        headers.forEach(header => {
          header.style.display = 'none';
        });

        // Show matching reference header
        const matchingHeader = document.querySelector(`.reference-header[data-class="${className}"]`);
        if (matchingHeader) {
          matchingHeader.style.display = 'flex';
        }

        // Filter student rows
        const rows = document.querySelectorAll('#studentsTable tbody tr');
        rows.forEach(row => {
          row.style.display = (className === 'all' || row.dataset.class === className) ? '' : 'none';
        });

        // Renumber visible rows
        renumberVisibleRows();
      }

      // Auto-filter based on URL parameter (?class=K1-Tagalog)
      window.addEventListener('DOMContentLoaded', () => {
        const urlParams = new URLSearchParams(window.location.search);
        const selectedClass = urlParams.get('class');
        if (selectedClass) {
          filterByClass(selectedClass);
        }
      });
      </script>

</body>
</html>