<?php
ob_start();
$template = new TemplateForm();

?>

	<!-- Home -->

	<div class="home">
		<div class="home_slider_container">
			<!-- Home Slider -->
			<div class="owl-carousel owl-theme home_slider">
				
				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php echo $template->image_url('slide1_img');?>)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1><?php echo $template->content('slide1_title');?></h1></div>
										<div class="home_text">
											<p><?php echo $template->content('slide1_content');?></p>
										</div>
										<div class="button home_button">
											<a href="<?php echo $template->content('slide1_link');?>">read more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
								<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php echo $template->image_url('slide2_img');?>)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1><?php echo $template->content('slide2_title');?></h1></div>
										<div class="home_text">
											<p><?php echo $template->content('slide2_content');?></p>
										</div>
										<div class="button home_button">
											<a href="<?php echo $template->content('slide2_link');?>">read more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
				<!-- Slider Item -->
				<div class="owl-item">
					<div class="home_slider_background" style="background-image:url(<?php echo $template->image_url('slide3_img');?>)"></div>
					<div class="home_content">
						<div class="container">
							<div class="row">
								<div class="col">
									<div class="home_content_inner">
										<div class="home_title"><h1><?php echo $template->content('slide3_title');?></h1></div>
										<div class="home_text">
											<p><?php echo $template->content('slide3_content');?></p>
										</div>
										<div class="button home_button">
											<a href="<?php echo $template->content('slide3_link');?>">read more</a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>


			</div>

			<!-- Slider Progress -->
			<div class="home_slider_progress"></div>
		</div>
	</div>

	<!-- 3 Boxes -->

	<div class="boxes">
		<div class="container">
			<div class="row">
				
				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box working_hours">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width:29px; height:29px;"><img src="<<<TEMPLATE_URL>>>/images/alarm-clock.svg" alt=""></div></div>
						<div class="box_title">Working Hours</div>
						<div class="working_hours_list">
							<?php echo $template->content("s_service"); ?>
						</div>
					</div>
				</div>

				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box box_appointments">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 29px; height:29px;"><img src="<<<TEMPLATE_URL>>>/images/phone-call.svg" alt=""></div></div>
						<div class="box_title">Appointments</div>
						<div class="box_text"><?php echo $template->content("s_appointment"); ?></div>
					</div>
				</div>

				<!-- Box -->
				<div class="col-lg-4 box_col">
					<div class="box box_emergency">
						<div class="box_icon d-flex flex-column align-items-start justify-content-center"><div style="width: 37px; height:37px; margin-left:-4px;"><img src="<<<TEMPLATE_URL>>>/images/bell.svg" alt=""></div></div>
						<div class="box_title">Emergency Cases</div>
						<?php echo $template->content("s_emergency"); ?>

					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- About -->

	<div class="about">
		<div class="container">
			<div class="row row-lg-eq-height">
				
				<!-- About Content -->
				<div class="col-lg-7">
					<div class="about_content">
						<div class="section_title"><h2><?php echo $template->content("s1_judul"); ?></h2></div>
						<div class="about_text">
							<?php echo $template->content("s1_content"); ?>
						</div>
						<div class="button about_button">
							<a href="<?php echo $template->content("s1_link"); ?>">read more</a>
						</div>
					</div>
				</div>

				<!-- About Image -->
				<div class="col-lg-5">
					<div class="about_image"><img src="<?php echo $template->image_url("s1_logo"); ?>" alt=""></div>
				</div>
			</div>
		</div>
	</div>

	<!-- Departments -->

	<div class="departments">
		<div class="departments_background parallax-window" data-parallax="scroll" data-image-src="<<<TEMPLATE_URL>>>/images/departments.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title section_title_light"><h2><?php echo $template->content('bn_judul')?></h2></div>
				</div>
			</div>
			<div class="row departments_row row-md-eq-height">
				<?php
				$blog_news=$template->getModulData(
				$modul_table="newsdata",
				$filter_var=array("cat_id"),
				$filter_val=array($template->content('bn_category')),//disini value untuk filter ambil dari variable di form.php 
				$field="id,judulberita,summary,thumb,url",
				$path_images="news/large",
				$limit=4,
				$order="id DESC");
				
				
				foreach($blog_news as $i => $v){
				list($thumb)=explode(":",$v['thumb']);
				?>
				<!-- Department -->
				<div class="col-lg-3 col-md-6 dept_col">
					<div class="dept">
						<div class="dept_image"><img src="<?php echo "$cfg_app_url/file/news/large/".$thumb;?>" alt=""></div>
						<div class="dept_content text-center">
							<div class="dept_title"><?php echo $v['judulberita'];?></div>
							<div class="dept_subtitle"><?php echo $v['summary'];?></div>
						</div>
					</div>
				</div>
				<?php
				}
				?>
				
				
			</div>
		</div>
	</div>

	<!-- Services -->

	<div class="services">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title"><h2><?php echo $template->content('sc_judul')?></h2></div>
				</div>
			</div>
			<div class="row services_row">
				<?php
				$blog_news=$template->getModulData(
				$modul_table="newsdata",
				$filter_var=array("cat_id"),
				$filter_val=array($template->content('sc_category')),//disini value untuk filter ambil dari variable di form.php 
				$field="id,judulberita,summary,thumb,url",
				$path_images="news/large",
				$limit=4,
				$order="id DESC");
				
				
				foreach($blog_news as $i => $v){
				list($thumb)=explode(":",$v['thumb']);
				?>
				<!-- Service -->
				<div class="col-lg-4 col-md-6 service_col">
					<a href="services.html">
						<div class="service text-center trans_200">
							<div class="service_icon"><img class="svg" src="<?php echo "$cfg_app_url/file/news/large/".$thumb;?>" alt=""></div>
							<div class="service_title trans_200"><?php echo $v['judulberita'];?></div>
							<div class="service_text">
								<?php echo $v['summary'];?>
							</div>
						</div>
					</a>
				</div>
				<?php
				}
				?>
			</div>
		</div>
	</div>

	<!-- Call to action -->

	<div class="cta">
		<div class="cta_background parallax-window" data-parallax="scroll" data-image-src="<<<TEMPLATE_URL>>>/images/cta.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="cta_content text-center">
						<h2>Need a personal health plan?</h2>
						<p>Duis massa massa, mollis vel ullamcorper quis, finibus et urna. Aliquam ac eleifend metus. Ut sollicitudin risus ex</p>
						<div class="button cta_button"><a href="#">request a plan</a></div>
					</div>
				</div>
			</div>
		</div>		
	</div>
<?php
$display_main_content_block .= ob_get_clean();
?>
