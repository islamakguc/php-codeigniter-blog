<?php 
$query1=$this->db->get("ayarlar");
$data1["veri"]=$query1->result();
$this->load->view('admin/_header',$data1);
$this->load->view('admin/_sidebar');
?>
<!-- Page Content -->
<div id="page-wrapper">
	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<br>
				<div>
					<ul class="breadcrumb">
						<li>
							<a href="<?= base_url() ?>admin/Home"><i class="glyphicon glyphicon-home"></i></a>
						</li>
						<li>
							<a href="<?= base_url() ?>admin/Mesaj">Mesaj</a>
						</li>
						<li>
							<a href="<?= base_url() ?>admin/Mesaj/oku/<?=$mesaj[0]->id?>">Mesaj Oku</a>
						</li>
					</ul>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading">
						Mesaj İçeriği 
					</div>
					<div class="panel-body">
						<table class="table">

							<tr>
								<th style="width: 150px;">Adı Soyadı</th>
								<td><?=$mesaj[0]->gonderici_adi?></td>
							</tr>

							<tr>
								<th>Konu</th>
								<td><?=$mesaj[0]->baslik?></td>
							</tr>
							<tr>
								<th>Tarih</th>
								<td><?=$mesaj[0]->tarih?></td>
							</tr>
							<tr>
								<th>İçerik</th>
								<td><?=$mesaj[0]->mesaj?></td>
							</tr>
						</table>

					</div>
				</div>
				<!-- /.col-lg-12 -->
			</div>
			<!-- /.row -->
		</div>
		<!-- /.container-fluid -->
	</div>
	<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->
<?php 
$this->load->view('admin/_footer');
?>
