<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmUserDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmUser 
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
 	 * @param uavmUser primary key
 	 */
	public function delete($user_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUser uavmUser
 	 */
	public function insert($uavmUser);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUser uavmUser
 	 */
	public function update($uavmUser);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByPhone($value);

	public function queryByPassword($value);

	public function queryByName($value);

	public function queryByEmail($value);

	public function queryByWcopenid($value);

	public function queryByGenTime($value);

	public function queryByLoginTime($value);

	public function queryByLoginCount($value);

	public function queryByEnable($value);


	public function deleteByPhone($value);

	public function deleteByPassword($value);

	public function deleteByName($value);

	public function deleteByEmail($value);

	public function deleteByWcopenid($value);

	public function deleteByGenTime($value);

	public function deleteByLoginTime($value);

	public function deleteByLoginCount($value);

	public function deleteByEnable($value);


}
?>