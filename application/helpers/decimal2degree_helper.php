<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('convertTodecimal'))
    {
        function convertTodecimal($token)
            {
                $a = $token - $token%100;
				$a = $a/100;
				$a = intval($a);
				
				$b = ($token*10000)-($a*1000000);  
				$b = (substr($b,0,2)/60 + substr($b,2,2)/3600  + substr($b,4,2)/21600 );
			    return $c = $a+$b;
            }
    }
