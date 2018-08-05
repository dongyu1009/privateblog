<?php
/**
 * Class that operate on table 'uavm_right'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmRightMySqlDAO implements UavmRightDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @return UavmRightMySql 
	 */
	public function load($id){
		$sql = 'SELECT * FROM uavm_right WHERE right_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($id);
		return $this->getRow($sqlQuery);
	}

	/**
	 * Get all records from table
	 */
	public function queryAll(){
		$sql = 'SELECT * FROM uavm_right';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
	 * Get all records from table ordered by field
	 *
	 * @param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn){
		$sql = 'SELECT * FROM uavm_right ORDER BY '.$orderColumn;
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
	/**
 	 * Delete record from table
 	 * @param uavmRight primary key
 	 */
	public function delete($right_id){
		$sql = 'DELETE FROM uavm_right WHERE right_id = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->setNumber($right_id);
		return $this->executeUpdate($sqlQuery);
	}
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmRightMySql uavmRight
 	 */
	public function insert($uavmRight){
		$sql = 'INSERT INTO uavm_right (name, desc) VALUES (?, ?)';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmRight->name);
		$sqlQuery->set($uavmRight->desc);

		$id = $this->executeInsert($sqlQuery);	
		$uavmRight->rightId = $id;
		return $id;
	}
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmRightMySql uavmRight
 	 */
	public function update($uavmRight){
		$sql = 'UPDATE uavm_right SET name = ?, desc = ? WHERE right_id = ?';
		$sqlQuery = new SqlQuery($sql);
		
		$sqlQuery->set($uavmRight->name);
		$sqlQuery->set($uavmRight->desc);

		$sqlQuery->setNumber($uavmRight->rightId);
		return $this->executeUpdate($sqlQuery);
	}

	/**
 	 * Delete all rows
 	 */
	public function clean(){
		$sql = 'DELETE FROM uavm_right';
		$sqlQuery = new SqlQuery($sql);
		return $this->executeUpdate($sqlQuery);
	}

	public function queryByName($value){
		$sql = 'SELECT * FROM uavm_right WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}

	public function queryByDesc($value){
		$sql = 'SELECT * FROM uavm_right WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->getList($sqlQuery);
	}


	public function deleteByName($value){
		$sql = 'DELETE FROM uavm_right WHERE name = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}

	public function deleteByDesc($value){
		$sql = 'DELETE FROM uavm_right WHERE desc = ?';
		$sqlQuery = new SqlQuery($sql);
		$sqlQuery->set($value);
		return $this->executeUpdate($sqlQuery);
	}


	
	/**
	 * Read row
	 *
	 * @return UavmRightMySql 
	 */
	protected function readRow($row){
		$uavmRight = new UavmRight();
		
		$uavmRight->rightId = $row['right_id'];
		$uavmRight->name = $row['name'];
		$uavmRight->desc = $row['desc'];

		return $uavmRight;
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
	 * @return UavmRightMySql 
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