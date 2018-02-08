<?php

	class Error
	{
		
		function __construct(argument)
		{
			set_error_handler("error_handler");
		}
	}