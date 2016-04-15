<?php
class O {
	public $arg, $value;
	
	public function __construct($arg) {
		$this->arg=$arg;
		if ($this->needChanges($arg)) $this->value = $this->update($arg);
		else $this->value = $this->read();
	}
	
	function F($arg) {
		if (isset($this->map) && isset($this->map[$arg])) return $this->map[$arg];
		else return $arg;
	}
	
	function read() {
		$value = isset ( $_COOKIE [get_class($this)] ) ? unserialize($_COOKIE [get_class($this)]) : null;
		return $value;
	}
	
	function update($arg) {
		if (isset($arg->value)) $this->value = $this->F($arg->value);
		if (setcookie (get_class($this), serialize($this->value), time()+ 60*60*24*7)) return $this->value;
		else return "Jopa!";
	}

	function delete() {;}
	
	function needChanges($arg) {
		if ((is_object($arg)) && isset($arg->value)) return true;
		elseif ((is_array($arg)) && isset($arg["action"])) return true;
		else return false;
	}

	function show() {
		echo '<div id="O">'.toTable($this).'</div>';
	}
}

?>