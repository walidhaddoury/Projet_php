<?php

$AccountManager->delete(getUser()->id);
session_unset();
session_destroy();
header('Location: ?p=home');

?>