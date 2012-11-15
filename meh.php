<?php
	class meh {
		public static function get($page, $function){
			self::call($page, 'get', $function);
		}

		public static function post($page, $function){
			self::call($page, 'post', $function);
		}

		public static function any($page, $function){
			self::call($page, 'any', $function);
		}

		public static function options($page, $function){
			self::call($page, 'options', $function);
		}

		public static function head($page, $function){
			self::call($page, 'head', $function);
		}

		public static function put($page, $function){
			self::call($page, 'put', $function);
		}

		public static function delete($page, $function){
			self::call($page, 'delete', $function);
		}

		public static function trace($page, $function){
			self::call($page, 'trace', $function);
		}

		public static function connect($page, $function){
			self::call($page, 'connect', $function);
		}

		private static function call($page, $method, $function){
			if(preg_match('/'.$page.'/i', $_SERVER['REQUEST_URI'], $param) && (strtolower($_SERVER['REQUEST_METHOD']) == $method || $method == 'any')){
				echo call_user_func($function, $param); 
			}
		}
	}
?>