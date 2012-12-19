<?php
include '../load.php';
$method = $_GET['method'];

if($method == "delpage"){
	$id = $_GET['id'];
	$pagedb = new Page($dbutil);
	$page = $pagedb->getPageById($id);
	$img_s = $_SERVER['DOCUMENT_ROOT'].$root_path.$page->imgsmall;
	if(file_exists($img_s)){
		unlink($img_s);
	}
	if($page->isvideo == 1){
		$img_b = $_SERVER['DOCUMENT_ROOT'].$root_path.$page->imgbig;
		if(file_exists($img_b)){
			unlink($img_b);
		}	
	}
	$pagedb->deletePageById($id);
	echo 'success';
}else if($method == "delcate"){
	$id = $_GET['id'];
	$pagedb = new Page($dbutil);
	$pages = $pagedb->getPagesAllByPid($id);
	if(count($pages) >0){
		foreach ($pages as $page){
			$img_s = $_SERVER['DOCUMENT_ROOT'].$root_path.$page->imgsmall;
			echo $img_s;
			if(file_exists($img_s)){
				unlink($img_s);
			}
			if($page->isvideo != 1){
				$img_b = $_SERVER['DOCUMENT_ROOT'].$root_path.$page->imgbig;
				if(file_exists($img_b)){
					unlink($img_b);
				}	
			}
		}
		$pagedb->deletePageByPId($id);
	}
	$catedb = new Category($dbutil);
	$page = $catedb->getMenuInfoById($id);
	$img_s = $_SERVER['DOCUMENT_ROOT'].$root_path.$page['img'];
	if(file_exists($img_s)){
		unlink($img_s);
	}
	$catedb->deleteMenu($id);
	echo 'success';
}else if($method == "delstore"){
	$id = $_GET['id'];
	
	$storedb = new Store($dbutil);
	$storedb->deleteStore($id);
	echo "success";
}else if($method == "updatecate"){
	$id = $_GET['id'];
	$name = $_GET['name'];
	$desc = $_GET['desc'];
	$catedb = new Category($dbutil);
	$catedb->updateMenu(array('name'=>$name, 'desc'=>$desc ),$id);
	echo "success";
}else if($method == "updatecatesort"){
	$id = $_GET['id'];
	$catedb = new Category($dbutil);
	foreach ($id as $key => $value) {
		$catedb->updateMenu(array('rank'=>$key ), (int)($value));
	}
	echo "success";
}

?>