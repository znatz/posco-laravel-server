<?php
function show_if_exists($e) {
    if(isset($e)) {
        return $e;
    }
    return '';
}