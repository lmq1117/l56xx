<?php
set_time_limit(0);
ini_set('memory_limit', '-1');
$publicKey = openssl_pkey_get_public(file_get_contents('./32-2/public_key.pem'));
$privateKey = openssl_pkey_get_private(file_get_contents('./32-2/private_key.pem'));