<?php
/**
 * Class that operate on table 'uavm_user_topic'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmUserTopicMySqlDAO implements UavmUserTopicDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmUserTopicMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_user_topic WHERE um_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_user_topic';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_user_topic ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmUserTopic primary key
 	 */
	public function delete($um_id){
		$sql = 'DELETE FROM uavm_user_topic WHERE um_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($um_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUserTopicMySql uavmUserTopic
 	 */
	public function insert($uavmUserTopic){
		$sql = 'INSERT INTO uavm_user_topic (user_id, topic_id, gen_time, enable) VALUES (?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmUserTopic->userId);
		$sqlQuery->setNumber($uavmUserTopic->topicId);
		$sqlQuery->set($uavmUserTopic->genTime);
		$sqlQuery->setNumber($uavmUserTopic->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmUserTopic->umId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUserTopicMySql uavmUserTopic
 	 */
	public function update($uavmUserTopic){
		$sql = 'UPDATE uavm_user_topic SET user_id = ?, topic_id = ?, gen_time = ?, enable = ? WHERE um_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmUserTopic->userId);
		$sqlQuery->setNumber($uavmUserTopic->topicId);
		$sqlQuery->set($uavmUserTopic->genTime);
		$sqlQuery->setNumber($uavmUserTopic->enable);

		$sqlQuery->setNumber($uavmUserTopic->umId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_user_topic';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM uavm_user_topic WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTopicId($value){
		$sql = 'SELECT * FROM uavm_user_topic WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_user_topic WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_user_topic WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByUserId($value){
		$sql = 'DELETE FROM uavm_user_topic WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTopicId($value){
		$sql = 'DELETE FROM uavm_user_topic WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_user_topic WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_user_topic WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmUserTopicMySql 
	 */
	protected function readRow($row){
		$uavmUserTopic = new UavmUserTopic();
		
		$uavmUserTopic->umId = $row['um_id'];
		$uavmUserTopic->userId = $row['user_id'];
		$uavmUserTopic->topicId = $row['topic_id'];
		$uavmUserTopic->genTime = $row['gen_time'];
		$uavmUserTopic->enable = $row['enable'];

		return $uavmUserTopic;
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
	 * @return UavmUserTopicMySql 
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