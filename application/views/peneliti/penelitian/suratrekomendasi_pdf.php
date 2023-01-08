<!DOCTYPE html>
<html><head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Surat Rekomendasi</title>
	<link rel="stylesheet" href="">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
		.line-title {
			border: 0;
			border-style: inset;
			border-top: 1px solid #000;
		}

		.logo {
			width: 120px;
			height: auto;
			position: absolute;
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
	<table style="width: 100%;">
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<b>SURAT IZIN</b>
			</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;
				Nomor : 070 / <?= $penelitian['nomor_surat']; ?> / <?= date('Y'); ?> </td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				TENTANG</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				IZIN STUDY PENDAHULUAN</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col">Dasar</td>
			<td>: Surat dari Lembaga peneliti</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				MEMBERI IZIN</td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
	</table>
	<table>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td scope="col">Kepada</td>
			<td>: </td>
		</tr>
		<tr>
			<td scope="col">Ketua Penelitian</td>
			<td>: <?= $kpenelitian['nama_peneliti']; ?></td>
		</tr>
		<tr>
			<td scope="col">Nomor Identitas</td>
			<td>: <?= $kpenelitian['no_identitas']; ?></td>
		</tr>
		<tr>
			<td scope="col">Lembaga</td>
			<td>: <?= $penelitian['lembaga']; ?>
		</tr>
		<tr>
			<td scope="col">Jurusan</td>
			<td>: <?= $penelitian['jurusan']; ?></td>
		</tr>
		<tr>
			<td scope="col">Untuk</td>
			<td>: Melakukan <?= $penelitian['tujuan']; ?></td>
		</tr>
		<tr>
			<td scope="col">Judul</td>
			<td>: <b><?= $penelitian['judul']; ?></b></td>
		</tr>
		<!-- <tr>
			<td scope="col">Lokasi</td>
			<?php if ($penelitian['nama_lokasi'] != null) { ?>
                  <td>: <?= $penelitian['nama_lokasi']; ?></td>
            <?php } else { ?>
                  <td>: <?= $penelitian['lokasi_lain']; ?></td>
            <?php } ?>
			
		</tr>
		<tr>
			<td scope="col">Penanggung Jawab</td>
			<td>: Paramasari Dirgahayu, dr., Ph.D
			<td>
		</tr> -->
		<!-- <tr>
			<td scope="col">Waktu</td>
			<td>: <?= $penelitian['waktu_mulai']; ?> sampai <?= $penelitian['waktu_selesai']; ?></td>
		</tr> -->
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"><b>Keterangan </b></td>

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
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				Ditetapkan di : Surakarta</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				Pada tanggal : </td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;
				an. KEPALA DINAS KESEHATAN</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				KOTA SURAKARTA</td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

				Kepala Bidang Data dan SDK</td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td scope="col"> </td>
			<td align="right"> </td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td align="right"><u><?= $pejabat['nama_pejabat']; ?></u></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<?= $pejabat['pangkat']; ?></td>
		</tr>
		<tr>
			<td scope="col"></td>
			<td align="right">NIP. <?= $pejabat['NIP']; ?></td>
		</tr>

		<tr>
		<td> Tembusan : </td>
			<td><?= $penelitian['nama_unit']; ?> </td>
		</tr>
	</table>

</body></html>