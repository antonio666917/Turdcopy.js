<?php
  /**
   * Copy Initialization
   */
  $blurbLang = 'EN'; // Set the default to English
  $blurbFile = file_get_contents('js/turdcopy-blurbs-'.$blurbLang.'.json'); // Open the JSON COPY file for the specified language
  $blurb = json_decode($blurbFile); // JSON decode it
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title data-blurbid="sitetitle"><?php echo $blurb->siteTitle->text; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
    <link href="css/bootstrap-responsive.css" rel="stylesheet">
    <link href="css/main.css" rel="stylesheet">
    <!--[if lt IE 9]><script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
  </head>

  <body>

    <!-- Navigation
    ================================================== -->
    <div class="navbar-wrapper">
      
      <div class="container">

        <div class="navbar navbar-inverse">
          <div class="navbar-inner">
            
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </a>
            <a class="brand" data-blurbid="navHeader" href="#"><?php echo $blurb->navHeader->text; ?></a>
            
            <div class="nav-collapse collapse">
              <ul class="nav">
                <li class="active"><a href="#" data-blurbid="navMenuItem1"><?php echo $blurb->navMenuItem1->text; ?></a></li>
                <li><a href="#" data-blurbid="navMenuItem2"><?php echo $blurb->navMenuItem2->text; ?></a></li>
                <li><a href="#" data-blurbid="navMenuItem3"><?php echo $blurb->navMenuItem3->text; ?></a></li>
                <li><a href="#" data-blurbid="navMenuItem4"><?php echo $blurb->navMenuItem4->text; ?></a></li>
              </ul>
            </div>
          </div>
        </div>

      </div> 
    </div>

    <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide">
      <div class="carousel-inner">
        <div class="item active">
          <img src="img/examples/slide-01.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurbid="carHeader1"><?php echo $blurb->carHeader1->text; ?></h1>
              <p class="lead" data-blurbid="carCopy1"><?php echo $blurb->carCopy1->text; ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurbid="carCTA1"><?php echo $blurb->carCTA1->text; ?></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-02.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurbid="carHeader2"><?php echo $blurb->carHeader2->text; ?></h1>
              <p class="lead" data-blurbid="carCopy1"><?php echo $blurb->carCopy2->text; ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurbid="carCTA2"><?php echo $blurb->carCTA2->text; ?></a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-03.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1 data-blurbid="carHeader3"><?php echo $blurb->carHeader3->text; ?></h1>
              <p class="lead" data-blurbid="carCopy1"><?php echo $blurb->carCopy3->text; ?></p>
              <a class="btn btn-large btn-primary" href="#" data-blurbid="carCTA3"><?php echo $blurb->carCTA3->text; ?></a>
            </div>
          </div>
        </div>
      </div>
      <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
      <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
    </div>

    <!-- Main Content
    ================================================== -->
    <div class="container marketing">
      <div class="row">
        <div class="span12">
          <h3 data-blurbid="contentHeader"><?php echo $blurb->mainContentHeader->text; ?></h3>
          <?php echo $blurb->mainContentCopy->text; ?>
        </div>
      </div>


      <div class="row">
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurbid="subContentHeader1"><?php echo $blurb->subContentHeader1->text; ?></h2>
          <p data-blurbid="subContentCopy1"><?php echo $blurb->subContentCopy1->text; ?></p>
          <p><a class="btn" href="#" data-blurbid="subContentCTA1"><?php echo $blurb->subContentCTA1->text; ?></a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurbid="subContentHeader2"><?php echo $blurb->subContentHeader2->text; ?></h2>
          <p data-blurbid="subContentCopy2"><?php echo $blurb->subContentCopy2->text; ?></p>
          <p><a class="btn" href="#" data-blurbid="subContentCTA2"><?php echo $blurb->subContentCTA2->text; ?></a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2 data-blurbid="subContentHeader3"><?php echo $blurb->subContentHeader3->text; ?></h2>
          <p data-blurbid="subContentCopy3"><?php echo $blurb->subContentCopy3->text; ?></p>
          <p><a class="btn" href="#" data-blurbid="subContentCTA3"><?php echo $blurb->subContentCTA3->text; ?></a></p>
        </div>
      </div>

      <hr class="featurette-divider">

    <!-- Footer
    ================================================== -->
      
      <footer>
        <p class="pull-right"><a href="#" data-blurbid="backToTop"><?php echo $blurb->backToTop->text; ?></a></p>
        <p><?php echo $blurb->copyright->text; ?></p>
      </footer>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>