
<?php
//connecxion au fichier
ini_set("display_errors",0);error_reporting(0);
$message ='';
require 'recap/autoload.php';
if (isset($_POST['submit'])) {
      
    if (isset($_POST['g-recaptcha-response'])) {

    //recapchat
    $recaptcha = new \ReCaptcha\ReCaptcha('6LdjiIwUAAAAAPf2N5mMk8_YIj0h8nL6sJpfGyGf');//cle privé
    $resp = $recaptcha ->verify($_POST['g-recaptcha-response'] /*$remoteIp* ==  ip des utilisateurs*/);

          if ($resp->isSuccess()) {
              $message = '';
              
          } else {
              $errors = $resp->getErrorCodes();
              $message = 'coche le recapchat';
              
          }

}

  else{
        $messag = 'captcha non valide';
  }

}


?>

<?php 
 $messag ='';

  if (isset($_POST['submit'])) {

          $name = addslashes($_POST['name']);
          $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
          $msg =addslashes($_POST['message']);
          $sujet = addslashes($_POST['sujet']);

          require 'mail/PHPMailerAutoload.php';
          require 'mail/class.smtp.php';
          require 'mail/class.phpmailer.php';
          $mail = new PHPMailer;
          $mail->Host ='smtp.gmail.com';
          $mail->Port = 587;
          $mail->SMTPAuth=true;
          $mail->Username='yvantejouteu@gmail.com';
          $mail->password ='yvan2019';
          $mail->setFrom($name,$email);
          $mail->addAddress('tenekeucabrel@gmail.com');
          $mail->addReplyTo($name,$email);
          $mail->isHTML(true);
          $mail->Subject ='message :'.$msg;
          $mail->Body='<h1 align=center> Name ='.$name.'<br>Mail :'.$email.'<br>mail :'.$sujet.'</h1>'.'<br>sujet :'.$msg.'</h1>';


          if(!$mail ->send()){
            $messag = 'essais encore';

          }
          else{
                $messag = 'merci'.$name.'pour ton message';
          }
  }


 ?>



<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>yvan tenekeu portfolio</title>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
  <link href="https://fonts.googleapis.com/css?family=Charm" rel="stylesheet"> 
  <!-- Bootstrap core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="css/mdb.min.css" rel="stylesheet">
  <!-- Your custom styles (optional) -->
  <link href="css/style.css" rel="stylesheet">
  <link rel="stylesheet" href="style/style.css">
</head>
<style>
  li{list-style: none;}
</style>
<body>

   <div class="menu ">
                
            <div class="container " >
              <nav class="navbar navbar-expand-lg navbar-dark scrolling-navbar bg-transparent">
                <div class="container">
                  <a class="navbar-brand text-uppercase" href="index.php" style="font-family: 'Charm', cursive; color: black; font-size: 30px;"><img src="img/logo.png" alt="" style="width: 60px; height: 60px"></a>
                  <button class="navbar-toggler first-button bg-info" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-7" aria-controls="navbarSupportedContent-7" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>
                  <div class="collapse navbar-collapse " id="navbarSupportedContent-7">
                    <ul class=" droite navbar-nav ">

                          <li class="nav-item">
                            <a class="nav-link text-dark" href="index.php">Accueil</a>
                          </li>
                        </ul>
                   
                  </div>
                </div>
              </nav>
                    
                    </div>
                
          </div><br><br>  



<div id="contact" class="container">
 <div class="row">                            
<div class="col-lg-4 col-md-6 col-sm-12 wow fadeInUp">
<div class="card">
  <!-- Card image -->
  <img class="card-img-top img-responsive" src="img/moi.jpg" alt="Card image cap">

  <!-- Card content -->
  <div class="card-body">

    <!-- Title -->
    <h4 class="card-title"><a>A propos</a></h4>
    <!-- Text -->
    <p class="card-text">Je m'appelle Yvan tenekeu, j'ai commencé la programmation et le web design pour développer un petit site et application perso et c'est rapidement devenu une vraie vocation. J'aime expérimenter, découvrir et apprendre au fur et à mesure de mes projets la passion c'est installer et c'est vite devenir une vocation pour moi </p>
    <!-- Button -->
    <a href="moncv.pdf" target="blanc" class="btn btn-primary aqua-gradient"><i class="fas fa-download"></i>  Mon cv</a>

  </div>

</div>
</div>


<div class="col-lg-8 col-md-6 col-sm-12">
     
