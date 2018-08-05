<?php

	// 查询所有的日志类别
	function allblogcatagorys(){
		$res = db_fetch(DB_ALL, 'SELECT * FROM `b_catagory`');
		for($i = 0; $i < count($res); $i++)
		{
			$res[$i]['subcatagory'] = db_fetch(DB_ALL, "SELECT * FROM b_subcatagory where `cid` = ? ", 'i',  $res[$i]['cid']);
		}

		return $res;
	}

	// 查询所有的日志
	function blogs($subcatagory = 0){
		if ($subcatagory == 0)
		{
			$res = db_fetch(DB_ALL, 'SELECT a.bid, a.name, a.content, a.inserttime, b.name as sname FROM `b_blog` a left outer join `b_subcatagory` b on a.sid = b.sid');

		}else {
			$res = db_fetch(DB_ALL, 'SELECT a.bid, a.name, a.content, a.inserttime, b.name as sname FROM `b_blog` a left outer join `b_subcatagory` b on a.sid = b.sid where a.sid = ?', 'i', $subcatagory);
		}
		return $res;
	}

	// 按照编号查询日志
	function blogbyid($bid){
		$res = db_fetch(DB_ROW, 'SELECT a.bid, a.name, a.content, a.inserttime, b.name as sname FROM `b_blog` a left outer join `b_subcatagory` b on a.sid = b.sid where `bid` = ? ', 'i', $bid);
		return $res;
	}

    function notebyid($nid){
        $res = db_fetch(DB_ROW, 'select * from `n_note` where `nid` = ?', 'i', $nid);
        return $res;
    }

	// 日志主题
	function topics(){
		$res = db_fetch(DB_ALL, 'SELECT * from `n_topic`');
		return $res;
	}

    // 查询日志
    function notes($tid = 0)
    {
        if($tid != 0)
        {
            $res = db_fetch(DB_ALL, 'SELECT b.nid, b.content, b.inserttime, b.enable from `n_note_topic` a left outer join `n_note` b on a.nid = b.nid where a.tid = ? order by b.inserttime desc;', 'i', $tid);
        
        }
        else {
            $res = db_fetch(DB_ALL, 'SELECT * from `n_note` order by inserttime desc;');
        }
		for($i = 0; $i < count($res); $i++)
		{
			$res[$i]['topics'] = db_fetch(DB_ALL, "SELECT b.tid, b.name FROM `n_note_topic` a left outer join `n_topic` b on a.tid = b.tid where `nid` = ? ", 'i',  $res[$i]['nid']);
		}
        return $res;
    }

	
?>
