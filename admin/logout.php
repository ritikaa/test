<?php
        @session_start();
        @session_destroy();
		@session_unregister(admin_id);
		@session_unregister(admin_user);
		@session_unregister(admin_pass);
		@session_unregister(admin_email);
        header("location:index.php");

?>