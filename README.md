# Honorarios
Webapp de generación de planilla de liquidación de honorarios

# Configuracoin de Entorno
CodeIGniter:
	root .htacces
		RewriteEngine on
		RewriteCond $1 !^(index\.php|resources|robots\.txt)
		RewriteCond %{REQUEST_FILENAME} !-f
		RewriteCond %{REQUEST_FILENAME} !-d
		RewriteRule ^(.*)$ index.php?/$1 [L,QSA]
	config.php 
		$config['index_page'] = '';
		date_default_timezone_set('America/Caracas');
	autoload.php
		$autoload['libraries'] =  array('database', 'email', 'session','grocery_CRUD');
		
		
