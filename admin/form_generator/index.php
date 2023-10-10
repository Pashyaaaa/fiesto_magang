<?php

/*
 Author Muhammad Romli
 * roemly@gmail.com
 * 
 * 
 * gunakan 
 * $object->image_url("nama_variable"); return url image
 * $object->content("nama_variable"); return content onlye
 * 
 * 
 * */

 
class TemplateForm{
	
	public $temp = array();
	public $var_input = array();
	public $var_image = array();
	public $var_value= array();
	public $data_form= array();
	
	function __construct(){
		$this->get_data();
	}
	
	function template_path($string_path){
		global $cfg_app_path,$config_site_templatefolder;
		return "$cfg_app_path/template/$config_site_templatefolder/admin/form_generator/$string_path";
	}
	function template_url($string_url){
		global $cfg_app_url,$config_site_templatefolder;
		return "$cfg_app_url/template/$config_site_templatefolder/admin/form_generator/$string_url";
	}
	function image_url($name){
		return $this->template_url("upload/images/".$this->var_value[$name]);
	}
	function content($name){
		return $this->var_value[$name];
	}
	function show_variable(){
		var_dump($this->var_value);
		die('a');
	}
	function get_data(){
	global $mysql, $lang;
	$this->var_value=array();
		//include $this->template_path("template_option.php");
		//$this->var_value=json_decode($data_json,true);
		if ($_GET['action'] == 'morelang' || $lang == 'en') {
			$q=$mysql->query("SELECT param,value FROM template_data_lang"); 
		} else {
			$q=$mysql->query("SELECT param,value FROM template_data"); 
		}
		if($q){
			while($d=$mysql->assoc($q)){
			
				$this->var_value[$d['param']]=$d['value'];
			}
		}
		
		return $this->var_value;
	}

	function form_config(){
		global $mysql;
		if ($_GET['action'] == 'morelang') {
			include $this->template_path("form-en.php");
		} else {
			include $this->template_path("form.php");
		}
		return $data;
	}
	
	function getModulData(
	$modul_table="newsdata",
	$filter_var=array("cat_id"),
	$filter_val=array("4"),
	$field="id,judulberita,summary,thumb,url",
	$path_images="news/large",
	$limit=4,
	$order="id DESC",
	$kondisi_tambahan=""){
		global $mysql,$cfg_app_url;
		$kondisi=array();
		if($kondisi_tambahan!=''){
			$kondisi[]=$kondisi_tambahan;
		}
		if(count($filter_var)>0){
			foreach($filter_var as $i => $param_field){
				$kondisi[]="$param_field='".$filter_val[$i]."'";
			}
		}
		$kondisi=count($kondisi)>0?" WHERE ".join(" AND ",$kondisi):"";
		
		$data=$mysql->query_data("SELECT $field FROM $modul_table $kondisi  ".($order!=""?"ORDER BY $order ":"")." limit $limit");
		return $data;
	}
	function inputSelect($label,$name,$data=array(array("0"=>"Tidak ada data"))){
		
		$terpilih=(isset($this->var_value[$name])?$this->var_value[$name]:'');
		
		if(count($data)>0){
			$option.='<option value="">-- Pilih -- </option>';
			foreach($data as $i => $v){
				//change array to number index
				$temp=array();
				foreach($v as $val){
					$temp[]=$val;
				}
				
				list($id,$value)=$temp;
				$selected=$terpilih==$id?'selected="selected"':'';
				$option.='<option '.$selected.' value='.$id.'>'.$value.'</option>';
			}
		}
		return '
		<div class="control-group">
			<label class="control-label"  for="'.$name.'1">'.$label.'</label>
			<div class="controls">
			<select name="'.$name.'" id="'.$name.'1" >
			'.$option.'
			</select>
			</div>
		</div>
		';
	}
	function inputText($label,$name){
		return '
		<div class="control-group">
			<label class="control-label"  for="'.$name.'1">'.$label.'</label>
			<div class="controls">
			<input name="'.$name.'" id="'.$name.'1" value="'.(isset($this->var_value[$name])?$this->var_value[$name]:"").'" type="text" />
			</div>
		</div>
		';
	}
	function inputLabel($label){
		return '
		<div class="control-group" style="margin-top:-15px">
			<label class="control-label"  for="'.uniqid().'1"></label>
			<div class="controls">
			'.$label.'
			</div>
		</div>
		';
	}
	function inputTextArea($label,$name){
		return '
		<div class="control-group">
			<label class="control-label" for="'.$name.'1">'.$label.'</label>
			<div class="controls">
				<textarea  name="'.$name.'" id="'.$name.'1"/>'.(isset($this->var_value[$name])?$this->var_value[$name]:"").'</textarea>
			</div>
		</div>
		';
	}
	function inputTiny($label,$name){
		return '
		<div class="control-group">
			<label class="control-label" for="'.$name.'1">'.$label.'</label>
			<div class="controls">
				<textarea  cols="60" rows="10" class="usetiny"  name="'.$name.'" id="'.$name.'1"/>'.(isset($this->var_value[$name])?$this->var_value[$name]:"").'</textarea>
			</div>
		</div>
		';
		
	}
	function inputImage($label,$name){
		$image="";
		if(isset($this->var_value[$name])){
			$template_path	=	$this->template_path("upload/images/".$this->var_value[$name]);
			$template_url	=	$this->template_url("upload/images/".$this->var_value[$name]);
			
			$image_exists=file_exists($template_path);
			if($image_exists){
				$uniqid=uniqid();
				$image='<img class="img-responsive" src="'.$template_url.'?uniq='.$uniqid.'" />';
			}
		}
		return '
		<div class="control-group">
			<label class="control-label" for="'.$name.'1">'.$label.'</label>
			
			<div class="controls">
			<input  name="'.$name.'" id="'.$name.'1"  type="file" />
				<input name="img_'.$name.'" type="hidden" value="'.$this->var_value[$name].'"/>
				<div>
				'.$image.'
				</div>
			</div>
		</div>
		';
	}
	
	
	function form(){
		
		$data=$this->form_config();
		$this->setvarname($data);
		$this->submit($data);
		$this->get_data();
		
		if(count($data)>0){
			foreach($data as $parent =>$v){
				$this->setBuffer("<div class='section_to ".$parent."'><h3>".ucfirst($parent)."</h3>");		
				foreach($v as $name=>$field){
					$a=call_user_func_array(array($this, $field['type']), array($field['label'],$name,$field['data']));
					$this->setBuffer($a);			
				}
				$this->setBuffer("</div><hr/>");
			}
		}
		
		return $this->render();
	}
	
