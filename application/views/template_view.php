<?php
require_once 'application/views/header_view.php';
if(Library::check_session())
{
	require_once 'application/views/auth_true_view.php';
}
else
{	
	require_once 'application/views/auth_false_view.php';
}	
