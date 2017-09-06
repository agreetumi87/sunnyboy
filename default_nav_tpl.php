    <!-- Navigation -->
    <header class="clearfix">
            
            
            <nav class="navbar navbar-inverse transparent">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
        <a class="navbar-brand visible-xs" href="index.php"><img class="img-responsive" alt="Logo xs" src="img/small-logo.png"></a>
        <a class="navbar-brand visible-sm" href="index.php"><img class="img-responsive" alt="Logo sm" src="img/small-logo.png"></a>
        <a class="navbar-brand visible-md" href="index.php"><img class="img-responsive" alt="Logo md" src="img/small-logo.png"></a>
        <a class="navbar-brand visible-lg" href="index.php"><img class="img-responsive" alt="Logo lg" src="img/small-logo.png"></a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
            <?php if(isset($_SESSION['loggedin'])){ ?>                            
                <li>
                    <a <?php if ($_GET['action'] == 'dashboard'){echo "class=\"active\"";}?> href="index.php?action=dashboard">Dashboard</a>
                </li>
                <li>
                    <a <?php if ($_GET['action'] == 'userProfile'){echo "class=\"active\"";}?> href="index.php?action=userProfile">My Profile</a>
                </li>
                <li>
                    <a <?php if ($_GET['action'] == 'viewclient'){echo "class=\"active\"";}?> href="index.php?action=viewclient">Clients</a>
                </li>
                <li>
                    <a <?php if ($_GET['action'] == 'searchTransactions'){echo "class=\"active\"";}?> href="index.php?action=searchTransactions">Transactions</a>
                </li> 
                <?php if($_SESSION['is_superadmin']){ ?>
                    <li>
                        <a <?php if ($_GET['action'] == 'userManagement'){echo "class=\"active\"";}?> href="index.php?action=userManagement">Users</a>
                    </li>  
                <?php } ?>
                 <li>
                    <a href="index.php?action=logout">Logout</a>
                </li>
            <?php } ?>
        </ul>
        <?php if(isset($_SESSION['loggedin'])){ ?>             
      <ul class="nav navbar-nav navbar-right">
        <li><a href="index.php?action=dashboard"><span class="glyphicon glyphicon-user"></span> Admin : <?php echo $_SESSION['firstname'].' '.$_SESSION['lastname']; ?></a></li>
      </ul>
         <?php } ?>
    </div>
  </div>
</nav>
        
	    
</header>
