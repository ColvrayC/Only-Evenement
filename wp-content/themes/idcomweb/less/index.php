<?phpheader('content-type:text/css');require 'lessc.inc.php';$less = new lessc;echo $less->compileFile(dirname(__FILE__).'/../css/'.strip_tags($_GET['fichier']).'.less');