<?php
    // configuration
    require ("../includes/config.php");
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER ["REQUEST_METHOD"] == "GET")
    {
        // else render form
        render ("register_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER ["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST['username']) || empty($_POST['password']) || $_POST["password"] != $_POST["confirmation"])
        {
            if (empty($_POST['username']))
            {
                apologize("User names ampty!");
            }
            else if (empty($_POST['password']))
            {
                apologize("User password ampty!");
            }
            else if ($_POST["password"] != $_POST["confirmation"])
            {
                apologize("User password dont confirmation");
            }

        }

        else
        {
           if (CS50::query("INSERT INTO users (username, hash, cash) VALUES(?, ?, 10000.00)", $_POST["username"], crypt($_POST["password"])) === false)
		{
			apologize('Username already exists');
		}else
		{
			// insert the new user into the database
			$rows = query("SELECT LAST_INSERT_ID() AS id");
			$id = $rows[0]["id"];
			$_SESSION["id"] = $id;
			redirect("index.php");
		}


             render("portfolio.php", ["title" => "Portfolio"]);
        }
    }
?>