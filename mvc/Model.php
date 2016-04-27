<?php
class Model extends O {
	public $template;
	public $lessons = array (
			"Lesson0",
			"Lesson1",
			"Lesson2",
			"Lesson3",
	);

	public $partners = array (
			"mobiskif@gmail.com",
			"taroeclipse@gmail.com",
			"mobiskif@hotmail.com"
	);

	public $templates = array (
			"Dark",
			"Light"
	);
	
	function needChanges($arg) {
		if (isset($arg->arg["action"])) {
			if ($arg->arg["action"]=="Save") return false;
			elseif ($arg->arg["action"]=="templateDark") return false;
			elseif ($arg->arg["action"]=="templateLight") return false;
			else return true;
		}
		else return false;
	}

	function read() {
		$value = parent::read();
		$this->oldlessons = new O(null);
		$this->template = new Template(null);
		if (isset($this->arg->value)) {
			switch ($this->arg->value) {
				case "Save":
					if (isset($this->oldlessons->value)) array_push($this->oldlessons->value,$value);
					else $this->oldlessons->value = array ($value);
					$this->oldlessons->update($this->oldlessons);
					break;
				case "templateDark":
					$this->template->value=$this->arg->value;
					$this->template->update($this->template);
					break;
				case "templateLight":
					$this->template->value=$this->arg->value;
					$this->template->update($this->template);
					break;
				default:
					return $value;
					break;
			}
		}
		return $value;
	}
	
	function update($arg) {
		$this->oldlessons = new O(null);
		$this->template = new Template(null);
		return parent::update($arg);
	}
	
}
?>