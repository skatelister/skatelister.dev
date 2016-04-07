<?php

class Validation 
{
	// static
	$usersFormRules = ['first_name', 'last_name', 'email', 'password', 'ver_password'];
	$adsFormRules = ['title', 'description', 'category'];

	//extend Validation
	$errors = [];

	public static function errorMessages() {

	}