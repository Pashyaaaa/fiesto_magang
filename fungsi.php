<?php 

function drawMenu() {
    global $cfg_app_url, $cfg_app_path, $urlfunc, $lang, $defaultlang,$availangs;
	global $mysql;
    $sql = "SELECT id, parent, type, judul, isi FROM menu ORDER BY urutan";
    $cats = new categories();
    $mycats = array();
    $result = $mysql->query($sql);
    while ($row = $mysql->fetch_assoc($result)) {
        $sql1 = "SELECT urlpattern, modul, jenis FROM menutype WHERE id='" . $row['type'] . "'";
        $result1 = $mysql->query($sql1);
        list($urlpattern, $modulmenu, $jenismenu) = $mysql->fetch_row($result1);
        $url = str_replace('[var]', $row['isi'], $urlpattern);

        $titleurl = array();
        if (substr_count($url, "pid=") > 0) {
            if ($modulmenu == "page") {
                $tabel = $modulmenu;
                $kolom = "judul";
            } else {
                $tabel = $modulmenu . "data";
                $kolom = (($modulmenu == "news") ? "judulberita" : "title");
            }
            $sqljudul = "SELECT $kolom FROM $tabel WHERE id='" . $row['isi'] . "' ";
            $resultjudul = $mysql->query($sqljudul);
            list($itemname) = $mysql->fetch_row($resultjudul);
            $titleurl["pid"] = $itemname;
        } elseif (substr_count($url, "cat_id=") > 0) {
			if ($row['isi']>0) {
				$sqljudul = "SELECT nama FROM " . $modulmenu . "cat WHERE id='" . $row['isi'] . "' ";
				$resultjudul = $mysql->query($sqljudul);
				list($catname) = $mysql->fetch_row($resultjudul);
				$titleurl["cat_id"] = $catname;
			} else {
				$titleurl["cat_id"] = 'all';
			}
        }

		if (file_exists("$cfg_app_path/modul/$modulmenu/prettyurasi.php")) include ("$cfg_app_path/modul/$modulmenu/prettyurasi.php");
        if (strlen($url) > 0) $url = $urlfunc->makePretty($url, $titleurl);

		// $judul = ambilterjemahan('menu',$row['id']);
		if($jenismenu!="feature_menu") {
			$mycats[] = array('id' => $row['id'], 'parent' => $row['parent'], 'type' => $row['type'], 'judul' => $row['judul'], 'modul' => $modulmenu, 'url' => $url, 'level' => 0);
		}
        if (file_exists("$cfg_app_path/modul/$modulmenu/menuaksi.php")) include ("$cfg_app_path/modul/$modulmenu/menuaksi.php");
    }
    $cats->get_cats($mycats);
	
	// echo '<pre>';
	// print_r($mycats);
	// echo '</pre>';

    $currlevel = 1;
	//$catcontent .= "<div class=\"menu-button navbar-brand\">Menu</div>";
	$catcontent .= "<ul class=\"nav navbar-nav\">";
    for ($i = 0; $i < count($cats->cats); $i++) {
        if ($cats->cats[$i]['url'] == '') {
            $menuitem = "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">" . $cats->cats[$i]['judul'] . "<b class=\"caret\"></b></a>\r\n";
        } else {
            // $menuitem = "<li><a href=\"" . $cats->cats[$i]['url'] . "\">" . $cats->cats[$i]['judul'] . "</a></li>\r\n";
			$menuitem = "<li><a href=\"" . $cats->cats[$i]['url'] . "" . $cats->cats[$i]['modulx'] ."\">" . $cats->cats[$i]['judul'] . "</a></li>\r\n";
        }
        $selisihlevel = $cats->cats[$i]['level'] - $currlevel;
        if ($selisihlevel>0) {
			if ($cats->cats[$i]['level'] <= 2) 
				$catcontent .= "<ul class=\"dropdown-menu\">\r\n";
			else
				$catcontent .= "<ul class=\"dropdown-menu\">";
			$catcontent .= "$menuitem\r\n";
		}
        if ($selisihlevel == 0) {
            $catcontent .= "$menuitem\r\n";
        }
        if ($selisihlevel < 0) {
            for ($j = 0; $j < -$selisihlevel; $j++) {
                $catcontent .= "</ul>\r\n";
                if ($cats->cats[$i]['tipe'] == '0')
                    $catcontent .= "</li>\r\n";
            }
            $catcontent .= "$menuitem\r\n";
        }
        $currlevel = $cats->cats[$i]['level'];
    }
   $catcontent .= "</ul>\r\n";
    return $catcontent;
}

