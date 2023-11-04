<!DOCTYPE html>
<?php 
    require_once('../conn/class_function.php');
    $obj = new myclass();

    if(isset ($_POST['btn-save'])) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $video_type = $_POST['video_type'];
        $region = $_POST['region_id']; 
        $imgname = "img";
        $image = $obj->fun_upload_img($imgname);
        $url = $_POST['url'];

        $fields = array('title', 'thumbnail','url', 'date', 'description', 'video_type', 'region_id');
        $values = array( $title, $image,$url, $date, $desc, $video_type, $region);
        $result = $obj->fun_insertData( 'tbl_video', $fields, $values);
        if ( $result ) {
            echo "Success";
        }
    }
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Temple Management System</title>
    <link href="../Library/CSS/cdn.datatables.net_1.13.6_css_dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="../Library/CSS/cdnjs.cloudflare.com_ajax_libs_twitter-bootstrap_5.3.0_css_bootstrap.min.css" rel="stylesheet">
    <!-- style -->
    <link href="../src/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../src/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../src/css/lib/helper.css" rel="stylesheet">
    <link href="../src/css/style.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
     <!-- validation form style custom -->
    <style>
        .error {
        color: red;
        font-size: 9pt;
        margin: 0px;
        padding: 0;
        font-weight: regular;
        font-family: Arial, Helvetica, sans-serif;
        }
    </style>
<body>
      <!-- /# sidebar -->
      <?php include('../pages/sidebar.php')?>
    <!-- Header -->
    <?php include('../components/header.php')?>
    <!-- Content -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <section >
                    <!-- /# column -->
                    <div class="col-lg-12 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Video</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </section>
                <!-- Insert Form -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4 style="color: cornflowerblue;">Video</h4>      
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" enctype="multipart/form-data">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="validationCustom02" class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" id="validationCustom02" >
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="validationCustom02" class="form-label" >Description</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="desc" >
                                                    <div class="valid-feedback">
                                                </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <label for="validationCustom02" class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="validationCustom02" name="date" >
                                                    <div class="valid-feedback">
                                                </div>
                                                </div>  
                                                <div class="col-md-3">
                                                    <label for="validationCustom02" class="form-label">Image</label>
                                                    <input type="file" class="form-control" id="validationCustom02" name="img" >
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                             
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">URL</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="url" >
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label">Video Type</label>
                                                    <select class="form-control" name="video_type"> 
                                                    <option value="" >--Select Information Type--</option>
                                                    <?php
                                                    $info = $obj->fun_showdata('tbl_type_video','id');
                                                    foreach( $info as $value) {
                                                        ?>
                                                        <option value=<?php echo $value['id'];?>><?php echo $value['title'];?></option>
                                                         <?php
                                                        }
                                                    ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="validationCustom02" class="form-label" >Region</label>
                                                    <select class="form-control" name="region_id"> 
                                                    <option value="" >--Select Region--</option>
                                                    <?php
                                                    $region = $obj->fun_showdata('tbl_region','id');
                                                    foreach( $region as $value) {
                                                        ?>
                                                        <option value=<?php echo $value['id'];?>><?php echo $value['title'];?></option>
                                                         <?php
                                                        }
                                                    ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row" style="float: right; margin: 0;">
                                                <div class="col-6">
                                                    <button type="button" class="btn btn-outline-secondary">Cancel</button>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-outline-success" name="btn-save">Save</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </section>
            </div>
        </div>
    </div>

    <!-- data table -->
    <script src="../Library/JS/code.jquery.com_jquery-3.7.0.js"></script>
    <script src="../Library/JS/cdn.datatables.net_1.13.6_js_jquery.dataTables.min.js"></script>
    <script src="../Library/JS/cdn.datatables.net_1.13.6_js_dataTables.bootstrap5.min.js"></script>
    <script>
       new DataTable('#example');
    </script>
    <!-- jquery vendor -->
    <script src="../src/js/lib/jquery.min.js"></script>
    <script src="../src/js/lib/jquery.nanoscroller.min.js"></script>
    <!-- nano scroller -->
    <script src="../src/js/lib/menubar/sidebar.js"></script>
    <script src="../src/js/lib/preloader/pace.min.js"></script>
    <!-- sidebar -->
    <script src="../src/js/lib/bootstrap.min.js"></script>
    <script src="../src/js/scripts.js"></script>
</body>
</html>