	function setvarname($data){
		if(count($data)>0){
			foreach($data as $parent =>$v){
				
				foreach($v as $name=>$field){
					if($field['type']=="inputImage"){
						$this->var_image[]=$name;
					}else{
						$this->var_input[]=$name;
					}
					
				}
					
			}
			
		}
	}
	
	
	function setBuffer($temp_val){
		$this->temp[]=$temp_val;
	}
	
	
	function render(){
		global $availangs;
		ob_start();
			echo '<form method="post"  class="form-horizontal"  enctype="multipart/form-data">';
			echo join("",$this->temp);
			echo '<button class="btn btn-default" type="submit" name="submit_template_option" value="1">Submit</button>';
			echo '</form>';
			
			if (count($availangs)>1 && $_GET['action'] == '') echo " <a class=\"buton\" href=\"?p=template_option&action=morelang\">"._MORELANG."</a>";
		return ob_get_clean();
	}

	function uploadImage($name){
		
		$target_dir = $this->template_path("upload/images/");
		
		if(!file_exists($target_dir)){
		mkdir($target_dir, 0777, true);
		}
		$ext = pathinfo($_FILES[$name]['name'], PATHINFO_EXTENSION);
		$filename="{$name}.{$ext}";
		$target_dir = $target_dir."/$filename";

		if(move_uploaded_file($_FILES[$name]['tmp_name'], $target_dir)){
			return $filename;
		}
		return '';
	}
	function submit(){
		global $cfg_app_url,$mysql;
		if(isset($_POST['submit_template_option']) and $_POST['submit_template_option']==1){
		$nama_file="template_option";
		/**/
		
		//$myfile = fopen($this->template_path("$nama_file.php"), "w") or die("Unable to open file!");
		
		$data=array();
		
		if(count($this->var_input)>0){
			foreach($this->var_input as $v){
				$data[$v]=isset($_POST[$v])!=""?$_POST[$v]:"";
			}
		}
		
		if(count($this->var_image)>0){

			foreach($this->var_image as $v){
				
				if($_FILES[$v]['tmp_name']!=""){
					
					$filename=$this->uploadImage($v);
					
					if($filename!=""){
						$data[$v]=$filename;	
					}else{
						$data[$v]=isset($_POST["img_".$v])!=""?$_POST["img_".$v]:"";
					}
				}else{
					$data[$v]=isset($_POST["img_".$v])!=""?$_POST["img_".$v]:"";
				}
			}
		}
		
		foreach($data as $param => $value){
			if ($_GET['action'] == 'morelang') {
				$sql="INSERT INTO template_data_lang (param,value) values ('$param','$value') ON DUPLICATE key UPDATE value='$value' ";
			} else {
				$sql="INSERT INTO template_data (param,value) values ('$param','$value') ON DUPLICATE key UPDATE value='$value' ";
			}
		
			$q=$mysql->query($sql);
		}
		/**
		fwrite($myfile,'<?php '.PHP_EOL);
		ob_start();
		fwrite($myfile,'$data_json='.PHP_EOL);
		
		echo "'".json_encode($data, JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_QUOT | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE)."'";
		
		$txt =ob_get_clean();
		fwrite($myfile, $txt.PHP_EOL);
		fwrite($myfile,';'.PHP_EOL.PHP_EOL);
		
		fwrite($myfile,'?> ');
		fclose($myfile);
		***/
		
		if ($_GET['action'] == 'morelang') {
			header("location:$cfg_app_url/kelola/index.php?p=template_option&action=morelang");
		} else {
			header("location:$cfg_app_url/kelola/index.php?p=template_option");
		}
		exit();
		}
	
	}
}


/*
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Template Option</title>
  </head>
  <body>
	 <div class="container">
		 <div class="row">
		 <div class="col-md-12">

			<?php 
				echo $a->form($data);
			?>
		</div>
		</div>
	</div>
	
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
*/
?>