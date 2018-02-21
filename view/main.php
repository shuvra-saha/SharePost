<html>

<head>
    <title>Shareboard</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" >
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
</head>

<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?Php echo ROOT_URL ?>">Shareboard</a>
        </div>
    </div>
    <!--
        <a class="navbar-brand" href="#">Shareboard</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        -->

    <div class="collapse navbar-collapse" id="navbar">
        <ul class="nav navbar-nav">
            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>">Home</a></li>
            <li><a class="nav-link" href="<?php echo ROOT_URL; ?>share">Shares</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php if(isset($_SESSION['is_logged_in'])): ?>
            <li>
                <a class="nav-link" href="<?php echo ROOT_URL; ?>">Welcome <?php echo  $_SESSION['user_data']['name'] ?></a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo ROOT_URL; ?>user/logout">Logout</a>
            </li>


            <?php else :?>
            <li>
                <a class="nav-link" href="<?php echo ROOT_URL; ?>user/login">Login</a>
            </li>
            <li>
                <a class="nav-link" href="<?php echo ROOT_URL; ?>user/register">Register</a>
            </li>
            <?php endif; ?>
        </ul>


    </div>
</nav>
<div class="container">
    <div class="row">
        <?php Messages::display(); ?>
        <?php require($view); ?>
    </div>
</div>





</body>

</html>
