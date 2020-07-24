<?php
function autoload($className){
	include_once($className.".php");
}
spl_autoload_register("autoload");
?>
