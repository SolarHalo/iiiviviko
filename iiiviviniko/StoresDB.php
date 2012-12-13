<?php
class Store{
	var $dbutil;
	
	function __construct($dbutil){
		$this->dbutil = $dbutil;
	}
	
	function getAllStores(){
		$result = $this->dbutil->get_results("select * from storeaddress");
		$stores = array();
		foreach ($result as $stor){
			$stores[$stor->area][] = $stor;
		}
		return $stores;
	}
	
	function insertStore($store){
		$this->dbutil->insert("storeaddress", $store);
	}
	
	function deleteStore($id){
		$this->dbutil->query("delete from storeaddress where id=".$id);
	}
}
?>