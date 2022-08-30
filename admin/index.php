<?php 
    $dashboard = true; 
    $headTitle = "Dashboard"; 
    include 'header.php'; 

    include '../config/db_config.php';

    //---------- TOTAL PAGE VIEW -----------------
    $query = $db->query("SELECT id FROM page_views");
    $totalView = 0;

    while(($row = $query->fetch_assoc()) !== null) {
        $totalView++;
    }

    //------- DEVICE TYPE -----------
    $query = $db->query("SELECT id FROM page_views WHERE device_type='mobile'");
    $mobileView = 0;

    while(($row = $query->fetch_assoc()) !== null) {
        $mobileView++;
    }

    $desktopView = $totalView - $mobileView;

    //-------- VIEWS BY DAYS --------
    $date1 = date("m-d"); //today
    $date2 = date('m-d', strtotime(' -1 day')); //today - 1
    $date3 = date('m-d', strtotime(' -2 day')); //today - 2
    $date4 = date('m-d', strtotime(' -3 day')); //today - 3
    $date5 = date('m-d', strtotime(' -4 day')); //today - 4
    $date6 = date('m-d', strtotime(' -5 day')); //today - 5

    


    // ----------SELECT VIEWS VALUES -------------

        //DATE VALUE 1 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date("Y-m-d")."'");
        $dateValue1 = $query->num_rows;

        //DATE VALUE 2 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date('Y-m-d', strtotime(' -1 day'))."'");
        $dateValue2 = $query->num_rows;

        //DATE VALUE 3 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date('Y-m-d', strtotime(' -2 day'))."'");
        $dateValue3 = $query->num_rows;

        //DATE VALUE 4 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date('Y-m-d', strtotime(' -3 day'))."'");
        $dateValue4 = $query->num_rows;

        //DATE VALUE 5 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date('Y-m-d', strtotime(' -4 day'))."'");
        $dateValue5 = $query->num_rows;

        //DATE VALUE 6 ------
        $query = $db->query("SELECT id FROM page_views WHERE view_date='".date('Y-m-d', strtotime(' -5 day'))."'");
        $dateValue6 = $query->num_rows;
    //----------------------------------------------
?>

    <div class="main main--active">
        <!-- HOME FRONT BOXES -->
        <div class="row">
            <!-- BOX 1 -->
            <div class="col-3">
                <div class="box box--pd">
                    <div class="inner">
                        <div>
                            <h2><?php echo $totalView; ?></h2>
                            <p>Total views</p>
                        </div>
                        <i class="uil uil-eye icon-large"></i>
                    </div>
                </div>
            </div>
            <!-- BOX 2 -->
            <div class="col-3">
                <div class="box box--pd">
                    <div class="inner">
                        <div>
                            <h2>-</h2>
                            <p>Messages</p>
                        </div>
                        <i class="uil uil-message icon-large"></i>
                    </div>
                </div>
            </div>
            <!-- BOX 3 -->
            <div class="col-3">
                <div class="box box--pd">
                    <div class="inner">
                        <div>
                            <h2>-</h2>
                            <p>Testimonial</p>
                        </div>
                        <i class="uil uil-users-alt icon-large"></i>
                    </div>
                </div>
            </div>
            <!-- BOX 4 -->
            <div class="col-3">
                <div class="box box--pd">
                    <div class="inner">
                        <div>
                            <h2>-</h2>
                            <p>Portfolio</p>
                        </div>
                        <i class="uil uil-briefcase-alt icon-large"></i>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="row">
            <div class="section col-6">
                <div class="col-12">
                    <div class="box">
                        <div class="box__header">Page views</div>
            
                        <div class="box__body">
                            <canvas id="pageViewChart" class="myChart" 
                                data-date1="<?php echo $date1; ?>" data-value1="<?php echo $dateValue1; ?>" 
                                data-date2="<?php echo $date2; ?>" data-value2="<?php echo $dateValue2; ?>"
                                data-date3="<?php echo $date3; ?>" data-value3="<?php echo $dateValue3; ?>"
                                data-date4="<?php echo $date4; ?>" data-value4="<?php echo $dateValue4; ?>"
                                data-date5="<?php echo $date5; ?>" data-value5="<?php echo $dateValue5; ?>"
                                data-date6="<?php echo $date6; ?>" data-value6="<?php echo $dateValue6; ?>">
                            </canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="section col-6">
                <div class="col-6 col-md-12">
                    <div class="box">
                        <div class="box__header">Device types</div>
            
                        <div class="box__body">
                            <canvas id="deviceTypeChart" class="myChart" data-desktop="<?php echo $desktopView;?>" data-mobile="<?php echo $mobileView; ?>"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-md-12">
                    <div class="column">
                        <!-- BOX 1 -->
                        <div class="box box--mgb">
                            <div class="box box--pd">
                                <div class="inner">
                                    <div>
                                        <h2>-</h2>
                                        <p>Completed task</p>
                                    </div>
                                    <i class="uil uil-check icon-large"></i>
                                </div>
                            </div>
                        </div>
                        <!-- BOX 2 -->
                        <div class="box">
                            <div class="box box--pd">
                                <div class="inner">
                                    <div>
                                        <h2>-</h2>
                                        <p>Tasks</p>
                                    </div>
                                    <i class="uil uil-clipboard-notes icon-large"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<?php include 'footer.php'; ?>