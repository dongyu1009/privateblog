<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmTaskDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmTask 
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
 	 * @param uavmTask primary key
 	 */
	public function delete($task_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmTask uavmTask
 	 */
	public function insert($uavmTask);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmTask uavmTask
 	 */
	public function update($uavmTask);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByDesc($value);

	public function queryByModuleId($value);

	public function queryByTopicId($value);

	public function queryByUserId($value);

	public function queryByGenTime($value);

	public function queryByModTime($value);

	public function queryByPlanTime($value);

	public function queryByDelayTime($value);

	public function queryByFinishTime($value);

	public function queryByEnable($value);


	public function deleteByName($value);

	public function deleteByDesc($value);

	public function deleteByModuleId($value);

	public function deleteByTopicId($value);

	public function deleteByUserId($value);

	public function deleteByGenTime($value);

	public function deleteByModTime($value);

	public function deleteByPlanTime($value);

	public function deleteByDelayTime($value);

	public function deleteByFinishTime($value);

	public function deleteByEnable($value);


}
?>