<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmUserRoleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmUserRole 
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
 	 * @param uavmUserRole primary key
 	 */
	public function delete($ur_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUserRole uavmUserRole
 	 */
	public function insert($uavmUserRole);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUserRole uavmUserRole
 	 */
	public function update($uavmUserRole);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByRoleId($value);

	public function queryByGenTime($value);

	public function queryByEnable($value);


	public function deleteByUserId($value);

	public function deleteByRoleId($value);

	public function deleteByGenTime($value);

	public function deleteByEnable($value);


}
?>