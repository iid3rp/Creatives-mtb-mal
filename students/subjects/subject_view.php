<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Upload New Learning Materials</title>
    <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
    <link rel="stylesheet" href="style/subject_view-style.css">
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
        <a href="/mtbmalsysfinal/students/dashboard/dashboard_students.php">
            <span class="icon">🏠</span> Dashboard
        </a>
        <a href="/mtbmalsysfinal/students/dashboard/subject_dashboard.php">
            <span class="icon">📘</span> Subjects
        </a>
    </nav>

    <!-- Add bunny GIF here -->
    <div class="bunny-gif">
        <img src="images/bunny.gif" alt="Bunny Animation" />
        <div class="chatbox">Please study well!</div>
    </div>
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

    <!-- Tagalog Kinder 1 Main Content -->
    <div class="subject-container">
        <div class="subject-header">
            <div class="subject-title">
                <div class="subject-icon"></div>
                <div>
                    <div class="grade-label">Kinder 1</div>
                    <div class="subject-name">Tagalog</div>
                </div>
            </div>
            <div class="subject-buttons">
                <button class="btn-lessons selected" id="btn-lessons">Lessons</button>
                <button class="btn-games" id="btn-games">Games</button>
            </div>
        </div>
        
    <!-- Your existing lesson content here -->
    <div class="chapter-card-group">
        <!-- Chapter 1 -->
        <div class="chapter-card chapter-blue" style="margin-bottom: 5px;">
            <!-- Chapter 1 header -->
            <div class="chapter-card-header">
                <div class="chapters">
                    <div class="chapter-number">Chapter 1</div>
                    <div class="chapter-title">Ang Pangungusap</div>
                </div>
                <button class="chapter-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter" alt="Toggle Content">
                </button>
            </div>
            <!-- Lessons for Chapter 1 -->
            <div class="chapter-content">
                <div class="lesson">
                    <div class="lesson-number">Lesson 1</div>
                    <div class="lesson-title">Mga Uri ng Pangungusap</div>
                </div>
                <button class="lesson-play" onclick="openModal('Chapter-1-Lesson-1')">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter2" alt="Toggle Content">
                </button>
            </div>
            <div class="chapter-content">
                <div class="lesson">
                    <div class="lesson-number">Lesson 2</div>
                    <div class="lesson-title">Mga Bahagi ng Pangungusap</div>
                </div>
                <button class="lesson-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter2" alt="Toggle Content">
                </button>
            </div>
        </div>

        <!-- Chapter 2 -->
        <div class="chapter-card chapter-blue">
            <div class="chapter-card-header">
                <div class="chapters">
                    <div class="chapter-number">Chapter 2</div>
                    <div class="chapter-title">Ang Pangngalan</div>
                </div>
                <button class="chapter-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter" alt="Toggle Content">
                </button>
            </div>
            <div class="chapter-content">
                <div class="lesson">
                    <div class="lesson-number">Lesson 1</div>
                    <div class="lesson-title">Pangngalang Pambalana</div>
                </div>
                <button class="lesson-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter2" alt="Toggle Content">
                </button>
            </div>
    </div>
</div>

<!-- Games / Assessments Container (initially hidden) -->
<div id="games-container" style="display:none;">
    <!-- Your existing lesson content here -->
    <div class="chapter-card-group">
        <!-- Chapter 2 -->
        <div class="chapter-card chapter-blue">
            <!-- Chapter 2 header -->
            <div class="chapter-card-header">
                <div class="chapters">
                    <div class="chapter-number">Chapter 2</div>
                    <div class="chapter-title">Ang Pangungusap</div>
                </div>
                <button class="chapter-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter" alt="Toggle Content">
                </button>
            </div>
            <!-- Assessments for Chapter 2 -->
            <div class="chapter-content">
                <div class="lesson">
                    <div class="lesson-number">Flip and Match</div>
                    <div class="lesson-title">Ang mga Gamit sa aking Bahay</div>
                </div>
                <button class="lesson-play">
                    <img src="images/chapter_arrow_blue.png" class="triangle-icon-chapter2" alt="Toggle Content">
                </button>
            </div>
        </div>
    </div>
