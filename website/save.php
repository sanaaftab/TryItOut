<?php
  if ( ! empty( $_COOKIE['username'] ) ) {
	echo "Hi " . $_COOKIE['username']; // Outputs : Hi John Doe
}
echo "hi";
?>
