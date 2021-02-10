<?php

function getUser() {
    return json_decode($_SESSION['user']);
}

?>