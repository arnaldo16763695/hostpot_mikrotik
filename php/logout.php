<?php
session_start();
session_destroy();
die(json_encode(["status" => "success"]));

