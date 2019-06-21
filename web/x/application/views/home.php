
	<header>
			<div class="container">
				<div class="slider-container">
					<div class="intro-text">
						<div class="intro-lead-in">Escritório de advocacia</div>
						<div class="intro-heading">Augusto cardoso e associados</div>
						<a href="<?php echo base_url(); ?>#portfolio" class="page-scroll btn btn-xl">Conheça nossas áreas de atuação</a>
					</div>
				</div>
			</div>
		</header>
<section id="about" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>SOBRE</h2>
							<p> Nosso escritorio facilita a conexão de advogados, correspondendes juridicos facilitando assim para a modernização do mercado juridico. <br>
							Localizado em Alvorada/RS
								</p>
						</div>
					</div>
				</div>
				
			</div>
			<!-- /.container -->
		</section>
		
		<section class="overlay-dark bg-img1 dark-bg short-section">
			<div class="container text-center">
				<div class="row">
					<div class="col-md-6 mb-sm-30">
						<div class="counter-item">
							<a class="page-scroll" href="#areas">
							<h6>Areas de atuação</h6>
							</a>
						</div>
					</div>
					<div class="col-md-6 mb-sm-30">
						<div class="counter-item">
							<a class="page-scroll" href="#team">
							<h6>Equipe</h6>
							</a>
						</div>
					</div>

					
		</section>
		<section id="areas" class="light-bg">
			<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
					<div class="section-title">
						<h2>Áreas de atuação</h2>
						<p>Conheça nossas áreas de atuação.</p>
					</div>
				</div>
			</div>
			<div class="row">
<?php 
				if (!empty($areas)) {
					foreach ($areas as $area) { ?>
						<div class="col-md-4">
							<div class="ot-portfolio-item">
								<figure class="effect-bubba">
									<img src="<?=base_url().$area["area_img"]?>" alt="img02" class="img-responsive center-block"/>
									<figcaption>
										<a href="#" data-toggle="modal" data-target="#area_<?=$area["area_id"]?>"></a>
									</figcaption>
								</figure>
							</div>
						</div>

						<div class="modal fade" id="area_<?=$area["area_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
							<div class="modal-dialog" role="document">
								<div class="modal-content">
									
									<div class="modal-header">
										<button type="button" class="close" data-dismiss="modal" aria-label="X"><span aria-hidden="true">&times;</span></button>
										<h4 class="modal-title" id="Modal-label-1"><?=$area["area_name"]?></h4>
									</div>
									
									<div class="modal-body">
										<img src="<?=base_url().$area["area_img"]?>" alt="img01" class="img-responsive center-block" />
										<p><?=$area["area_description"]?></p>
									</div>
									
									<div class="modal-footer">
										<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
									</div>
								</div>
							</div>
						</div>
				<?php } // FOREACH
				} // IF ?>
				</div>
			</div><!-- end container -->







<section id="team" class="light-bg">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 text-center">
						<div class="section-title">
							<h2>Nossa equipe</h2>
							<p>Conheça nossa equipe.</p>
						</div>
					</div>
				</div>
				<div class="row">
					<?php 
					if (!empty($team)) {
						foreach ($team as $member) { ?>

							<div class="col-md-3">
								<a href="#" data-toggle="modal" data-target="#member_<?=$member["member_id"]?>">
									<div class="team-item">
										<div class="team-image">
											<img src="<?=base_url().$member["member_photo"]?>" class="img-responsive img-circle" alt="author">
										</div>
										<div class="team-text">
											<h3><?=$member["member_name"]?></h3>
										</div>
									</div>
								</a>
							</div>

							<div class="modal fade" id="member_<?=$member["member_id"]?>" tabindex="-1" role="dialog" aria-labelledby="Modal-label-1">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
											<h4 class="modal-title" id="Modal-label-1"><?=$member["member_name"]?></h4>
										</div>
										
										<div class="modal-body">
											<img src="<?=base_url().$member["member_photo"]?>" alt="img01" class="img-responsive center-block" />
											<p><?=$member["member_description"]?></p>
										</div>
										
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
										</div>
									</div>
								</div>
							</div>
					<?php } // FOREACH
					} // IF ?>
				</div>
			</div>
		</section>



		<p id="back-top">
			<a href="#top"><i class="fa fa-angle-up"></i></a>
		</p>