<?php 
    $portfolio = true; 
    $headTitle = "Portfolio";
    include '../header.php'; 

    include '../../config/db_config.php';

    $id = "";
    $portfolioTitle = "";
    $portfolioDescription = "";
    $portfolioLink = "";
    $portfolioImg = "";

    if(isset($_GET['edit'])) {
        $id = $_GET['edit'];
        $query = $db->query("SELECT portfolio_title, portfolio_description, portfolio_link, portfolio_img FROM portfolio WHERE id='$id'");
        
        while(($row = $query->fetch_assoc()) !== null) {
            $portfolioTitle = $row['portfolio_title'];
            $portfolioDescription = $row['portfolio_description'];
            $portfolioLink = $row['portfolio_link'];
            $portfolioImg = $row['portfolio_img'];
        }
    }

    $db->close();
?>
    <div class="main main--active">
        <div class="row">
            <div class="col-6 col-6--table">
                <div class="box">
                    <div class="box__header">Portfolio List</div>
                    <div class="box__body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Operation</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include '../../config/db_config.php';

                                    $query = $db->query("SELECT id, portfolio_title, portfolio_description, portfolio_link, portfolio_img FROM portfolio");
                            
                                    while(($row = $query->fetch_assoc()) !== null) {
                                        echo '
                                            <tr>
                                                <td>'.$row['id'].'</td>
                                                <td>'.$row['portfolio_title'].'</td>
                                                <td>'.substr($row['portfolio_description'], 0, 20).'...</td>
                                                <td>'.$row['portfolio_link'].'</td>
                                                <td>'.$row['portfolio_img'].'</td>
                                                <td class="table__buttons">
                                                    <div>
                                                        <a href="/admin/portfolio?edit='.$row['id'].'" class="table__button"><i class="uil uil-pen table__button-icon"></i></a>
                                                        <a href="/admin/portfolio?delete='.$row['id'].'" class="table__button"><i class="uil uil-trash-alt table__button-icon table__button-icon--trash"></i></a>
                                                    </div>
                                                </td>
                                            </tr>
                                        ';
                                    }

                                    $db->close();
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-6 col-6--form">
                <form class="box" action="/admin/about" method="POST" enctype="multipart/form-data">
                    <div class="box__header">Portfolio Edit</div>
                    <div class="box__body">
                        <div class="col-12">
                            <div class="form">
                                <div class="form__inputs">
                                    <div class="form__label">Portfolio Title</div>
                                    <input type="text" class="form__input" name="portfolioTitle" value="<?php echo $portfolioTitle; ?>">
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">Portfolio description</div>
                                    <textarea class="form__input form__input--textarea" name="portfolioDescription"><?php echo $portfolioDescription; ?></textarea>
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">Portfolio Link</div>
                                    <input type="text" class="form__input" name="portfolioLink" value="<?php echo $portfolioLink; ?>">
                                </div>

                                <div class="form__inputs">
                                    <div class="form__label">Portfolio Image <p>(Only JPG, JPEG, PNG)  Current: <a href="../../files/<?php echo $portfolioImg; ?>" target="_blank"><?php echo $portfolioImg; ?></a></p></div>
                                    <input type="file" class="form__input" name="portfolioImg" id="portfolioImg">
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