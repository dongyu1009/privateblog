<?php
/**
 * Class that operate on table 'uavm_topic'. Database Mysql.
 *
 * @author: http://phpdao.com
 * @date: 2017-10-19 23:48
 */
class UavmTopicMySqlExtDAO extends UavmTopicMySqlDAO{

	public function queryAllWithTaskNum(){
		$sql = 'select a.topic_id, count(b.task_id) as count, count(b.finish_time) as fcount, a.name, max(b.finish_time) as lasttime from uavm_topic a left outer join uavm_task b on a.topic_id = b.topic_id group by a.topic_id;';
		$sqlQuery = new SqlQuery($sql);
		return $this->getList($sqlQuery);
	}
	
}
?>