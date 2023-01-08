<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-blue-grey.css">
<link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    html,
    body,
    h1,
    h2,
    h3,
    h4,
    h5 {
        font-family: "Open Sans", sans-serif
    }
</style>

<body class="w3-theme-l5">
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
    <!-- Page Container -->
    <div class="w3-container w3-content" style="max-width:5000px;margin-top:40px;margin-left:100px;margin-right:10px">
        <!-- The Grid -->
        <div class="w3-row">
            <!-- Left Column -->
            <div class="w3-col m3">
                <!-- Profile -->
                <div class="w3-card w3-round w3-white">
                    <div class="w3-container">
                        <h4 class="w3-center"><?= $getpeneliti['nama_peneliti']; ?></h4>
                        <p class="w3-center"><img src="<?= base_url('assets/img/profile/default.jpg'); ?>" class="w3-circle" style="height:106px;width:106px" alt="Avatar"></p>
                        <hr>
                        <p><i class="fa fa-envelope-square fa-fw w3-margin-right"></i><?= $getpeneliti['email']; ?></p>
                        <p><i class="fa fa-home fa-fw w3-margin-right"></i><?= $getpeneliti['alamat']; ?></p>
                        <p><i class="fa fa-birthday-cake fa-fw w3-margin-right"></i><?= $getpeneliti['tgl_lahir']; ?></p>
                    </div>
                </div>
                <br>

                <div class="w3-card w3-round">
                    <div class="w3-white">
                        <button onclick="myFunction('Demo1')" class="btn-block btn-primary"><i class="fa fa-circle-o-notch fa-fw w3-margin-right"></i> Penelitian sedang berjalan</button>
                        <div id="Demo1" class="w3-hide w3-container">
                            <p><?= $hitpenelitianuser; ?> Penelitian</p>
                        </div>
                        <button onclick="myFunction('Demo2')" class="btn-block btn-primary"><i class="fa fa-calendar-check-o fa-fw w3-margin-right"></i> Penelitian selesai</button>
                        <div id="Demo2" class="w3-hide w3-container">
                            <p><?= $hitpenelitianselesai; ?> Penelitian</p>
                        </div>
                    </div>
                </div>
                <br>
            </div>

            <div class="w3-col m7">

                <div class="w3-row-padding">
                    <div class="w3-col m12">
                        <div class="w3-card w3-round w3-white">
                            <div class="w3-container w3-padding">
                                <h4 class="w3-center">My Profile</h4>
                                <!-- <h6 class="w3-opacity"><?= $getpeneliti['nama_peneliti']; ?></h6> -->
                                <p contenteditable="false" class="w3-border w3-padding">Nomor Identitas : <?= $getpeneliti['no_identitas']; ?></p>
                                <p contenteditable="false" class="w3-border w3-padding">Jenis Kelamin : <?= $getpeneliti['jk']; ?></p>
                                <p contenteditable="false" class="w3-border w3-padding">Nomor HP : <?= $getpeneliti['no_hp']; ?></p>
                                <a type="button" class="btn btn-primary" href="<?= site_url('peneliti/c_peneliti/edit'); ?>"><i class="fa fa-pencil"></i> Edit</a>
                                <a type="button" class="btn btn-secondary" href="<?= site_url('peneliti/c_peneliti/ubahpassword'); ?>"><i class="fa fa-key"></i> Ubah Password</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <br>
    <script>
        function myFunction(id) {
            var x = document.getElementById(id);
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
                x.previousElementSibling.className += " w3-theme-d1";
            } else {
                x.className = x.className.replace("w3-show", "");
                x.previousElementSibling.className =
                    x.previousElementSibling.className.replace(" w3-theme-d1", "");
            }
        }

        function openNav() {
            var x = document.getElementById("navDemo");
            if (x.className.indexOf("w3-show") == -1) {
                x.className += " w3-show";
            } else {
                x.className = x.className.replace(" w3-show", "");
            }
        }
    </script>
</body>

</html>