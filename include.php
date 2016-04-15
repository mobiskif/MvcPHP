<?php
require_once ('mvc/O.php');
require_once ('mvc/Controller.php');
require_once ('mvc/Model.php');
require_once ('mvc/View.php');
require_once ('mvc/Template.php');

function toTable($arr) {
	if (! is_object ( $arr ) and ! is_array ( $arr )) return $arr;
	else {
		if (is_object ( $arr )) {$each = get_object_vars ( $arr ); $prefix=get_class($arr);}
		else {$each=$arr; $prefix="";}
		$s = $prefix.'<table>';
		foreach ( $each as $key => $value ) $s .= "<tr><td>" . $key . " </td><td> " . toTable( $value ) . "</td></tr>";
		return $s."</table>";
	}
}

function toUl($arr, $prefix=null) {
	if (! is_object ( $arr ) and ! is_array ( $arr )) return $arr;
	else {
		$s = '<ul>';
		if (is_object ( $arr )) $each = get_object_vars ( $arr );
		else $each=$arr;
		foreach ( $each as $key => $value ) $s .= '<li><a href="?action='.$prefix.toUl( $value ).'">' . toUl( $value ) . "</a></li>";
		return $s."</ul>";
	}
}

function toOptions($arr) {
	if (! is_object ( $arr ) and ! is_array ( $arr )) return $arr;
	else {
		$s = '';
		if (is_object ( $arr )) $each = get_object_vars ( $arr );
		else $each=$arr;
		foreach ( $each as $key => $value ) $s .= "<option>" . toOptions( $value ) . "</option>";
		return $s;
	}
}

function toPartners($arr) {
	if (! is_object ( $arr ) and ! is_array ( $arr )) return '<img src="img/Unknown.gif" width="48" /> '.$arr;
	else {
		$s = '<ol>';
		if (is_object ( $arr )) $each = get_object_vars ( $arr );
		else $each=$arr;
		foreach ( $each as $key => $value ) $s .= '<li class="hover">' . toPartners( $value ) . "</li>";
		return $s.'</ol>';
	}
}

?>
