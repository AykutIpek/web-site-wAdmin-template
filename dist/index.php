<?php require_once '../admin/pages/inc-function.php' ?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Aykut Ipek Website</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <!-- Navigation-->
        <?php include_once "includes/inc-menu.php" ?>
        <!-- Page Header-->
        <header class="masthead" style="background-image: url('assets/img/pexels-lukas-574073.jpg')">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>DEVELOPMENT</h1>
                            <span class="subheading">Full Stack Geliştici</span>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <?php
                        $cek = $db->prepare("SELECT * FROM `blog` WHERE `aktif` = :aktif ORDER BY `id` DESC"); 
                        $cek -> bindValue(":aktif", 1 , PDO::PARAM_INT);
                        $cek-> execute();
                        while($row = $cek -> fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="post-preview">
                        <a href="blog-detay.php?id=<?= $row['id']?>">
                            <h2 class="post-title"><?= $row["baslik"]?></h2>
                            <h3 class="post-subtitle"><?= $row["alt_baslik"]?></h3>
                        </a>
                        <p class="post-meta">
                            Posted by
                            <a href="#!">Admin</a>
                            <?= $row["tarih"]?>
                        </p>
                    </div>
                    <hr>
                    <?php } ?>
                    
                    <!-- Pager-->
                    <div class="d-flex justify-content-end mb-4"><a class="btn btn-primary text-uppercase" href="#!">Older Posts →</a></div>
                </div>
            </div>
        </div>
        <!-- Footer-->
        <?php include_once 'includes/inc-footer.php' ?>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
