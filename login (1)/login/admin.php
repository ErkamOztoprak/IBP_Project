<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
        session_start();
        if(isset($_SESSION['kullanici'])){
            $kullanici = $_SESSION['kullanici'];
        }
        else{
            header("Location: index.php");
            exit();
        }
        try{
            $conn = new PDO("mysql:host=localhost;dbname=kullanici_sifre;charset=utf8",'root', '');
        }catch (PDOException $e){
            echo $e->getMessage();
        }
        ?>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="stil.css" />
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto p-0">
                    <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                            <form class="d-flex" action="?islem=ara" method="post">
                                <input class="form-control me-2" type="search"name="arama" placeholder="Search" aria-label="Search">
                                <button class="btn btn-outline-success" type="submit">Search</button>
                            </form>
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <form class="d-flex" action="?islem=kullanicilar" method="post">
                                            <button class="btn btn-outline-primary" type="submit">Kullanıcılar</button>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form class="d-flex" action="?islem=kitaplar" method="post">
                                            <button class="btn btn-outline-primary" type="submit">Kitaplar</button>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form class="d-flex" action="?islem=mesaj" method="post">
                                            <button class="btn btn-outline-primary" type="submit">Mesaj Yaz</button>
                                        </form>
                                    </li>
                                    <li class="nav-item">
                                        <form class="d-flex" action="?islem=cikis" method="post">
                                            <button class="btn btn-outline-primary" type="submit">Çıkış Yap</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-10 mx-auto bg-white pt-4">
                    <div class="row">
                        <div class="col-md-9">
                            <?php
                            if($_REQUEST["islem"]=="ara"){
                                $kitapAdi = $_POST["arama"];
                                $kontrol = $conn->prepare("SELECT * FROM kitaplar WHERE kitapadi LIKE ?");
                                $kontrol->execute(["%".$kitapAdi. "%"]);
                                echo "<table class='table table-bordered table-hover table-striped'>";
                                echo "<thead><th>Kitap Adı</th><th>Yazar</th><th>Basım Yılı</th></thead>";
                                echo "<tbody>";
                                while ($row = $kontrol->fetch()) {
                                    echo "<tr>";
                                    echo "<td>" .$row["kitapadi"] ."</td>";
                                    echo "<td>" .$row["yazaradi"] ."</td>";
                                    echo "<td>" .$row["basimyili"] ."</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                            }
                            if($_REQUEST["islem"]=="kullanicilar"){
                                $kontrol = $conn->prepare("SELECT * FROM kullaniciler");
                                $kontrol->execute();
                                echo "<table class='table table-bordered table-hover table-striped'>";
                                echo "<thead><th>Kullanıcı Adı</th><th>Kullanıcı Emaili</th><th>Sil</th></thead>";
                                echo "<tbody>";
                                while ($row = $kontrol->fetch()) {
                                    $id = $row["id"];
                                    echo "<tr>";
                                    echo "<td>" .$row["isim"] ."</td>";
                                    echo "<td>" .$row["email"] ."</td>";
                                    echo "<td><a href='?islem=kullanicisil&id=$id' class='btn btn-danger' onclick='return confirm($id)'>Sil</a></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "<a href='?islem=kullaniciekle' class='btn btn-primary'>Kullanıcı Ekle</a>";
                            }
                            if($_REQUEST['islem']=="kullanicisil"){
                                $id = $_REQUEST['id'];
                                echo $id;
                                $sql = "DELETE FROM kullaniciler WHERE id=$id";
                                $conn->exec($sql);
                                header("Location: ?islem=kullanicilar");
                            }
                            if($_REQUEST['islem']=="kullaniciekle"){
                                echo "<form action='?islem=kullaniciisle' method='post'>
                                            isim:<input type='text' name='isim'>
                                            mail:<input type='text' name='mail'>
                                            Şifre:<input type='text' name='sifre'>
                                            <button class='btn btn-primary' type='submit'>Ekle</button>
                                        </form>";
                            }
                            if($_REQUEST['islem']=="kullaniciisle"){
                                $isim = $_REQUEST['isim'];
                                $mail = $_REQUEST['mail'];
                                $sifre = $_REQUEST['sifre'];
                                $sql= "INSERT INTO kullaniciler (isim, email, sifre) VALUES ('$isim', '$mail', '$sifre')";
                                $conn->exec($sql);
                                header("Location: ?islem=kullanicilar");
                            }
                            if($_REQUEST["islem"]=="kitaplar"){
                                $kontrol = $conn->prepare("SELECT * FROM kitaplar");
                                $kontrol->execute();
                                echo "<table class='table table-bordered table-hover table-striped'>";
                                echo "<thead><th>Kitap Adı</th><th>Yazar Adı</th><th>Basım Yılı</th><th>Sil</th></thead>";
                                echo "<tbody>";
                                while ($row = $kontrol->fetch()) {
                                    $id = $row["id"];
                                    echo "<tr>";
                                    echo "<td>" .$row["kitapadi"] ."</td>";
                                    echo "<td>" .$row["yazaradi"] ."</td>";
                                    echo "<td>" .$row["basimyili"] ."</td>";
                                    echo "<td><a href='?islem=kitapsil&id=$id' class='btn btn-danger' onclick='return confirm($id)'>Sil</a></td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";
                                echo "</table>";
                                echo "<a href='?islem=kitapekle' class='btn btn-primary'>Kitap Ekle</a>";
                            }
                            if($_REQUEST['islem']=="kitapsil"){
                                $id = $_REQUEST['id'];
                                echo $id;
                                $sql = "DELETE FROM kitaplar WHERE id=$id";
                                $conn->exec($sql);
                                header("Location: ?islem=kitaplar");
                            }
                            if($_REQUEST['islem']=="kitapekle"){
                                echo "<form action='?islem=kitapisle' method='post'>
                                            isim:<input type='text' name='isim'>
                                            yazar:<input type='text' name='yazar'>
                                            basım yılı:<input type='text' name='basim'>
                                            <button class='btn btn-primary' type='submit'>Ekle</button>
                                        </form>";
                            }
                            if($_REQUEST['islem']=="kitapisle"){
                                $isim = $_REQUEST['isim'];
                                $yazar = $_REQUEST['yazar'];
                                $basim = $_REQUEST['basim'];
                                $sql= "INSERT INTO kitaplar (kitapadi, yazaradi, basimyili) VALUES ('$isim', '$yazar', '$basim')";
                                $conn->exec($sql);
                                header("Location: ?islem=kitaplar");
                            }
                            if($_REQUEST['islem']== "mesaj"){
                                echo "<form action='?islem=gonder' method='post'>
                                            <div class='form-group col-md-11'>
                                                Kime:
                                                <input type='text' class='form-control' name='kime'>
                                            </div>
                                            <div class='form-group col-md-11'>
                                                Konu:
                                                <input type='text' class='form-control' name='konu'>
                                            </div>
                                            <div class='form-group col-md-11'>
                                                Mesaj:
                                                <textarea class='form-control' aria-label='With textarea' name='mesaj' width='11000px'></textarea>
                                            </div>
                                            <br>
                                            <button class='btn btn-primary' type='submit'>Gönder</button>
                                       </form>";
                            }
                            if($_REQUEST['islem']== "gonder"){
                                $alici = $_REQUEST['kime'];
                                $mesaj = $_REQUEST['mesaj'];
                                $konu = $_REQUEST['konu'];
                                $sql = "INSERT INTO duyurular (kime, icerik, konu, kimden) VALUES ('$alici', '$mesaj', '$konu', '$kullanici')";
                                $conn->exec($sql);
                                header("Location: ?islem=mesaj");
                            }
                            if($_REQUEST['islem']== "cikis"){
                                session_destroy();
                                header("Location: index.php");
                            }
                            ?>
                        </div>
                        <div class="col-md-3">
                            <ul class="list-group list-group-flush">
                                <?php
                                $kime = $kullanici;
                                $kontrol = $conn->prepare("SELECT * FROM duyurular WHERE kime = ?");
                                $kontrol->execute([$kime]);
                                while ($row = $kontrol->fetch()) {
                                    echo "<li class='list-group-item'>"  ."kimden:" .$row["kimden"] ."<br><br>" .$row["konu"] .":<br><br>" .$row["icerik"] ."</li>";
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>

