<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>VIDEOLINE</title>
    <meta name="keywords" content="videoline, psixologiya, video, təlim, yalan, kqb, kouç, nlp, oğuz, sayqın">
    <meta name="description" content="Psixologiya video təlimləri">
    <meta name="author" content="Təbriz Hacinski">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="/icon.png">

    <!-- Place favicon.ico in the root directory -->

<!--     <link rel="stylesheet" href="/libs/normalize.css/normalize.css" type="text/css" media="screen"/> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous" type="text/css" media="screen"/>

    <link rel="stylesheet" href="/assets/libs/bootstrap/dist/css/bootstrap.min.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/assets/css/main.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/assets/css/my.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/assets/css/lesson.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="/assets/css/item.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.css" type="text/css" media="screen"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.32/owl.theme.css" type="text/css" media="screen"/>

    <link rel="icon" href="/icon.ico" type="image/x-icon">

<!--
    <script>
    if(window.location.protocol != 'https:') {
        location.href =   location.href.replace("http://", "https://");

    }
    </script>
-->
           <!-- chatbox crisp -->
        <!-- <script type="text/javascript">window.$crisp=[];window.CRISP_WEBSITE_ID="df000bf0-bcf6-4026-aa4a-845f3bdadaed";(function(){d=document;s=d.createElement("script");s.src="https://client.crisp.chat/l.js";s.async=1;d.getElementsByTagName("head")[0].appendChild(s);})();</script> -->

</head>
<body onload='location.href="#myanchor"'>
<!--[if lte IE 9]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<section id="cover">
    <div class="header">
      <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
        <div class="wrap pos-relative">
            <div class="logo">
                <a href="/"><img src="assets/img/logo.png" alt="" /></a>
            </div>


            <div class="menu1">
                    <ul>
                        <li><a href="/lessons">TƏLİMLƏR</a></li>
                        <li><a href="/experts">EKSPERTLƏR</a></li>
                        <li><a href="/books">KİTABXANA</a></li>

                    </ul>
            </div>


            <div class="float-left search-main">
                <div class="count">&nbsp;</div>
                <div class="clear"></div>
                <div class="search">
                    <form action="/lessons/index.php" method="post" >
                        <input type="text"  name="search" list="telimler"  />

                        <datalist id="telimler" >
                            <?php/*
                            $postsV = $data->select('vl_videos',"", " ORDER BY name asc");
                            foreach($postsV as $postV)
                                {
                                $id = $postV['id'];
                                $catId = $postV['catId'];
                                $name = $postV['name'];*/
                                ?>
                            <option  value="" ></option>
                            <?php
                            /*}*/
                            ?>
                        </datalist>
                        <input type="submit"  value="" />
                    </form>
                </div>
            </div>
             <div class="float-right">
                <div class="clear"></div>
                @if (!Auth::check())
                <div class="menu" >
                       <ul>
                        <li class="entry"><a href="/login">Giriş </a></li>
                        <li class="uzvol" style="width:100px; text-align: center;" ><a href="/payment">ÜZV Ol</a></li>
                    </ul>
                </div>
                @else
                <div id="logged" style="display: none;"></div>
                <div class="menu2">
                    <ul>
                        <li><a href="#"><img src="/assets/img/user.png"> </a>
                            <ul class="dropdown">
                                <li><a href="#"></a>{{Auth::user()->email}}</li>
                                <li><a href="/mypayaccount">{{Auth::user()->firstname}} {{Auth::user()->lastname}}</a></li>
                                <li><a href="/changepassword">KEÇƏRSÖZÜ DƏYİŞ</a></li>
                                <li><a href="/profile">VİDEOLARIM</a></li>
                                <li><a href="/certifications">SERTİFİKATLARIM</a></li>
                            </ul>
                        </li>
                       <li  class="isfend"><a href="{{url('logout')}}">&nbsp;&nbsp;&nbsp;&nbsp;Çıxış</a>
                        </li>
                    </ul>
                </div>
                @endif
            </div>
            <div class="clear"></div>
        </div>
      </div>
    </div>

@yield('content' )

<section id="footer">
  <div class="container">
      <div class="row">
          <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
              <div class="foot-link"><a href="/">ANA SƏHİFƏ</a></div>
              <div class="foot-link"><a href="/about">HAQQIMIZDA</a></div>
              <div class="foot-link"><a href="/lessons">TƏLİMLƏR</a></div>
              <div class="foot-link"><a href="/experts">EKSPERTLƏR</a></div>
              <div class="foot-link"><a href="/comments">RƏYLƏR</a></div>
              <div class="foot-link"><a href="#partners">PARTNYORLAR</a></div>
              <div class="foot-link copy"> © CIBS LLC | 2018

              </div>
          </div>

              <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                  <div class="foot-link"><a href="#">BİZİMLƏ ƏLAQƏ</a></div>
                  <div class="foot-link"><a href="#"></a>+994 12 505 47 46</div>
                  <div class="foot-link"><a href="#"></a>+994 55 374 80 63</div>
                  <div class="foot-link"><a href="#"></a>Cəfər Cabbarlı küç. 44</div>
                  <div class="foot-link">Caspian Plaza</div>

              </div>
              <div class="col-sm-5 col-md-5 col-lg-5 col-xl-5">
                <div class="join">Bizə qoşulun:</div>
                <div class="social">

                      <a href="#"><img src="/assets/img/face.png"></a>
                      <a href="#"><img src="/assets/img/ins.png"></a>
                      <a href="#"><img src="/assets/img/you.png"></a>
                      <!--
                      <a href="#"><img src="/img/gplus.png"></a>

                      <a href="#"><img src="/img/twit.png"></a>
                      <a href="#"><img src="/img/in.png"></a>
                      -->



                </div>
                <br>
                      <div id="webcounter" align="right">
                      <!--LiveInternet counter-->
                                        <!-- <script type="text/javascript">
                              document.write("<a href='//www.liveinternet.ru/click' "+
                              "target=_blank><img src='//counter.yadro.ru/hit?t28.6;r"+
                              escape(document.referrer)+((typeof(screen)=="undefined")?"":
                              ";s"+screen.width+"*"+screen.height+"*"+(screen.colorDepth?
                              screen.colorDepth:screen.pixelDepth))+";u"+escape(document.URL)+
                              ";h"+escape(document.title.substring(0,150))+";"+Math.random()+
                              "' alt='' title='LiveInternet: number of visitors and pageviews"+
                              " is shown' "+
                              "border='0' width='88' height='120'><\/a>")
                              </script>/LiveInternet-->
                      </div>
              </div>
      </div>
  </div>
</section>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" type="text/javascript" charset="utf-8" ></script>
<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="assets/libs/jquery/dist/jquery.min.js"><\/script>')</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="assets/libs/bootstrap/dist/js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js"></script>
<script src="/assets/js/all.js"></script>
<script src="/assets/js/my.js"></script>
</body>
</html>

