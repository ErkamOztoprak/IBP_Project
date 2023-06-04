<?php
session_start();
try{
    $conn = new PDO("mysql:host=localhost;dbname=kullanici_sifre;charset=utf8",'root', '');
}catch (PDOException $e){
    echo $e->getMessage();
}
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<div class="container mt-5">
    <div class="row">
        <div class="col-6 mx-auto">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Giriş Yap</h4>
                </div>
                <div class="card-body">
                    <?php
                    $GelenEmail = "";
                    $GelenSifre = "";
                    if ($_POST) {
                        $GelenEmail = $_POST['email'];
                        $GelenSifre = $_POST['sifre'];

                        if ($GelenEmail != "" and $GelenSifre != "") {
                            $kontrol = $conn->prepare("SELECT * FROM kullaniciler WHERE email = ? and sifre = ?");
                            $kontrol->execute([$GelenEmail, $GelenSifre]);
                            $varmi = $kontrol->rowCount();
                            if ($varmi > 0) {
                                echo '<div class="alert alert-success">Başarılı bir şekilde giriş yaptınız!</div>';
                                if($GelenEmail== "ykf20002@gmail.com"){
                                    $_SESSION['kullanici'] = $GelenEmail;
                                    header("refresh:1, url=admin.php");
                                } else{
                                    $_SESSION['kullanici'] = $GelenEmail;
                                    header("refresh:1, url=standart.php");
                                }
                            } else {
                                echo '<div class="alert alert-danger">Hatalı mail veya şifre girdiniz!</div>';
                            }
                        } else {
                            echo '<div class="alert alert-danger">Lütfen tüm alanları doldurun!</div>';
                        }
                    }
                    ?>
                    <form method="post">
                        <div class="form-group">
                            <label for="Email">Email Adresi</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="sifre">Şifre</label>
                            <input type="password" name="sifre" class="form-control">
                        </div>
                        <button class="btn btn-outline-primary w-100" type="submit">Giriş Yap</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

