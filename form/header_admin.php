<html>

<head>
    <title>Dashboard | Perpustakaan</title>
    <link rel="stylesheet" type="text/css" href="../template/alert.css">
    <link href="../template/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../template/css/sb-admin-2.css" rel="stylesheet" />
    <link rel="stylesheet" href="../template/js/jquery-ui-1.11.4/jquery-ui.css" />
    <link rel="stylesheet" href="../template/js/jquery-ui-1.11.4/jquery-ui-smooth.css">
</head>

<body>
    <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Perpustakaan</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-top-links navbar-right">
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-user">
                            <li><a href="profile.php"><span class="glyphicon glyphicon-tasks"></span>&nbsp;Profile</a></li>
                            <li><a href="ganti_password.php"><span class="glyphicon glyphicon-lock"></span>&nbsp;Ganti Password</a></li>
                            <li class="divider"></li>
                            <li><a href="../logout.php"><span class="glyphicon glyphicon-off"></span>&nbsp;Logout</a>
                            </li>
                        </ul>
                        <!-- /.dropdown-user -->
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 col-md-2 sidebar">
                <ul class="nav nav-sidebar">
                    <li><a href="dashboard.php"><span class="glyphicon glyphicon-home"></span>&nbsp;Dashboard</a></li>
                    <li class="parent">
                        <a href="manage_books.php">
                            <span class="glyphicon glyphicon-list-alt"></span>&nbsp;Manage Books
                        </a>
                    </li>

                    <li class="parent">
                        <a href="manage_categories.php">
                            <span class="glyphicon glyphicon-stats"></span>&nbsp;Categories
                        </a>
                    </li>

                </ul>
            </div>