function getHeader() {
	global $mysql;
	$catcontent = '
		<div class="container">		<div id="services" class="services">
		<div class="row">';
	$q = $mysql->query("SELECT template FROM template_option WHERE id IN (20)");
	if ($q && $mysql->num_rows($q) > 0) {
		$i = 0;
		while($row = mysql_fetch_assoc($q)) {
			$catcontent .= '
				<div class="col-sm-12">
					<div class="service-item">
						'.$row['template'].'
					</div>
				</div>
				';
			$i++;
		}
		$catcontent .= '
			</div>			</div>
		</div>';
	}
	return $catcontent;
}

function numberPhone() {
	global $mysql;
	$q = $mysql->query("SELECT template FROM template_option WHERE id IN (12)");
	if ($q && $mysql->num_rows($q)) {
		while(list($template) = $mysql->fetch_row($q)) {
			$content .= ''.$template.'';
			$i++;
		}
	}
	return $content;
}

function emailUrl() {
	global $mysql;
	$q = $mysql->query("SELECT template FROM template_option WHERE id IN (13)");
	if ($q && $mysql->num_rows($q)) {
		while(list($template) = $mysql->fetch_row($q)) {
			$content .= ''.$template.'';
			$i++;
		}
	}
	return $content;
}

function getfooterlink() {
	global $mysql;
	$content = '
		<div class="footerlink">
			<div class="container">
				<div class="row">
			';
	$q = $mysql->query("SELECT template FROM template_option WHERE id IN (17,18,19)");
	if ($q && $mysql->num_rows($q)) {
		$class_col = array(
			'col-sm-12', 
			'col-sm-4', 
			'col-sm-5', 
			'col-xs-12 col-sm-5 col-md-5'
		);
		$i = 0;
		while(list($template) = $mysql->fetch_row($q)) {
			$content .= '
				<div class="'.$class_col[$i].'">
					'.$template.'
				</div>';
			$i++;
		}
	}
	$content .= '
				</div>
			</div>
		</div>';
			
	return $content;
}

// function base_path($string) {
	// global $cfg_app_path;
	// return "$cfg_app_path/file/$string";
// }
// function base_url($string) {
	// global $cfg_app_url;
	// return "$cfg_app_url/file/$string";
// }
function get_exclusive() {
	global $mysql;
	$include = "(1,2,3,4)";
	$res = $mysql->query("SELECT template, url, title FROM template_option WHERE id IN $include");
	if ($mysql->num_rows($res) > 0) {
		$data = '
		<div class="content-wrapper" id="exclusive-collection">
			<div class="container">
				<div class="row">
				<!-- Blog Post Content Column -->
					<div class="col-md-12">
						<h1 class="page-header">'._EXCLUSIVECOLLECTION.'</h1>
					</div>
					<div class="col-md-12">
						<div class="row">'; 
		while($row = $mysql->fetch_assoc($res)) {
			$filename = ($row['template'] != '' && file_exists(base_path('template_option/'.$row['template']))) ? base_url('template_option/'.$row['template']) : '';
			$title = ($row['title'] != '') ? '<p>'.$row['title'].'</p>' : '';
			$url = ($row['url']) ? $row['url'] : '#';
			$data .= '
			<div class="col-sm-6 col-md-3 list-collection">
				<a href="'.$url.'">
					<img src="'.$filename.'" src="'.$row['title'].'">
				</a>'.$title.'
			</div>';
		}
		$data .= '
						
				</div></div></div>
			</div>
		</div>	
		';
		
	}
	
	return $data;

}

