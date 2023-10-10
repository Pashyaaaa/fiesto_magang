
	<!-- Navigation -->
	<div id="content-blocker"></div>
    <nav id="header-site" class="navbar navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <a class="navbar-brand" href="<?php echo $cfg_app_url ?>"><img src="<?php echo $template->image_url('logo');?>" alt="Logo"></a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div id="close-menu">✕</div>
				<?php echo $display_menu; ?>
			</div>
			<div class="bg-black"></div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
