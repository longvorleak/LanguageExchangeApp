<?php
// session_start();
require_once("Manager.php");

class UploadManager extends Manager {
    public function profilePhotoUpload($response) {
        if (!empty($response) && isset($response)) {
            switch ($_FILES['fileToUpload']["error"]) {
                case UPLOAD_ERR_OK:
                    if (getimagesize($_FILES['fileToUpload']['tmp_name'])) {
                        if (
                            mime_content_type($_FILES['fileToUpload']['tmp_name']) == "image/jpg"
                            OR mime_content_type($_FILES['fileToUpload']['tmp_name']) == "image/jpeg"
                            OR mime_content_type($_FILES['fileToUpload']['tmp_name']) == "image/png"
                        ) {
                            if ($_FILES['fileToUpload']['size'] <= 5e+6) {
                                mkdir("./public/gallery/", 0777, true);
                                return "directory created";
                                $img_directory = "./public/uploadedImages/";
                                $img_type = explode("/", $_FILES['fileToUpload']['type'])[1];
                                $img_hash = hash_file('md5', $_FILES['fileToUpload']['tmp_name']);
                                $img_path = substr($img_hash, 0, 2);
                                if (!file_exists($img_directory . $img_path)) {
                                    $img_path = $img_path . "/" . substr($img_hash, 2, 2);
                                    if (!file_exists($img_directory . $img_path)) {
                                        mkdir($img_directory . $img_path, 0777, true);
                                    }
                                    $img_hash = substr($img_hash, 4);
                                } else {
                                    $img_path = $img_path . "/" . substr($img_hash, 2, 2);
                                    if (!file_exists($img_directory . $img_path)) {
                                        mkdir($img_directory . $img_path, 0777, true);
                                    }
                                    $img_hash = substr($img_hash, 4);
                                }
                                $img_full_path = "$img_path/$img_hash.$img_type";
                                if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], "$img_directory$img_full_path")) {
                                    $db = $this->dbConnect();
                                    $req = $db->prepare("UPDATE users SET profile_img_path = ? WHERE firstname = ?");
                                    $req->bindParam(1, $img_full_path);
                                    $req->bindParam(2, $_SESSION['firstname']);
                                    $res = $req->execute();
                                    $_SESSION['photo'] = "$img_full_path";
                                    return $res;
                                } else {
                                    echo "Problem with upload.";
                                }
                            } else {
                                echo "File is too big";
                            }
                        } else {
                            echo "Image is not of an approved type.";
                        }
                    } else {
                        echo "File is not an image";
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    // File is too big
                    echo "File too big";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    // No file was uploaded
                    echo "No file was uploaded";
                    break;
            }
        } else {
            echo "No file was uploaded.";
        }
    }
}

// echo "<pre>";
// print_r($_FILES['fileToUpload']);
// echo "</pre>";
    // echo "<pre>";
    // // echo $_FILES['fileToUpload']["error"];
    // echo mime_content_type($_FILES['fileToUpload']['tmp_name']);
    // echo "</pre>";
    // $size = getimagesize($_FILES['fileToUpload']['tmp_name']);
    // echo "<pre>";
    // print_r($size);
    // echo "</pre>";

    // Frontend
    // profile silhouettes when no image
    // Button: Choose Photo
    // If an image is chosen, display in silhouette
    // Update buttons: Update Photo, Remove Photo
    // Stay on page when submitting




    // $size = getimagesize($_FILES['fileToUpload']['tmp_name']);

    // Upload FLOW
        // 1. Image chosen in form -> form submitted
        // 2. verify file is an image -> redirect back to form with appropriate message if not
        // 3. verify image is of an approved type -> redirect back to form with appropriate message if not
        // 4. verify image is below a size threshold -> redirect back to form with appropriate message if not
        // 5. hash image with 'md5' algo
        // 6. split image hash name into 3 elements in an array
        // 7. check to see if first 2 char[0] is a folder in directory ./public/uploadedImages -> if yes, continue into folder
        // 8. check to see if second 2 char[1] is a folder in directory ./public/uploadedImages/first2char -> if yes, continue
        // 9. store image in directory ./public/uploadedImages/first2char/second2char

    // Retrieving FLOW
        //  1. Find image location?
        //  2. join with nested folder names



    // file_exists(): use to check if directory already exists
    // if it does, go into folder and check again for next 2 char of hashed image

// $phpFileUploadErrors = array(
//     0 => 'There is no error, the file uploaded with success',
//     1 => 'The uploaded file exceeds the upload_max_filesize directive in php.ini',
//     2 => 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form',
//     3 => 'The uploaded file was only partially uploaded',
//     4 => 'No file was uploaded',
//     6 => 'Missing a temporary folder',
//     7 => 'Failed to write file to disk.',
//     8 => 'A PHP extension stopped the file upload.',
// );