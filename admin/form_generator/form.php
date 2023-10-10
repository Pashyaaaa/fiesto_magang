<?php
$data["Header"] = array(
	"logo" => array("label" => "Logo", "type" => "inputImage"),
);

$data["slide1"] = array(
	"slide1_img" => array("label" => "Slide 1", "type" => "inputImage"),
	"slide1_link" => array("label" => "Link Slide 1", "type" => "inputText"),
	"slide_teks" => array("label" => "Teks Slide", "type" => "inputTiny"),
	"slidemobile1_img" => array("label" => "Slide Mobile 1", "type" => "inputImage"),
);
$data["slide2"] = array(
	"slide2_img" => array("label" => "Slide 2", "type" => "inputImage"),
	"slide2_link" => array("label" => "Link Slide 2", "type" => "inputText"),
	"slide_teks2" => array("label" => "Teks Slide 2", "type" => "inputTiny"),
	"slidemobile2_img" => array("label" => "Slide Mobile 2", "type" => "inputImage"),
);
$data["slide3"] = array(
	"slide3_img" => array("label" => "Slide 3", "type" => "inputImage"),
	"slide3_link" => array("label" => "Link Slide 3", "type" => "inputText"),
	"slide_teks3" => array("label" => "Teks Slide 3", "type" => "inputTiny"),
	"slidemobile3_img" => array("label" => "Slide Mobile 3", "type" => "inputImage"),
);
$data["Banner Home"] = array(
	"image_banner1" => array("label" => "Images 1", "type" => "inputImage"),
	"text_banner1" => array("label" => "Title 1", "type" => "inputText"),
	"link_banner1" => array("label" => "Link 1", "type" => "inputText"),
	"image_banner2" => array("label" => "Images 2", "type" => "inputImage"),
	"text_banner2" => array("label" => "Title 2", "type" => "inputText"),
	"link_banner2" => array("label" => "Link 2", "type" => "inputText"),
	"image_banner3" => array("label" => "Images 3", "type" => "inputImage"),
	"text_banner3" => array("label" => "Title 3", "type" => "inputText"),
	"link_banner3" => array("label" => "Link 3", "type" => "inputText")
);

// $data["About Home"]=array(
// 		"image_contact"=>array("label"=>"Images","type"=>"inputImage"),
// 		"title_contact"=>array("label"=>"content","type"=>"inputTiny"),
// 		"button_contact"=>array("label"=>"Teks Button","type"=>"inputText"),
// 		"url_contact"=>array("label"=>"Link","type"=>"inputText"),
// );



$catalog_cat = $mysql->query_data("SELECT id,nama FROM catalogcat");
$data["Produk Blok"] = array(
	"title_catalog_block" => array("label" => "Title", "type" => "inputText"),
	"catalog_category" => array("label" => "Kategori", "type" => "inputSelect", "data" => $catalog_cat),
	"product_limit" => array("label" => "Limit", "type" => "inputText"),
);

$data["Section"] = array(
	"image_section" => array("label" => "Image Section", "type" => "inputImage"),
	"title_section" => array("label" => "Title Section", "type" => "inputText"),
	"content_section" => array("label" => "Content Section (Max 300 Character)", "type" => "inputTiny"),
);

// $data["Testimonies"]=array(
// 		"title-strength"=>array("label"=>"Limit","type"=>"inputText"),
// 		"testi_limit"=>array("label"=>"Max Thumbnail","type"=>"inputText"),
// );

/*Cara buat template option untuk category news*/
// $cat_news=$mysql->query_data("SELECT id,nama FROM newscat");
// $data["Artikel"]=array(
// 		"news_testi"=>array("label"=>"Judul","type"=>"inputText"),
// 		"news_category"=>array("label"=>"Kategori","type"=>"inputSelect","data"=>$cat_news),
// 		"news_limit"=>array("label"=>"Max Thumbnail","type"=>"inputText"),
// );


// $data["Video"]=array(
// "video_title"=>array("label"=>"Title","type"=>"inputText"),
// "video_limit"=>array("label"=>"Limit","type"=>"inputText"),
// );



$data["Footer"] = array(
	"socialmedia1" => array("label" => "Social Media 1", "type" => "inputText"),
	"socialmedia1_url" => array("label" => "Social Media 1 URL", "type" => "inputText"),
	"socialmedia2" => array("label" => "Social Media 2", "type" => "inputText"),
	"socialmedia2_url" => array("label" => "Social Media 2 URL", "type" => "inputText"),
	"socialmedia3" => array("label" => "Social Media 3", "type" => "inputText"),
	"socialmedia3_url" => array("label" => "Social Media 3 URL", "type" => "inputText"),
	"alamat" => array("label" => "Alamat", "type" => "inputText"),
	"alamat_gmap_url" => array("label" => "Alamat Google Map", "type" => "inputText"),
	"ecommerce_1" => array("label" => "E-Commerce 1", "type" => "inputImage"),
	"ecommerce1_url" => array("label" => "E-Commerce 1 URL", "type" => "inputText"),
	"ecommerce_2" => array("label" => "E-Commerce 2", "type" => "inputImage"),
	"ecommerce2_url" => array("label" => "E-Commerce 2 URL", "type" => "inputText"),
	"ecommerce_3" => array("label" => "E-Commerce 3", "type" => "inputImage"),
	"ecommerce3_url" => array("label" => "E-Commerce 3 URL", "type" => "inputText"),
	"copyright" => array("label" => "Copyright ", "type" => "inputTiny"),
);

$data["Mobile Link"] = array(
	"phone_number" => array("label" => "Telpon", "type" => "inputText"),
	"wa_number" => array("label" => "WA", "type" => "inputText"),
	"email_link" => array("label" => "Email", "type" => "inputText"),
	"map_link" => array("label" => "Map link", "type" => "inputText"),
	"line_link" => array("label" => "Line", "type" => "inputText"),
	"bbm_link" => array("label" => "BBM", "type" => "inputText"),
);
