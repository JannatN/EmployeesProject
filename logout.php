<?php
session_start();
session_destroy();
header("location: loogin.html");