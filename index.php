<?php
require_once ('include.php');
$view = new View ( 
			new Model ( 
				new Controller ( $_REQUEST ) 
			) 
		);
$view->show ();
?>