<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmReportFileDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmReportFile 
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
 	 * @param uavmReportFile primary key
 	 */
	public function delete($rf_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmReportFile uavmReportFile
 	 */
	public function insert($uavmReportFile);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmReportFile uavmReportFile
 	 */
	public function update($uavmReportFile);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByReportId($value);

	public function queryByFilename($value);


	public function deleteByReportId($value);

	public function deleteByFilename($value);


}
?>