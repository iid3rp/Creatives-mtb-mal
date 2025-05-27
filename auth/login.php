<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MTB-MAL Login</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link href="style/login-style.css" rel="stylesheet" />    
</head>
<body>
    <button class="back-button" onclick="window.location.href='/mtbmalsysfinal/auth/frontpage.php'">⬅ Back to Front Page</button>
    <div class="left-panel"> 
    <div class="left-panel-content">
        <img src="images/MTB-MAL_logos.png" alt="MTB-MAL Logo">
        <div class="left-header-text">
        Mother Tongue-Based Multilingual Assessment and Learning System
        </div>
    </div>
    </div>

<div class="right-container">
  <div class="right-panel">
      <div class="form-wrapper">
        <h2>Log in as:</h2>
        <select id="role">
        <option value="">-- Select Role --</option>
        <option value="admin">Admin</option>
        <option value="educator">Educator</option>
        <option value="student">Student</option>
        </select>

        <label for="ref">Reference Number</label>
        <input type="text" id="ref" placeholder="eg. ST-12345678900">

        <label for="password">Password</label>
        <div class="form-group">
            <input type="password" id="password" placeholder="Enter password">
            <span class="eye" id="toggle-eye" onclick="togglePassword()">
                <img src="images/pass_hidden.png" alt="Password Hidden" id="eye-icon">
            </span>
        </div>

        <div class="buttons">
            <button onclick="login()">Log in</button>
            <button onclick="handleRegister()">Register a School</button>
        </div>

        <div class="footer">
            <button id="cookie-notice">Cookies notice</button>
            <button id="language-select">🌐 English</button>
        </div>
    </div>
   </div>
</div>

<!-- Cookie Modal -->
<div id="cookiesNotice" class="modal" style="display: none;">
    <div class="modal-content">
        <h2>Cookies must be enabled in your browser</h2><hr>
        <p>
            Two cookies are used on this site:<br><br>
            The essential one is the session cookie, usually called <b>MoodleSession</b>. You must allow this cookie in your browser to provide continuity and to remain logged in when browsing the site.
            When you log out or close the browser, this cookie is destroyed (in your browser and on the server).<br><br>
            The other cookie is purely for convenience, usually called <b>MOODLEID</b> or similar. It just remembers your username in the browser. This means that when you return to this site, the username field on the login page is already filled in for you. It is safe to refuse this cookie — you will just have to retype your username each time you log in.
        </p>
        <button class="modal-close" onclick="closeModal()">OKAY</button>
    </div>
</div>

  <script>
    function togglePassword() {
        const password = document.getElementById("password");
        const eye = document.getElementById("toggle-eye");

        const isHidden = password.type === "password";
        password.type = isHidden ? "text" : "password";

        eye.innerHTML = isHidden
            ? '<img src="images/pass_visible.png" alt="Password Visible">'
            : '<img src="images/pass_hidden.png" alt="Password Hidden">';
    }

    function login() {
        const role = document.getElementById("role").value;
        if (!role) {
            alert("Please select a role to log in.");
            return;
        }

        alert("Logging in as " + role);

        // Redirect based on role
        switch (role) {
            case "admin":
                window.location.href = "/mtbmalsysfinal/admin/dashboard/dashboard_admin.php";
                break;
            case "educator":
                window.location.href = "/mtbmalsysfinal/educators/dashboard/dashboard_educators.php";
                break;
            case "student":
                window.location.href = "/mtbmalsysfinal/students/dashboard/dashboard_students.php";
                break;
            default:
                alert("Invalid role selected.");
        }
    }

    document.getElementById("cookie-notice").addEventListener("click", function () {
        document.getElementById("cookiesNotice").style.display = "flex";
    });

    function closeModal() {
        document.getElementById("cookiesNotice").style.display = "none";
    }

  function handleRegister() {
    const role = document.getElementById("role").value;
    const ref = document.getElementById("ref").value.trim();
    const password = document.getElementById("password").value.trim();

    if (role !== "admin") {
      alert("Only admins can register a school. Please select 'Admin' as the role.");
      return;
    }

    if (!ref || !password) {
      alert("Please enter both Reference Number and Password.");
      return;
    }

    // If everything is valid, redirect
    window.location.href = "/mtbmalsysfinal/admin/manage-user-accounts/create-account/AdminReg_AddAdmin.php";

}
  </script>
  
</body>
</html>