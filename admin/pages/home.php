<?php 
    $home = true; 
    $headTitle = "Home";
    include '../header.php'; 

    include '../../config/db_config.php';

    if(isset($_POST['homeTitle']) && isset($_POST['homeSubtitle']) && isset($_POST['homeText']) && isset($_POST['fbUrl']) && isset($_POST['instaUrl']) && isset($_POST['githubUrl'])) {
        $homeTitle = addslashes($_POST['homeTitle']);
        $homeSubtitle = addslashes($_POST['homeSubtitle']);
        $homeText = addslashes($_POST['homeText']);
        $fbUrl = $_POST['fbUrl'];
        $instaUrl = $_POST['instaUrl'];
        $githubUrl = $_POST['githubUrl'];


        //--------- ABOUT IMAGE UPLOAD --------
            if($_FILES["homeImg"]["size"] > 0) {
                $target_dir = "../../files/";
                $target_file = $target_dir . basename($_FILES["homeImg"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $file_name = basename($_FILES["homeImg"]["name"]);
                $uploadOk = 1;

                // Check if file already exists
                if (file_exists($target_file)) {
                    //$uploadError = "Sorry, file already exists.";
                   // $uploadOk = 0;
                    unlink($target_file);
                }

                // Check file size
                if ($_FILES["homeImg"]["size"] > 50000000) {
                    $uploadError = "Sorry, your file is too large.";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
                    $uploadError = "Sorry, only JPG, JPEG, PNG files are allowed.";
                    $uploadOk = 0;
                }

                if ($uploadOk == 0) {
                    $uploadError = "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["homeImg"]["tmp_name"], $target_file)) {
                        $uploadSuccess = "The file ". htmlspecialchars( basename( $_FILES["homeImg"]["name"])). " has been uploaded.";
                        $aboutImageFileName = $file_name;
                        $query = "UPDATE home SET home_img='$file_name'";
                        $db->query($query);
                    }
                }
            }
        //-----------------------------------

            $query = "UPDATE home SET home_title='$homeTitle', 
                                            home_subtitle='$homeSubtitle', 
                                            home_text='$homeText', 
                                            fb_url='$fbUrl',
                                            insta_url='$instaUrl',
                                            github_url='$githubUrl'";

            if ($db->query($query) === TRUE) {
                $editSucces = true;
            } else {
                $editError = false;
            }

            if(isset($uploadError)) { $editError = $uploadError;}
    }

    $query = $db->query("SELECT home_title, home_subtitle, home_text, home_img, fb_url, insta_url, github_url FROM home");

    while(($row = $query->fetch_assoc()) !== null) {
        $homeTitle = $row['home_title'];
        $homeSubtitle = $row['home_subtitle'];
        $homeText = $row['home_text'];
        $homeImg = $row['home_img'];
        $fbUrl = $row['fb_url'];
        $instaUrl = $row['insta_url'];
        $githubUrl = $row['github_url'];
    }

    $db->close();
?>
    <?php if(isset($editSucces)){ ?>
        <div class="info-modal info-modal--green">
            <i class="uil uil-check info-modal__icon"></i>
            <p>Success! Your edit has been saved!</p>
        </div>
    <?php unset($editSucces); } 
    if(isset($editError)) { ?>
         <div class="info-modal info-modal--red">
            <i class="uil uil-times info-modal__icon"></i>
            <p><?php if ($editError != "") { echo $editError; } else {echo 'An error occurred while editing';}?></p>
        </div>
    <?php unset($editError); } ?>

    <div class="main main--active">
        <div class="row">
            <div class="col-6 col-6--form">
                <form class="box" action="/admin/home" method="POST" enctype="multipart/form-data">
                    <div class="box__header">Home</div>
                    <div class="box__body">
                        <div class="col-12">
                            <div class="form">
                                <div class="form__inputs form__inputs--col4">
                                    <div class="form__label">Home Title</div>
                                    <input type="text" class="form__input" name="homeTitle" value="<?php echo $homeTitle; ?>">
                                </div>

                                <div class="form__inputs form__inputs--col4">
                                    <div class="form__label">Home Subtitle</div>
                                    <input type="text" class="form__input" name="homeSubtitle" value="<?php echo $homeSubtitle; ?>">
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">Home Text</div>
                                    <textarea class="form__input form__input--textarea" name="homeText"><?php echo $homeText; ?></textarea>
                                </div>

                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">Facebook url</div>
                                    <input type="text" class="form__input" name="fbUrl" value="<?php echo $fbUrl; ?>">
                                </div>
                                
                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">Instagram url</div>
                                    <input type="text" class="form__input" name="instaUrl" value="<?php echo $instaUrl; ?>">
                                </div>

                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">GitHub url</div>
                                    <input type="text" class="form__input" name="githubUrl" value="<?php echo $githubUrl; ?>">
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">Home Image <p>(Only JPG, JPEG, PNG)  Current: <a href="../../files/<?php echo $homeImg; ?>" target="_blank"><?php echo $homeImg; ?></a></p></div>
                                    <input type="file" class="form__input" name="homeImg" id="homeImg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="box__footer box__footer--fr">
                        <button class="button button--small">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php include '../footer.php'; ?>