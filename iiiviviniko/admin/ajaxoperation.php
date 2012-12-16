<?php
include '../load.php';
$method = $_GET['method'];

if($method == "delpage"){
	$id = $_GET['id'];
	$pagedb = new Page($dbutil);
	$page = $pagedb->getPageById($id);
	$img_s = $_SERVER['DOCUMENT_ROOT'].$page->imgsmall;
	$img_b = $_SERVER['DOCUMENT_ROOT'].$page->imgbig;
	if(file_exists($img_s)){
		unlink($img_s);
	}
	if(file_exists($img_b)){
		unlink($img_b);
	}
	$pagedb->deletePageById($id);
	echo 'success';
}else if($method == "delcate"){
	$id = $_GET['id'];
	
	$catedb = new Category($dbutil);
	$page = $catedb->getMenuInfoById($id);
	$img_s = $_SERVER['DOCUMENT_ROOT'].$page['img'];
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
}

?>