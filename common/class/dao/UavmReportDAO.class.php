<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmReportDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmReport 
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
 	 * @param uavmReport primary key
 	 */
	public function delete($report_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmReport uavmReport
 	 */
	public function insert($uavmReport);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmReport uavmReport
 	 */
	public function update($uavmReport);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByReportTime($value);

	public function queryByName($value);

	public function queryByDesc($value);

	public function queryByGenTime($value);

	public function queryByTopicId($value);

	public function queryByEnable($value);


	public function deleteByReportTime($value);

	public function deleteByName($value);

	public function deleteByDesc($value);

	public function deleteByGenTime($value);

	public function deleteByTopicId($value);

	public function deleteByEnable($value);


}
?>