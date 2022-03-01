<?php
	function outputDebugMessage($output, $with_script_tags = true) {
		global $isDebug;
		if ($isDebug == true) {
			$js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .  ');';
			if ($with_script_tags) {
				$js_code = '<script>' . $js_code . '</script>';
			}
			echo $js_code;
		}
	}
?>
