<?php

	/**
	 * Boot
	 * 
	 * @author Mario Sakamoto <mskamot@gmail.com>
	 * @see https://wtag.com.br/getz
	 */
	 
	$settings = simplexml_load_file("settings.xml");
	
	/*
	 * Settings.xml
	 */
	if (!file_exists("../../settings.xml")) {
		$fo = fopen("../../settings.xml", "w");
		
		$fw = fwrite($fo, "<?xml version=\"1.0\" encoding=\"UTF-8\" ?>
<settings>
	<project>" . $settings->project . "</project>
	<package>" . $settings->project . "</package>
	<connection>
		<is_official>false</is_official>
	</connection>
</settings>");	

		fclose($fo);
	}

	/*
	 * Connection.php
	 */
	if (!file_exists("../../src/logic/Connection.php")) {
		$fo = fopen("../../src/logic/Connection.php", "w");
		
		$fw = fwrite($fo, "<?php

	/**
	 * Connection
	 *
	 * @author Mário Sakamoto <mskamot@gmail.com>
	 * @see http://mariosakamoto.com/getz 
	 */
	 
	namespace src\\logic;

	class Connection {

		private \$server;
		private \$userName;
		private \$password;
		private \$dataBase;
	
		public function __construct(\$_DAO_FACTORY_IS_OFFICIAL) {
			if (\$_DAO_FACTORY_IS_OFFICIAL == \"true\") {
				\$this->setServer(\"" . $settings->official->server . "\");
				\$this->setUserName(\"" . $settings->official->username . "\");
				\$this->setPassword(\"" . $settings->official->password . "\");
				\$this->setDatabase(\"" . $settings->official->database . "\");
			} else {
				\$this->setServer(\"" . $settings->localhost->server . "\");
				\$this->setUsername(\"" . $settings->localhost->username . "\");
				\$this->setPassword(\"" . $settings->localhost->password . "\");
				\$this->setDatabase(\"" . $settings->localhost->database . "\");
			}
		}
		
		/**
		 * @param {String} server
		 */
		private function setServer(\$server) {
			\$this->server = \$server;
		}
		
		/**
		 * @return {String}
		 */
		public function getServer() {
			return \$this->server;
		}
		
		/**
		 * @param {String} userName
		 */
		private function setUsername(\$username) {
			\$this->username = \$username;
		}
		
		/**
		 * @return {String}
		 */
		public function getUsername() {
			return \$this->username;
		}
		
		/**
		 * @param {String} password
		 */
		private function setPassword(\$password) {
			\$this->password = \$password;
		}
		
		/**
		 * @return {String}
		 */
		public function getPassword() {
			return \$this->password;
		}
		
		/**
		 * @param {String} dataBase
		 */ 
		private function setDatabase(\$database) {
			\$this->database = \$database;
		}
		
		/**
		 * @return {String}
		 */
		public function getDatabase() {
			return \$this->database;
		}

	}

?>");	

		fclose($fo);
	}	
	
	/*
	 * Reveng.bat
	 */
	if (!file_exists("reveng.bat")) {
		$fo = fopen("reveng.bat", "w");
		
		$fw = fwrite($fo, "@ECHO OFF
SET BIN_TARGET=%~dp0/../../lib/getz/reveng.php
php \"%BIN_TARGET%\" %*");	

		fclose($fo);
	}
	
	if (!file_exists("../../.htaccess")) {
		$ret = "Options -Indexes

<FilesMatch \"\\.(xml|ini)\$\">
	Deny from all
</FilesMatch>

<FilesMatch \"\\.(jpg|jpeg|png|gif|ico|css|js)\$\">
	Header set Cache-Control \"max-age=14400, public\"
</FilesMatch>

<FilesMatch \"\\.php\$\">
	Header set Cache-Control \"max-age=0, private, no-store, no-cache, must-revalidate\"
	Header set Pragma \"no-cache\"
</FilesMatch>

<IfModule mod_deflate.c>
  AddOutputFilterByType DEFLATE application/javascript
  AddOutputFilterByType DEFLATE application/rss+xml
  AddOutputFilterByType DEFLATE application/vnd.ms-fontobject
  AddOutputFilterByType DEFLATE application/x-font
  AddOutputFilterByType DEFLATE application/x-font-opentype
  AddOutputFilterByType DEFLATE application/x-font-otf
  AddOutputFilterByType DEFLATE application/x-font-truetype
  AddOutputFilterByType DEFLATE application/x-font-ttf
  AddOutputFilterByType DEFLATE application/x-javascript
  AddOutputFilterByType DEFLATE application/xhtml+xml
  AddOutputFilterByType DEFLATE application/xml
  AddOutputFilterByType DEFLATE font/opentype
  AddOutputFilterByType DEFLATE font/otf
  AddOutputFilterByType DEFLATE font/ttf
  AddOutputFilterByType DEFLATE image/svg+xml
  AddOutputFilterByType DEFLATE image/x-icon
  AddOutputFilterByType DEFLATE text/css
  AddOutputFilterByType DEFLATE text/html
  AddOutputFilterByType DEFLATE text/javascript
  AddOutputFilterByType DEFLATE text/plain
  AddOutputFilterByType DEFLATE text/xml
</IfModule>

RewriteEngine On
RewriteBase /" . $settings->project . "/

#RewriteCond %{HTTPS} off
#RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301,NE]
#Header always set Content-Security-Policy \"upgrade-insecure-requests;\"

# File urls
RewriteRule ^file/([^/]*)/([0-9]*)/?\$ mod/file/Getz.php?method=file&code=\$2&screen=\$1 [NC,L]

# API urls
RewriteRule ^api/([^/]*)/([^/]*)/?\$ mod/api/Getz.php?method=api-\$2&screen=\$1 [NC,L]

# WS urls
RewriteRule ^ws/([^/]*)/sys-create/?\$ mod/ws/Getz.php?method=create&code=&search=&position=1&screen=\$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/sys-screen/([^/]*)/([0-9]*)/?\$ mod/ws/Getz.php?method=screen&code=&search=\$2&position=\$3&screen=\$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/sys-screen/([0-9]*)/?\$ mod/ws/Getz.php?method=screen&code=&search=&position=\$2&screen=\$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/sys-screenHandler/([^/]*)/?\$ mod/ws/Getz.php?method=screenHandler&code=&search=\$2&position=1&screen=\$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/sys-update/([0-9]*)/?\$ mod/ws/Getz.php?method=update&code=\$2&search=&position=1&screen=\$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/sys-delete/([^/]*)/?\$ mod/ws/Getz.php?method=delete&code=\$2&search=&position=1&screen=\$1&base=&order= [NC,L]

RewriteRule ^ws/([^/]*)/create/?$ mod/ws/Getz.php?method=ws-create&code=&search=&position=1&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/read/([0-9]*)/([0-9]*)/?$ mod/ws/Getz.php?method=ws-read&code=$2&search=&position=$3&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/read/([^/]*)/([0-9]*)/?$ mod/ws/Getz.php?method=ws-read&code=&search=$2&position=$3&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/read/([0-9]*)/?$ mod/ws/Getz.php?method=ws-read&code=&search=&position=$2&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/update/([0-9]*)/?$ mod/ws/Getz.php?method=ws-update&code=$2&search=&position=1&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/delete/([^/]*)/?$ mod/ws/Getz.php?method=ws-delete&code=$2&search=&position=1&screen=$1&base=&order= [NC,L]
RewriteRule ^ws/([^/]*)/([^/]*)/([^/]*)?$ mod/ws/Getz.php?method=$2&code=&search=&position=1&screen=$1&base=&order=&parameters=$3 [NC,L]
RewriteRule ^ws/([^/]*)/([^/]*)/?$ mod/ws/Getz.php?method=$2&code=&search=&position=1&screen=$1&base=&order= [NC,L]

# CMS urls
RewriteRule ^cms/([^/]*)/create/([^/]*)/([0-9]*)/([^/]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=\$2&position=\$3&screen=\$1&base=&order=\$4 [NC,L]
RewriteRule ^cms/([^/]*)/create/([^/]*)/([0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=\$2&position=\$3&screen=\$1&base=&order= [NC,L]
RewriteRule ^cms/([^/]*)/create/([0-9]*)/([^/]*)?\$ mod/cms/Getz.php?method=stateCreate&code=&search=&position=\$2&screen=\$1&base=&order=\$3 [NC,L]
RewriteRule ^cms/([^/]*)/create/([0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=&position=\$2&screen=\$1&base=&order= [NC,L]
RewriteRule ^cms/([^/]*)/create/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=&position=1&screen=\$1&base=&order= [NC,L]

RewriteRule ^cms/([^/]*)/([0-9]*)/([^/]*)/?\$ mod/cms/Getz.php?method=stateRead&code=&search=&position=\$2&screen=\$1&base=&order=\$3 [NC,L]
RewriteRule ^cms/([^/]*)/([0-9]*)/?\$ mod/cms/Getz.php?method=stateRead&code=&search=&position=\$2&screen=\$1&base=&order= [NC,L]

RewriteRule ^cms/([^/]*)/update/([0-9]*)/([^/]*)/([0-9]*)/([^/]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$2&search=\$3&position=\$4&screen=\$1&base=&order=\$5 [NC,L]
RewriteRule ^cms/([^/]*)/update/([0-9]*)/([^/]*)/([0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$2&search=\$3&position=\$4&screen=\$1&base=&order= [NC,L]
RewriteRule ^cms/([^/]*)/update/([0-9]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?$ mod/cms/Getz.php?method=stateUpdate&code=$2&search=&position=$3&screen=$1&base=&order=&historyBack=$4 [NC,L]
RewriteRule ^cms/([^/]*)/update/([0-9]*)/([0-9]*)/([^/]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$2&search=&position=\$3&screen=\$1&base=&order=\$4 [NC,L]
RewriteRule ^cms/([^/]*)/update/([0-9]*)/([0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$2&search=&position=\$3&screen=\$1&base=&order= [NC,L]

RewriteRule ^cms/([^/]*)/search/([^/]*)/([0-9]*)/([^/]*)/?\$ mod/cms/Getz.php?method=stateRead&code=&search=\$2&position=\$3&screen=\$1&base=&order=\$4 [NC,L]
RewriteRule ^cms/([^/]*)/search/([^/]*)/([0-9]*)/?\$ mod/cms/Getz.php?method=stateRead&code=&search=\$2&position=\$3&screen=\$1&base=&order= [NC,L]

RewriteRule ^cms/([^/]*)/called/([0-9]*)/create/([^/]*)/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=\$3&position=\$4&screen=\$1&base=\$2&order=\$5&historyBack=\$6 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/create/([^/]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=\$3&position=\$4&screen=\$1&base=\$2&order=&historyBack=\$5 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/create/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=&position=\$3&screen=\$1&base=\$2&order=\$4&historyBack=\$5 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/create/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCreate&code=&search=&position=\$3&screen=\$1&base=\$2&order=&historyBack=\$4 [NC,L]

RewriteRule ^cms/([^/]*)/called/([0-9]*)/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCalled&code=&search=&position=\$3&screen=\$1&base=\$2&order=\$4&historyBack=\$5 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCalled&code=&search=&position=\$3&screen=\$1&base=\$2&order=&historyBack=\$4 [NC,L]

RewriteRule ^cms/([^/]*)/called/([0-9]*)/update/([0-9]*)/([^/]*)/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$3&search=\$4&position=\$5&screen=\$1&base=\$2&order=\$6&historyBack=\$7 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/update/([0-9]*)/([^/]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$3&search=\$4&position=\$5&screen=\$1&base=\$2&order=&historyBack=\$6 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/update/([0-9]*)/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$3&search=&position=\$4&screen=\$1&base=\$2&order=\$5&historyBack=\$6 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/update/([0-9]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateUpdate&code=\$3&search=&position=\$4&screen=\$1&base=\$2&order=&historyBack=\$5 [NC,L]

RewriteRule ^cms/([^/]*)/called/([0-9]*)/search/([^/]*)/([0-9]*)/([^/]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCalled&code=&search=\$3&position=\$4&screen=\$1&base=\$2&order=\$5&historyBack=\$6 [NC,L]
RewriteRule ^cms/([^/]*)/called/([0-9]*)/search/([^/]*)/([0-9]*)/historyBack/(\-?[0-9]*)/?\$ mod/cms/Getz.php?method=stateCalled&code=&search=\$3&position=\$4&screen=\$1&base=\$2&order=&historyBack=\$5 [NC,L]

RewriteRule ^cms/?\$ mod/cms/Getz.php?method=stateRead&code=&search=&position=1&screen=dashboard&base=&order=&historyBack= [NC,L]

# Page urls
RewriteRule ^([^/]*)/search/([^/]*)/([0-9]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=\$3&code=&search=\$2 [NC,L]
RewriteRule ^([^/]*)/search/([^/]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=1&code=&search=\$2 [NC,L]
RewriteRule ^([^/]*)/([0-9]*)/([0-9]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=\$3&code=\$2&search= [NC,L]
RewriteRule ^([^/]*)/([^/]*)/([0-9]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=\$3&code=&search=&friendly=\$2 [NC,L,B,PT]
RewriteRule ^dev/boot/?\$ _dev/bin/Boot.php [NC,L]
RewriteRule ^dev/build/?\$ _dev/bin/Build.php [NC,L]
RewriteRule ^([^/]*)/([0-9]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=\$2&code=&search= [NC,L]
RewriteRule ^([^/]*)/([^/]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=1&code=&search=&friendly=\$2 [NC,L,B,PT]
RewriteRule ^/?\$ mod/page/Getz.php?screen=home&method=page&position=1&code=&search= [NC,L]
RewriteRule ^([^/]*)/?\$ mod/page/Getz.php?screen=\$1&method=page&position=1&code=&search= [NC,L]";
		
		$fo = fopen("../../.htaccess", "w");
		$fw = fwrite($fo, $ret);
		
		fclose($fo);
	}
	
	/*
	 * Sitemap.xml
	 */
	if (!file_exists("../../sitemap.xml")) {
		$fo = fopen("../../sitemap.xml", "w");
		
		$fw = fwrite($fo, "<?xml version=\"1.0\" encoding=\"UTF-8\"?>
<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">
	<url>
		<loc>" . $settings->domain . "</loc>
		<lastmod>" . date("Y-m-d") . "</lastmod>
		<changefreq>weekly</changefreq>
		<priority>1.0</priority>
	</url>

	<url>
		<loc>" . $settings->domain . "/@_PAGE</loc>
	</url>
</urlset>");	

		fclose($fo);
	}
	
	/*
	 * Robot.xml
	 */
	if (!file_exists("../../robots.txt")) {
		$fo = fopen("../../robots.txt", "w");
		
		$fw = fwrite($fo, "User-agent: *
Disallow: /lib/
Disallow: /res/
Disallow: /src/
Sitemap: " . $settings->domain . "/sitemap.xml");	

		fclose($fo);
	}	
	
?>