<?php
class Page{
	
	var $dbutil;

	function __construct($dbutil){
		$this->dbutil = $dbutil;
	}
	
	/**
	 * 获取父类下所有内容
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getPagesAllByPid($pid){
		$result = $this->dbutil->get_results("select * from pages where pid=".$pid." order by createtime");
		return $result;
	}
	
	/**
	 * 获取父类下所有内容的数量
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getPageCountByPid($pid){
		$result = $this->dbutil->get_var("select count(*) from pages where pid=".$pid);
		return $result;
	}
	
	/**
	 * 获取内容
	 * Enter description here ...
	 * @param unknown_type $page
	 */
	function getPageContent($pid, $page){
		$result = $this->dbutil->get_row("select * from pages where pid=".$pid." order by createtime limit ".($page -1)." ,".$page);
		return  $result;
	}
	
	function insertPageContent($page){
		$re = $this->dbutil->insert("pages", $page);
	}
	
	function getPageById($id){
		$result = $this->dbutil->get_row("select * from pages where id=".$id);
		return $result;
	}
	
	function deletePageById($id){
		$result = $this->dbutil->query("delete  from pages where id=".$id);
	}
	
	function deletePageByPid($pid){
		$this->dbutil->query("delete  from pages where pid=".$pid);
	}
}
?>