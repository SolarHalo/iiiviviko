<?php
class Category{
	
	var $dbutil;
	
	function __construct($dbutil){
		$this->dbutil = $dbutil;
	}
	
	/**
	 * 获取全部菜单
	 * Enter description here ...
	 */
	function getAllMenu(){
		$topmenu = $this->dbutil->get_results("select * from category where pid is null and menu = 1 order by rank", ARRAY_A);
		$submenu = $this->dbutil->get_results("select * from category where pid is not null and menu = 1 order by rank", ARRAY_A);
		$result = array();
		foreach($topmenu as $value){
			foreach($submenu as $sub){
				if($sub['pid'] == $value['id']){
					$value['submenu'][] = $sub;
				}
			}
			$result[] = $value;
		}
		return $result;
	}
	
	/**
	 * 获取主菜单的详细信息
	 * Enter description here ...
	 */
	function getMainMenuInfo($name){
		$result = $this->dbutil->get_row("select * from category where name= '".$name."' and menu=1");
		return $result;
	}
	
	/**
	 * 获取子菜单信息
	 * Enter description here ...
	 * @param unknown_type $mname
	 * @param unknown_type $sname
	 */
	function getSubMenuInfo($mname, $sname){
		$result = $this->dbutil->get_row("select t2.* from category t1, category t2 where t1.pid = t2.id and t2.name='".$sname."' and t1.name='".$mname."'");
		return $result;
	}
	
	/**
	 * 根据父ID获取子菜单信息
	 * Enter description here ...
	 * @param unknown_type $pid
	 */
	function getSubMenus($pid){
		$result = $this->dbutil->get_results("select * from category where pid=".$pid." order by rank");
		return $result;
	}
	
	function getActivits($pid){
		$result = $this->dbutil->get_results("select * from category where pid=".$pid." order by rank desc");
		return $result;
	}
	
	
	
	/**
	 * 根据父菜单ID和本菜单名称获取菜单信息
	 * Enter description here ...
	 * @param unknown_type $pid
	 * @param unknown_type $name
	 */
	function getMenuInfoByPid($pid, $name){
		$result = $this->dbutil->get_row("select * from category where pid=".$pid." and name='".$name."'", ARRAY_A);
		return $result;
	}
	
	function getMenuInfoById($id){
		$result = $this->dbutil->get_row("select * from category where id=".$id, ARRAY_A);
		return $result;
	}
	
	function insertMenu($menu){
		$this->dbutil->insert("category", $menu);
	}
	
	
	function deleteMenu($id){
		$this->dbutil->query("delete from category where id=".$id);
	}
}
?>