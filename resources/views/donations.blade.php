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
                    <li><a href="#contact" class="smoothScroll">{{ trans('adminlte_lang::message.contact') }}</a></li>
                    <li><a href="{{url('transactions')}}" class="smoothScroll">Transacciones</a></li>

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
        <div class="container">
            <div class="row">
                <h1 class="centered size-title">Donaciones con tarjeta de credito</h1>
                <br>
                <br>
                <div class="col-lg-6 centered size-form">
                  <form class="form-horizontal"  method="post" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/">
                    <input name="merchantId"    type="hidden"  value="508029"   >
                    <input name="accountId"     type="hidden"  value="512321" >
                    <input name="description"   type="hidden"  value="Fundacion PAYU"  >
                    <input name="referenceCode" type="hidden"  value="7678678" >
                    <input name="tax"   type="hidden"  value="0"  >
                    <input name="taxReturnBase" type="hidden"  value="0" >
                    <input name="currency"      type="hidden"  value="COP" >
                    <input name="signature"   type="hidden"  value="a03d45cc112f199182e8f868d17e64c2"  >
                    <input name="test"  type="hidden"  value="1" >
                    <input name="responseUrl"    type="hidden"  value="http://localhost:8000/donations" >
                    <input name="confirmationUrl"    type="hidden"  value="http://localhost:8000/donations" >
                    <div class="form-group">
                      <label for="name" class="control-label col-xs-4">Nombre</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-address-book-o"></i>
                         </div>
                         <input id="name" name="payerFullName" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>

                      <div class="form-group">
                      <label for="usr_apellido" class="control-label col-xs-4">Apellido</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-address-book"></i>
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
                         <div class="input-group-addon">
                           <i class="fa fa-address-card-o"></i>
                         </div>
                         <input id="text" name="payerDocument" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="tpo_id" class="control-label col-xs-4">Valor a donar</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-address-card-o"></i>
                         </div>
                         <input id="text" name="amount" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="email" class="control-label col-xs-4">Correo</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-envelope-open-o"></i>
                         </div>
                         <input id="email" name="buyerEmail" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_telefono" class="control-label col-xs-4">Telefono</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                         </div>
                         <input id="usr_telefono" name="mobilePhone" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-offset-4 col-xs-8">
                       <button name="submit" type="submit" class="btn btn-primary">

                             Enviar

                       </button>
                      </div>
                      </div>
                  </form>

                </div>

                <div class="col-lg-6">
                    <h3>{{ trans('adminlte_lang::message.features') }}</h3>
                    <br>
                    <!-- ACCORDION -->
                    <div class="accordion ac" id="accordion2">
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                    {{ trans('adminlte_lang::message.design') }}
                                </a>
                            </div><!-- /accordion-heading -->
                            <div id="collapseOne" class="accordion-body collapse in">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                    {{ trans('adminlte_lang::message.retina') }}
                                </a>
                            </div>
                            <div id="collapseTwo" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                    {{ trans('adminlte_lang::message.support') }}
                                </a>
                            </div>
                            <div id="collapseThree" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                                </div><!-- /accordion-inner -->
                            </div><!-- /collapse -->
                        </div><!-- /accordion-group -->
                        <br>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                    {{ trans('adminlte_lang::message.responsive') }}
                                </a>
                            </div>
                            <div id="collapseFour" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
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
        <div class="container">
            <div class="row">
                <h1 class="centered size-title">Donaciones de productos o servicios</h1>
                <br>
                <br>
                <div class="col-lg-6 centered">
                  <h3>{{ trans('adminlte_lang::message.features') }}</h3>
                  <br>
                  <!-- ACCORDION -->
                  <div class="accordion ac" id="accordion2">
                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseOne">
                                  {{ trans('adminlte_lang::message.design') }}
                              </a>
                          </div><!-- /accordion-heading -->
                          <div id="collapseOne" class="accordion-body collapse in">
                              <div class="accordion-inner">
                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseTwo">
                                  {{ trans('adminlte_lang::message.retina') }}
                              </a>
                          </div>
                          <div id="collapseTwo" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseThree">
                                  {{ trans('adminlte_lang::message.support') }}
                              </a>
                          </div>
                          <div id="collapseThree" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>

                      <div class="accordion-group">
                          <div class="accordion-heading">
                              <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#collapseFour">
                                  {{ trans('adminlte_lang::message.responsive') }}
                              </a>
                          </div>
                          <div id="collapseFour" class="accordion-body collapse">
                              <div class="accordion-inner">
                                  <p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                              </div><!-- /accordion-inner -->
                          </div><!-- /collapse -->
                      </div><!-- /accordion-group -->
                      <br>
                  </div><!-- Accordion -->
                </div>

                <div class="col-lg-6 size-form">
                  <form class="form-horizontal">
                      <div class="form-group">
                      <label for="name" class="control-label col-xs-4">Nombre</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-address-book-o"></i>
                         </div>
                         <input id="name" name="name" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_apellido" class="control-label col-xs-4">Apellido</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-address-book"></i>
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
                         <div class="input-group-addon">
                           <i class="fa fa-address-card-o"></i>
                         </div>
                         <input id="text" name="text" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="email" class="control-label col-xs-4">Correo</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-envelope-open-o"></i>
                         </div>
                         <input id="email" name="email" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group">
                      <label for="usr_telefono" class="control-label col-xs-4">Telefono</label>
                      <div class="col-xs-8">
                       <div class="input-group">
                         <div class="input-group-addon">
                           <i class="fa fa-phone"></i>
                         </div>
                         <input id="usr_telefono" name="usr_telefono" type="text" required="required" class="form-control">
                       </div>
                      </div>
                      </div>
                      <div class="form-group row">
                      <div class="col-xs-offset-4 col-xs-8">
                       <button name="submit" type="submit" class="btn btn-primary">

                             Enviar

                       </button>
                      </div>
                      </div>
                  </form>
                </div>
            </div>
        </div><!--/ .container -->
    </div><!--/ #features -->


    <section id="contact" name="contact"></section>
    <div id="footerwrap">
        <div class="container">
            <div class="col-lg-5">
                <h3>{{ trans('adminlte_lang::message.address') }}</h3>
                <p>
                    Av. Greenville 987,<br/>
                    New York,<br/>
                    90873<br/>
                    United States
                </p>
            </div>

            <div class="col-lg-7">
                <h3>{{ trans('adminlte_lang::message.dropus') }}</h3>
                <br>
                <form role="form" action="#" method="post" enctype="plain">
                    <div class="form-group">
                        <label for="name1">{{ trans('adminlte_lang::message.yourname') }}</label>
                        <input type="name" name="Name" class="form-control" id="name1" placeholder="{{ trans('adminlte_lang::message.yourname') }}">
                    </div>
                    <div class="form-group">
                        <label for="email1">{{ trans('adminlte_lang::message.emailaddress') }}</label>
                        <input type="email" name="Mail" class="form-control" id="email1" placeholder="{{ trans('adminlte_lang::message.enteremail') }}">
                    </div>
                    <div class="form-group">
                        <label>{{ trans('adminlte_lang::message.yourtext') }}</label>
                        <textarea class="form-control" name="Message" rows="3"></textarea>
                    </div>
                    <br>
                    <button type="submit" class="btn btn-large btn-success">{{ trans('adminlte_lang::message.submit') }}</button>
                </form>
            </div>
        </div>
    </div>
    <div id="c">
        <div class="container">
            <p>
                <a href="https://github.com/acacha/adminlte-laravel"></a><b>admin-lte-laravel</b></a>. {{ trans('adminlte_lang::message.descriptionpackage') }}.<br/>
                <strong>Copyright &copy; 2015 <a href="http://acacha.org">Acacha.org</a>.</strong> {{ trans('adminlte_lang::message.createdby') }} <a href="http://acacha.org/sergitur">Sergi Tur Badenas</a>. {{ trans('adminlte_lang::message.seecode') }} <a href="https://github.com/acacha/adminlte-laravel">Github</a>
                <br/>
                AdminLTE {{ trans('adminlte_lang::message.createdby') }} Abdullah Almsaeed <a href="https://almsaeedstudio.com/">almsaeedstudio.com</a>
                <br/>
                 Pratt Landing Page {{ trans('adminlte_lang::message.createdby') }} <a href="http://www.blacktie.co">BLACKTIE.CO</a>
            </p>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/js/app.js') }}"></script>
<script src="{{ asset('/js/smoothscroll.js') }}"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
