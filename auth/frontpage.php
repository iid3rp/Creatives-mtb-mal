<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Basic document setup and custom fonts -->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>MTB-MAL Portal</title>
  <link rel="icon" type="image/png" href="images/MTB-MAL_logo.png">
  <link href="https://fonts.googleapis.com/css2?family=Segoe+UI&display=swap" rel="stylesheet">

  <style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }

    html, body {
    height: 100%;
    font-family: 'Segoe UI', sans-serif;
    /* min-width: 1024px;  ← REMOVE THIS LINE */
    overflow-x: hidden;
    overflow-y: auto;
    }

  .container {
    height: 100vh;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
  }

  /* --- Top Section (Header) --- */
  .top-section {
    height: 250px;
    background: linear-gradient(to right, #fcd34d, #f472b6);
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding-left: 4rem;
    padding-right: 4rem;
    color: #1f2937;
    position: sticky;
    top: 0;
    z-index: 1000;
    flex-shrink: 0;
    transition: all 0.3s ease;
    padding-top: 2rem;
    padding-bottom: 2rem;
  }

  .top-section.shrunk {
    height: 300px;
    padding-top: 1rem;
    padding-bottom: 1rem;
  }

  .top-content {
    display: flex;
    align-items: center;
    gap: 2rem;
    flex-wrap: nowrap;
  }

  .logo-image {
    height: 150px;
    width: auto;
    flex-shrink: 0;
  }

  .text-wrapper {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
  }

  .portal-name {
    font-size: 2.5rem;
    font-weight: bold;
    color: #1f2937;
    margin-bottom: 0.5rem;
  }

  .subheading {
    font-size: 1.5rem;
    max-width: 600px;
    color: #374151;
    line-height: 1.4;
  }

  .login-trigger {
    position: absolute;
    top: 1rem;
    right: 1.5rem;
    font-size: 1rem;
    font-weight: bold;
    padding: 0.75rem 1.25rem;
    border-radius: 0.75rem;
    border: 1px solid rgba(255, 255, 255, 0.3);
    color: #1f2937;
    cursor: pointer;
    background: rgba(255, 255, 255, 0.3);
    backdrop-filter: blur(10px);
    -webkit-backdrop-filter: blur(10px);
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    z-index: 10;
    text-decoration: none;
    display: inline-block;
    text-align: center;
    line-height: 1;
  }

  .login-trigger:hover {
    background: rgba(255, 255, 255, 0.5);
  }

  /* --- Bottom Section (Main) --- */
  .bottom-section {
    flex: 1;
    background: #fff;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    align-items: center;
    padding: 3rem 2rem;
    position: relative;
    overflow-y: auto;
    background-color: #f8f8fc;
  }

  /* --- Original "A Digital Learning Playground" Description Box --- */
  .description-box {
    text-align: center;
    margin-bottom: 3rem;
    max-width: 700px;
    width: 100%;
  }

  .description-box .title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 0.75rem;
    color: #1f2937;
  }

  .description-box .description {
    font-size: 1.1rem;
    color: #4b5563;
    line-height: 1.6;
  }

  /* --- NEW: Section for Tabs and Feature Content --- */
  .features-tabbed-section {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    margin-top: 1rem;
    padding-top: 3rem;
    background-color: #fff;
    box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.05);
  }

  .features-heading {
    font-size: 1.8rem;
    font-weight: bold;
    color: #1f2937;
    margin-bottom: 3rem;
    text-align: center;
    max-width: 700px;
    width: 100%;
  }

  /* --- Feature Tabs --- */
  .feature-tabs {
    display: flex;
    gap: 1.5rem;
    margin-bottom: 2rem;
    justify-content: center;
    flex-wrap: wrap;
    border-bottom: 2px solid #eee;
    padding-bottom: 0.5rem;
    width: 100%;
    max-width: 700px;
  }

  .feature-tab-button {
    background: none;
    border: none;
    padding: 0.5rem 1rem;
    font-size: 1.2rem;
    font-weight: bold;
    color: #6b7280;
    cursor: pointer;
    transition: color 0.3s ease;
    position: relative;
  }

  .feature-tab-button:hover {
    color: #1f2937;
  }

  .feature-tab-button.active {
    color: #4f46e5;
  }

  .feature-tab-button.active::after {
    content: '';
    position: absolute;
    bottom: -0.6rem;
    left: 0;
    width: 100%;
    height: 2px;
    background-color: #4f46e5;
    transition: width 0.3s ease;
  }

  /* --- Tab Content Area --- */
  .tab-content-area {
    width: 100%;
    max-width: 1000px;
    padding: 0 1rem;
    display: flex;
    flex-direction: column;
    align-items: center;
    padding-bottom: 3rem;
  }

  /* --- Individual Tab Content Container --- */
  .tab-content {
    display: none;
    width: 100%;
    opacity: 0;
    transform: translateY(20px);
    transition: opacity 0.5s ease-out, transform 0.5s ease-out;
  }

  .tab-content.active {
    display: flex;
    flex-direction: column;
    align-items: center;
    opacity: 1;
    transform: translateY(0);
  }

  /* --- Original Feature Lists (the checkmark lists, now within tabs) --- */
  .features-list {
    max-width: 600px;
    width: 100%;
    background-color: #f9fafb;
    padding: 1.5rem 2rem;
    border-radius: 1rem;
    box-shadow: 0 6px 16px rgba(0, 0, 0, 0.05);
    color: #1f2937;
    display: block;
    margin-top: 0;
    margin-bottom: 2rem;
    text-align: left;
  }

  .features-list h3 {
    margin-bottom: 1rem;
    font-size: 1.5rem;
    color: #111827;
    text-align: center;
  }

  .features-list ul {
    list-style-type: disc;
    padding-left: 1.5rem;
  }

  .features-list li {
    margin-bottom: 0.8rem;
    font-size: 1.1rem;
    color: #374151;
  }

  /* --- Feature Cards Display Area (now also within tabs) --- */
  .feature-card-group {
    width: 100%;
    display: flex;
    gap: 2rem;
    justify-content: center;
    align-items: flex-start;
    flex-wrap: wrap;
    padding-top: 1rem;
    margin-top: 1rem;
  }

  /* --- Styling for individual Feature Cards --- */
  .feature-card {
    flex: 1;
    min-width: 280px;
    max-width: 320px;
    background-color: #fff;
    padding: 1.5rem;
    border-radius: 0.75rem;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
    color: #1f2937;
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    text-align: left;
    transition: transform 0.3s ease;
  }

  .feature-card:hover {
    transform: translateY(-5px);
  }

  .feature-card h4 {
    font-size: 1.2rem;
    font-weight: bold;
    margin-bottom: 0.5rem;
    color: #111827;
  }

  .feature-card p {
    font-size: 1rem;
    color: #4b5563;
    line-height: 1.6;
  }

  @media (max-width: 768px) {
  html, body {
    width: 100%;
    max-width: 100%;
    overflow-x: hidden;
    margin: 0;
    padding: 0;
  }

  .container {
    width: 100%;
    max-width: 100%;
    margin: 0 auto;
  }

  .top-section {
    flex-direction: row;
    height: auto;
    padding: 1.5rem 1rem;
    width: 100%;
    max-width: 100%;
    text-align: center;
  }

  .top-content {
    flex-direction: row;
    align-items: center;
    gap: 1rem;
    text-align: center;
  }

  .logo-image {
    height: 100px;
  }

  .portal-name {
    font-size: 2rem;
  }

  .subheading {
    font-size: 1.2rem;
    text-align: left;
    width: 300px;
  }

  .login-trigger {
    position: static;
    margin-top: 1rem;
  }

  .bottom-section {
    padding: 2rem 1rem;
  }

  .features-tabbed-section {
    padding-top: 2rem;
  }

  .features-heading {
    font-size: 1.5rem;
  }

  .feature-tabs {
    flex-direction: row;
    overflow-x: auto;
    gap: 0.75rem;
    padding-bottom: 1rem;
  }

  .feature-tab-button {
    white-space: nowrap;
    font-size: 1rem;
  }

  .tab-content-area {
    padding: 0 0.5rem;
  }

  .features-list {
    padding: 1rem;
  }

  .feature-card-group {
    flex-direction: column;
    align-items: center;
  }

  .feature-card {
    width: 100%;
    max-width: 100%;
  }
}

