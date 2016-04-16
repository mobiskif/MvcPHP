<?php
class Controller extends O {
	
	function update($arg) {
		if (isset($arg["action"])) return $arg["action"];
		else return "default";
	}
}
?>