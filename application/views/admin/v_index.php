<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <div class="flash-data1" data-flashdata="<?= $this->session->flashdata('pesan1'); ?>"></div>
    <?php if ($this->session->flashdata('pesan')) : ?>
        <!-- <?= $this->session->flashdata('pesan'); ?> -->
    <?php endif; ?>
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 bg-secondary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Pegawai</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $JPegawai; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/c_pegawai'); ?>" class="btn btn-secondary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Semua</span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Peneliti</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $JPeneliti; ?> </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">

                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-md fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/c_admin/datapeneliti'); ?>" class="btn btn-warning btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Semua</span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Kategori Hasil Penelitian</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $JKategorihasil; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/c_kategorihasil'); ?>" class="btn btn-danger btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Semua</span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Unit</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $JUnit; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-hospital fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
                <a href="<?= base_url('admin/c_unit'); ?>" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-arrow-right"></i>
                    </span>
                    <span class="text">Lihat Semua</span>
                </a>
            </div>
        </div>
    </div>

    <hr size="30px" width="100%">
    <div class="row">
        <div class="col-lg-5.5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
                        </div>
                        <div class="col-md-3">
                            <select name="year1" id="year1" class="form-control">
                                <option value="">Select Year</option>
                                <?php foreach ($fetchyear1 as $fy1) : ?>
                                    <option value="<?= $fy1['year(tgl_diajukan)'] ?>" <?= $fy1['year(tgl_diajukan)']  == date('Y')  ? 'selected' : '' ?>>
                                        <?= $fy1['year(tgl_diajukan)'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table--no-card m-b-30">
                        <div id="chart_area1" style="width: 500px; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="col-lg-5.5 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-9">
                            <h6 class="m-0 font-weight-bold text-primary">Data Peneliti</h6>
                        </div>
                        <div class="col-md-3">
                            <select name="year2" id="year2" class="form-control">
                                <option value="">Select Year</option>
                                <?php foreach ($fetchyear as $fy) : ?>
                                    <option value="<?= $fy['year(create_date)'] ?>" <?= $fy['year(create_date)']  == date('Y')  ? 'selected' : '' ?>>
                                        <?= $fy['year(create_date)'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table--no-card m-b-30">
                        <div id="chart_area" style="width: 500px; height: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-4">Penelitian</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><?= $JPenelitian; ?> Penelitian </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                        <a href="<?= base_url('admin/c_admin/datapenelitian'); ?>" class="btn btn-light btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Lihat Semua</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-4">Menu</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><?= $JMenu; ?> Menu </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-file fa-2x text-gray-300"></i>
                        </div>
                        <a href="<?= base_url('admin/c_menu'); ?>" class="btn btn-light btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Lihat Semua</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-4">Hasil Penelitian</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-3 mr-3 font-weight-bold text-gray-800"><?= $JHasilpenelitian; ?> Hasil Penelitian </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                        <a href="<?= base_url('admin/c_admin/datahasilpenelitian'); ?>" class="btn btn-light btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Lihat Semua</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-4">Pengaduan</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"><?= $JPengaduan; ?> Pengaduan </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                        <a href="<?= base_url('admin/c_pengaduan'); ?>" class="btn btn-light btn-icon-split">
                            <span class="icon text-white-50">
                                <i class="fas fa-arrow-right"></i>
                            </span>
                            <span class="text">Lihat Semua</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- End of Main Content -->


<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- DATA PENELITI -->
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data1(year, title) {
        var temp_title = title + ' ' + year;
        $.ajax({
            url: "<?php echo base_url('admin/c_admin/fetch_data'); ?>",
            method: "POST",
            data: {
                year: year
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthwiseChart1(data, temp_title);
            }
        })
    }

    function drawMonthwiseChart1(chart_data, chart_main_title) {
        var jsonData = chart_data;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Bulan');
        data.addColumn('number', 'Jumlah');

        $.each(jsonData, function(i, jsonData) {
            var parsedData = JSON.stringify(jsonData);
            var month_name = jsonData.month_name;
            var count = parseFloat($.trim(jsonData['count']));
            data.addRows([
                [month_name, count]
            ]);
        });


        var options = {
            title: chart_main_title,
            hAxis: {
                title: "Bulan"
            },
            vAxis: {
                title: 'Jumlah'
            },
            chartArea: {
                width: '80%',
                height: '85%'
            }
        }

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_area'));

        chart.draw(data, options);
    }
</script>

<script>
    $(document).ready(function() {

        var year = new Date().getFullYear();
        load_monthwise_data1(year, 'Data peneliti tahun ');

        $('#year2').change(function() {
            var year = $(this).val();
            if (year != '') {
                load_monthwise_data1(year, 'Data peneliti tahun');
            }
        });
    });
</script>

<!-- DATA PENELITIAN -->
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data(year, title) {
        var temp_title = title + ' ' + year;
        $.ajax({
            url: "<?php echo base_url('admin/c_admin/fetch_data_grafik'); ?>",
            method: "POST",
            data: {
                year: year
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthwiseChart(data, temp_title);
            }
        })
    }

    function drawMonthwiseChart(chart_data, chart_main_title) {
        var jsonData = chart_data;
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Status');
        data.addColumn('number', 'Jumlah');

        $.each(jsonData, function(i, jsonData) {
            var parsedData = JSON.stringify(jsonData);
            var status = jsonData.status;
            var count = parseFloat($.trim(jsonData['count']));
            data.addRows([
                [status, count]
            ]);
        });


        var options = {
            title: chart_main_title,
            hAxis: {
                title: "Status"
            },
            vAxis: {
                title: 'Jumlah'
            },
            chartArea: {
                width: '80%',
                height: '85%'
            }
        }

        var chart = new google.visualization.PieChart(document.getElementById('chart_area1'));

        chart.draw(data, options);
    }
</script>

<script>
    $(document).ready(function() {

        var year = new Date().getFullYear();
        load_monthwise_data(year, 'Data Penelitian tahun ');

        $('#year1').change(function() {
            var year = $(this).val();
            if (year != '') {
                load_monthwise_data(year, 'Data Penelitian tahun ');
            }
        });
    });
</script>