<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmTopicDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmTopic 
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
 	 * @param uavmTopic primary key
 	 */
	public function delete($topic_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTopic uavmTopic
 	 */
	public function insert($uavmTopic);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTopic uavmTopic
 	 */
	public function update($uavmTopic);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByCode($value);

	public function queryByName($value);

	public function queryByDesc($value);


	public function deleteByCode($value);

	public function deleteByName($value);

	public function deleteByDesc($value);


}
?>