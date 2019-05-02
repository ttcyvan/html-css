
/********************validation/formation***********************/ 


  function validateForm() 
  {

    

  var name =  document.getElementById('name').value;
  if (name == "") {
      document.getElementById('status').innerHTML = '<div class="alert alert-danger" role="alert"> saisir votre nom</div>';
      
      return false;
  }

  var email =  document.getElementById('email').value;
  if (email == "") {
      document.getElementById('status').innerHTML = '<div class="alert alert-danger" role="alert"> Veuillez ecrire votre email</div>';
      return false;
  } 
  else {
      var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      if(!re.test(email))
      {
          document.getElementById('status').innerHTML = '<div class="alert alert-danger" role="alert"> format de mail invalide</div>';
          return false;
      }
  }
  var subject =  document.getElementById('subject').value;
  if (subject == "") {
      document.getElementById('status').innerHTML = '<div class="alert alert-danger" role="alert"> Veuillez ecrire le sujet de votre message </div>';
      return false;
  }
  var message =  document.getElementById('message').value;
  if (message == "") {
      document.getElementById('status').innerHTML = '<div class="alert alert-danger" role="alert"> Aucum message ecrit</div>';
      return false;
  }
  document.getElementById('status').innerHTML = '<div class="alert alert-success" role="alert"> envoyer... </div>';
  document.getElementById('contact-form').submit();

  /* mettre l'animation js*/

  }

/***********effect souris*******************/
     var $ = document.querySelector.bind(document);
     var $on = document.addEventListener.bind(document);

     var xmouse, ymouse;
     $on('mousemove', function (e) {
          xmouse = e.clientX || e.pageX;
          ymouse = e.clientY || e.pageY;
     });

     var ball = $('#ball');
     var x = void 0,
          y = void 0,
          dx = void 0,
          dy = void 0,
          tx = 0,
          ty = 0,
          key = -1;

     var followMouse = function followMouse() {
          key = requestAnimationFrame(followMouse);

          if(!x || !y) {
               x = xmouse;
               y = ymouse;
          } else {
               dx = (xmouse - x) * 0.125;
               dy = (ymouse - y) * 0.125;
               if(Math.abs(dx) + Math.abs(dy) < 0.1) {
                    x = xmouse;
                    y = ymouse;
               } else {
                    x += dx;
                    y += dy;
               }
          }
          ball.style.left = x + 'px';
          ball.style.top = y + 'px';
     };
     /*****************fin effect souris***************/

     /*****************parallax***************/

     // object-fit polyfill run
objectFitImages();

/* init Jarallax */
jarallax(document.querySelectorAll('.jarallax'));

jarallax(document.querySelectorAll('.jarallax-keep-img'), {
    keepImg: true,
});


     /***************** finparallax***************/