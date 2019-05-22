<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset="utf-8">
	<title>Logger</title>
	<style>
		* {
			padding: 0;
			margin: 0;
		}
		table td,table th {
			padding: 10px;
			min-width: 200px;
			text-align: center;
		}
		nav {
			width: 100%;
			height: 60px;
			display: flex;
			justify-content: space-around;
			align-items: center;
		}
		h1 {
			text-align: center;
		}
		form {
			margin: auto;
			width: 500px;
			height: 300px;
			display: flex;
			flex-direction: column;
			justify-content: space-around;
			align-items: center;
			border: 1px solid lightgrey;
		}
		.hid {
			border: none;
			
		}
		.none {
			width: 0;
			height: 0;
		}
	</style>
</head>
<body>
	<nav>
		<a href='index.php'>All Data</a>
		<a href='edit.php'>Edit data</a>
		<a href='add.php'>Add data</a>
	</nav>