<!--Section: Contact v.2-->
<section class="mb-4">

    <!--Section heading-->
    <h2 class="h1-responsive font-weight-bold text-center my-4">Me Contacter</h2>
    <!--Section description-->
    <p class="text-center w-responsive mx-auto mb-5">Je vous repondrais dans de bref delais</p>

    <div class="row">

        <!--Grid column-->
        <div class="col-md-9 mb-md-0 mb-5">
            <form id="contact-form" name="contact-form" action="" method="POST">

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="name" name="name" class="form-control">
                            <label for="name" class="">Nom & Prénon</label>
                        </div>
                    </div>
                    <!--Grid column-->

                    <!--Grid column-->
                    <div class="col-md-6">
                        <div class="md-form mb-0">
                            <input type="text" id="email" name="email" class="form-control">
                            <label for="email" class="">Email</label>
                        </div>
                    </div>
                    <!--Grid column-->

                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" id="subject" name="sujet" class="form-control">
                            <label for="subject" class="">Sujet</label>
                        </div>
                    </div>
                </div>
                <!--Grid row-->

                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea type="text" id="message" name="message" rows="2" class="form-control md-textarea"></textarea>
                            <label for="message">Messages:</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->
                 <div class="g-recaptcha" name="gRecaptchaResponse" data-sitekey="6LdjiIwUAAAAACaZc_hdh06EFi8CxD3we_trDJLL"></div> <!--cles public-->
                <br/>

              <div class="text-center text-md-left">
                <input type="submit" name="submit" value="Envoyer" class="btn btn-primary morpheus-den-gradient" id="contact-form" onclick="validateForm()">
            </div>


               

            </form>

            <div  id="status" role="alert"></div>

            <div id="status"><?php echo $messag;?></div>
            <div id="status"><?php echo $message;?></div>
        </div>
       

    </div>

</section>
<!--Section: Contact v.2-->

</div>




        </div>
       

    </div>

</section>
<!--Section: Contact v.2-->

</div>

</div>
 </div>
          <!--------------FIN Comtact------------------->
             <!--------------wave------------------->

  <div class="imagess">
    <div id="wave">
      <svg  
           x="0px"
           y="0px" 
           viewBox="0 0 3841 108.5"
           style="overflow:scroll;enable-background:new 0 0 3841 108.5;" 
           xml:space="preserve">

          <path style="fill:#26c4ec;
                 stroke-miterlimit:10;" 
                d="M3360.5,97.739c-242,0-480-48.375-480-48.375
                    S2647.5,0.5,2400.5,0.5s-480,48.375-480,48.375s-238,48.864-480,48.864s-480-48.375-480-48.375S727.5,0.5,480.5,0.5
                    S0.5,48.875,0.5,48.875V108h1920h1920V48.875C3840.5,48.875,3602.5,97.739,3360.5,97.739z"/>
            </svg>
    </div>
  </div>
  <div class="white"></div>

<!--------------FIN WAVE-------------->

<!-- Footer -->
<footer  style="background-color: #26c4ec !important; color: black; font-size: 20px;"class="page-footer font-small special-color-dark pt-4" >

    <!-- Footer Elements -->
    <div class="container">

      <!-- Social buttons -->
      <ul class="list-unstyled list-inline text-center">
        <li class="list-inline-item">
          <a href="https://github.com/" target="blanc" style="color: black;" class="btn-floating btn-fb mx-1">
            <i class="fab fa-github"> </i>
          </a>
        </li>
        <li class="list-inline-item">
          <a href="https://twitter.com/" target="blanc" style="color: black;"class="btn-floating btn-tw mx-1">
            <i class="fab fa-twitter"> </i>
          </a>
        </li>
        
        <li class="list-inline-item">
          <a href="https://www.linkedin.com/in/yvan-tenekeu-09818211b/"target="blanc"style="color: black;" class="btn-floating btn-li mx-1">
            <i class="fab fa-linkedin-in"> </i>
          </a>
        </li>
       
      </ul>
      <!-- Social buttons -->

    </div>
    <!-- Footer Elements -->

    <!-- Copyright -->
    <div style="background-color: #26c4ec; color: black;" class="footer-copyright text-center py-3"> <a href="" target="blanc" style="color: black;">yvantenekeu@gmail.com | </a>
      <a href="" style="color: black;">0603885602</a>
    </div>
    <!-- Copyright -->

  </footer>
  <!-- Footer -->



          



            

            <!-- SCRIPTS -->
            <!-- JQuery -->
            <script type="text/javascript" src="js/jquery-3.3.1.min.js"></script>
            <!-- Bootstrap tooltips -->
            <script type="text/javascript" src="js/popper.min.js"></script>
            <!-- Bootstrap core JavaScript -->
            <script type="text/javascript" src="js/bootstrap.min.js"></script>
            <!-- MDB core JavaScript -->
            <script src='https://www.google.com/recaptcha/api.js'></script>

            <script type="text/javascript" src="js/mdb.min.js"></script>
            <script src="javascript.js" type="text/javascript" charset="utf-8" async defer></script>
            <script type="text/javascript">
              // innit animation
              new WOW().init();
              wow = new WOW({
              boxClass: 'wow', // default
              animateClass: 'animated', // default
              offset: 0, // default
              mobile: true, // default
              live: true // default
              })
              wow.init();
                
            </script>

</body>



</html>
