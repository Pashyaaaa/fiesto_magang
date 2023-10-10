<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?php echo $config_site_metadescription;?>">
    <meta name="keyword" content="<?php echo $config_site_metakeyword;?>">
    <meta name="author" content="fiesto.com">
	<link href="<?php echo $favicon ?>" rel="SHORTCUT ICON" />

    <title><?php echo $config_site_titletag;?></title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;0,700;1,400;1,500&display=swap" rel="stylesheet">



    <!-- Bootstrap Core CSS -->
    <link href="<<<TEMPLATE_URL>>>/css/bootstrap.min.css" rel="stylesheet">
	<!--<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">-->
    <!-- Custom CSS -->
    <link href="<<<TEMPLATE_URL>>>/css/basic.css?v=2.8" rel="stylesheet">
    <link href="<<<TEMPLATE_URL>>>/css/animate.css" rel="stylesheet">
	<link href="<<<TEMPLATE_URL>>>/css/owl.carousel.min.css" rel="stylesheet"/>
    <link href="<<<TEMPLATE_URL>>>/css/owl.theme.default.css" rel="stylesheet"/>
    <link href="<<<TEMPLATE_URL>>>/css/owl.transitions.css" rel="stylesheet"/>
	<link href="<<<TEMPLATE_URL>>>/js/fancybox/jquery.fancybox.css" rel="stylesheet"/>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
<?php
$template = new TemplateForm();
?>
<style>
#who-we-are{background-image:url(<?php echo $template->image_url('bg_who_block');?>);background-size:cover;}
@media(min-width:768px){
}
@media(max-width:767px){
}
<?php if(!$_GET['p']) {?>
<?php } else {?>
h1.page-header{font-size:31pt}
.content-wrapper {
    padding: 50px 15px 100px;
}

@media(min-width:768px){
}
@media(max-width:767px){
	nav#header-site {padding-bottom:0;}
	h1.page-header {
		font-size: 22pt !important;
		margin-bottom: 10px;
	}
}
<?php } ?>

<?php if ($_GET['p'] == 'catalog' && ($_GET['action'] == 'detail')) {?>
div#content-center {
    position: relative;
}
	#description_product > table > tbody > tr > td,#description_product > table > tbody > tr,#description_product > table > tbody,#description_product > table {display:block}
	#description_product > table > tbody > tr > td {padding-top:10px;padding-bottom:0px}
	#description_product > table:first-child{background:transparent}
	#description_product > table:first-child > tbody > tr > td{padding:0;}
	#description_product > table > tbody{margin:0 auto;padding:0 15px}
@media (max-width: 767px){
	#description_product > table > tbody {
		padding: 0 5px;
	}
}
<!--/*
	div#content-center:before {
		content:"";
		display:block;
		position:absolute;
		background:#f3f3f3;
		top:0;
		left:0;
		height:400px;
		width:100%;
	}
	#description_product > table:nth-child(odd) {
		background: #f3f3f3;
	}
	div#description_product {
		margin: 0 -30px;
	}
	#content-center .container{width:100%;}
@media (max-width: 767px){
	#description_product > table > tbody {
		margin: 0 auto;
		padding: 0 25px;
	}
	div#content-center:before {
		height: 200px;
	}
}
@media (min-width: 768px){
	#description_product > table > tbody{
		width: 750px;
	}
}
@media (min-width: 992px){
	#description_product > table > tbody{
		width: 970px;
	}
}
@media (min-width: 1200px){
	#description_product > table > tbody{
		width: 1080px;
	}
}*/-->
<?php } ?>
</style>
</head>

<body>
<div id="fixed">
<?php
// $template = new TemplateForm();
include "header.php";
if(!$_GET['p']) {
	
} else {
	 echo '<div id="content-center">';
}
echo $display_main_content_block;
if(!$_GET['p']) {
	
} else {
	 echo '</div>';
}
include "footer.php";
?>	
</div>
    <script src="<<<TEMPLATE_URL>>>/js/jquery.min.js"></script>
    <script src="<<<TEMPLATE_URL>>>/js/bootstrap.min.js"></script>
    <script src="<<<TEMPLATE_URL>>>/js/owl.carousel.min.js"></script>
    <script src="<<<TEMPLATE_URL>>>/js/wow.js"></script>
	<script src="<<<TEMPLATE_URL>>>/js/fancybox/jquery.fancybox.pack.js"></script>
	<script>
		$(function() {
			/* popup gallery */
			$('.fancybox').fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			
			/* popup gallery */
			$('.fancybox-media').fancybox({
				maxWidth	: 800,
				maxHeight	: 600,
				fitToView	: false,
				width		: '70%',
				height		: '70%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			$('#slide-home').owlCarousel({
				loop:true,
				margin:0,
				nav:false,
				dots:true,
				autoplay:true,
				items:1,
				navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #000;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
			})
			$('#close-menu').click( function() {
				$(".navbar-collapse.in").removeClass("in");
				$("html").removeClass("menu-active");
			} );
			$('.navbar-toggle').click( function() {
				$("html").addClass("menu-active");
			} );
			$('.bg-black').click( function() {
				$(".navbar-collapse.in").removeClass("in");
				$("html").removeClass("menu-active");
			} );
			$('.navbar-inverse .navbar-toggle').click( function() {
				$("html").addClass("menu-active");
			} );
			$('#content-blocker').click( function() {
				$("html").removeClass("menu-active");
			} );
		});
		wow = new WOW(
		  {
			animateClass: 'animated',
			offset:       100,
			callback:     function(box) {
			  console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
			}
		  }
		);
		wow.init();
	</script>

</body>

</html>
