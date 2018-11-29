<?php
require('register.php');

$persona = new person('Ale', 22, '1.88m');
echo $persona->get_data();