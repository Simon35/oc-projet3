<?php

function post($title,$content){
    global $db;

    $p = [
        'title'     =>  $title,
        'content'   =>  $content,

    ];

    $sql = "
      INSERT INTO posts(title,content,date)
      VALUES(:title,:content,NOW())
    ";

    $req = $db->prepare($sql);
    $req->execute($p);

}

