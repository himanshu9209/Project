Requirements
	PHP 5.x
	Mysql 5.X
	Apache2
	Prpel ORM
	PHP Github API 2.0 
	JSGrid


Install
	
	First Install Propel ORM
		
		Via Composer
		Fist,Download composer, type following in terminal, this will download composer.phar file
		
		$ wget http://getcomposer.org/composer.phar
		# If you haven't wget on your computer
		$ curl -s http://getcomposer.org/installer | php
		
		to install your Project's dependancies type following
		
		$ php composer.phar install
		
		Above command will install Propel and Github API into vendor folder.
		to test Propelinstallation type following in terminal
		
		vendor/propel/propel/bin/propel
		
		this will output Propel virsion and help commands.once Propelinstallation is tested we need to build our Project.
		
Build Project in Propel
	
		create Database named "Project_test" in your mysql server.(You can choose DB name as you like,but if you do so make sure to change DB name in schema.xml and propel.php)
	
		schema.xml and propel.php files has all neccessory DB configuration information.
		
		type following commands in terminal
		
		vendor/propel/propel/bin/propel sql:build     [ This will generate sql code for your schema ]
		
		vendor/propel/propel/bin/propel model:build   [ This will generate a new generated-classes flder containing all files/code you need to interect with tables in your DB ]
		
		
		NOW IMPORTANT STEP
			
				open composer.json file in your favorite editor and add following code.
				
						{
							.......
							.......
							"autoload": {
								"classmap": ["generated-classes/"]
							}
							
							
						}	
						
						
						
						
						}
						
						Final composer.json file should look like following
						
						
						{
							"require": {
								"propel/propel": "~2.0@dev",
								"knplabs/github-api": "^2.6",
								"php-http/guzzle6-adapter": "^1.1"
							},
							"autoload": {
								"classmap": ["generated-classes/"]
							}

						}
						
						
		   Once you are done updating composer.json file type following command in terminal
		   
		   		composer dump-autoload     [OR php composer.phar dump-autoload if you dont have composer utility installed in your machine]
				
		   Once done comfig dumping issue following command in you terminal.
		   
		   		vendor/propel/propel/bin/propel  config:convert   [This will read runtime section of config file and create relative PHP script, resulting file willl be at generated-conf/config.php]
				
				
		  Now, issue following command,it will create table in Databse if you already have table it will drop and create it.
		  
		  		vendor/propel/propel/bin/propel sql:insert
		
		
		
		
		
		
		
		


