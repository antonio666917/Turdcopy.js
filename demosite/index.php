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
              <h1>Example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Sign up today</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-02.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>Another example headline.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Learn more</a>
            </div>
          </div>
        </div>
        <div class="item">
          <img src="img/examples/slide-03.jpg" alt="">
          <div class="container">
            <div class="carousel-caption">
              <h1>One more for good measure.</h1>
              <p class="lead">Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
              <a class="btn btn-large btn-primary" href="#">Browse gallery</a>
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
          <h3>This is mah website!</h3>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Assumenda vitae error pariatur quasi sequi architecto eligendi accusantium ex minima earum dolores aliquid voluptatem iusto unde nulla ratione itaque. Saepe ea sequi consectetur facilis ipsam adipisci architecto quaerat praesentium libero aspernatur eius cum voluptate accusantium impedit tenetur optio porro nulla provident molestias reiciendis.</p>
          <p>Corrupti perferendis debitis accusamus laborum excepturi! Optio laborum natus magni quae a tempore sint non voluptatem quas reprehenderit atque assumenda veritatis qui eaque dolorem aliquid vero tempora. Ullam aperiam repellat asperiores similique iusto eveniet exercitationem enim odit modi reprehenderit rerum nemo debitis beatae sint illo laborum autem vero.</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum fuga consectetur numquam eveniet ducimus expedita nulla maxime iure eius nemo! Animi consequatur inventore eveniet a.</p>
        </div>
      </div>
      <div class="row">
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna, vel scelerisque nisl consectetur et.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Duis mollis, est non commodo luctus, nisi erat porttitor ligula, eget lacinia odio sem nec elit. Cras mattis consectetur purus sit amet fermentum. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
        <div class="span4">
          <img class="img-circle" data-src="holder.js/140x140">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn" href="#">View details &raquo;</a></p>
        </div>
      </div>

      <hr class="featurette-divider">

    <!-- Footer
    ================================================== -->
      
      <footer>
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2012 Company, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>

    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>

  </body>
</html>