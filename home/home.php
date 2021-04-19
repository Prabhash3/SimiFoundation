<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>

  <meta charset="utf-8">
  <title>Simmi Foundation</title>

  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Lexend&display=swap" rel="stylesheet">

  <!-- font awesome -->
  <script src="https://kit.fontawesome.com/e395fb5b59.js" crossorigin="anonymous"></script>

  <!-- AOS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

  <!-- css -->
  <link rel="stylesheet" href="home.css">

  <!-- Bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.6/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  <!-- fb -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="CsRJa0Jg"></script>


</head>

<body>

  <?php include 'header.php'; ?>


  <!-- Home page slider -->

  <div id="Carouselcontrol" class="carousel slide " data-ride="carousel">
    <ol class="carousel-indicators " style="margin-bottom:90px">
      <li data-target="#Carouselcontrol" data-slide-to="0" class="active"></li>
      <li data-target="#Carouselcontrol" data-slide-to="1"></li>
      <li data-target="#Carouselcontrol" data-slide-to="2"></li>
      <li data-target="#Carouselcontrol" data-slide-to="3"></li>
    </ol>
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active">
        <img class="d-block w-100" src="images/home/image1.jpg" alt="" width="100%" height="800px">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/home/image2.jpg" alt="" width="100%" height="800px">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/home/image3.jpg" alt="" width="100%" height="800px">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="images/home/image1.jpg" alt="" width="100%" height="800px">
        <!-- <div class="carousel-caption d-none d-md-block" >
          <h3 class="caption-text-firstHeading" data-aos="fade-up-right">eget magna fermentum iaculis eu non</h3>
          <h5 class="caption-text-secondHeading" data-aos="fade-up-right">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</h5>
          <div class="carousel-btn">
            <a href="#">
              <button class="donate-btn">Donate now</button>
            </a>
            <a href="#">
              <button class="read-btn">Read More</button>
            </a>
          </div>
        </div> -->
      </div>

    </div>
    <a class="carousel-control-prev" href="#Carouselcontrol" role="button" data-slide="prev">
      <span class="fas fa-angle-left fa-4x" style="color: #f58634;" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#Carouselcontrol" role="button" data-slide="next">
      <span class="fas fa-angle-right fa-4x" style="color: #f58634;" aria-hidden="true"></span>
      <span class="sr-only"></span>
    </a>
  </div>


  <!-- welcome text -->
<div class="row">

  <div class="welcome-text col-lg-8" data-aos="fade-up" data-aos-duration="1000">
    <h3 class="body-heading">Welcome to <b class="orange-color">SIMMI</b> </h3>
      <p>We envisions to develop a society based on legitimate rights, equity, justice, honesty, social sensitivity and a culture of service in which all are self-reliant.Lorem ipsum dolor sit amet, consectetur adipiscing
        elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit
        esse cillum dolore eu fugiat nulla pariatur.</p>
  </div>
  <div class="map col-lg-4 " data-aos="fade-up" data-aos-duration="1000" style="text-align: center;">
    <img src="images/home/map.png" alt="" height="450" width="350" >
  </div>
<!-- d-none d-lg-block -->
</div>

<!-- OBJECTIVES SECTION -->

