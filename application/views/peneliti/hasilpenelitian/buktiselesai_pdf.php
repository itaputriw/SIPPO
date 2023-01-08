<!DOCTYPE html>
<html><head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Bukti Selesai</title>
<link rel="stylesheet" href="">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
	.line-title{
	border:0;
	border-style: inset;
	border-top: 1px solid #000;
	}
	.logo{
		width: 120px;
		height:auto; 
		position:absolute;
	}
	</style>
</head><body>
	<img src="assets/img/logo.png" class="logo">
	<table style="width: 100%;">
	<tr>
		<td align="center">
			<span>
					<?= $template['judul']; ?>
					<br><b><?= $template['instansi']; ?></b>
					<br> <?= $template['alamat_instansi']; ?>; Telp.<?= $template['telp']; ?> Fax. <?= $template['fax']; ?>
					<br> E-mail: <?= $template['email_instansi']; ?>
					<br><b><?= $template['kodepos']; ?></b>
				</span>
		</td>
	</tr>
	</table>
<hr class="line-title">
<br>
	<table  style="width: 100%;">
		<tr>
			<td align="left">SURAT KETERANGAN</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
		<td>Yang bertanda tangan di bawah ini : </td>
		</tr>
		<tr><td scope="col">Nama</td>
			<td>: <?= $pejabat['nama_pejabat']; ?></td>
		</tr>
		<tr><td scope="col">NIP</td>
			<td>: <?= $pejabat['NIP']; ?></td>
		</tr>
		<tr><td scope="col">Pangkat/Golongan</td>
			<td>: <?= $pejabat['pangkat']; ?> /<?= $pejabat['golongan']; ?></td>
		</tr>
		<tr><td scope="col">Jabatan</td>
			<td>: <?= $pejabat['jabatan']; ?></td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
		<td>Dengan ini menerangkan bahwa </td>
		</tr>
	</table>
	<table>
		<?php
        foreach ($penelitian as $row) :
        ?>
		<tr>
			<td scope="col">Ketua Penelitian</td>
			<td>: <?= $row['nama_peneliti']; ?></td>
		</tr>
		<tr>
            <td scope="col">Nomor Identitas</td>
			<td>: <?= $row['no_identitas']; ?></td>
		</tr>
		<tr>
			<td scope="col">Jurusan</td>
			<td>: <?= $row['jurusan']; ?></td>
		</tr>
		<tr>
			<td scope="col">Lembaga</td>
			<td>: <?= $row['lembaga']; ?></td>
		</tr>
		<tr>
			<td scope="col">Tujuan</td>
			<td>: <?= $row['tujuan']; ?></td>
		</tr>
		<tr>
			<td scope="col">Judul</td>
			<td >: <b><?= $row['judul']; ?></b></td>
		</tr>
		<tr>
			<td scope="col">Nomor Surat Rekomendasi/Tanggal</td>
			<td>: <?= $row['nomor_surat']; ?>/<?= $row['tgl_diajukan']; ?></td>
		</tr>
		<tr>
			<td scope="col">Keterangan</td>
			<td>: Telah selesai melakukan penelitian dan telah menyerahkan laporan hasil penelitian ke Dinas Kesehatan Kota Surakarta<td>
		</tr>
		 <tr>
                            <td>
                                <p class="card-text mt-0">Anggota Penelitian
                            </td>
                            <td>
                                <p class="card-text mt-0"> : </p>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <?php
                                $i = 1;
                                foreach ($anggotapenelitian as $row) :
                                ?>
                                    <p class="card-text mt-0"><?= $i++; ?>. <?= $row['nama_peneliti'] ?></p>
                                <?php endforeach; ?>
                            </td>
                        </tr>
		</tr>
		 <?php endforeach; ?>
		 
		
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
			<td>Demikian Surat Keterangan ini dibuat untuk dipergunakan seperlunya</td>
		</tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr><td></td></tr>
		<tr>
			<td scope="col"></td>
			<td>Surakarta, <td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>an.KEPALA DINAS KESEHATAN KOTA SURAKARTA<td>
		</tr>
    </table>
</body></html>