<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmTaskFileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmTaskFile 
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
 	 * @param uavmTaskFile primary key
 	 */
	public function delete($tf_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTaskFile uavmTaskFile
 	 */
	public function insert($uavmTaskFile);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTaskFile uavmTaskFile
 	 */
	public function update($uavmTaskFile);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByTaskId($value);

	public function queryByFilename($value);


	public function deleteByTaskId($value);

	public function deleteByFilename($value);


}
?>