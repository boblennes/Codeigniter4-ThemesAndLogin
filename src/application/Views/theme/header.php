<?php defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * views/theme/header.php
 *
 * Template page for the site - header.
 *
 */
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
		<meta charset="utf-8"/>
		<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title><?=$pagetitle?></title>
		<link rel="icon" type="image/png" href="<?php echo base_url(); ?>/assets/images/ci-icon.png" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/font-awesome.min.css" media="screen"/>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/assets/css/style.css"/>
        <?=$endofheader?>
    </head>
    <body>
		<!-- top of the page -->