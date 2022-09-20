<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/profileEdit.css"/>
    <script src="../public/js/updateProfile.js" defer></script>
    <title>Profile Edit</title>
</head>
<body>
    
    <div class="overlay display-none" onclick="closeModal()">
    </div>
    <div class="modal display-none">
            <div class="modal-header">
                <h1 class="lang-type"></h1>
                <i class="fa-solid fa-xmark" onclick="closeModal()"></i>
            </div>
            <div class="language-selector">
                <label> Select known languages </label>
                <select class="select-language">
                    <option value="0" selected disabled hidden>Select a language:</option>
                    <option value="1">English</option>
                    <option value="2">Korean</option>
                    <option value="3">Spanish</option>
                    <option value="4">Turkish</option>
                </select>
                <select class="select-level">
                    <option value="0" selected disabled hidden id="level0">Select a level:</option>
                    <option value="1">1 Beginner</option>
                    <option value="2">2 Novice</option>
                    <option value="3">3 Intermediate</option>
                    <option value="4">4 Advanced</option>
                    <option value="5">5 Expert</option>
                </select>
                <i class="fa-solid fa-check" onclick="addLang()"></i>
            </div>
            <div class="added-langs-container">
            </div>

        <!-- <div class="save-lang">
            <p onclick="saveLang()">SAVE</p>
        </div> -->
        <button disabled class="save-lang" onclick="saveLang();">Save</button>
    </div>
    <?php include("settingsView.php") ?>
    <div id="profile-edit">
        <h1>Profile</h1>
        <p>This information will be displayed publicly</p>
        <form>
            <div class="photo-container">
                <p>Profile picture</p>
                <div>
                <img src="https://img.freepik.com/free-photo/handsome-confident-smiling-man-with-hands-crossed-chest_176420-18743.jpg?w=2000">
                <input type="button" value="change"/>
                <input type="button" value="remove"/>
            
                </div>
            </div>
            <div class="label-input-container">
                <div>
                    <label class="names-label">First Name</label>
                    <input class="names-input" type="text"/>
                </div>
                <div>
                    <label class="names-label">Last Name</label>
                    <input class="names-input" type="text"/>
                </div>
            </div>
            <div class="about-me-edit">
                <p>About me</p>
                <textarea></textarea>
            </div>

            <div class="language-edit">
                <div class="native-language">

                    <label for="native-language">Native Language</label>
                    <p id="knownLangsP">No languages yet...</p>
                    <div class="addLangBtn" onclick="openLangModal('known_lang')">Add more</div>
                    <input id="knownLangsList" name="known_langs" type="text" style="display:none;" />
                </div>
                <div class="learning-language">
                    <label for="learning-language">Learning Language</label>
                    <p id="learningLangsP">No languages yet...</p>
                    <div class="addLangBtn" onclick="openLangModal('learning_lang')">Add more</div>
                    <input id="learningLangsList" name="learning_langs" type="text" style="display:none;" />
                </div>
            </div>
            <div>
                <label for="interests">Interests</label>
                

            </div>
            <div>
                <input type="button" value="SAVE"/>
                <input type="button" value="RESET"/>
            </div>
        </form>

        
    </div>
</body>
</html>