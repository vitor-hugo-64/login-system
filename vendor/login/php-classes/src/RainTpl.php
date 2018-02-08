<?php
	
	use \Rain\Tpl;

	class RainTpl extends Tpl
	{

		private $config;
		
		function __construct()
		{

			$config = array(
	    		"tpl_dir" => "views/",
	    		"cache_dir" => "views-cache/"
			);

			Tpl::configure( $config );

		}

		public function drawTemplate($pages = array())
		{
			foreach ($pages as $value) {
				$this->draw("$value");
			}
		}
	}