<section id="objectives" data-aos="fade-up"  data-aos-duration="1000">
  <h3 class="body-heading">Objectives</h3>

  <div class="row body-card">
    <div class="card col-lg-3 col-md-6" data-aos="zoom-out-right" data-aos-duration="1000">
      <img class="card-img-top" src="images/objectives/education.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Education</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <div class="card-footer">
          <a href="#">Read more <i class="fas fa-arrow-right fa-1x"></i></a>
        </div>
      </div>
    </div>
    <div class="card col-lg-3 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
      <img class="card-img-top" src="images/objectives/livelihood.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Livelihood</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <div class="card-footer">
            <a href="#">Read more <i class="fas fa-arrow-right fa-1x"></i></a>
          </div>
      </div>
    </div>
    <div class="card col-lg-3 col-md-6" data-aos="zoom-in" data-aos-duration="1000">
      <img class="card-img-top" src="images/objectives/healthcare.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Healthcare</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
        <div class="card-footer">
          <a href="#">Read more <i class="fas fa-arrow-right fa-1x"></i></a>
        </div>
      </div>
    </div>
    <div class="card col-lg-3 col-md-6" data-aos="zoom-out-left" data-aos-duration="1000">
      <img class="card-img-top" src="images/objectives/women empowerment.jpg" alt="Card image cap">
      <div class="card-body">
        <h5 class="card-title">Women and Youth Empowerment</h5>
        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
          <div class="card-footer">
            <a href="#">Read more <i class="fas fa-arrow-right fa-1x"></i></a>
          </div>
        </div>
      </div>
    </div>
</section>


<!-- How can you help us section -->

<section id="help-us">

  <h3 class="body-heading" data-aos="zoom-in-up" data-aos-duration="1000">How can you help us</h3>
  <div class="row body-card ">
    <div class="card col-lg-4" data-aos="zoom-in-right" data-aos-duration="1000">
      <div class="card-body">
        <h5 class="card-title">Collaborate</h5>
        <hr>
        <p class="card-text">Simmi Foundation serves in the collaboration with schools, colleges and other institutions. Contact us to collaborate.</p>
          <div class="card-footer">
            <a href="#">Collaborate with us <i class="fas fa-arrow-right fa-1x"></i></a>
          </div>
      </div>
    </div>
    <div class="card col-lg-4" data-aos="zoom-out" data-aos-duration="1000">
      <div class="card-body">
        <h5 class="card-title">Donate Money</h5>
        <hr>
        <p class="card-text">Your donation will further our mission of ensuring a happy and healthy life of those in need.</p>
          <div class="card-footer">
            <a href="#">Donate now <i class="fas fa-arrow-right fa-1x"></i></a>
          </div>
      </div>
    </div>
    <div class="card col-lg-4" data-aos="zoom-in-left" data-aos-duration="1000">
      <div class="card-body">
        <h5 class="card-title">Be a Volunteer</h5>
        <hr>
        <p class="card-text">Even the all-powerful Pointing has no control about the blind texts.</p>
          <div class="card-footer">
            <a href="#">Read more <i class="fas fa-arrow-right fa-1x"></i></a>
          </div>
      </div>
    </div>
  </div>

</section>


<!-- Upcoming events -->
<section id="event">
  <h3 class="body-heading">Current and Upcoming events</h3>

  <div class="row body-card">

    <div class="card col-md-4" data-aos="zoom-in" data-aos-duration="1000">
      <img class="card-img-top" src="images/home/image1.jpg" alt="Card image cap">
      <div class="card-body">
        <a href="#" ><h5 class="card-title">Event Title</h5></a>
        <p class="card-text"><span class="text-muted"><i class="fas fa-map-marked-alt"></i>Delhi</span></p>
        <p class="card-text">
          <span class="text-muted"><i class="fas fa-clock"></i>20:00:00 - 21:00:00</span>
          <span class="text-muted" style="padding-left: 3%;"><i class="fas fa-calendar-alt"></i>01-03-2021</span>
        </p>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum facilisis leo vel fringilla est ullamcorper.Sed turpis tincidunt id aliquet risus feugiat. Id donec ultrices tincidunt arcu. Enim ut tellus elementum sagittis vitae.</p>
        <div class="card-footer">
          <a href="#">Read more <i class="fas fa-angle-right fa-1x"></i></a>
        </div>
      </div>
    </div>

  </div>

</section>


<!-- animated number counter -->
<section id="counter">
  <div class="c-no body-heading">
      <div class="row" id="counter">
          <div class="col-sm-4 counter-Txt"><span class="counter-value" data-count="5">0</span> Countries</div>
          <div class="col-sm-4 counter-Txt"><span class="counter-value" data-count="50">0</span> Projects</div>
          <div class="col-sm-4 counter-Txt margin-bot-35"><span class="counter-value" data-count="500">0</span> Volunteers</div>
      </div>
  </div>
