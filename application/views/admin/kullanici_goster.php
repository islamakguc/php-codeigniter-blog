<?php 
$this->load->view('admin/_header');
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
							<a href="<?= base_url() ?>/admin/kullanicilar">Kullanıcılar</a>
						</li>
						<li>
							<a href="<?= base_url() ?>/admin/kullanicilar/goster/<?=$this->session->oturum_data['id']?>">Profil</a>
						</li>
					</ul>
				</div><?php if ($this->session->flashdata("sonuc"))
				{ ?>
				<div class="content-panel">
					
					<div class = "alert alert-success">
						<button type = "button" class = "close" data-dismiss="alert">x</button>
						<strong> İşlem: </strong> <?=$this->session->flashdata("sonuc")?>
					</div>

				</div>
				<?php }else { ?>

				<div class="panel panel-default">
					<div class="panel-heading">
						Kullanıcı Bilgileri
					</div>
					<div class="panel-body">
						<table class="table">

							<tr>
								<th>Adı Soyadı</th>
								<td><?=$veri[0]->ad?></td>
							</tr>

							<tr>
								<th>Email Adresi</th>
								<td><?=$veri[0]->mail?></td>
							</tr>

							<tr>
								<th>Yetki</th>
								<td><?=$veri[0]->yetki?></td>
							</tr>

							<tr>
								<th>Durum</th>
								<td><?php 
									if($veri[0]->durum==1){
										echo "Aktif";
									}else
									{
										echo "Pasif";
									}
									?></td>
								</tr>
								<tr>
									<th>Kayıt Tarihi</th>
									<td><?=$veri[0]->ktarih?></td>
								</tr>

							</table>

						</div>
					</div><?php }?>
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
