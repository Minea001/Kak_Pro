<!DOCTYPE html>
<?php 
    require_once('../conn/class_function.php');
    $obj = new myclass();
    // update data
    if (isset($_POST['btn-update'])) {
        $id = $_POST['id'];
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $info = $_POST['info_type'];
        $region = $_POST['region_id']; 
        $filename = "img";
        $image = $obj->fun_upload_img($filename);

        $fields = array('image', 'title', 'date', 'description', 'info_type', 'region_id');
        $values = array($image, $title, $date, $desc, $info, $region);
        $result = $obj->fun_updateData( 'tbl_information', $fields, $values, 'id', $id);
        if ( $result ) {
            echo "Success";
            header('location: information.php');
        }
    }
    // insert data
    if (isset($_POST['btn-save'])) {
        $title = $_POST['title'];
        $desc = $_POST['desc'];
        $date = $_POST['date'];
        $info = $_POST['info_type'];
        $region = $_POST['region_id']; 
        $filename = "img";
        $image = $obj->fun_upload_img($filename);

        $fields = array('image', 'title', 'date', 'description', 'info_type', 'region_id');
        $values = array($image, $title, $date, $desc, $info, $region);
        $result = $obj->fun_insertData( 'tbl_information', $fields, $values);
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
      <!-- data table -->
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
</head>
<!-- **Body** -->
<body>
    <!--  sidebar -->
    <?php include('../pages/sidebar.php');?>
    <!-- Header -->
    <?php include('../components/header.php');?>
    <!-- Content -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <!-- Save Information  -->
                <?php 
                if (isset($_POST['save'])) {
                ?>
                <!-- Insert Form -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4 style="color: cornflowerblue;">Add Informations</h4>      
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" enctype="multipart/form-data" id="validate">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" id="title" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" >Description</label>
                                                    <input type="text" class="form-control" id="desc" name="desc" required>
                                                    
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="date" name="date" required>
                                                    
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Filename</label>
                                                    <input type="file" class="form-control" id="file" name="img" required>
                                                   
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Information Type</label>
                                                    <select class="form-control" name="info_type" id="info_type" required> 
                                                    <option value="" >--Select Information Type--</option>
                                                    <?php
                                                    $info = $obj->fun_showdata('tbl_type_info','id');
                                                    foreach( $info as $value) {
                                                        ?>
                                                        <option value=<?php echo $value['id'];?>><?php echo $value['title'];?></option>
                                                         <?php
                                                        }
                                                    ?>
                                                    </select>
                                                   
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" >Region</label>
                                                    <select class="form-control" name="region_id" id="region_id" required> 
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
                                                </div>
                                            </div>
                                            <div class="row" style="float: right; margin: 0;">
                                                <div class="col-6">
                                                    <a href="../pages/information.php" type="button" class="btn btn-outline-secondary">Cancel</a>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-outline-success" name="btn-save">Save</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </section>
                <?php 
                } else if (isset($_GET['edit'])) {
                    $id = $_GET['edit'];
                    $info_edit = $obj->fun_showdatabyId("tbl_information", 'id', $id);
                    ?>
                    <!-- Update Form -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4 style="color: cornflowerblue;">Update Informations</h4>      
                                </div>
                                <div class="card-body">
                                    <div class="basic-form">
                                        <form method="POST" enctype="multipart/form-data" id="validate">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input type="hidden" value="<?php echo $id;?>" name="id">
                                                    <label class="form-label">Title</label>
                                                    <input type="text" class="form-control" name="title" id="validationCustom02" value="<?php echo $info_edit['title'];?>">
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" >Description</label>
                                                    <input type="text" class="form-control" id="validationCustom02" name="desc" value="<?php echo $info_edit['description'];?>">
                                                    <div class="valid-feedback">
                                                </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Date</label>
                                                    <input type="date" class="form-control" id="validationCustom02" name="date" value="<?php echo $info_edit['date'];?>">
                                                    <div class="valid-feedback">
                                                </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Filename</label>
                                                    <input type="file" class="form-control" id="validationCustom02" name="img" value="<?php echo $info_edit['image'];?>">
                                                    <!-- <img src="./Upload/<?php echo $info_edit['image'];?>" width="50px" height="50px"> -->     
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Information Type</label>
                                                    <select class="form-control" name="info_type"> 
                                                    <option value="" >--Select Information Type--</option>
                                                    <?php
                                                    $info = $obj->fun_showdata('tbl_type_info','id');
                                                    foreach( $info as $value) {
                                                        ?>
                                                        <option <?php if($info_edit['info_type'] == $value['id']) echo "SELECTED";?> value=<?php echo $value['id'];?>><?php echo $value['title'];?></option>
                                                         <?php
                                                        }
                                                    ?>
                                                    </select>
                                                    <div class="valid-feedback">
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label" >Region</label>
                                                    <select class="form-control" name="region_id"> 
                                                    <option value="" >--Select Region--</option>
                                                    <?php
                                                    $region = $obj->fun_showdata('tbl_region','id');
                                                    foreach( $region as $value) {
                                                        ?>
                                                        <option <?php if($info_edit['region_id'] == $value['id']) echo "SELECTED";?> value=<?php echo $value['id'];?>><?php echo $value['title'];?></option>
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
                                                    <a href="../pages/information.php" type="button" class="btn btn-outline-secondary">Cancel</a>
                                                </div>
                                                <div class="col-6">
                                                    <button type="submit" class="btn btn-outline-success" name="btn-update">Update</button>
                                                </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>     
                </section>
                <?php
                } else {
                ?>
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                    <div class="card-title">
                                        <div class="row">
                                            <div class="col-10" style="float: left;">
                                                <h4 style="color: disabled;">Informations List</h4> 
                                            </div>
                                            <div class="col-2" style="float: right;">
                                                <form action="" method="post">
                                                    <button class="bg-transparent border-0 btn btn-md p-0" name="save"><i class="fas fa-plus-circle" style="color: disabled;"></i>&nbsp;<h4 style="color: disabled;">Add</h4></button>&nbsp;
                                                    <button class="bg-transparent border-0 btn btn-md p-0 "><i class="fas fa-list" style="color: disabled;"></i>&nbsp;<h4 style="color: disabled;">View</h4></button>
                                                </form>
                                            </div>
                                        </div>       
                                    </div>
                                <div class="card-body mt-3">
                                    <div class="basic-form">
                                        <form action="" method="GET">
                                            <table id="example" class="table table-bordered" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Title</th>
                                                        <th>Description</th>
                                                        <th>Date</th>
                                                        <th>image</th>
                                                        <th>Information Type</th>
                                                        <th>Region</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php 
                                                        $info = $obj->fun_showdata('tbl_information','id');
                                                        foreach( $info as $val) {
                                                        $info_id = $val['info_type'];
                                                        $region_id = $val['region_id'];
                                                        $info_type = $obj->fun_showdatabyId('tbl_type_info', 'id', $info_id);
                                                        $region = $obj->fun_showdatabyId('tbl_region', 'id', $region_id);
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $val['title'];?></td>
                                                        <td><?php echo $val['description'];?></td>
                                                        <td><?php echo $val['date'];?></td>
                                                        <td class="text-center"><img src="../Upload/<?php echo $val['image'];?>" alt="" width="50px" height="50px"></td>
                                                        <td><?php echo $info_type['title'];?></td>
                                                        <td><?php echo $region['title'];?></td>
                                                        <td class="text-center">
                                                            <!-- <input type="text" id="info_id" value="<?php echo $val['id'];?>"> -->
                                                            <button type="submit" value="<?php echo $val['id'];?>" name="edit" class="border-0 bg-transparent btn-md"><i class="far fa-edit"></i></button>
                                                            <!-- <button type="button" value="<?php //echo $val['id'];?>" id="modal_del" class="border-0 bg-transparent btn-md" data-toggle="modal" data-target="#exampleModal"><i class="far fa-trash-alt"></i></button> -->
                                                            <button value="<?php echo $val['id'];?>" class="infodel border-0 bg-transparent btn-md"><i class="far fa-trash-alt"></i></button>

                                                        </td>
                                                    </tr>
                                                    <?php
                                                        }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <?php
                }
                ?>
                      <!-- modal delete -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-sm">  
                            <form action="" method="POST">
                                <div class="modal-content">
                                    <div class="modal-body text-center">
                                        <img src="../Upload/round_qu.png" width="60px" height="60px">
                                        <br><br>
                                        <h5>Are you sure to delete?</h5>
                                    </div>
                                    <div class="modal-footer border-0">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <button type="submit" name="btn-delete" class="btn btn-danger">Ok</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>   
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
    <!-- confirm delete -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <!-- confirm delete -->
    <script type='text/javascript'>
    $(document).ready(function() {
        $('.infodel').click(function(e) {
        e.preventDefault();
        var id = $(this).val();
        swal({
            title: "Are you sure?",
            text: "Do you want to delete this record!",
            icon: "error",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $.ajax({
                url: 'info-delete.php',
                type: 'POST',
                data: {
                    id: id
                },
                success: function(response) {
                    $(function() {
                    toastr.options = {
                        timeOut: 10000,
                        extendedTimeOut: 0,
                        fadeOut: 0,
                        fadeIn: 0,
                        showDuration: 0,
                        hideDuration: 0,
                        debug: false,
                    };
                    toastr.success("Delete Success!")
                    window.location.reload()
                    })
                },
                });
            }
            });
        });
    });
    </script>

    <!-- validation form -->
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
    <script>
    $(function() {
        $validate = $("#validate");
        if ($validate.length) {

        $validate.validate({

            rules: {
                title: {
                    required: true
                },
                desc: {
                    required: true
                },
                date: {
                    required: true
                },
                file: {
                    required: true
                },
                info_type: {
                    required: true
                },
                region_id: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "Please input title"
                },
                desc: {
                    required: "Please input description"
                },
                date: {
                    required: "Please input date"
                },
                file: {
                    required: "Please choose file"
                },
                info_type: {
                    required: "Please choose information type"
                },
                region_id: {
                    required: "Please choose region"
                }
            },
            errorElement: 'small',
            errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.col-md-6').append(error);
            },
            highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
            }
        })
        }
    })
    </script>
</body>
</html>
