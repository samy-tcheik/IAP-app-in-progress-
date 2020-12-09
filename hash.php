<?php

$password = '123456';

$password_hash = md5($password);
var_dump($password_hash);