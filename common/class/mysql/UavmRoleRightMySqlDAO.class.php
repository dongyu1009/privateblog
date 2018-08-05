<?php
/**
 * Class that operate on table 'uavm_role_right'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmRoleRightMySqlDAO implements UavmRoleRightDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmRoleRightMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_role_right WHERE rr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_role_right';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_role_right ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmRoleRight primary key
 	 */
	public function delete($rr_id){
		$sql = 'DELETE FROM uavm_role_right WHERE rr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rr_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmRoleRightMySql uavmRoleRight
 	 */
	public function insert($uavmRoleRight){
		$sql = 'INSERT INTO uavm_role_right (role_id, right_id, gen_time, enable) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmRoleRight->roleId);
		$sqlQuery->setNumber($uavmRoleRight->rightId);
		$sqlQuery->set($uavmRoleRight->genTime);
		$sqlQuery->setNumber($uavmRoleRight->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmRoleRight->rrId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmRoleRightMySql uavmRoleRight
 	 */
	public function update($uavmRoleRight){
		$sql = 'UPDATE uavm_role_right SET role_id = ?, right_id = ?, gen_time = ?, enable = ? WHERE rr_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmRoleRight->roleId);
		$sqlQuery->setNumber($uavmRoleRight->rightId);
		$sqlQuery->set($uavmRoleRight->genTime);
		$sqlQuery->setNumber($uavmRoleRight->enable);

		$sqlQuery->setNumber($uavmRoleRight->rrId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_role_right';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByRoleId($value){
		$sql = 'SELECT * FROM uavm_role_right WHERE role_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByRightId($value){
		$sql = 'SELECT * FROM uavm_role_right WHERE right_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_role_right WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_role_right WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByRoleId($value){
		$sql = 'DELETE FROM uavm_role_right WHERE role_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByRightId($value){
		$sql = 'DELETE FROM uavm_role_right WHERE right_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_role_right WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_role_right WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmRoleRightMySql 
	 */
	protected function readRow($row){
		$uavmRoleRight = new UavmRoleRight();
		
		$uavmRoleRight->rrId = $row['rr_id'];
		$uavmRoleRight->roleId = $row['role_id'];
		$uavmRoleRight->rightId = $row['right_id'];
		$uavmRoleRight->genTime = $row['gen_time'];
		$uavmRoleRight->enable = $row['enable'];

		return $uavmRoleRight;
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
	 * @return UavmRoleRightMySql 
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