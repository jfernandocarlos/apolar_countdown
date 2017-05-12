<div class="wrap">
	<h2 style="font-weight: bold; margin-bottom: 15px;"> <span style="font-size: 30px;" class="dashicons dashicons-backup"></span>&nbsp;&nbsp;Apolar Countdown</h2>

	<div class="admin-countdown-content">

		<p>O plugin <strong>Apolar Countdown</strong> foi desenvolvido unicamente para atender as necessidades e estrutura do Site Apolar,
			sua chamada se da através de shortcode, sendo possivel passar alguns parametros que podem afetar tanto seu funcionamento
			quanto seu aspecto visual.</p>

		<h3>Possíveis Paramêtros:</h3>

		<ul class="possiveis">
			<li><strong>referencia</strong> - Referência do imóvel que deseja aplicar o countdown, baseado na referência do imóvel o plugin irá buscar
				a data para realizar a contagem regressiva.</li>
			<li><strong>size</strong> - O tamanho que deseja que o countdown apareça, pode ser: <b>md</b> (médio), <b>sm</b> (pequeno) ou <b>lg</b> (grande)</li>
			<li><strong>data</strong> - Caso não seja passado uma referência de imóvel, voce pode optar passar uma data. Ex: <b><?php echo date("d/m/Y") ?></b></li>
		</ul>

		<h3>Exemplos de uso:</h3>

		<div class="exemplo">
			<span class="exemplo-code">[apocountdow data='<?php echo date("d/m/Y",strtotime(date("Y-m-d") . " + 5 DAYS")) ?>' size='sm']</span>
			<?php do_shortcode("[apocountdow data='" . date("d/m/Y",strtotime(date("Y-m-d") . " + 5 DAYS")) . "' size='sm']"); ?>
		</div>

		<div class="exemplo">
			<span class="exemplo-code">[apocountdow data='<?php echo date("d/m/Y",strtotime(date("Y-m-d") . " + 10 DAYS")) ?>' size='md']</span>
			<?php do_shortcode("[apocountdow data='" . date("d/m/Y",strtotime(date("Y-m-d") . " + 10 DAYS")) . "' size='md']"); ?>
		</div>

		<div class="exemplo">
			<span class="exemplo-code">[apocountdow referencia='1141225' size='lg']</span>
			<?php do_shortcode("[apocountdow data='" . date("d/m/Y",strtotime(date("Y-m-d") . " + 15 DAYS")) . "' size='lg']"); ?>
		</div>


		<div class="countdown-footer">

			Apolar Countdown - <?php echo date("Y") ?>

		</div>

	</div>

	
</div>