</style>

</head>
<body>

  <div class="container">

    <!-- Top Section: Logo, Title, Subheading, and Login Button -->
    <div class="top-section">
      <div class="top-content">
        <!-- Logo image -->
        <img src="images/MTB-MAL_logo-alt.png" alt="MTB-MAL Logo" class="logo-image">

        <!-- Portal title and description -->
        <div class="text-wrapper">
          <strong class="portal-name">MTB-MAL</strong>
          <div class="subheading">Mother Tongue-Based Multilingual Assessment and Learning System</div>
        </div>
      </div>

      <!-- Login Button (top right) -->
      <a href="login.php" class="login-trigger">Login</a>
    </div>

    <!-- Bottom Section: Main content below the header -->
    <div class="bottom-section">

      <!-- Introductory description -->
      <div class="description-box">
        <div class="title">A Digital Learning Playground</div>
        <div class="description">
          MTB-MAL supports the Philippines' Mother Tongue-Based Multilingual Education program by providing an interactive platform where students learn in their native language first.
        </div>
      </div>

      <!-- Tabbed content section -->
      <div class="features-tabbed-section">

        <!-- Section heading -->
        <h2 class="features-heading">Why MTB-MAL Works</h2>

        <!-- Tab buttons for switching views -->
        <div class="feature-tabs" id="featureTabs">
          <button class="feature-tab-button" data-target="teachersTabContent">For Teachers</button>
          <button class="feature-tab-button" data-target="studentsTabContent">For Students</button>
          <button class="feature-tab-button" data-target="platformTabContent">Platform Features</button>
        </div>

        <!-- Tab content area -->
        <div class="tab-content-area">

          <!-- Tab 1: Teacher Features -->
          <div class="tab-content" id="teachersTabContent">
            <div class="features-list">
              <h3>For Teachers</h3>
              <ul>
                <li>Reduces preparation time with auto-generated quizzes</li>
                <li>Provides ready-made resources in multiple Filipino languages</li>
                <li>Enables easy tracking of student progress and performance</li>
                <li>Facilitates sharing of best practices with other educators</li>
              </ul>
            </div>
            <div class="feature-card-group">
              <!-- Teacher-specific cards -->
              <div class="feature-card">
                <h4>Content Sharing</h4>
                <p>Upload teaching materials, lessons, stories, and exercises in regional languages to build a comprehensive digital library.</p>
              </div>
              <div class="feature-card">
                <h4>Auto Quiz Generator</h4>
                <p>The system automatically creates quizzes and assessments based on uploaded learning materials, saving valuable preparation time.</p>
              </div>
              <div class="feature-card">
                <h4>Gamification Tools</h4>
                <p>Transform standard quizzes into engaging educational games with customizable difficulty levels to make learning fun and interactive.</p>
              </div>
            </div>
          </div>

          <!-- Tab 2: Student Features -->
          <div class="tab-content" id="studentsTabContent">
            <div class="features-list">
              <h3>For Students</h3>
              <ul>
                <li>Improves comprehension by learning in their mother tongue</li>
                <li>Makes learning fun through gamified educational activities</li>
                <li>Builds confidence through progressive difficulty levels</li>
                <li>Provides access to learning materials anytime, anywhere</li>
              </ul>
            </div>
            <div class="feature-card-group">
              <!-- Student-specific cards -->
              <div class="feature-card">
                <h4>Native Language Learning</h4>
                <p>Access educational content in your mother tongue, making complex concepts easier to understand and building a stronger foundation for learning.</p>
              </div>
              <div class="feature-card">
                <h4>Interactive Games</h4>
                <p>Learn through play with educational games that test your knowledge in a fun, engaging way similar to popular language learning apps.</p>
              </div>
              <div class="feature-card">
                <h4>Progress Tracking</h4>
                <p>Monitor your learning journey with personalized progress tracking that adapts to your skill level and provides encouraging feedback.</p>
              </div>
            </div>
          </div>

          <!-- Tab 3: Platform Features -->
          <div class="tab-content" id="platformTabContent">
            <div class="feature-card-group">
              <!-- Platform-focused cards -->
              <div class="feature-card">
                <h4>Cross-Platform Access</h4>
                <p>Access MTB-MAL from any device - desktop computers at school or mobile phones and tablets at home - ensuring learning can happen anywhere, anytime.</p>
              </div>
              <div class="feature-card">
                <h4>Community Features</h4>
                <p>Connect with other students and teachers in your language community, share resources, and collaborate on learning projects to enhance the educational experience.</p>
              </div>
            </div>
          </div>

        </div> <!-- End tab-content-area -->

      </div> <!-- End features-tabbed-section -->

    </div> <!-- End bottom-section -->

  </div> <!-- End container -->

  <script>
    // Wait for the page to fully load
    document.addEventListener('DOMContentLoaded', () => {

      // Get all tab buttons and content containers
      const featureTabButtons = document.querySelectorAll('.feature-tab-button');
      const tabContentContainers = document.querySelectorAll('.tab-content');

      // Function to activate a tab and show corresponding content
      function activateFeatureTab(targetId) {
        featureTabButtons.forEach(button => button.classList.remove('active'));
        tabContentContainers.forEach(container => container.classList.remove('active'));

        // Highlight the clicked tab button
        const clickedButton = document.querySelector(`.feature-tab-button[data-target="${targetId}"]`);
        if (clickedButton) clickedButton.classList.add('active');

        // Show corresponding tab content
        const targetContainer = document.getElementById(targetId);
        if (targetContainer) targetContainer.classList.add('active');
      }

      // Attach click event listeners to all tab buttons
      featureTabButtons.forEach(button => {
        button.addEventListener('click', () => {
          const targetId = button.getAttribute('data-target');
          activateFeatureTab(targetId);
        });
      });

      
    }); // End of DOMContentLoaded

    window.addEventListener('scroll', () => {
      const topSection = document.querySelector('.top-section');
      if (window.scrollY > 10) {
        topSection.classList.add('shrunk');
      } else {
        topSection.classList.remove('shrunk');
      }
    });

  </script>

</body>
</html>