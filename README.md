meh
======
Meh is a tiny [Sinatra-like](https://github.com/sinatra/sinatra) PHP router. It's only 975 bytes. 

How to use?
--------
If you are using the default .htaccess, create a PHP file called "index.php" and define your routes:

	require 'meh.min.php';
	meh::get('/about', function(){
		return 'weirdo';
	});


Of course, you can use regexps too:

	require 'meh.min.php';
	meh::get('/about/(.*)', function($name)){
		return 'I know nothing about '.$name[1];
	});


What about the post method?

	require 'meh.min.php';
	require 'orm.php';
	meh::post('/about', function(){
		$users = ORM::for_table('users')->where_equals('id', (int)$_POST['id'])->find_many();
		return include 'files.php';
	});


##### You can use meh::any() to accept any HTTP methods. #####