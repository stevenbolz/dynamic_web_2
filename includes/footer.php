<?php 

require "require/sharedVar.php";

echo '<footer id="closing" class="cf">
	<div class="contact">
		<div class="address">
			'.$address.'
		</div>
		<div class="phone">p. '.$phone.'</div>
		<div class="fax">f. '.$fax.'</div>
		<div class="email"><a href="mailto:'.$email.'">'.$email.'</a></div>
	</div>
	<div class="copy">
		'.$copyright.'
	</div>
</footer>';

if (isset($conn)) {
	$conn->close();
}

?>