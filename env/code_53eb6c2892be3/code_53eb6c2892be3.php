<?php
    $url = 'https://mysite.com/test/1234?basic=2&email=xyz2@test.com';
    $parts = parse_url($url);
    parse_str($parts['query'], $query);
    echo $query['email'];
?>
