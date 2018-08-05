<?php
/**
 * Class that operate on table 'uavm_user'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmUserMySqlDAO implements UavmUserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmUserMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_user WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}
 
	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_user';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_user ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmUser primary key
 	 */
	public function delete($user_id){
		$sql = 'DELETE FROM uavm_user WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($user_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUserMySql uavmUser
 	 */
	public function insert($uavmUser){
		$sql = 'INSERT INTO uavm_user (phone, password, name, email, wcopenid, gen_time, login_time, login_count, enable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmUser->phone);
		$sqlQuery->set($uavmUser->password);
		$sqlQuery->set($uavmUser->name);
		$sqlQuery->set($uavmUser->email);
		$sqlQuery->set($uavmUser->wcopenid);
		$sqlQuery->set($uavmUser->genTime);
		$sqlQuery->set($uavmUser->loginTime);
		$sqlQuery->setNumber($uavmUser->loginCount);
		$sqlQuery->setNumber($uavmUser->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmUser->userId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUserMySql uavmUser
 	 */
	public function update($uavmUser){
		$sql = 'UPDATE uavm_user SET phone = ?, password = ?, name = ?, email = ?, wcopenid = ?, gen_time = ?, login_time = ?, login_count = ?, enable = ? WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmUser->phone);
		$sqlQuery->set($uavmUser->password);
		$sqlQuery->set($uavmUser->name);
		$sqlQuery->set($uavmUser->email);
		$sqlQuery->set($uavmUser->wcopenid);
		$sqlQuery->set($uavmUser->genTime);
		$sqlQuery->set($uavmUser->loginTime);
		$sqlQuery->setNumber($uavmUser->loginCount);
		$sqlQuery->setNumber($uavmUser->enable);

		$sqlQuery->setNumber($uavmUser->userId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_user';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByPhone($value){
		$sql = 'SELECT * FROM uavm_user WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	} 

	public function queryByPassword($value){
		$sql = 'SELECT * FROM uavm_user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_user WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEmail($value){
		$sql = 'SELECT * FROM uavm_user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByWcopenid($value){
		$sql = 'SELECT * FROM uavm_user WHERE wcopenid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_user WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLoginTime($value){
		$sql = 'SELECT * FROM uavm_user WHERE login_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByLoginCount($value){
		$sql = 'SELECT * FROM uavm_user WHERE login_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_user WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByPhone($value){
		$sql = 'DELETE FROM uavm_user WHERE phone = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPassword($value){
		$sql = 'DELETE FROM uavm_user WHERE password = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_user WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEmail($value){
		$sql = 'DELETE FROM uavm_user WHERE email = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByWcopenid($value){
		$sql = 'DELETE FROM uavm_user WHERE wcopenid = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_user WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLoginTime($value){
		$sql = 'DELETE FROM uavm_user WHERE login_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByLoginCount($value){
		$sql = 'DELETE FROM uavm_user WHERE login_count = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_user WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmUserMySql 
	 */
	protected function readRow($row){
		$uavmUser = new UavmUser();
		
		$uavmUser->userId = $row['user_id'];
		$uavmUser->phone = $row['phone'];
		$uavmUser->password = $row['password'];
		$uavmUser->name = $row['name'];
		$uavmUser->email = $row['email'];
		$uavmUser->wcopenid = $row['wcopenid'];
		$uavmUser->genTime = $row['gen_time'];
		$uavmUser->loginTime = $row['login_time'];
		$uavmUser->loginCount = $row['login_count'];
		$uavmUser->enable = $row['enable'];

		return $uavmUser;
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
	 * @return UavmUserMySql 
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