function get_popular() {
	global $mysql;
	$include = "(5,6,7)";
	$res = $mysql->query("SELECT id, judul, template, url, title FROM template_option WHERE id IN $include");
	if ($mysql->num_rows($res) > 0) {
		$data = '
		<div class="content-wrapper" id="popular-categories">
				<div class="row">
				<!-- Blog Post Content Column -->
					<div class="col-md-12">
						<h1 class="page-header">'._POPULARCATEGORIES.'</h1>
					</div>
					<div class="col-md-12">
						<div class="row">'; 
		while($row = $mysql->fetch_assoc($res)) {
			$class = ($row['id'] == 5) ? 'col-xs-12 col-sm-6' : 'col-xs-6 col-sm-3';
			$filename = ($row['template'] != '' && file_exists(base_path('template_option/'.$row['template']))) ? base_url('template_option/'.$row['template']) : '';
			$title = ($row['title'] != '') ? '<p>'.$row['title'].'</p>' : '';
			$url = ($row['url']) ? $row['url'] : '#';
			$data .= '
			<div class="'.$class.' list-collection">
				<a href="'.$url.'">
					<img src="'.$filename.'" src="'.$row['title'].'">
				</a>'.$title.'
			</div>';
		}
		$data .= '
						
				</div></div>
			</div>
		</div>	
		';
		
	}
	
	return $data;

}

function get_social_media() {
	global $mysql;
	$include = "8,9,10,11";
	$res = $mysql->query("SELECT id, judul, template FROM template_option WHERE id IN ($include) ORDER BY FIELD(id, $include)");
	if ($mysql->num_rows($res) > 0) {
		while($row = $mysql->fetch_assoc($res)) {
			if ($row['template'] != '') {
				$data .= '<a href="'.$row['template'].'" style="cursor: pointer;"><img src="<<<TEMPLATE_URL>>>/images/ico'.$row['id'].'.png" alt="'.$row['judul'].'"></a>';
			}
		}
	}
	
	return $data;
}

function fa_shopping_cart() {
	global $cfg_app_url;
	
	// if (/* isset($_SESSION['cart']) &&  */ isset($_SESSION['member_uid'])) {
		// $number_cart = count($_SESSION['cart']);
		// // $total = ($number_cart > 0) ? $number_cart : 0;
		// $total = ($number_cart > 0) ? $number_cart : 0;
	// } else {
		// $total = 0;
	// }
	
	// $data = '<a class="cart-icon" href="'.$cfg_app_url.'/cart'.'"><i class="fa fa-shopping-cart"></i><span class="number-cart">'.$total.'</span></a> ';		
	
	if (isset($_SESSION['cart'])) {
		$totalCart = 0;
		foreach($_SESSION['cart'] as $i => $t_cart) {
			if (is_array($t_cart)) {
				foreach($t_cart as $elem) {
					$totalCart += $t_cart;
				}
			} else {
				$totalCart += $t_cart;
			}
		}		
		$total = ($totalCart > 0) ? $totalCart : 0;
	} else {
		$total = 0;
	}	
	return $total;
}

