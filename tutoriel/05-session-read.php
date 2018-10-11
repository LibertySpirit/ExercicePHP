<?php

session_start();
if (array_key_exists("name", $_SESSION)) {
    print "Your name is $_SESSION[name]";
} else {
    print "You haven't registered your name";
}

