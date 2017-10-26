<?php

    // configuration
    require("../includes/config.php");

	$id = $_SESSION["id"];

	// Retrieves all the transactions from the database ordered by date
	$history = CS50::query("SELECT * FROM history WHERE id = $id");


    // render portfolio
    render("../views/history_form.php", ["title" => "History", "history" => $history]);

?>
