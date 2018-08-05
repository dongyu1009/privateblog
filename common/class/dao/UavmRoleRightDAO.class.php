<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmRoleRightDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmRoleRight 
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
 	 * @param uavmRoleRight primary key
 	 */
	public function delete($rr_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmRoleRight uavmRoleRight
 	 */
	public function insert($uavmRoleRight);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmRoleRight uavmRoleRight
 	 */
	public function update($uavmRoleRight);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByRoleId($value);

	public function queryByRightId($value);

	public function queryByGenTime($value);

	public function queryByEnable($value);


	public function deleteByRoleId($value);

	public function deleteByRightId($value);

	public function deleteByGenTime($value);

	public function deleteByEnable($value);


}
?>