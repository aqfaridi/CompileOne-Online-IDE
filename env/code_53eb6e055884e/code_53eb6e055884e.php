<?php
    $url = 'http://www.compileone.com/recoverpass.php?user=pankaj9310&code=0c2tcud0hg2i5l0pt14htd9j';
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    echo $query['code'];
    echo basename($_SERVER['REQUEST_URI'])
?>
