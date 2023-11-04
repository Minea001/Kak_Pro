<!DOCTYPE html>
<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- theme meta -->
    <meta name="theme-name" content="focus" />
    <title>Temple Management System</title>
    <link href="../src/css/lib/menubar/sidebar.css" rel="stylesheet">
    <link href="../src/css/lib/bootstrap.min.css" rel="stylesheet">
    <link href="../src/css/lib/helper.css" rel="stylesheet">
    <link href="../src/css/style.css" rel="stylesheet">
    <!-- font awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<body>
    <!--  sidebar -->
    <?php include('../pages/sidebar.php');?>
    <!-- Header -->
    <?php include('../components/header.php');?>
    <!-- Content -->
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Hello, <span>Welcome Here</span></h1>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <!-- /# column -->
                </div>
                <!-- Insert Form -->
                <section id="main-content">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-title">
                                    <h4 style="color: cornflowerblue;">Zhen De Cambodia</h4>
                                </div>
                                <div class="card-body">
                                    Hello Me!
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
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
<?php
?>