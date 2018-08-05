<?php
/**
 * Class that operate on table 'uavm_task_file'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmTaskFileMySqlDAO implements UavmTaskFileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmTaskFileMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_task_file WHERE tf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_task_file';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_task_file ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmTaskFile primary key
 	 */
	public function delete($tf_id){
		$sql = 'DELETE FROM uavm_task_file WHERE tf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($tf_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTaskFileMySql uavmTaskFile
 	 */
	public function insert($uavmTaskFile){
		$sql = 'INSERT INTO uavm_task_file (task_id, filename) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmTaskFile->taskId);
		$sqlQuery->set($uavmTaskFile->filename);

		$id = $this->executeInsert($sqlQuery);	
		$uavmTaskFile->tfId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTaskFileMySql uavmTaskFile
 	 */
	public function update($uavmTaskFile){
		$sql = 'UPDATE uavm_task_file SET task_id = ?, filename = ? WHERE tf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmTaskFile->taskId);
		$sqlQuery->set($uavmTaskFile->filename);

		$sqlQuery->setNumber($uavmTaskFile->tfId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_task_file';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByTaskId($value){
		$sql = 'SELECT * FROM uavm_task_file WHERE task_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFilename($value){
		$sql = 'SELECT * FROM uavm_task_file WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByTaskId($value){
		$sql = 'DELETE FROM uavm_task_file WHERE task_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFilename($value){
		$sql = 'DELETE FROM uavm_task_file WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmTaskFileMySql 
	 */
	protected function readRow($row){
		$uavmTaskFile = new UavmTaskFile();
		
		$uavmTaskFile->tfId = $row['tf_id'];
		$uavmTaskFile->taskId = $row['task_id'];
		$uavmTaskFile->filename = $row['filename'];

		return $uavmTaskFile;
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
	 * @return UavmTaskFileMySql 
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