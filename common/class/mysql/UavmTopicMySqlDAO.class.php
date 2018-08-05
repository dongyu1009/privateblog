<?php
/**
 * Class that operate on table 'uavm_topic'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmTopicMySqlDAO implements UavmTopicDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmTopicMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_topic WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_topic';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_topic ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmTopic primary key
 	 */
	public function delete($topic_id){
		$sql = 'DELETE FROM uavm_topic WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($topic_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTopicMySql uavmTopic
 	 */
	public function insert($uavmTopic){
		$sql = 'INSERT INTO uavm_topic (code, name, desc) VALUES (?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmTopic->code);
		$sqlQuery->set($uavmTopic->name);
		$sqlQuery->set($uavmTopic->desc);

		$id = $this->executeInsert($sqlQuery);	
		$uavmTopic->topicId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTopicMySql uavmTopic
 	 */
	public function update($uavmTopic){
		$sql = 'UPDATE uavm_topic SET code = ?, name = ?, desc = ? WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmTopic->code);
		$sqlQuery->set($uavmTopic->name);
		$sqlQuery->set($uavmTopic->desc);

		$sqlQuery->setNumber($uavmTopic->topicId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_topic';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByCode($value){
		$sql = 'SELECT * FROM uavm_topic WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_topic WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesc($value){
		$sql = 'SELECT * FROM uavm_topic WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByCode($value){
		$sql = 'DELETE FROM uavm_topic WHERE code = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_topic WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesc($value){
		$sql = 'DELETE FROM uavm_topic WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmTopicMySql 
	 */
	protected function readRow($row){
		$uavmTopic = new UavmTopic();
		
		$uavmTopic->topicId = $row['topic_id'];
		$uavmTopic->code = $row['code'];
		$uavmTopic->name = $row['name'];
		$uavmTopic->desc = $row['desc'];

		return $uavmTopic;
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
	 * @return UavmTopicMySql 
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