<?php
	$templateversion = '2';
	$template_option = 1;
//SECTION WIDTH
	$widgetawidth = '220';	//Lebar widget A, sesuaikan CSS
	$widgetbwidth = '0';	//Lebar widget B, sesuaikan CSS
	$mainblockwidth = '1116';	//Lebar blok utama, sesuaikan CSS
	
//IMAGES
	$cfg_max_cols = 3;	//Jumlah kolom thumbnail (show_me_the_images)
	$cfg_max_width = 1200;	//Lebar gambar besar (berlaku untuk semua core modul yang mengandung gambar). Nilai yang disarankan untuk tempalte 2 kolom = 660, 3 kolom = 480 (menyesuaikan lebar blok utama (2 kolom = 700, 3 kolom = 520)
	$cfg_thumb_width = 400;		//Sisi terpanjang thumbnail (berlaku untuk semua core modul yang mengandung gambar)

//FLASH BAWAAN (JIKA ADA)	
	$flashheaderwidth = '960';	//Lebar file Flash (jika ada). Jika tidak ada dicomment saja (tambahkan "//" di depan)
	$flashheaderheight = '350';	//Tinggi file Flash (jika ada). Jika tidak ada dicomment saja (tambahkan "//" di depan)

//CAROUSEL --> AWAS! BUKAN JCAROUSEL/MARQUEE
	$cfg_carousel_height = 300;	//Tinggi animasi carousel --> AWAS! BUKAN jcarousel (marquee). Tidak ada $cfg_carousel_width karena selalu di-set sama dengan $cfg_max_width
	$carousel_bgcolor = '#2f2f2d';	//Background carousel --> AWAS! BUKAN jcarousel (marquee)
	$carousel_radius_x = "200";	//Radius elips arah sumbu x
	$carousel_radius_y = "100";	//Radius elips arah sumbu y
	$warnajudul = "#FFFFFF";
	$warnaket = "#FFFFFF";
	$warnaharga = "#FFFFFF";
	$warnaharganormal = "#ff0000";
	$warnahargadiskon = "#339933";
	$warnahemat = "#FFFFFF";
	

//JCAROUSEL/MARQUEE
	$jumlahtampilanmarquee = 3;	//Jumlah foto yang ditampilkan di jcarousel (marquee)
	//width height jcarousel/marquee diset di "template/[namatemplate]/css/jcarousel/skin.css"
	$autoperdetik = 3;
	$jumlahtampilanprodukterlaris = 4;
	
//POSISI WIDGET: _TOP, _BOTTOM, _LEFT, RIGHT
	$posisiwidgeta = _LEFT;	//default = _LEFT
	$posisiwidgetb = _RIGHT;	//default = _RIGHT
//VERSI TEMPLATE
	$templateversion=2;
?>