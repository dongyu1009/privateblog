<?php
/**
 * Class that operate on table 'uavm_report_file'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmReportFileMySqlDAO implements UavmReportFileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmReportFileMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_report_file WHERE rf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_report_file';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_report_file ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmReportFile primary key
 	 */
	public function delete($rf_id){
		$sql = 'DELETE FROM uavm_report_file WHERE rf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($rf_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmReportFileMySql uavmReportFile
 	 */
	public function insert($uavmReportFile){
		$sql = 'INSERT INTO uavm_report_file (report_id, filename) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmReportFile->reportId);
		$sqlQuery->set($uavmReportFile->filename);

		$id = $this->executeInsert($sqlQuery);	
		$uavmReportFile->rfId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmReportFileMySql uavmReportFile
 	 */
	public function update($uavmReportFile){
		$sql = 'UPDATE uavm_report_file SET report_id = ?, filename = ? WHERE rf_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->setNumber($uavmReportFile->reportId);
		$sqlQuery->set($uavmReportFile->filename);

		$sqlQuery->setNumber($uavmReportFile->rfId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_report_file';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByReportId($value){
		$sql = 'SELECT * FROM uavm_report_file WHERE report_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFilename($value){
		$sql = 'SELECT * FROM uavm_report_file WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByReportId($value){
		$sql = 'DELETE FROM uavm_report_file WHERE report_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFilename($value){
		$sql = 'DELETE FROM uavm_report_file WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmReportFileMySql 
	 */
	protected function readRow($row){
		$uavmReportFile = new UavmReportFile();
		
		$uavmReportFile->rfId = $row['rf_id'];
		$uavmReportFile->reportId = $row['report_id'];
		$uavmReportFile->filename = $row['filename'];

		return $uavmReportFile;
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
	 * @return UavmReportFileMySql 
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