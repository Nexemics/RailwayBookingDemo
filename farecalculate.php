<?php
    $resultdist = "SELECT DISTINCT f.price 
                  FROM farechart AS f , bookings AS b 
                  WHERE f.fromstn = b.fromstn AND f.tostn = b.tostn
                  ORDER BY b.bookid DESC LIMIT 1";
    $querydist = mysqli_query($db, $resultdist);
    $fetchdist = mysqli_fetch_row($querydist);
    $resultclass = "SELECT DISTINCT c.price
                   FROM class AS c , bookings AS b
                   WHERE c.class = b.class
                   ORDER BY b.bookid DESC LIMIT 1";
    $queryclass = mysqli_query($db, $resultclass);
    $fetchclass = mysqli_fetch_row($queryclass);
    $resulttrain = "SELECT DISTINCT t.price 
                   FROM trains AS t , bookings AS b
                   WHERE t.traintype = b.traintype
                   ORDER BY b.bookid DESC LIMIT 1";
    $querytrain = mysqli_query($db, $resulttrain);
    $fetchtrain = mysqli_fetch_row($querytrain);
    $resultage = "SELECT DISTINCT p.passage
                  FROM passengers AS p , bookings AS b
                  WHERE p.bookid=b.bookid
                  ORDER BY b.bookid DESC LIMIT 1";
    $queryage = mysqli_query($db, $resultage);
    $fetchage = mysqli_fetch_row($queryage);
    if($fetchage[0] <= 5)
        $ageprice = 0;
    if($fetchage[0] > 5 && $fetchage[0] <= 60)
        $ageprice = 100;
    if($fetchage[0] >60)
        $ageprice = 50;
    $result = $fetchdist[0] + $fetchclass[0] + $fetchtrain[0] + $ageprice;
    $resultgst = (5/100) * $result;
?>