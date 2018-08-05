<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmRoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmRole 
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
 	 * @param uavmRole primary key
 	 */
	public function delete($role_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmRole uavmRole
 	 */
	public function insert($uavmRole);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmRole uavmRole
 	 */
	public function update($uavmRole);	

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