<footer>
	<div id="footerlink">
		<span></span>
			<div class="footer-item fs-1">
				<div class="wow fadeInUp social-media text-center ">
					<ul class="list-unstyled">
						<li><a href="<?php echo $template->content('socialmedia1_url'); ?>" class=""><?php echo $template->content('socialmedia1'); ?></a></li>
						<li><a href="<?php echo $template->content('socialmedia2_url'); ?>" class=""><?php echo $template->content('socialmedia2'); ?></a></li>
						<li><a href="<?php echo $template->content('socialmedia3_url'); ?>" class=""><?php echo $template->content('socialmedia3'); ?></a></li>
					</ul>
				</div>
				<div class=" wow fadeInUp text-center">
					<p><a href="<?php echo $template->content('alamat_gmap_url'); ?>"><?php echo $template->content('alamat'); ?></a></p>
				</div>
				<div class="ecommerce wow fadeInUp">
					<a href="<?php echo $template->content('ecommerce1_url'); ?>"><img src="<?php echo $template->image_url('ecommerce_1'); ?>" alt=""></a>
					<a href="<?php echo $template->content('ecommerce2_url'); ?>"><img src="<?php echo $template->image_url('ecommerce_2'); ?>" alt=""></a>
					<a href="<?php echo $template->content('ecommerce3_url'); ?>"><img src="<?php echo $template->image_url('ecommerce_3'); ?>" alt=""></a>
				</div>
			</div>
	</div>
	<div id="copyright">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<?php echo $template->content('copyright'); ?>
				</div>
			</div>
		</div>
	</div>
</footer>

<!--<div id="button-mobile">
		<div class="menu-button-mobile">
			<ul class="list-inline">
				<?php if ($template->content('phone_number') != "") { ?>
				<li><a href="tel:<?php echo $template->content('phone_number'); ?>"><span class="button-phone-icon"></span></a></li>
				<?php } ?>
				<?php if ($template->content('wa_number') != "") { ?>
				<li><a href="https://api.whatsapp.com/send?phone=<?php echo $template->content('wa_number'); ?>"><span class="button-wa-icon"></span></a></li>
				<?php } ?>
				<?php if ($template->content('email_link') != "") { ?>
				<li><a href="mailto:<?php echo $template->content('email_link'); ?>"><span class="button-email-icon"></span></a></li>
				<?php } ?>
				<?php if ($template->content('map_link') != "") { ?>
				<li><a href="<?php echo $template->content('map_link'); ?>"><span class="button-map-icon"></span></a></li>
				<?php } ?>
				<?php if ($template->content('line_link') != "") { ?>
				<li><a href="tel:<?php echo $template->content('line_link'); ?>"><span class="button-line-icon"></span></a></li>
				<?php } ?>
				<?php if ($template->content('bbm_link') != "") { ?>
				<li><a href="bbmi://<?php echo $template->content('bbm_link'); ?>"><span class="button-bbm-icon"></span></a></li>
				<?php } ?>
			</ul>
		</div>
	</div>-->