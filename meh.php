<?php
    class meh {
        public $showErrors   = TRUE;
        protected $got       = 0;
        private $baw         = NULL;

        private function __construct(){ }

        public static function start()
        {
            return new self;
        }

        public function modules($modules)
        {
            if(!is_null($modules) && is_array($modules))
            {
                foreach($modules as $module => $file)
                {
                    include $file;
                    $this->$module = new $module;
                }   
            }
        }

        private function set($wat, $wut)
        {
            return $this->$wat = $wut;
        }

        public function get($page, $function)
        {
            self::call($page, 'get', $function);
        }

        public function post($page, $function)
        {
            self::call($page, 'post', $function);
        }

        public function any($page, $function){
            self::call($page, 'any', $function);
        }

        public function options($page, $function)
        {
            self::call($page, 'options', $function);
        }

        public function head($page, $function)
        {
            self::call($page, 'head', $function);
        }

        public function put($page, $function)
        {
            self::call($page, 'put', $function);
        }

        public function delete($page, $function)
        {
            self::call($page, 'delete', $function);
        }

        public function trace($page, $function)
        {
            self::call($page, 'trace', $function);
        }

        public function connect($page, $function)
        {
            self::call($page, 'connect', $function);
        }

        public function baw($why = 404, $function = null)
        {
            $this->baw = $function;
        }

        public function __destruct()
        {
            if($this->got == 0 && $this->showErrors == true)
            {
                if(is_null($this->baw))
                {
                    $this->baw = function()
                    {
                        return '<h1>bawwwww ;-;</h1>';
                    };
                }
                echo call_user_func($this->baw);
            }
        }

        private function call($page, $method, $function)
        {
            $page = str_replace(array(':anything:', ':numbers:', ':letters:', ':number:', ':letter:', '/'), array('(.*)', '([0-9]+)', '([a-zA-Z]+)', '([0-9])', '([a-zA-Z])', '\/'), $page);
            if(preg_match('/'.$page.'\/'.'/i', $_SERVER['REQUEST_URI'].'/', $param) && (strtolower($_SERVER['REQUEST_METHOD']) == $method || $method == 'any'))
            {
                $this->got++;
                if(count($param) <3)
                {
                    $param = $param[1];
                }
                echo call_user_func($function, $param); 
            }
        }
    }
