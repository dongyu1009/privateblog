<?php
/**
 * Class that operate on table 'uavm_task'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmTaskMySqlDAO implements UavmTaskDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmTaskMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_task WHERE task_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_task';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_task ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmTask primary key
 	 */
	public function delete($task_id){
		$sql = 'DELETE FROM uavm_task WHERE task_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($task_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTaskMySql uavmTask
 	 */
	public function insert($uavmTask){
		$sql = 'INSERT INTO uavm_task (name, desc, module_id, topic_id, user_id, gen_time, mod_time, plan_time, delay_time, finish_time, enable) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmTask->name);
		$sqlQuery->set($uavmTask->desc);
		$sqlQuery->setNumber($uavmTask->moduleId);
		$sqlQuery->setNumber($uavmTask->topicId);
		$sqlQuery->setNumber($uavmTask->userId);
		$sqlQuery->set($uavmTask->genTime);
		$sqlQuery->set($uavmTask->modTime);
		$sqlQuery->set($uavmTask->planTime);
		$sqlQuery->set($uavmTask->delayTime);
		$sqlQuery->set($uavmTask->finishTime);
		$sqlQuery->setNumber($uavmTask->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmTask->taskId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTaskMySql uavmTask
 	 */
	public function update($uavmTask){
		$sql = 'UPDATE uavm_task SET name = ?, desc = ?, module_id = ?, topic_id = ?, user_id = ?, gen_time = ?, mod_time = ?, plan_time = ?, delay_time = ?, finish_time = ?, enable = ? WHERE task_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmTask->name);
		$sqlQuery->set($uavmTask->desc);
		$sqlQuery->setNumber($uavmTask->moduleId);
		$sqlQuery->setNumber($uavmTask->topicId);
		$sqlQuery->setNumber($uavmTask->userId);
		$sqlQuery->set($uavmTask->genTime);
		$sqlQuery->set($uavmTask->modTime);
		$sqlQuery->set($uavmTask->planTime);
		$sqlQuery->set($uavmTask->delayTime);
		$sqlQuery->set($uavmTask->finishTime);
		$sqlQuery->setNumber($uavmTask->enable);

		$sqlQuery->setNumber($uavmTask->taskId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_task';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_task WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesc($value){
		$sql = 'SELECT * FROM uavm_task WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModuleId($value){
		$sql = 'SELECT * FROM uavm_task WHERE module_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTopicId($value){
		$sql = 'SELECT * FROM uavm_task WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByUserId($value){
		$sql = 'SELECT * FROM uavm_task WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_task WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByModTime($value){
		$sql = 'SELECT * FROM uavm_task WHERE mod_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByPlanTime($value){
		$sql = 'SELECT * FROM uavm_task WHERE plan_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDelayTime($value){
		$sql = 'SELECT * FROM uavm_task WHERE delay_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFinishTime($value){
		$sql = 'SELECT * FROM uavm_task WHERE finish_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_task WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_task WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesc($value){
		$sql = 'DELETE FROM uavm_task WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModuleId($value){
		$sql = 'DELETE FROM uavm_task WHERE module_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTopicId($value){
		$sql = 'DELETE FROM uavm_task WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByUserId($value){
		$sql = 'DELETE FROM uavm_task WHERE user_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_task WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByModTime($value){
		$sql = 'DELETE FROM uavm_task WHERE mod_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByPlanTime($value){
		$sql = 'DELETE FROM uavm_task WHERE plan_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDelayTime($value){
		$sql = 'DELETE FROM uavm_task WHERE delay_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFinishTime($value){
		$sql = 'DELETE FROM uavm_task WHERE finish_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_task WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmTaskMySql 
	 */
	protected function readRow($row){
		$uavmTask = new UavmTask();
		
		$uavmTask->taskId = $row['task_id'];
		$uavmTask->name = $row['name'];
		$uavmTask->desc = $row['desc'];
		$uavmTask->moduleId = $row['module_id'];
		$uavmTask->topicId = $row['topic_id'];
		$uavmTask->userId = $row['user_id'];
		$uavmTask->genTime = $row['gen_time'];
		$uavmTask->modTime = $row['mod_time'];
		$uavmTask->planTime = $row['plan_time'];
		$uavmTask->delayTime = $row['delay_time'];
		$uavmTask->finishTime = $row['finish_time'];
		$uavmTask->enable = $row['enable'];

		return $uavmTask;
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
	 * @return UavmTaskMySql 
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