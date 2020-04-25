<?php
return
[
	'debug_kit' => [
		'className' => 'Cake\Database\Connection',
		'driver' => 'Cake\Database\Driver\Mysql',
		'persistent' => false,
		'host' => 'ec2-46-137-156-205.eu-west-1.compute.amazonaws.com',
		'port' => '5432',
		'username' => 'eobfgjvacoqygt',    // Your DB username here
		'password' => '19088dae2aebd163545396551ee613c20af9d3e988963661a4b764d0a6d163fa',    // Your DB password here
		'database' => 'd1eqp6e36t6rhs',
		'encoding' => 'utf8',
		'timezone' => 'UTC',
		'cacheMetadata' => true,
		'quoteIdentifiers' => false,
		//'init' => ['SET GLOBAL innodb_stats_on_metadata = 0'],
	],
	'Log' => [
        'debug' => [
            'className' => 'DatabaseLog.Database',
            'scope' => false,
        ],
        'error' => [
            'className' => 'DatabaseLog.Database',
            'scope' => false,
        ],
    ],
    'DatabaseLog' => [
        'datasource' => 'default',
    ]
]
?>