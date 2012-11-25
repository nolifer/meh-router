meh
======
meh is a tiny [Sinatra-like](https://github.com/sinatra/sinatra) PHP router.

How to use?
--------
If you are using the default .htaccess, create a PHP file called "index.php" and define your routes:

	$meh = meh::start();
	$meh->get('/about', function(){
		return 'weirdo';
	});


Using a regexp
--------

	$meh = meh::start();
	$meh->get('/about/(.*)', function($name)){
		return 'I know nothing about '.$name[1];
	});


HTTP methods
--------
meh-router supports [8 HTTP methods](http://tools.ietf.org/html/rfc2616).

	meh::post('/about', function(){
		return 'hello, poster!';
	});
	
	meh::any('/about', function(){
		return 'hello, stranger!';
	});
	

Third-party codes
--------


    $meh = meh::start();
    $meh->modules(array(
                'blog' => 'blog.php'
            ));

    $meh->get('/blog/:numbers:', function($id) use($meh){
        return $meh->blog->get_title($id);
    });

	