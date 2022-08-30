<?php 
    $about = true; 
    $headTitle = "About Me";
    include '../header.php'; 

    include '../../config/db_config.php';

    if(isset($_POST['aboutText']) && isset($_POST['yearExperience']) && isset($_POST['completedProject']) && isset($_POST['companiesWorked'])) {
        $aboutText = addslashes($_POST['aboutText']);
        //$aboutImg = $_POST['aboutImg'];
        $yearExperience = $_POST['yearExperience'];
        $completedProject = $_POST['completedProject'];
        $companiesWorked = $_POST['companiesWorked'];
        //$cvUrl = $_POST['cvFile'];


        //--------- ABOUT IMAGE UPLOAD --------
            if($_FILES["aboutImg"]["size"] > 0) {
                $target_dir = "../../files/";
                $target_file = $target_dir . basename($_FILES["aboutImg"]["name"]);
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $file_name = basename($_FILES["aboutImg"]["name"]);
                $uploadOk = 1;

                // Check if file already exists
                if (file_exists($target_file)) {
                    $uploadError = "Sorry, file already exists.";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["aboutImg"]["size"] > 500000) {
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
                    if (move_uploaded_file($_FILES["aboutImg"]["tmp_name"], $target_file)) {
                        $uploadSuccess = "The file ". htmlspecialchars( basename( $_FILES["aboutImg"]["name"])). " has been uploaded.";
                        $aboutImageFileName = $file_name;
                        $query = "UPDATE about SET about_img='$file_name'";
                        $db->query($query);
                    }
                }
            }
        //-----------------------------------

        //--------- CV FILE UPLOAD --------
            if($_FILES["cvFile"]["size"] > 0) {
                $target_dir = "../../files/";
                $target_file = $target_dir . basename($_FILES["cvFile"]["name"]);
                $cvFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                $file_name = basename($_FILES["cvFile"]["name"]);
                $upload2Ok = 1;

                // Check if file already exists
                if (file_exists($target_file)) {
                    $uploadError = "Sorry, file already exists.";
                    $upload2Ok = 0;
                }

                // Check file size
                if ($_FILES["cvFile"]["size"] > 7000000) {
                    $uploadError = "Sorry, your file is too large.";
                    $upload2Ok = 0;
                }

                // Allow certain file formats
                if($cvFileType != "pdf" && $cvFileType != "docx") {
                    $uploadError = "Sorry, only PDF, DOCX files are allowed.";
                    $upload2Ok = 0;
                }

                if ($upload2Ok == 0) {
                    $uploadError = "Sorry, your file was not uploaded.";
                } else {
                    if (move_uploaded_file($_FILES["cvFile"]["tmp_name"], $target_file)) {
                        $uploadSuccess = "The file ". htmlspecialchars( basename( $_FILES["cvFile"]["name"])). " has been uploaded.";
                        $cvFileName = $file_name;

                        $query = "UPDATE about SET cv_url='$cvFileName'";
                        $db->query($query);
                    }
                }
            }
        //-----------------------------------

            $query = "UPDATE about SET about_text='$aboutText', 
                                            year_experience='$yearExperience', 
                                            completed_project='$completedProject', 
                                            companies_worked='$companiesWorked'";

            if ($db->query($query) === TRUE) {
                $editSucces = true;
            } else {
                $editError = false;
            }

            if(isset($uploadError)) { $editError = $uploadError;}
    }

    $query = $db->query("SELECT about_text, about_img, year_experience, completed_project, companies_worked, cv_url FROM about");

    while(($row = $query->fetch_assoc()) !== null) {
        $aboutText = $row['about_text'];
        $aboutImg = $row['about_img'];
        $yearExperience = $row['year_experience'];
        $completedProject = $row['completed_project'];
        $companiesWorked = $row['companies_worked'];
        $cvUrl = $row['cv_url'];
    }

    $db->close();
?>

    <?php if(isset($editSucces)){ ?>
        <div class="info-modal info-modal--green">
            <i class="uil uil-check info-modal__icon"></i>
            <p>Success! Your edit has been saved!</p>
        </div>
    <?php unset($editError); } 
    if(isset($editError)) { ?>
         <div class="info-modal info-modal--red">
            <i class="uil uil-times info-modal__icon"></i>
            <p><?php if ($editError != "") { echo $editError; } else {echo 'An error occurred while editing';}?></p>
        </div>
    <?php unset($editError); } ?>

    <div class="main main--active">
        <div class="row">
            <div class="col-6 col-6--form">
                <form class="box" action="/admin/about" method="POST" enctype="multipart/form-data">
                    <div class="box__header">About Me</div>
                    <div class="box__body">
                        <div class="col-12">
                            <div class="form">
                                <div class="form__inputs">
                                    <div class="form__label">About Text</div>
                                    <textarea class="form__input form__input--textarea" name="aboutText"><?php echo $aboutText; ?></textarea>
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">About Image <p>(Only JPG, JPEG, PNG)  Current: <a href="../../files/<?php echo $aboutImg; ?>" target="_blank"><?php echo $aboutImg; ?></a></p></div>
                                    <input type="file" class="form__input" name="aboutImg" id="aboutImg">
                                </div>

                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">Year Experience</div>
                                    <input type="number" class="form__input" name="yearExperience" value="<?php echo $yearExperience; ?>">
                                </div>
                                
                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">Completed Project</div>
                                    <input type="number" class="form__input" name="completedProject" value="<?php echo $completedProject; ?>">
                                </div>

                                <div class="form__inputs form__inputs--col3">
                                    <div class="form__label">Companies Worked</div>
                                    <input type="number" name="companiesWorked" class="form__input" value="<?php echo $companiesWorked; ?>">
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">CV File <p>(Only pdf, docx) Current: <a href="../../files/<?php echo $cvUrl; ?>" target="_blank"><?php echo $cvUrl; ?></a></p></div>
                                    <input type="file" class="form__input" name="cvFile" id="cvFile">
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