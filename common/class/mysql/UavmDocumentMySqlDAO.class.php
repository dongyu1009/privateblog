<?php
/**
 * Class that operate on table 'uavm_document'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmDocumentMySqlDAO implements UavmDocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmDocumentMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_document WHERE document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_document';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_document ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmDocument primary key
 	 */
	public function delete($document_id){
		$sql = 'DELETE FROM uavm_document WHERE document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($document_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmDocumentMySql uavmDocument
 	 */
	public function insert($uavmDocument){
		$sql = 'INSERT INTO uavm_document (name, filename, gen_time, size, enable) VALUES (?, ?, ?, ?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmDocument->name);
		$sqlQuery->set($uavmDocument->filename);
		$sqlQuery->set($uavmDocument->genTime);
		$sqlQuery->set($uavmDocument->size);
		$sqlQuery->setNumber($uavmDocument->enable);

		$id = $this->executeInsert($sqlQuery);	
		$uavmDocument->documentId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmDocumentMySql uavmDocument
 	 */
	public function update($uavmDocument){
		$sql = 'UPDATE uavm_document SET name = ?, filename = ?, gen_time = ?, size = ?, enable = ? WHERE document_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmDocument->name);
		$sqlQuery->set($uavmDocument->filename);
		$sqlQuery->set($uavmDocument->genTime);
		$sqlQuery->set($uavmDocument->size);
		$sqlQuery->setNumber($uavmDocument->enable);

		$sqlQuery->setNumber($uavmDocument->documentId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_document';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_document WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByFilename($value){
		$sql = 'SELECT * FROM uavm_document WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByGenTime($value){
		$sql = 'SELECT * FROM uavm_document WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryBySize($value){
		$sql = 'SELECT * FROM uavm_document WHERE size = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByEnable($value){
		$sql = 'SELECT * FROM uavm_document WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_document WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByFilename($value){
		$sql = 'DELETE FROM uavm_document WHERE filename = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByGenTime($value){
		$sql = 'DELETE FROM uavm_document WHERE gen_time = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteBySize($value){
		$sql = 'DELETE FROM uavm_document WHERE size = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByEnable($value){
		$sql = 'DELETE FROM uavm_document WHERE enable = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmDocumentMySql 
	 */
	protected function readRow($row){
		$uavmDocument = new UavmDocument();
		
		$uavmDocument->documentId = $row['document_id'];
		$uavmDocument->name = $row['name'];
		$uavmDocument->filename = $row['filename'];
		$uavmDocument->genTime = $row['gen_time'];
		$uavmDocument->size = $row['size'];
		$uavmDocument->enable = $row['enable'];

		return $uavmDocument;
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
	 * @return UavmDocumentMySql 
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