</section>


<!-- Fundraisers -->
<section id="event">
  <h3 class="body-heading">Fundraisers</h3>
  <div class="welcome-text orange-color">
    <p style="padding-bottom: 0px!important; padding-top: 0px!important;">A little change makes all the difference.</p>
  </div>

  <div class="row body-card">

    <div class="card col-md-4" data-aos="zoom-out" data-aos-duration="1000">
      <img class="card-img-top" src="images/home/image3.jpg" alt="Card image cap">
      <div class="card-body">
        <a href="#" ><h5 class="card-title">Event Title</h5></a>
        <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum facilisis leo vel fringilla est ullamcorper.Sed turpis tincidunt id aliquet risus feugiat. Id donec ultrices tincidunt arcu. Enim ut tellus elementum sagittis vitae.</p>
        <p class="card-text" style="font-weight: bold;">4000 raised of 10000</p>
        <div class="progress" style="height: 5px;">
          <div class="progress-bar" role="progressbar" style="width: 50%; background-color: #f58634;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
        </div>
        <div class="card-footer">
          <a href="#">Read more <i class="fas fa-angle-right fa-1x"></i></a>
        </div>
      </div>
    </div>

  </div>

</section>

<!-- social media -->
<section id="sm-page">
  <h3 class="body-heading">Social Media Handle</h3>
    <div class="row">
      <div class="fb-page col-sm-6 col-lg-6 page" data-href="https://www.facebook.com/simmifoundation.org/" data-tabs="timeline" data-width="650" data-height="650" data-small-header="false"  data-hide-cover="false" data-show-facepile="true" data-aos="fade-right" data-aos-duration="1000">
        <blockquote cite="https://www.facebook.com/simmifoundation.org/" class="fb-xfbml-parse-ignore">
          <a href="https://www.facebook.com/simmifoundation.org/">SIMMI Foundation</a>
        </blockquote>
      </div>
      <div class="col-sm-6 col-lg-6 page" data-aos="fade-left" data-aos-duration="1000">
        <a class="twitter-timeline" data-width="450" data-height="650" data-theme="light" href="https://twitter.com/simmifoundation?ref_src=twsrc%5Etfw">Tweets by simmifoundation</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
      </div>
    </div>
</section>




<!-- our partners -->
<section id="partners">
  <h3 class="body-heading">Our Partners</h3>

     <section class="customer-logos slider">
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/luxury-letter-e-logo-design_1017-8903.jpg"></a><br><p>Partner 1</p></div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/3d-box-logo_1103-876.jpg"></a><br/><p>Partner 2</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></a><br/><p>Partner 3</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="images/logo.png"></a><br/><p>Partner 4</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/abstract-cross-logo_23-2147536124.jpg"></a><br/><p>Partner 5</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/football-logo-background_1195-244.jpg"></a><br/><p>Partner 6</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/background-of-spots-halftone_1035-3847.jpg"></a><br/><p>Partner 7</p> </div>
        <div class="slide"><a href="https://www.google.com"><img src="https://image.freepik.com/free-vector/blue-tech-logo_1103-822.jpg"></a><br/><p>Partner 8</p> </div>
     </section>


  <!-- <div class="row">
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 1</p>
    </div>
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 2</p>
    </div>
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 3</p>
    </div>
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 4</p>
    </div>
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 5</p>
    </div>
    <div class="ind-partner col-lg-2 col-md-2 col-sm-6" data-aos="fade-up" data-aos-duration="1000">
      <img src="images/logo.png" height="100" width="100" alt="">
      <p class="orange-color">Partner 6</p>
    </div>
  </div> -->

</section>




<?php include 'footer.php'; ?>

<!-- AOS SCRIPT -->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<!-- Partners Slider -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
<script src="home.js" charset="utf-8"></script>

</body>

</html>
