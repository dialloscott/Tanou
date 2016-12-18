<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="<?= url('css/bootstrap.css') ?>">
</head>
<body>

	 <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="<?= route('') ?>">Local-dev</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="active"><a href="<?= route('')?>">Home</a></li>
              <?php if(isset($_SESSION['auth']->id)): ?>
                  <li><a href="<?= route('admin/index') ?>">Administration</a></li>
              <?php endif; ?>
              <li><a href="#contact">Contact</a></li>
          </ul>
            <ul class="nav navbar-nav navbar-right">
               <?php if(isset($_SESSION['auth']->id)): ?>
                   <li><a href="<?= route('user/logout') ?>">Deconnection</a></li>
                   <?php else: ?>
                   <li><a href="<?= route('user/login') ?>">Se connecter</a></li>
               <?php endif ?>
            </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>

    <div class="container" style="padding-top:70px";>
       <?php yields($content);?>


    </div><!-- /.container -->


</body>
</html>