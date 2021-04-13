<?php
	/* Debugger CodeIgniter By Aliipp */
	/* Fingermedia Solution */
	function dumper($data=null, $is_sql = 0) {
		ob_clean();
		$router = \Config\Services::router();

		echo "<style>ul {
				list-style-type: none;
			}
			ul > li:before {
				content: \"-\"; /* en dash here */
				position: absolute;
				margin-left: -1.1em;
			}</style>";
		echo "<pre><b style='font-size:18px'>Output Dumper :</b></pre><pre style='margin-left:15px;'>";
		if(!$is_sql) {
			$backtrace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
			do $caller = array_shift($backtrace); while ($caller && !isset($caller['file']));
			if ($caller) {
				echo "File Trace : ".$caller['file'].':'.$caller['line']."
							  <br /><span>Called By : <ul><li> Controller : ".
								$router->controllerName()."</li><li> Function&nbsp;&nbsp;&nbsp;: ".
								$router->methodName().
							  '</li></ul></span><br />
							  <div>$VAR1 = </div>'.
							  "<div style='margin-left:50px;'>";
				if($data != null) {
					print_r($data);
				} else {
					echo "Not Returning Variable Or Variable is Null";
					echo "<br /><br />To Do : Make sure the variables has a value (if it is a function, make sure that the function has a 'return'))";
				}
				echo "</div>";
			}
		}else{
			echo mysql_error();
		}
		echo "</pre><pre></pre>"; exit;
	}

?>
