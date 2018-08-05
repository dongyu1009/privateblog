<?php

/**
 * DAOFactory
 * @author: http://phpdao.com
 * @date: ${date}
 */
class DAOFactory{
	
	/**
	 * @return UavmDocumentDAO
	 */
	public static function getUavmDocumentDAO(){
		return new UavmDocumentMySqlExtDAO();
	}

	/**
	 * @return UavmModuleDAO
	 */
	public static function getUavmModuleDAO(){
		return new UavmModuleMySqlExtDAO();
	}

	/**
	 * @return UavmReportDAO
	 */
	public static function getUavmReportDAO(){
		return new UavmReportMySqlExtDAO();
	}

	/**
	 * @return UavmReportFileDAO
	 */
	public static function getUavmReportFileDAO(){
		return new UavmReportFileMySqlExtDAO();
	}

	/**
	 * @return UavmRightDAO
	 */
	public static function getUavmRightDAO(){
		return new UavmRightMySqlExtDAO();
	}

	/**
	 * @return UavmRoleDAO
	 */
	public static function getUavmRoleDAO(){
		return new UavmRoleMySqlExtDAO();
	}

	/**
	 * @return UavmRoleRightDAO
	 */
	public static function getUavmRoleRightDAO(){
		return new UavmRoleRightMySqlExtDAO();
	}

	/**
	 * @return UavmTaskDAO
	 */
	public static function getUavmTaskDAO(){
		return new UavmTaskMySqlExtDAO();
	}

	/**
	 * @return UavmTaskFileDAO
	 */
	public static function getUavmTaskFileDAO(){
		return new UavmTaskFileMySqlExtDAO();
	}

	/**
	 * @return UavmTopicDAO
	 */
	public static function getUavmTopicDAO(){
		return new UavmTopicMySqlExtDAO();
	}

	/**
	 * @return UavmUserDAO
	 */
	public static function getUavmUserDAO(){
		return new UavmUserMySqlExtDAO();
	}

	/**
	 * @return UavmUserRoleDAO
	 */
	public static function getUavmUserRoleDAO(){
		return new UavmUserRoleMySqlExtDAO();
	}

	/**
	 * @return UavmUserTopicDAO
	 */
	public static function getUavmUserTopicDAO(){
		return new UavmUserTopicMySqlExtDAO();
	}


}
?>