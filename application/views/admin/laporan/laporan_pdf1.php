<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Laporan Data Penelitian</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.line-title {
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}

		.logo {
			width: 100px;
			height: auto;
			position: absolute;
		}
	</style>
</head><body>
	<img src="assets/img/logo.png" class="logo">
	<table style="width: 100%;">
		<tr>
			<td align="center">
				<span style="Line-height:1.6; font-weight: bold;">
					PEMERINTAH KOTA SURAKARTA
					<br>DINAS KESEHATAN
					<br> Jln. Jendral Sudirman No.:2; Telp.632202
				</span>
			</td>
		</tr>
	</table>
	<hr class="line-title">
<h2 class="title-1" style="margin-bottom: 30px">
    <center>Data Penelitian</center>
</h2>
<table class="table" border="1" cellspacing="0" width="90%">
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Diajukan</th>
            <th>Nama Peneliti</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
        <?php
        $i = 1;
        foreach ($datapen as $row) {
            echo '<tr>
                                                                            <th scope="row">' . $i . '</th>
                                                                            <td>' . $row->nomor_surat . '</td>
                                                                            <td>' . $row->tgl_diajukan . '</td>
                                                                            <td>' . $row->nama_peneliti . '</td>
                                                                            <td>' . $row->judul . '</td>
                                                                            <td>' . $row->nama_status . '</td>
                                                                        </tr>';
            $i++;
        }
        ?>
</table>
</body></html>