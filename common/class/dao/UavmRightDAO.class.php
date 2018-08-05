<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmRightDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmRight 
	 */
	public function load($id);

	/**
	 * Get all records from table
	 */
	public function queryAll();
	
	/**
	 * Get all records from table ordered by field
	 * @Param $orderColumn column name
	 */
	public function queryAllOrderBy($orderColumn);
	
	/**
 	 * Delete record from table
 	 * @param uavmRight primary key
 	 */
	public function delete($right_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmRight uavmRight
 	 */
	public function insert($uavmRight);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmRight uavmRight
 	 */
	public function update($uavmRight);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDesc($value);


	public function deleteByName($value);

	public function deleteByDesc($value);


}
?>