</div>
</div>

      <!-- Footer -->
        <footer class="footer">
            Mother Tongue-Based Multilingual Assessment and Learning System © 2025
        </footer>

    <!-- Chapter-1-Lesson-1 Modal -->
    <div id="Chapter-1-Lesson-1" class="modal" style="display: none;">
    <div class="modal-content">
    <h1>Pagbuo ng Pangungusap</h1>
        <p>Ang pangungusap ay isang grupo ng mga salita na may buong diwa.</p>
        <p>Para makabuo ng tamang pangungusap, kailangan natin ng <span class="highlight">simuno</span> at <span class="highlight">panaguri</span>.</p>
        <p><span class="simuno">Simuno</span> ay ang pinag-uusapan sa pangungusap.</p>
        <p><span class="panaguri">Panaguri</span> naman ay nagsasabi tungkol sa simuno.</p>
        <div class="example">
            <p>Halimbawa: Si <span class="highlight">Ana</span> ay nagbabasa ng <span class="highlight">aklat</span>.</p>
            <p>Si Ana ang simuno (<span class="simuno">Ang pinag-uusapan</span>)</p>
            <p>Nagbabasa ng aklat ang panaguri (<span class="panaguri">Ang ginagawa ng simuno</span>)</p>
        </div>
            <div class="modal-navigation">
                <button class="nav-button back" aria-label="Back" onclick="closeModal('Chapter-1-Lesson-1')"></button>
                <button class="nav-button next" aria-label="Next"></button>
        </div>
    </div>
    </div>

<script>
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

    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const logoImg = document.querySelector('.logo2 img');

        sidebar.classList.toggle('visible');
        overlay.classList.toggle('visible');

        if (logoImg) {
            logoImg.src = 'images/MTB-MAL_logo_side.png';
        }
    }

    function setActiveButton(activeId) {
        const buttons = document.querySelectorAll('#btn-module, #btn-assessment, #btn-both');
        buttons.forEach(btn => {
            if (btn.id === activeId) {
                btn.classList.add('selected');
            } else {
                btn.classList.remove('selected');
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        // Toggle Chapter Content
        document.querySelectorAll('.chapter-play').forEach(button => {
            button.addEventListener('click', function () {
                const chapterCard = this.closest('.chapter-card');
                const contents = chapterCard.querySelectorAll('.chapter-content');
                const triangleIcon = this.querySelector('.triangle-icon-chapter');

                const isVisible = contents.length > 0 && contents[0].style.display === 'flex';

                contents.forEach(content => {
                    content.style.display = isVisible ? 'none' : 'flex';
                });

                if (triangleIcon) {
                    triangleIcon.classList.toggle('rotate', !isVisible);
                }
            });
        });

        // Module Filter Buttons
        const moduleBtn = document.getElementById('btn-module');
        const assessmentBtn = document.getElementById('btn-assessment');
        const bothBtn = document.getElementById('btn-both');

        moduleBtn?.addEventListener('click', () => {
            setActiveButton('btn-module');
            document.querySelectorAll('.card').forEach(card => {
                const title = card.querySelector('.card-header').textContent.toLowerCase();
                card.style.display = title.includes('module') ? 'block' : 'none';
            });
        });

        assessmentBtn?.addEventListener('click', () => {
            setActiveButton('btn-assessment');
            document.querySelectorAll('.card').forEach(card => {
                const title = card.querySelector('.card-header').textContent.toLowerCase();
                card.style.display = title.includes('assessment') ? 'block' : 'none';
            });
        });

        bothBtn?.addEventListener('click', () => {
            setActiveButton('btn-both');
            document.querySelectorAll('.card').forEach(card => {
                card.style.display = 'block';
            });
        });

        // Lessons and Games Toggle
        const lessonsBtn = document.getElementById('btn-lessons');
        const gamesBtn = document.getElementById('btn-games');
        const lessonsContainer = document.querySelector('.chapter-card-group');
        const gamesContainer = document.getElementById('games-container');

        function setActiveView(activeBtn, inactiveBtn, showGames) {
            activeBtn.classList.add('selected');
            inactiveBtn.classList.remove('selected');
            if (lessonsContainer && gamesContainer) {
                lessonsContainer.style.display = showGames ? 'none' : 'block';
                gamesContainer.style.display = showGames ? 'block' : 'none';
            }
        }

        lessonsBtn?.addEventListener('click', () => {
            setActiveView(lessonsBtn, gamesBtn, false);
        });

        gamesBtn?.addEventListener('click', () => {
            setActiveView(gamesBtn, lessonsBtn, true);
        });
    });

function openModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // prevent background scroll
    }
}

function closeModal(id) {
    const modal = document.getElementById(id);
    if (modal) {
        modal.style.display = 'none';
        document.body.style.overflow = ''; // restore scroll
    }
}

// Optional: Close modal when clicking outside
document.addEventListener('click', function(event) {
    const modal = document.getElementById('Chapter-1-Lesson-1');
    if (modal && modal.style.display === 'flex') {
        const isInsideModal = modal.contains(event.target);
        const isModalTrigger = event.target.closest('.lesson-play'); // check if click is from the open button
        if (!isInsideModal && !isModalTrigger) {
            closeModal('Chapter-1-Lesson-1');
        }
    }
});

</script>

</body>
</html>
