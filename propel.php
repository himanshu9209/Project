<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'test_test' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=test_test',
                    'user'       => 'hpatel',
                    'password'   => 'ha97jq',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'test_test',
            'connections' => ['test_test']
        ],
        'generator' => [
            'defaultConnection' => 'test_test',
            'connections' => ['test_test'],
			'dateTime' => [
								'useDateTimeClass'=> true,
								'dateTimeClass'=> '',
								'defaultTimeStampFormat'=> 'm-d-Y',
								'defaultTimeFormat'=> 'H:i:s',
								'defaultDateFormat'=> 'm-d-Y'
						  ]
        ]
    ]
];

