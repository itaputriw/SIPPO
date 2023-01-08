<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <!-- <h1 class="h3 mb-4 text-gray-800"><?= $title; ?> </h1> -->
    <!-- <?= print_r($jumlahnotifikasi); ?> -->
    <div class="flash-data" data-flashdata="<?= $this->session->flashdata('pesan'); ?>"></div>
    <h2 class="h4 font-weight-bold text-gray text-uppercase mb-2">Penelitian</h2>

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-secondary shadow h-100 py-2 bg-secondary">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Menunggu</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $Menunggu; ?> </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-exclamation-triangle fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2 bg-warning">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Disetujui</div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-3 mr-3 font-weight-bold text-gray-800"><?= $Disetujui; ?> </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2 bg-danger">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Ditolak</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $Ditolak; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-times fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2 bg-success">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-white text-uppercase mb-4">Selesai</div>
                            <div class="h5 mb-3 font-weight-bold text-gray-800"> <?= $Selesai; ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-check-double fa-4x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr size="30px" width="100%">

    <div class="row col-xl-6 col-md-6 mb-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-9">
                        <h6 class="m-0 font-weight-bold text-primary">Data Penelitian</h6>
                    </div>
                    <div class="col-md-3">
                        <select name="year2" id="year2" class="form-control">
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
                    <div id="chart_area2" style="width: 500px; height: 400px;"></div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->

<!-- DATA PENELITIAN -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript">
    google.charts.load('current', {
        packages: ['corechart', 'bar']
    });
    google.charts.setOnLoadCallback();

    function load_monthwise_data2(year, title) {
        var temp_title = title + ' ' + year;
        $.ajax({
            url: "<?php echo base_url('verifikator/c_verifikator/fetch_data_grafik2'); ?>",
            method: "POST",
            data: {
                year: year
            },
            dataType: "JSON",
            success: function(data) {
                drawMonthwiseChart2(data, temp_title);
            }
        })
    }

    function drawMonthwiseChart2(chart_data, chart_main_title) {
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

        var chart = new google.visualization.PieChart(document.getElementById('chart_area2'));

        chart.draw(data, options);
    }
</script>

<script>
    $(document).ready(function() {

        var year = new Date().getFullYear();
        load_monthwise_data2(year, 'Data Penelitian tahun ');

        $('#year2').change(function() {
            var year = $(this).val();
            if (year != '') {
                load_monthwise_data2(year, 'Data Penelitian tahun ');
            }
        });
    });
</script>