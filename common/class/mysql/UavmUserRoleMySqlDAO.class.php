<?php
/**
 * Class that operate on table 'uavm_user_role'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmUserRoleMySqlDAO implements UavmUserRoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmUserRoleMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_user_role WHERE ur_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_user_role';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_user_role ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmUserRole primary key
 	 */
	public function delete($ur_id){
		$sql = 'DELETE FROM uavm_user_role WHERE ur_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($ur_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUserRoleMySql uavmUserRole
 	 */
	public function insert($uavmUserRole){
		$sql = 'INSERT INTO uavm_user_role (user_id, role_id, gen_time, enable) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmUserRole->userId);
		$sqlQuery->setNumber($uavmUserRole->roleId);
		$sqlQuery->set($uavmUserRole->genTime);
		$sqlQuery->setNumber($uavmUserRole->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmUserRole->urId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUserRoleMySql uavmUserRole
 	 */
	public function update($uavmUserRole){
		$sql = 'UPDATE uavm_user_role SET user_id = ?, role_id = ?, gen_time = ?, enable = ? WHERE ur_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmUserRole->userId);
		$sqlQuery->setNumber($uavmUserRole->roleId);
		$sqlQuery->set($uavmUserRole->genTime);
		$sqlQuery->setNumber($uavmUserRole->enable);

		$sqlQuery->setNumber($uavmUserRole->urId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_user_role';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM uavm_user_role WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRoleId($value){
		$sql = 'SELECT * FROM uavm_user_role WHERE role_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_user_role WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_user_role WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM uavm_user_role WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRoleId($value){
		$sql = 'DELETE FROM uavm_user_role WHERE role_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_user_role WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_user_role WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmUserRoleMySql 
	 */
	protected function readRow($row){
		$uavmUserRole = new UavmUserRole();
		
		$uavmUserRole->urId = $row['ur_id'];
		$uavmUserRole->userId = $row['user_id'];
		$uavmUserRole->roleId = $row['role_id'];
		$uavmUserRole->genTime = $row['gen_time'];
		$uavmUserRole->enable = $row['enable'];

		return $uavmUserRole;
	}
	
	protected function getList($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		$ret = array();
		for($i=0;$i<count($tab);$i++){
			$ret[$i] = $this->readRow($tab[$i]);
		}
		return $ret;
	}
	
	/**
	 * Get row
	 *
	 * @return UavmUserRoleMySql 
	 */
	protected function getRow($sqlQuery){
		$tab = QueryExecutor::execute($sqlQuery);
		if(count($tab)==0){
			return null;
		}
		return $this->readRow($tab[0]);		
	}
	
	/**
	 * Execute sql query
	 */
	protected function execute($sqlQuery){
		return QueryExecutor::execute($sqlQuery);
	}
	
		
	/**
	 * Execute sql query
	 */
	protected function executeUpdate($sqlQuery){
		return QueryExecutor::executeUpdate($sqlQuery);
	}

	/**
	 * Query for one row and one column
	 */
	protected function querySingleResult($sqlQuery){
		return QueryExecutor::queryForString($sqlQuery);
	}

	/**
	 * Insert row to table
	 */
	protected function executeInsert($sqlQuery){
		return QueryExecutor::executeInsert($sqlQuery);
	}
}
?>