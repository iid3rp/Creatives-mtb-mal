<!-- Quest to Learn Modal -->
<div id="Quest-to-Learn" class="modal" style="display: none;">
    <div class="modal-content">
        <h1>Template Info</h1>
        <hr style="width: 70%; height: 2px; background-color: black; border: none; margin: 1rem auto; margin-bottom:20px;">
        <table class="info-bar-table">
            <tr>
                <td>Template Name</td>
                <td>Quest to Learn</td>
            </tr>
        </table>
        <hr style="margin: 1rem auto; height: 1px; background-color: black; border: none; width: 100%;">

        <div style="margin-top: 20px; max-width: 1500px; margin-left: auto; margin-right: auto;">
        <h2>Instructions</h2>
        <p style="text-align: center; max-width: 1000px; margin: 0 auto 20px; line-height: 2em; position:relative; right:10px;">
            Welcome to your learning quest! Choose a path and dive into a story-driven adventure where your knowledge shapes the journey.<br>
            Whether you're helping a friend get to the market, guiding a character through space, or solving everyday challenges<br>
            Customize your setting, characters, and scenarios. Earn points and unlock new parts of your story as you answer questions.<br>
            Click the start arrow to begin shaping your own adventure!
        </p>
        <h3 style="text-align: center;">For Educators: Setup Guide</h3>
        <ol style="padding-left: 2rem; font-size: 1rem; text-align: left; line-height: 2em; max-width: 1000px; margin-left:50px;">
            <li><b>Organize</b> your content into thematic categories (e.g. Community Helpers, Everyday Tasks, Science Missions, Animal Adventures, etc.).</li>
            <li><b>Create</b> story-based scenarios for each theme (e.g. “Help Kai recycle properly” or “Guide Mia through a grocery store”).</li>
            <li><b>Prepare</b> question sets (multiple-choice, true/false, or short-answer) that align with your learning objectives.</li>
            <li><b>Upload</b> questions, answers, and media (images or audio).</li>
            <li><b>Adjust</b> game mechanics (scoring, time limits, or rewards) to suit your preferred difficulty level.</li>
        </ol>
            <div style="position: relative; padding-top: 0%; padding-bottom: 48%; height: 0; overflow: hidden; max-width: 90%; margin: 0 auto;">
                <img src="../images/instruction-quest.gif" alt="Quest Animation" style="width: 900px; height: auto; display: block; margin: 0 auto;">
            </div>
        </div>
        <div class="modal-buttons-row" style="text-align: center; margin-top: 0; display: flex; justify-content: center; gap: 1rem;">
            <button class="modal-close" onclick="closeModal('Quest-to-Learn')">Close</button>
            <button class="modal-btn2" onclick="openModal('Upload-Quest-Modal')">Next</button>
        </div>
    </div>
</div>

<!--=========================================== 3 =====================================================--->

<!-- Upload Quest to Learn Modal -->
<div id="Upload-Quest-Modal" class="modal">
  <div class="modal-content">

    <h1>Upload Quest to Learn</h1>
    <hr class="section-divider">

    <!-- FORM START -->
    <form action="process_quest.php" method="POST" enctype="multipart/form-data" id="questForm">

    <!-- Template Info -->
    <table class="info-bar-table" style="position: relative; right:80px;">
      <tr>
        <td>Template Reference Number</td>
        <td>Assessment - 01</td>
      </tr>
    </table>

    <hr class="full-divider">

    <!-- Character Upload -->
    <h3>Upload Character Images</h3>
    <div class="image-upload-group">
    <div>
        <label for="charImage1" style="font-weight: bold; font-size:20px; color:#174b86;">Character:</label><br>
        <input type="file" id="charImage1" name="charImage1" accept="image/*" onchange="previewImage(this, 'charPreview1')">
        <img id="charPreview1" src="#" alt="Character Preview" style="display: none; width: 150px; margin-top: 10px; border-radius: 8px;">
    </div>
    <div>
        <label for="charImage2" style="font-weight: bold; font-size:20px; color:#174b86;">Destination:</label><br>
        <input type="file" id="charImage2" name="charImage2" accept="image/*" onchange="previewImage(this, 'charPreview2')">
        <img id="charPreview2" src="#" alt="Destination Preview" style="display: none; width: 150px; margin-top: 10px; border-radius: 8px;">
    </div>
    </div>

    <!-- Scenario Input -->
    <h3>Enter Scenario</h3>
    <textarea id="scenarioText" name="scenarioText" class="input-full" rows="4" placeholder="Describe the learning adventure scenario here..." required></textarea>

    <!-- Questions & Answers -->
    <h3>Enter 10 Questions and Answers</h3>
    <div id="questions-container">
    <script>
        for (let i = 1; i <= 10; i++) {
        document.write(`
            <div class="question-block">
            <label>Q${i}:</label><br>
            <textarea name="question${i}" placeholder="Enter question ${i}" class="input-full" rows="3" required></textarea><br>
            <input name="answer${i}" type="text" placeholder="Answer to question ${i}" class="input-full" required>
            </div>
        `);
        }
    </script>
    </div>

    <!-- Difficulty -->
    <h3>Difficulty</h3>
    <select id="difficulty" name="difficulty" onchange="updatePassingScore()" class="dropdown">
      <option value="easy">Easy</option>
      <option value="intermediate">Intermediate</option>
      <option value="hard">Hard</option>
    </select>

    <!-- Passing Score -->
    <h3>Passing Score</h3>
    <input type="text" id="passingScore" name="passingScore" readonly class="dropdown" value="6 / 10" style="text-align: center;">

    <script>
      function updatePassingScore() {
        const difficulty = document.getElementById('difficulty').value;
        const scoreInput = document.getElementById('passingScore');
        if (difficulty === 'easy') scoreInput.value = '6 / 10';
        else if (difficulty === 'intermediate') scoreInput.value = '7 / 10';
        else if (difficulty === 'hard') scoreInput.value = '8 / 10';
      }
    </script>

    <!-- Confirmation Checkbox -->
    <div class="form-group">
      <div class="checkbox-container">
        <input type="checkbox" id="confirm-details" name="confirm_details" required>
        <label for="confirm-details">I hereby confirm all the above details are correct.</label>
      </div>
    </div>

    <div id="form-error-message" style="color: red; margin-top: 30px;"></div>

    <!-- Buttons -->
    <div class="modal-buttons-row">
      <button class="modal-close" type="button" onclick="closeModal('Upload-Quest-Modal')">Cancel</button>
      <button class="modal-btn2" type="submit" name="upload_quest">Submit and Next</button>
    </div>

    </form>
    <!-- FORM END -->

  </div>
</div>
