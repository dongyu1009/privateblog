<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmUserTopicDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmUserTopic 
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
 	 * @param uavmUserTopic primary key
 	 */
	public function delete($um_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmUserTopic uavmUserTopic
 	 */
	public function insert($uavmUserTopic);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmUserTopic uavmUserTopic
 	 */
	public function update($uavmUserTopic);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByUserId($value);

	public function queryByTopicId($value);

	public function queryByGenTime($value);

	public function queryByEnable($value);


	public function deleteByUserId($value);

	public function deleteByTopicId($value);

	public function deleteByGenTime($value);

	public function deleteByEnable($value);


}
?>