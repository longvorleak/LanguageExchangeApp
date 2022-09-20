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
    
    <div class="overlay display-none">
        <div class="modal display-none">
            <h1 class="lang-type"></h1>
        </div>
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
                    <!-- <select name="native-language" id="native-language">
                        <option value="English">English</option>
                        <option value="Korean">Korean</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Turkish">Turkish</option>
                    </select> -->
                    <label for="native-language">Native Language</label>
                    <p id="knownLangsP">No languages yet...</p>
                    <div class="addLangBtn" onclick="addLang('known_lang')">Add more</div>
                    <input name="known_langs" type="text" style="display:none;" />
                    <!-- <input type="button" value="add more" class="add-more-languages"/> -->
                </div>
                <div class="learning-language">
                    <!-- <select name="learning-language" id="learning-language">
                        <option value="English">English</option>
                        <option value="Korean">Korean</option>
                        <option value="Spanish">Spanish</option>
                        <option value="Turkish">Turkish</option>
                    </select> -->
                    <label for="learning-language">Learning Language</label>
                    <p id="learningLangsP">No languages yet...</p>
                    <div class="addLangBtn" onclick="addLang('learning_lang')">Add more</div>
                    <input name="learning_langs" type="text" style="display:none;" />
                    <!-- <input type="button" value="add more" class="add-more-languages"/> -->
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