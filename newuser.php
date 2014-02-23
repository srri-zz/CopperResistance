<?php

echo phpversion();

include 'core/components/database.php';
include 'core/components/classes/User.class.php';
include 'core/components/classes/UserModel.class.php';

$user = new User('test', 'password123');
$user->register();


