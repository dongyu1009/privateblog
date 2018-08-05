<?php

require './init.php';

$topics = topics();

$tid = I('tid', 'get', 'id');

$notes = notes($tid);

require "./view/notes.html";