function get_mega_menu() {
	global $mysql;
	global $urlfunc;
	
	$mycats = array();
	$cats = new categories();
	$sql_catalog = "SELECT id, nama, parent FROM catalogcat ORDER BY urutan ";
	$result_catalog = $mysql->query($sql_catalog);
	while($row_catalog = $mysql->fetch_assoc($result_catalog)) 
	{	$titleurl = array();
		$titleurl["cat_id"] = $row_catalog['nama'];
		$url = "";
		
		$sqlchild = "SELECT id, nama, parent FROM catalogcat 
			WHERE parent='".$row_catalog['id']."' ORDER BY urutan";
		$resultchild = $mysql->query($sqlchild);
		if($mysql->num_rows($resultchild)==0)
		{	$url = "?p=catalog&action=images&cat_id=".$row_catalog['id'];
		}
	
		if(strlen($url)>0)
		{	$url = $urlfunc->makePretty($url, $titleurl);
		}
		
		if($row_catalog['parent']==0)
		{	$row_catalog['parent'] = $row['id'];
		}
		else
		{	$row_catalog['parent'] = $row['id']."-".$row_catalog['parent'];
		}
		$cat_id = $row_catalog['id'];
		$row_catalog['id'] = $row['id']."-".$row_catalog['id'];
		
		$mycats[] = array('id'=>$row_catalog['id'],'cat_id'=>$cat_id,
			'parent'=>$row_catalog['parent'], 'type'=>$row['type'], 
			'judul'=>$row_catalog['nama'], 'url'=>$url, 'level'=>0);
	}
	$cats->get_cats($mycats);
	// echo '<pre>';
	// print_r($mycats);
	// echo '</pre>';
	$currlevel = 1;
	$rightAlign = 0;
	// $catcontent = '<div class="collapse navbar-collapse top-menu" id="bs-example-navbar-collapse-2">';
	// $catcontent .= '<ul class="nav navbar-nav">';
	for ($i=0; $i<count($cats->cats); $i++) {
		$level_menu = $cats->cats[$i]['level'];
		$cat_id = $cats->cats[$i]['cat_id'];
		$titleurl = array();
		$titleurl['cat_id'] = $cats->cats[$i]['judul'];
		
		$rightAlign = 0;		
		$judul = $cats->cats[$i]['judul'];
		$level = $cats->cats[$i]['level'];		
		if ($cats->cats[$i]['url'] == '') {
			if ($cats->cats[$i]['level'] == 1) {
				// $menuitem = "<li class=\"dropdown\"><a href=\"#\" class=\"dropdown-toggle $active\" data-toggle=\"dropdown\"><span class=\"down\">".$cats->cats[$i]['judul']."</span><b class=\"caret\"></b></a>";
				// $menuitem = "<li class=\"has-sub\"><a href=\"#\"><span class=\"down\">".$cats->cats[$i]['judul']."</span></a>";
				$menuitem = "<li class=\"dropdown menu-large\"><a href=\"#\" class=\"navbar-collapse top-menu\" data-toggle=\"dropdown\">" . $cats->cats[$i]['judul'] . "<b class=\"caret\"></b></a>\r\n";
			} else {
				
				$menuitem = "<li class=\"col-sm-3\">";
				$menuitem_header = "<li class=\"dropdown-header\">".$cats->cats[$i]['judul']."\r\n";
			}
			
		} else {
			$active = ($_GET['cat_id'] == $cats->cats[$i]['cat_id']) ? 'current' : '';
			if ($cats->cats[$i]['level'] == 1) {
				$menuitem = "<li class=\"dropdown menu-large\"><a href=\"".$urlfunc->makePretty("?p=catalog&action=images&cat_id=$cat_id", $titleurl)."\">" . $cats->cats[$i]['judul'] . "</a>"."\r\n";
				// $menuitem = "<li class=\"col-sm-3\">\r\n";
			} else if ($cats->cats[$i]['level'] == 2) {
				$menuitem = "<li class=\"col-sm-3 menu-li-standart\"><a href=\"".$urlfunc->makePretty("?p=catalog&action=images&cat_id=$cat_id", $titleurl)."\">". $cats->cats[$i]['judul'] . "</a>\r\n";
			} else {
				$menuitem = "<li><a href=\"".$urlfunc->makePretty("?p=catalog&action=images&cat_id=$cat_id", $titleurl)."\">". $cats->cats[$i]['judul'] . "</a>\r\n";
			}
		}

		$selisihlevel=$cats->cats[$i]['level']-$currlevel;
		if ($selisihlevel>0) {
			if ($cats->cats[$i]['level'] <= 2) 
				$catcontent .= "<ul class=\"dropdown-menu megamenu row\">\r\n";
			else
				$catcontent .= "<ul>";
			
			if ($cats->cats[$i]['level'] == 3) $catcontent .= "$menuitem_header\r\n";
			$catcontent .= "$menuitem\r\n";
		}
		if ($selisihlevel==0) {
			$catcontent .= "$menuitem\r\n";
		}
		if ($selisihlevel<0) {
			for ($j=0; $j<-$selisihlevel; $j++) {
				$catcontent .= "</ul></li>\r\n";
				// if ($cats->cats[$i]['tipe']=='0') 
					$catcontent .= "</li>\r\n";
			}
			$catcontent .= "$menuitem\r\n";
		}
		$currlevel=$cats->cats[$i]['level'];
	}	
	
	// $catcontent .= "</ul>\r\n";
	// $catcontent .= "</div> <!-- /#cssmenu -->\r\n";
	
	return $catcontent;
}
