<!DOCTYPE html>

<html>

    <head>

        <meta charset="UTF-8">

        <!-- http://getbootstrap.com/ -->
        <link href="/css/bootstrap.min.css" rel="stylesheet"/>

        <link href="/css/styles.css" rel="stylesheet"/>

        <?php if (isset($title)): ?>
            <title>C$50 Finance: <?= htmlspecialchars($title) ?></title>
        <?php else: ?>
            <title>C$50 Finance</title>
        <?php endif ?>

        <!-- https://jquery.com/ -->
        <script src="/js/jquery-1.11.3.min.js"></script>

        <!-- http://getbootstrap.com/ -->
        <script src="/js/bootstrap.min.js"></script>

        <script src="/js/scripts.js"></script>

    </head>

    <body>

        <div class="container">

            <div id="top">
                <div>
                    <a href="/"><img alt="C$50 Finance" src="/img/logo.png"/></a>
                </div>
                <?php if (!empty($_SESSION["id"])): ?>
                    <ul class="nav nav-pills">
                        <li><a href="index.php">Кабинет</a></li>
                        <li><a href="quote.php">Котировка</a></li>
                        <li><a href="buy.php">Покупка</a></li>
                        <li><a href="sell.php">Продажа</a></li>
                        <li><a href="history.php">История</a></li>
                        <li><a href="account_transactions.php">Операции со счетом</a></li>
                        <li><a href="logout.php"><strong>Выход</strong></a></li>
                    </ul>
                <?php endif ?>
            </div>

            <div id="middle">
