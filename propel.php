<?php

return [
    'propel' => [
        'database' => [
            'connections' => [
                'Project_test' => [
                    'adapter'    => 'mysql',
                    'classname'  => 'Propel\Runtime\Connection\ConnectionWrapper',
                    'dsn'        => 'mysql:host=localhost;dbname=test_test',
                    'user'       => '',
                    'password'   => '',
                    'attributes' => []
                ]
            ]
        ],
        'runtime' => [
            'defaultConnection' => 'Project_test',
            'connections' => ['Project_test']
        ],
        'generator' => [
            'defaultConnection' => 'Project_test',
            'connections' => ['Project_test'],
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

