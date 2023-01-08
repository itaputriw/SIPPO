<h2 class="title-1" style="margin-bottom: 30px">
    <center>Data Penelitian</center>
</h2>
<table class="table table-borderless table-responsive table-striped table-earning" border="1px solid black" cellspacing="0" width="80%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nomor Surat</th>
            <th>Tanggal Diajukan</th>
            <th>Nama Peneliti</th>
            <th>Judul</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
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
    </tbody>
</table>


<script>
    window.print();
</script>
