<?php
/**
 * Class that operate on table 'uavm_report'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmReportMySqlDAO implements UavmReportDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmReportMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_report WHERE report_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_report';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_report ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmReport primary key
 	 */
	public function delete($report_id){
		$sql = 'DELETE FROM uavm_report WHERE report_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($report_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmReportMySql uavmReport
 	 */
	public function insert($uavmReport){
		$sql = 'INSERT INTO uavm_report (report_time, name, desc, gen_time, topic_id, enable) VALUES (?, ?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmReport->reportTime);
		$sqlQuery->set($uavmReport->name);
		$sqlQuery->set($uavmReport->desc);
		$sqlQuery->set($uavmReport->genTime);
		$sqlQuery->setNumber($uavmReport->topicId);
		$sqlQuery->setNumber($uavmReport->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmReport->reportId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmReportMySql uavmReport
 	 */
	public function update($uavmReport){
		$sql = 'UPDATE uavm_report SET report_time = ?, name = ?, desc = ?, gen_time = ?, topic_id = ?, enable = ? WHERE report_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmReport->reportTime);
		$sqlQuery->set($uavmReport->name);
		$sqlQuery->set($uavmReport->desc);
		$sqlQuery->set($uavmReport->genTime);
		$sqlQuery->setNumber($uavmReport->topicId);
		$sqlQuery->setNumber($uavmReport->enable);

		$sqlQuery->setNumber($uavmReport->reportId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_report';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReportTime($value){
		$sql = 'SELECT * FROM uavm_report WHERE report_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_report WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesc($value){
		$sql = 'SELECT * FROM uavm_report WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_report WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByTopicId($value){
		$sql = 'SELECT * FROM uavm_report WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_report WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReportTime($value){
		$sql = 'DELETE FROM uavm_report WHERE report_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_report WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesc($value){
		$sql = 'DELETE FROM uavm_report WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_report WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByTopicId($value){
		$sql = 'DELETE FROM uavm_report WHERE topic_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_report WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmReportMySql 
	 */
	protected function readRow($row){
		$uavmReport = new UavmReport();
		
		$uavmReport->reportId = $row['report_id'];
		$uavmReport->reportTime = $row['report_time'];
		$uavmReport->name = $row['name'];
		$uavmReport->desc = $row['desc'];
		$uavmReport->genTime = $row['gen_time'];
		$uavmReport->topicId = $row['topic_id'];
		$uavmReport->enable = $row['enable'];

		return $uavmReport;
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
	 * @return UavmReportMySql 
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