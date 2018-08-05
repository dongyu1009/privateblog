<?php

    require './init.php';


    $nid = I('nid', 'get', 'id');

    $note = NULL;
    if($nid != NULL)
    {
        $note = notebyid($nid);
    }

    if($_POST)
    {
        if($nid == NULL)
        {
            $input = [
                'content' => I('content', 'post', 'string')
            ];
            $res = db_query('insert into `n_note` (`content`) values (?);', 's', $input);


        }else {
            $input = [
                'content' => I('content', 'post', 'string'),
                'nid' => $nid 
            ];
            $res = db_query('update `n_note` set `content` = ? where `nid` = ?', 'si', $input);
        }
    
        redirect('./notes.php');
    }

    require './view/newnote.html';
