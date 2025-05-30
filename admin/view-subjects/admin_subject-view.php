<!DOCTYPE html>
<html lang="en">
    
<head>
  <meta charset="UTF-8">
  <title>View Subjects</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/admin_subject-view-style.css">
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
                      <span class="edit-icon" onclick="openModal('K1-Tagalog')">✏️</span>
                      <img src="images/info.png" alt="Info Icon">
                    </span>
                    </td>
                  </tr>
                </tbody>
              </table>

        </div>
      </div>
    </div>

<!-- K1-Tagalog Modal -->
<div id="K1-Tagalog" class="modal">
  <div class="modal-content2">
    <h1>Subject Info</h1>

    <hr class="hr-main-title">

      <!-- Info Bar Table -->
      <table class="info-bar-table" style="position: relative; left:80px;">
        <tr>
          <th>Subject Title</th>
          <th>Language</th>
          <th>Subject Reference Number</th>
        </tr>
        <tr>
          <td>K1-Tagalog</td>
          <td>Tagalog</td>
          <td>SB-251584520001</td>
        </tr>
      </table>

    <hr class="hr-section-divider">

      <!-- Another Info Bar Table or Section -->
      <table class="info-bar-table">
        <tr>
          <th>Assigned Educator</th>
          <th>Educator Reference Number</th>
          <th>School Reference Number</th>
        </tr>
        <tr>
          <td>Claire L. Tan</td>
          <td>ED-115845201001</td>
          <td>SH-202501158452</td>
        </tr>
      </table>

    <hr class="hr-section-divider">

      <!-- Another Info Bar Table or Section -->
      <table class="info-bar-table">
        <tr>
          <th>Subject Creation In-charge</th>
          <th>Admin Reference Number</th>
          <th>Grade Level & School Year</th>
        </tr>
        <tr>
          <td>Juan G. Dela Cruz</td>
          <td>AD-250115845201</td>
          <td>Kinder 1 : 2025-2026</td>
        </tr>
      </table>

    <hr class="hr-section-divider">

        <!-- ✅ Description Container -->
        <div style="
          background-color: #C7FF80;
          border-radius: 10px;
          padding: 20px;
          margin: 20px auto;
          width: 95%;
          font-family: sans-serif;
          line-height:2em;
        ">
          <h3 style="margin-top: 0; font-size: 25px;">Subject Description</h3>
          <p style="margin-top: 0; padding-top:0; text-align:justify;">
            Ang kursong ito ay naglalayong paunlarin ang mga pangunahing kasanayan sa pagbasa 
            at pag-unawa ng mga letra sa Abakada at mga bilang mula 1 hanggang 20. 
            Matututo ang mga mag-aaral na makilala ang malalaki at maliliit na letra, 
            ang wastong pagbigkas ng mga tunog nito, at ang pagkilala sa mga larawan na 
            nagsisimula sa bawat titik. Kasama rin sa kurso ang maayos na pag-unawa at 
            pagbibilang ng mga numero, habang pinagsasama ang mga gawaing makatutulong 
            sa kanilang pagsasanay sa pagsulat, pagkopya, at pagbibilang. Idinisenyo ang 
            kursong ito upang maipasa ang kasanayan sa pagbasa, pagsulat, at pagbibilang 
            gamit ang wikang Tagalog sa maagang yugto ng pagkatuto.
          </p>
        </div>

        <!-- Buttons container -->
        <div class="modal-buttons-row">
          <button class="modal-close2" onclick="closeModal('K1-Tagalog')">Close</button>
          <button class="modal-btn2" onclick="openModal('K1TagalogInner')">View Learning Materials</button>
        </div>
  </div>
</div>

<!-- K1-Tagalog Inner Modal -->
<div id="K1TagalogInner" class="modal">
  <div class="modal-content2">
  <h1>K1-Tagalog: Subject Learning Materials</h1>

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
      <button class="modal-close" onclick="closeModal('K1TagalogInner')">Back</button>
      <a href="/mtbmalsysfinal/educators/manage-subjects/subject-learning-materials/upload_template.php" style="text-decoration:none; display: inline-block;">
        <button class="modal-btn">➕ Upload New Learning Material</button>
      </a>
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

    document.getElementById('btn-subject').addEventListener('click', () => {
      setActiveButton('btn-subject');
      filterTableRows('SB');
    });
  });

function openModal(modalId) {
  document.getElementById(modalId).style.display = "flex";
}

function closeModal(modalId) {
  document.getElementById(modalId).style.display = "none";
}

function openInnerModal(innerModalId) {
  document.getElementById(innerModalId).style.display = "flex";
}

function setActiveButton(buttonId) {
    document.querySelectorAll('.btn').forEach(btn => btn.classList.remove('selected'));
    document.getElementById(buttonId).classList.add('selected');
  }

  function renumberVisibleRows() {
    const visibleRows = document.querySelectorAll('.learning-materials-table tbody tr');
    let count = 1;
    visibleRows.forEach(row => {
      if (row.style.display !== 'none') {
        row.children[0].textContent = count++;
      }
    });
  }

  function filterTableRows(prefix) {
    const rows = document.querySelectorAll('.learning-materials-table tbody tr');

    rows.forEach(row => {
      const refNumber = row.children[1].textContent.trim();
      row.style.display = refNumber.startsWith(prefix) ? '' : 'none';
    });

    renumberVisibleRows();
  }

  document.getElementById('btn-module').addEventListener('click', () => {
    setActiveButton('btn-module');
    filterTableRows('LM');
  });

  document.getElementById('btn-assessment').addEventListener('click', () => {
    setActiveButton('btn-assessment');
    filterTableRows('LA');
  });

  document.getElementById('btn-both').addEventListener('click', () => {
    setActiveButton('btn-both');
    const rows = document.querySelectorAll('.learning-materials-table tbody tr');
    rows.forEach(row => row.style.display = '');
    renumberVisibleRows();
  });
</script>


</body>
</html>