<!DOCTYPE HTML>
<html>

<head>
	<!-- Main content -->

	<section class="content">
		<div class="container-fluid">
			<!-- Small boxes (Stat box) -->
			<div class="row">
				<div class="col-lg-3 col-md-6 col-sm-6">
					<!-- small box -->
					<div class="small-box bg-info">
						<div class="inner">
							<h3> <?php echo $karyawan ?></h3>

							<p>Jumlah Karyawan</p>
						</div>
						<div class="icon">
							<i class="bi bi-people-fill"></i>
						</div>
						<?php if ($this->session->userdata('role') != '2') { ?>
							<a href="<?php echo site_url('karyawan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>
				<!-- ./col -->

				<div class="col-lg-3 col-md-6 col-sm-6">
					<!-- small box -->
					<div class="small-box bg-success">
						<div class="inner">
							<h3><?php echo $unit ?><sup style="font-size: 20px"></sup></h3>

							<p>Jumlah Unit</p>
						</div>
						<div class="icon">
							<i class="bi bi-list-task"></i>
						</div>
						<?php if ($this->session->userdata('role') != '2') { ?>
							<a href="<?php echo site_url('unit') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
						<?php } ?>
					</div>
				</div>
				<!-- ./col -->
				<?php if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '2' or $this->session->userdata('role') == '5' or $this->session->userdata('role') == '3') { ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<!-- small box -->
						<div class="small-box bg-warning">
							<div class="inner">
								<h3><?php echo $timesheet ?></h3>

								<p>Jumlah Timesheet</p>
							</div>
							<div class="icon">
								<i class="bi bi-pencil-square"></i>
							</div>
							<?php if ($this->session->userdata('role') != '2') { ?>
								<?php if ($this->session->userdata('role') == '3') { ?>
									<a href="<?php echo site_url('supervisor') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								<?php } ?>
								<?php if ($this->session->userdata('role') != '3') { ?>
									<a href="<?php echo site_url('timesheet') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
								<?php } ?>
							<?php } ?>
						</div>
					</div>
				<?php } ?>
				<!-- ./col -->
				<?php if ($this->session->userdata('role') == '1' or $this->session->userdata('role') == '2') { ?>
					<div class="col-lg-3 col-md-6 col-sm-6">
						<!-- small box -->
						<div class="small-box bg-danger">
							<div class="inner">
								<?php foreach ($jam as $dt) : ?>
									<h3><?php echo $dt['jam']; ?></h3>
								<?php endforeach ?>
								<p>Total Jam</p>
							</div>
							<div class="icon">
								<i class="bi bi-clock"></i>
							</div>
							<?php if ($this->session->userdata('role') != '2') { ?>
								<a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
							<?php } ?>
						</div>
					</div>
				<?php } ?>

				<!-- ./col -->
			</div>
		</div>
	</section>

	<!-- Chart -->
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-6 col-md-6">
				<div class="chart-container small-chart">
					<canvas id="genderChart"></canvas>
				</div>
			</div>
			<div class="col-lg-6 col-md-6">
				<div class="chart-container small-chart">
					<canvas id="daerahChart"></canvas>
				</div>
			</div>
		</div>
	</div>

	<style>
		.small-chart {
			width: 570px;
			height: 570px;
		}
	</style>

	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-labels"></script>
	<script>
		// Data karyawan berdasarkan gender
		var genderData = {
			labels: ["Laki-laki", "Perempuan"],
			datasets: [{
				data: [75, 50], // Masukkan data jumlah karyawan per jenis kelamin
				backgroundColor: ["blue", "pink"],
			}],
		};

		// Konfigurasi chart berdasarkan gender
		var genderConfig = {
			type: "pie",
			data: genderData,
			options: {
				responsive: true,
				plugins: {
					title: {
						display: true,
						text: "Jumlah Karyawan berdasarkan Gender",
					},
					labels: {
						render: 'percentage',
						fontColor: ['white', 'white'],
						precision: 2
					}
				},
			},
		};

		// Membuat chart berdasarkan gender
		var genderCtx = document.getElementById("genderChart").getContext("2d");
		new Chart(genderCtx, genderConfig);

		// Data karyawan per daerah
		var daerahData = {
			labels: ["Jakarta", "Bandung", "Surabaya", "Medan"],
			datasets: [{
				data: [150, 100, 80, 50], // Masukkan data jumlah karyawan per daerah
				backgroundColor: ["blue", "green", "orange", "red"],
			}],
		};

		// Konfigurasi chart per daerah
		var daerahConfig = {
			type: "bar",
			data: daerahData,
			options: {
				responsive: true,
				scales: {
					y: {
						beginAtZero: true,
						title: {
							display: true,
							text: "Jumlah Karyawan",
						},
					},
				},
				plugins: {
					title: {
						display: true,
						text: "Jumlah Karyawan per Daerah",
					},
					labels: {
						render: 'percentage',
						fontColor: 'black',
						precision: 0
					}
				},
			},
		};

		// Membuat chart per daerah
		var daerahCtx = document.getElementById("daerahChart").getContext("2d");
		new Chart(daerahCtx, daerahConfig);
	</script>


</head>

</html>