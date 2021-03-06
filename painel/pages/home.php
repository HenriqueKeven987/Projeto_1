
<?php
	$usuariosOnline = Painel::listarUsuariosOnline();

	$usuariosVisitas = Painel::visitas();

	$usuariosHoje = Painel::visitasHoje(); 

?>
	
	<div class="box-content w100">

		<h2 class="h2-contents"><i class="fas fa-home"></i> Painel</h2>
		
		<div class="box-metricas">

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Usuarios Online</h2>
					<p><?php echo count($usuariosOnline); ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Total de visitas</h2>
					<p><?php echo $usuariosVisitas->rowCount(); ?> </p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="box-metrica-single">
				<div class="box-metrica-wraper">
					<h2>Visitas hoje</h2>
					<p><?php echo $usuariosHoje->rowCount(); ?></p>
				</div><!--box-metrica-wraper-->
			</div><!--box-metrica-single-->

			<div class="clear"></div>
		</div><!--box-metricas-->

	</div><!--box-content w100-->

	<div class="box-content w50 left">
		<h2 class="h2-contents"><i class="fa fa-rocket"></i> Usuarios Online no Site</h2>

		<div class="table-responsive">

			<div class="row">

				<div class="col">
					<span>Ip</span>
				</div><!--col-->

				<div class="col">
					<span>ultima acao</span>
				</div><!--col-->

				<div class="clear"></div>

			</div><!--row-->

			<!--repetindo a row-->
			<?php foreach ($usuariosOnline as $key => $value) {
				
			 ?>
			<div class="row">

				<div class="col">
					<span><?php echo $value['ip']; ?></span>
				</div><!--col-->

				<div class="col">
					<!--  date dps convertendo para o formato,strtotime converter em segundos-->
					<span><?php echo date('d/m/Y H:i:s',strtotime($value['ultima_acao']));  ?></span>
				</div><!--col-->

				<div class="clear"></div>

			</div><!--row-->

		<?php } ?>

		</div><!--table-responsive-->

	</div><!--box-content-->

	<div class="box-content w50 right">
		<h2 class="h2-contents"><i class="fa fa-user"></i> Usuarios do Painel</h2>

		<div class="table-responsive">

			<div class="row">

				<div class="col">
					<span>Nome</span>
				</div><!--col-->

				<div class="col">
					<span>Cargo</span>
				</div><!--col-->

				<div class="clear"></div>

			</div><!--row-->

			<!--repetindo a row-->
			<?php

				$usuariosPainel = Mysql::conectar()->prepare("SELECT * FROM `tb-admin.usuarios`");
				$usuariosPainel->execute();
				$usuariosPainel = $usuariosPainel->fetchAll();

				foreach ($usuariosPainel as $key => $value) {
				
			 ?>
			<div class="row">

				<div class="col">
					<span><?php echo $value['usuario']; ?></span>
				</div><!--col-->

				<div class="col">
					<!--  date dps convertendo para o formato,strtotime converter em segundos-->
					<span><?php echo pegaCargo($value['cargo']); ?></span>
				</div><!--col-->

				<div class="clear"></div>

			</div><!--row-->

		<?php } ?>

		</div><!--table-responsive-->

	</div><!--box-content-->


</body>
</html>