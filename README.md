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
	root 
		composer require phpoffice/phpspreadsheet
		composer require dompdf/dompdf
		
# Honorarios
Webapp de generación de planilla de liquidación de honorarios

#Realese Notes


#Roadmap
	PRG Codeigniter

#bugs
	Cuanddo selecciona un archovo muy grande el error mostrado no es el correcto

