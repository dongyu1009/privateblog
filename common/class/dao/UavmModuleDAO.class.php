<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:49
 */
interface UavmModuleDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmModule 
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
 	 * @param uavmModule primary key
 	 */
	public function delete($module_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmModule uavmModule
 	 */
	public function insert($uavmModule);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmModule uavmModule
 	 */
	public function update($uavmModule);	

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