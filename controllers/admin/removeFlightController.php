<?php
require_once '../../models/database_connect.php';
session_start();
    if(!isset($_SESSION['loggedinuser']))
	{
    header("Location:../../views/Login.php");
    }
    function getAllFlights()
	{
		$query ="SELECT * FROM flight";
		$flight = get($query);
		return $flight;
    }
    function removeFlight($id)
	{
        $query ="DELETE FROM flight WHERE fid=$id";
        execute($query);
		header("Location:../../views/admin/removeFlight.php");
    }
?>