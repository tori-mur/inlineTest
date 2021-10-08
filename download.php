<?php 
      $tableName = 'posts';
      $json_posts = file_get_contents('https://jsonplaceholder.typicode.com/posts'); 
      $jsonDataPosts = json_decode($json_posts, true); 
      $json_comments = file_get_contents('https://jsonplaceholder.typicode.com/comments'); 
      $jsonDataComments= json_decode($json_comments, true); 
      $x = 0;
      $y = 0;
      
      foreach ($jsonDataPosts as $id=>$row) {
        $insertPairs = array();
        foreach ($row as $key=>$val) {
          $insertPairs[addslashes($key)] = addslashes($val);
         }
         $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
         $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';
         
         mysql_query("INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});");
         $x++;
       }

       $tableName = 'comments';
       $insertPairs = null;

       foreach ($jsonDataComments as $id=>$row) {
        $insertPairs = array();
        foreach ($row as $key=>$val) {
          $insertPairs[addslashes($key)] = addslashes($val);
         }
         $insertKeys = '`' . implode('`,`', array_keys($insertPairs)) . '`';
         $insertVals = '"' . implode('","', array_values($insertPairs)) . '"';
         
         mysql_query("INSERT INTO `{$tableName}` ({$insertKeys}) VALUES ({$insertVals});");
         $y++;
       }


       echo "Загружено $x записей и $y комментариев";
 
  ?> 
