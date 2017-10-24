<?php

// setup the autoloading
require_once 'vendor/autoload.php';

// setup Propel
require_once 'generated-conf/config.php';


$repoObj = new Repositories();

$repos = RepositoriesQuery::create()->find();

echo $repos->toJSON();








?>