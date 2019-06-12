<?php

require_once 'app/bootstrap.php';

$bootstrap = \Magento\Framework\App\Bootstrap::create(BP, $_SERVER);

$sample = $bootstrap->getObjectManager()->create('\Psr\Log\LoggerInterface');

var_dump(get_class($sample));