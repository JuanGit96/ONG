<!DOCTYPE html>
<!--
Landing page based on Pratt: http://blacktie.co/demo/pratt/
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }} ">
    <meta name="author" content="Sergi Tur Badenas - acacha.org">

    <meta property="og:title" content="Adminlte-laravel" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="Adminlte-laravel - {{ trans('adminlte_lang::message.landingdescription') }}" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org/" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x600.png" />
    <meta property="og:image" content="http://demo.adminlte.acacha.org/img/AcachaAdminLTE600x314.png" />
    <meta property="og:sitename" content="demo.adminlte.acacha.org" />
    <meta property="og:url" content="http://demo.adminlte.acacha.org" />

    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@acachawiki" />
    <meta name="twitter:creator" content="@acacha1" />

    <title>

    </title>

    <!-- Custom styles for this template -->
    <link href="{{ asset('/css/all-landing.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<div id="app">
    <!-- Fixed navbar -->
    <div id="navigation" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{url('/')}}"><b>Findesin</b></a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#tc" class="smoothScroll">Tarjeta de credito</a></li>
                    <li><a href="#ps" class="smoothScroll">Productos o servicios</a></li>
                    <li><a href="#contact" class="smoothScroll">Contactenos</a></li>
                    <li><a href="{{url('transactions')}}" class="smoothScroll">Transacciones</a></li>
                    @if(auth()->user()->rol_id == 1)
                        <li class="{{isset($integrantesActive) ? $integrantesActiveor : ''}}"><a href="{{url('/integrantes')}}" class="smoothScroll">CRUD Integrantes</a></li>
                    @endif
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Inicia Sesion</a></li>
                        <li><a href="{{ url('/register') }}">Registrate</a></li>
                    @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    @endif
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <section id="tc" name="tc"></section>

    <!-- FEATURES WRAP -->
    <div id="features" class="container-donaciones">
        <div class="container" style="border:3px solid white; background:#FFFFFF69; border-radius:30px;">
            <div class="row">
                <h1 class="centered size-title" style="color:black;">Donaciones con tarjeta de credito</h1>
                <br>
                <br>
                <div class="col-lg-6 centered size-form">
                  <form class="form-horizontal" id="formPayU" method="post" action="https://gateway.payulatam.com/ppp-web-gateway" style="color:black;">
                    <input name="merchantId"    type="hidden"  value="807589"   >
                    <input name="accountId"     type="hidden"  value="814652" >
                    <input name="description"   type="hidden"  value="Fundacion PAYU"  >
                    <input name="referenceCode" id="referenceCode" type="hidden"  value="" >
                    <input name="tax"   type="hidden"  value="0"  >
                    <input name="taxReturnBase" type="hidden"  value="0" >
                    <input name="currency"      type="hidden"  value="COP" >
                    <input name="signature" id="signature"   type="hidden"  value=""  >
                    <input name="test"  type="hidden"  value="0" >
                    <input name="responseUrl"    type="hidden"  value="http://localhost:8000/donations" >
                    <input name="confirmationUrl"    type="hidden"  value="http://localhost:8000/donations" >
                    <input name="lng"    type="hidden"  value="es" >
                    <div class="form-group">
                      <label for="name" class="control-label col-xs-4">Nombre</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-book-o" style="color:white;"></i>
                         </div>
                         <input id="name" name="payerFullName" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label for="usr_apellido" class="control-label col-xs-4">Apellido</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-book" style="color:white;"></i>
                         </div>
                         <input id="usr_apellido" name="usr_apellido" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_persona" class="control-label col-xs-4">Tipo Persona</label>
                      <div class="col-xs-8">
                       <select id="tpo_persona" name="tpo_persona" required="required" class="select form-control" style="color:black !important;">
                         <option value="1" style="color:black;">Natural</option>
                         <option value="2" style="color:black;">Juridica</option>
                       </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Tipo de docuemto</label>
                      <div class="col-xs-8">
                       <select id="tpo_id" name="tpo_id" required="required" class="select form-control" style="color:black !important;">
                         <option value="1" style="color:black;">NIT</option>
                         <option value="2" style="color:black;">CC</option>
                         <option value="3" style="color:black;">CE</option>
                         <option value="4" style="color:black;">PA</option>
                       </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Numero de docuemto</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-card-o" style="color:white;"></i>
                         </div>
                         <input id="text" name="payerDocument" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Valor a donar</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-card-o" style="color:white;"></i>
                         </div>
                         <input id="valor_donar" name="amount" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="email" class="control-label col-xs-4">Correo</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-envelope-open-o" style="color:white;"></i>
                         </div>
                         <input id="email" name="buyerEmail" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_telefono" class="control-label col-xs-4">Telefono</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-phone" style="color:white;"></i>
                         </div>
                         <input id="usr_telefono" name="telphone" type="text" required="required" class="form-control" style="color:black !important;">
                       </div>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-offset-4 col-xs-8">
                       <button name="submit" type="submit" class="btn btn-primary" style="color:black !important;">

                             Enviar

                       </button>
                      </div>
                      </div>
                  </form>

                </div>

                <div class="col-lg-6">
                    <br>
                    <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="color:black; text-decoration:none;">
                                    ¿Por qué donar?
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                  <p>Donar en un acto lleno de  valiosa energia cada aporte que hagas hará más feliz y ayudara nuestras niñas, colabora con nosotros para mejorar la vida de cada una de ellas.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo" style="color:black; text-decoration:none;">
                                    ¿Cómo donar?
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>Donar es muy facil!!<br> llena tus datos, una vez llenos vale click en el boton enviar, te dirigira a la pagina de payulatam, alli podras hacer la transaccion con la tarjeta de credito que prefieras.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree" style="color:black; text-decoration:none;">
                                    Con tu ayuda
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>tu ayuda es muy importante para nosotros, Con tu ayuda podremos brindar una mejor atencion a nuestra fundacion, como tambien podremos sacar a flote nuestros proyectos.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    <!--{{ trans('adminlte_lang::message.responsive') }}-->
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <!--<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>-->
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>
                    </div><!-- Accordion -->
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->



    <section id="ps" name="ps"></section>

    <!-- FEATURES WRAP -->
    <div id="features" class="container-donaciones2">
        <div class="container" style="border:3px solid white; background:#FFFFFF69; border-radius:30px;">
            <div class="row">
                <h1 class="centered size-title" style="color:black;">Donaciones de productos o servicios</h1>
                <br>
                <br>
                <div class="col-lg-6 centered">
                  <h3 style="color:black;">Somos findesin</h3>
                  <br>
                  <!-- ACCORDION -->
                  <div class="accordion ac" id="accordion2">
                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne" style="color:black; text-decoration:none;">
                                  Donar es la mejor forma de ayudar
                              </a>
                          </div><!-- /accordion-heading -->
                          <div id="collapseOne" class="accordion-body collapse in">
                              <div class="accordion-inner" style="color:black;">
                                  <p>Con una donación, ayudarás a cambiar las vidas de niñas y adolescentes en Colombia y en el mundo. Cualquier monto es muy importante para que nuestras acciones sean continuas y efectivas.</p>
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                 <!--  {{ trans('adminlte_lang::message.retina') }}-->
                              </a>
                          </div>
                          <div id="collapseTwo" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <!--<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>-->
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                  <!--{{ trans('adminlte_lang::message.support') }}-->
                              </a>
                          </div>
                          <div id="collapseThree" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <p><!--It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>-->
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                  <!--{{ trans('adminlte_lang::message.responsive') }}-->
                              </a>
                          </div>
                          <div id="collapseFour" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <!--<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>-->
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>
                  </div><!-- Accordion -->
                </div>

                <div class="col-lg-6 size-form">
                  <form class="form-horizontal" style="color:black;">
                      <div class="form-group">
                      <label for="name" class="control-label col-xs-4">Nombre</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-book-o" style="color:white;"></i>
                         </div>
                         <input id="name" name="name" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_apellido" class="control-label col-xs-4">Apellido</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-book" style="color:white;"></i>
                         </div>
                         <input id="usr_apellido" name="usr_apellido" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_persona" class="control-label col-xs-4">Tipo Persona</label>
                      <div class="col-xs-8">
                       <select id="tpo_persona" name="tpo_persona" required="required" class="select form-control">
                         <option value="1">Natural</option>
                         <option value="2">Juridica</option>
                       </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Tipo de docuemto</label>
                      <div class="col-xs-8">
                       <select id="tpo_id" name="tpo_id" required="required" class="select form-control">
                         <option value="1">NIT</option>
                         <option value="2">CC</option>
                         <option value="3">CE</option>
                         <option value="4">PA</option>
                       </select>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Numero de docuemto</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-address-card-o" style="color:white;"></i>
                         </div>
                         <input id="text" name="text" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="email" class="control-label col-xs-4">Correo</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-envelope-open-o" style="color:white;"></i>
                         </div>
                         <input id="email" name="email" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_telefono" class="control-label col-xs-4">Telefono</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon" style="background:#666666;">
                           <i class="fa fa-phone" style="color:white;"></i>
                         </div>
                         <input id="usr_telefono" name="usr_telefono" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-offset-4 col-xs-8">
                       <button name="submit" type="submit" class="btn btn-primary" style="color:black;">

                             Enviar

                       </button>
                      </div>
                      </div>
                  </form>
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->
    <!-- Footer -->
    <footer class="page-footer font-small blue-grey lighten-5" style="background-color: #1c2331!important; color: white;">

      <div style="background-color: #f2a8a8;">
        <div class="container">

          <!-- Grid row-->
          <div class="row py-4 d-flex align-items-center">

            <!-- Grid column -->
            <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
              <h6 class="mb-0">Redes sociales</h6>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-6 col-lg-7 text-center text-md-right">

              <!-- Facebook -->
              <a class="fb-ic">
                <i class="fab fa-facebook-f white-text mr-4"> </i>
              </a>
              <!-- Twitter -->
              <a class="tw-ic">
                <i class="fab fa-twitter white-text mr-4"> </i>
              </a>
              <!-- Google +-->
              <a class="gplus-ic">
                <i class="fab fa-google-plus-g white-text mr-4"> </i>
              </a>
              <!--Linkedin -->
              <a class="li-ic">
                <i class="fab fa-linkedin-in white-text mr-4"> </i>
              </a>
              <!--Instagram-->
              <a class="ins-ic">
                <i class="fab fa-instagram white-text"> </i>
              </a>

            </div>
            <!-- Grid column -->

          </div>
          <!-- Grid row-->

        </div>
      </div>

      <!-- Footer Links -->
      <div class="container text-center text-md-left mt-5">

        <!-- Grid row -->
        <div class="row mt-3 dark-grey-text">

          <!-- Grid column -->
          <div class="col-md-3 col-lg-4 col-xl-3 mb-4">

            <!-- Content -->
            <h6 class="text-uppercase font-weight-bold" style="color: white;">Findesin</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>Here you can use rows and columns to organize your footer content. Lorem ipsum dolor sit amet,
              consectetur
              adipisicing elit.</p>

          </div>

          <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4"></div>
          <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4"></div>

          <!-- Grid column -->
          <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">

            <!-- Links -->
            <h6 class="text-uppercase font-weight-bold" style="color: white;">Contacto</h6>
            <hr class="teal accent-3 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
            <p>
              <i class="fas fa-home mr-3"></i>Calle 53 No. 74 A 29 Normandia II Sector</p>
            <p>
              <i class="fas fa-envelope mr-3"></i>fundacionfindesin@gmail.com</p>
            <p>
              <i class="fas fa-phone mr-3"></i>3103498866</p>
            <p>
              <i class="fas fa-print mr-3"></i>3046149994</p>

          </div>
          <!-- Grid column -->

        </div>
        <!-- Grid row -->

      </div>
      <!-- Footer Links -->

      <!-- Copyright -->
      <div class="footer-copyright text-center text-black-50 py-3">© 2019 Copyright: F</a>
      </div>
      <!-- Copyright -->

    </footer>
    <!-- Footer -->
  </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script src="{{ asset('/js/md5.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>

<script>

$("#formPayU").submit(function (event) {

var signature = "5Ho64Lp7FTi4tnikqZHIKKfkQM~807589~%referenceCode%~%amount%~COP"

var amount = $("#valor_donar").val();

var referenceCode = makeid(20);

$("#referenceCode").val(referenceCode);

signature = signature.replace("%referenceCode%",referenceCode);
signature = signature.replace("%amount%",amount);

signature = md5(signature);

$("#signature").val(signature);
alert(signature);
});

/*
Para palabra aleatoria
*/
function makeid(length) {
   var result           = '';
   var characters       = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
   var charactersLength = characters.length;
   for ( var i = 0; i < length; i++ ) {
      result += characters.charAt(Math.floor(Math.random() * charactersLength));
   }
   return result;
}

</script>
</body>
</html>
