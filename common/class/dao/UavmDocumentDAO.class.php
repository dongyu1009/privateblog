<?php
/**
 * Intreface DAO
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
interface UavmDocumentDAO{

	/**
	 * Get Domain object by primry key
	 *
	 * @param String $id primary key
	 * @Return UavmDocument 
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
 	 * @param uavmDocument primary key
 	 */
	public function delete($document_id);
	
	/**
 	 * Insert record to table
 	 *
 	 * @param UavmDocument uavmDocument
 	 */
	public function insert($uavmDocument);
	
	/**
 	 * Update record in table
 	 *
 	 * @param UavmDocument uavmDocument
 	 */
	public function update($uavmDocument);	

	/**
	 * Delete all rows
	 */
	public function clean();

	public function queryByName($value);

	public function queryByFilename($value);

	public function queryByGenTime($value);

	public function queryBySize($value);

	public function queryByEnable($value);


	public function deleteByName($value);

	public function deleteByFilename($value);

	public function deleteByGenTime($value);

	public function deleteBySize($value);

	public function deleteByEnable($value);


}
?>