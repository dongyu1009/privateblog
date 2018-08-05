<?php
/**
 * Class that operate on table 'uavm_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmUserMySqlExtDAO extends UavmUserMySqlDAO{


	public function queryuserroles($value){
		$sql = 'select a.user_id, a.role_id, b.name from uavm_user_role a left outer join uavm_role b on a.role_id = b.role_id where a.enable = 1 and a.user_id = ?;';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	} 
	
	public function queryuserrights($value){
		$sql = 'select a.user_id, a.role_id, b.right_id, b.name from uavm_user_role a left outer join (select c.role_id, d.right_id, d.name from uavm_role_right c left outer join uavm_right d on c.right_id = d.right_id where c.enable = 1) b on a.role_id = b.role_id where a.user_id = ? and a.enable = 1;';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	} 
	
}
?>