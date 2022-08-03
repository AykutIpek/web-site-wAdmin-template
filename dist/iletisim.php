<?php include_once '../admin/pages/inc-function.php';
if (@$_POST["submit"]) {
    $ad = htmlspecialchars($_POST["name"], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST["email"], ENT_QUOTES, 'UTF-8');
    $tel = htmlspecialchars($_POST["phone"], ENT_QUOTES, 'UTF-8');
    $mesaj = htmlspecialchars($_POST["message"], ENT_QUOTES, 'UTF-8');

    $ekle = $db->prepare("INSERT INTO `iletisim`(`ad`, `email`,`tel`, `mesaj`) VALUES (:ad, :email, :tel, :mesaj) ");
    $ekle->bindValue(":ad", $ad, PDO::PARAM_STR);
    $ekle->bindValue(":email", $email, PDO::PARAM_STR);
    $ekle->bindValue(":tel", $tel, PDO::PARAM_STR);
    $ekle->bindValue(":mesaj", $mesaj, PDO::PARAM_STR);

    if ($ekle->execute()) {
        //başarılıysa
        header("Location: iletisim.php?i=ok");
    } else {
        header("Location: iletisim.php?i=hata");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Contact | Ipek'S</title>
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
    <?php include_once 'includes/inc-menu.php'; ?>
    <!-- Page Header-->
    <header class="masthead" style="background-image: url('assets/img/contact-bg.jpg')">
        <div class="container position-relative px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <div class="page-heading">
                        <h1>İletişim</h1>
                        <span class="subheading">Bir sorunuz mu var?</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->
    <main class="mb-4">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <p>Lütfen iletişim formunu doğru bir şekilde doldurunuz. Sizinle en kısa sürede iletişime geçeceğiz...</p>
                    <div class="my-5">
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- * * SB Forms Contact Form * *-->
                        <!-- * * * * * * * * * * * * * * *-->
                        <!-- This form is pre-integrated with SB Forms.-->
                        <!-- To make this form functional, sign up at-->
                        <!-- https://startbootstrap.com/solution/contact-forms-->
                        <!-- to get an API token!-->
                        <form id="contactForm" method="POST" action="iletisim.php#bildiri">
                            <div class="form-floating">
                                <input class="form-control" id="name" name="name" type="text" placeholder="Adınız Soyadınız" data-sb-validations="required" />
                                <label for="name">Ad Soyad</label>
                                <div class="invalid-feedback" data-sb-feedback="name:required">Adınızı Soyadınızı girmelisiniz</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="email" type="email" name="email" placeholder="Email" data-sb-validations="required,email" />
                                <label for="email">Email</label>
                                <div class="invalid-feedback" data-sb-feedback="email:required">Email girmelisiniz.</div>
                            </div>
                            <div class="form-floating">
                                <input class="form-control" id="phone" type="tel" name="phone" placeholder="Telefon Numaranız" data-sb-validations="required" />
                                <label for="phone">Telefon</label>
                                <div class="invalid-feedback" data-sb-feedback="phone:required">Telefon numarası boş bırakılamaz</div>
                            </div>
                            <div class="form-floating">
                                <textarea class="form-control" id="message" name="message" placeholder="Mesajınızı buraya giriniz..." style="height: 12rem" data-sb-validations="required"></textarea>
                                <label for="message">Mesajınız</label>
                                <div class="invalid-feedback" data-sb-feedback="message:required">Mesaj boş bırakılamaz</div>
                            </div>
                            <br />
                            <!-- Submit success message-->
                            <!---->
                            <!-- This is what your users will see when the form-->
                            <!-- has successfully submitted-->
                            <div id="id">
                                <?php
                                if (@$_GET["i"] == "ok") {
                                    echo '<p class="text-center text-success alert alert-success">Mesaj başarı ile gönderildi</p>';
                                } else if (@$_GET["i"] == "hata") {
                                    echo '<p class="text-center text-alert alert alert-danger">Mesaj gönderilirken bir hata oluştu</p>';
                                }
                                ?>
                            </div>
                            <!-- Submit Button-->
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary text-uppercase" name="submit" value="Gönder">
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!-- Footer-->
    <?php include_once 'includes/inc-footer.php' ?>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <!-- * *                               SB Forms JS                               * *-->
    <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
    <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>

</html>