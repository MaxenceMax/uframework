<?php

spl_autoload_register(function ($className) {
	$className = ltrim($className, '\\');
	$fileName  = '';
	$namespace = '';

	if ($lastNsPos = strrpos($className, '\\')) {
		$namespace = substr($className, 0, $lastNsPos);
		$className = substr($className, $lastNsPos + 1);
		$fileName  = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
	}

	$fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
	$pahtSrc = 'src'.DIRECTORY_SEPARATOR;
	$pahtTests = 'tests'.DIRECTORY_SEPARATOR;

	if (file_exists(__DIR__.DIRECTORY_SEPARATOR.$pahtSrc.$fileName)) {
		require $pahtSrc.$fileName;
	}
	else if (file_exists(__DIR__.DIRECTORY_SEPARATOR.$pahtTests.$fileName)){
		require $pahtTests.$fileName;
	}
	else {
		echo sprintf('Class "%s" not found in "src" and "tests" directories.', $fileName);
	}

});