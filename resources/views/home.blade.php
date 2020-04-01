@extends('layout')

@section('content')
<?php
use App\Http\Controllers\VlcatController;
use App\Http\Controllers\VlExpertController;
?>
<section>
    <div class="container">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="slider">
                <div class="owl-carousel owl-theme iphone-slide">
                    <div class="item"><a href="/lesson13"><img src="assets/img/manshet/ise_qebul.jpg"></a></div>
                    <div class="item"><a href="/lesson20"><img src="assets/img/manshet/kenanhr.jpg"></a></div>
                    <div class="item"><a href="/lesson19"><img src="assets/img/manshet/xatire.jpg"></a></div>
                    <div class="item"><a href="/lesson1"><img src="assets/img/manshet/gizli.jpg"></a></div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="lessonentry">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="acontainer">
                    <div class="arow">
                        <div class="acolumns">
                            <p align="center"> <img src="assets/img/24saat.png"></p>
                            <p>24 saat izləmək və öyrənmək imkanı.İstədiyiniz zaman, istədiyiniz yerdən bizi izləyə bilərsiniz</p>
                        </div>
                        <div class="acolumns">
                            <p align="center"><img src="assets/img/telimchi.png"></p>
                            <p>Sahələri üzrə ən təcrübəli mütəxəssisləri seçərək bizimlə öyrənəcək, sertifikat və slaydlar əldə edəcəksiniz</p>
                        </div>
                        <div class="acolumns">
                            <p align="center"><img src="assets/img/yenilenen.png"></p>
                            <p>Hər ay 50 müxtəlif və yeni video əldə edəcəksiniz.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="new">
    <div class="container text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="new-top">
                <h4><span class="new-head1">Yeni</span> | Populyar</h4>
            </div>
            <div class="new-content">
	            <div class="row">
                <?php  $postsCat = VlcatController::lastindex();  ?>
                @foreach($postsCat as $postCat)

                   <?php
                        $id = $postCat->id;
                        $name =  $postCat->name;
                        $author =  $postCat->author;
                        $catPreview = $postCat->img;
                        $totalDuration = $postCat->totaldurationinseconds;
                        $totalViewCount = $postCat->totalviewcount;

                        $totalHour =   floor($totalDuration/3600);
                        $totalMinute = floor(abs($totalDuration-$totalHour*3600)/60);
                        $totalSecond = floor(abs($totalDuration-$totalHour*3600)%60);

                        if ( strlen($totalHour)==1)  $totalHour= "0".$totalHour;
                        if ( strlen($totalMinute)==1)  $totalMinute= "0".$totalMinute;
                        if ( strlen($totalSecond)==1)  $totalSecond= "0".$totalSecond;

                        $totalFormat = $totalHour.":".$totalMinute.":".$totalSecond;
                        ?>


                    <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <a href="/lesson{{$postCat->id}}" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/vl_videos/cat{{$postCat->id}}/{{$catPreview}}" class="img">
                                </div>
                                <p>Ekspert :{{$postCat->author}}</p>
                                <p><h4>{{$postCat->name}}</h4></p>
                                <div class="new-path">
                                    <div class="path">
                                        <a href="/lesson{{$postCat->id}}" class="about_uzv">Baxmaq</a>
                                        <div  class="date">{{$totalFormat}}</div>
                                    </div>
                                    <div class="numberFon">
                                        <img src="assets/img/numberFon.png" alt="Snow" style="width:90%;">
                                        <div class="centered">{{$totalViewCount}}</div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="load">
                <a href="/lessons" class="about_uzv">Daha çox</a>
            </div>
        </div>
    </div>
</section>

<section class="partners">
    <div class="container text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="partners-top">
                <a id='partners' href='#'></a>
                <h3>PARTNYORLARIMIZ </h3>
            </div>
            <div class="partners__content">
                <div class="owl-carousel owl-theme partners__carousel ">
                    <div class=" item partners__item">
                        <img src="assets/img/partners/ibclub.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/azbeton.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/cibs.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/narcissu.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/nata.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/qim.png" class="partners__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/partners/venta.png" class="partners__img img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="new">
    <div class="container text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="aboutnew-top">
                <h2>Paketini seç ve öyrənməyə başla</h2>
                <p>Videoline'da yer alan 150+ video və 400+ dəqiqə dərslərə baxmaq üçün özünə uyğun olan paketi seç.</p>
            </div>
            <div class="aboutnew-content">
                <div class="row">
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/index.php?payplan=9" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/img/raket.png" class="aboutnew-img">
                                </div>
                                <div class="line"></div>
                                <h3><span class="money">BAŞLANĞIC</span></h3>
                                <div class="qiymet">
                                    <strong>  9 AZN</strong>
                                </div>
                                <!--<p>1 TƏLİM  </p>-->
                                <div class="choose">
                                    <a href="/registration/index.php?payplan=9">1 TƏLİM</a>
                                </div>
                                <div class="new-path1">
                                @if (Auth::check())
                                    <a href="/registration/index.php?payplan=9" class="about_uzv">ÜZV OL</a>
                                @else
                                    <a href="/payplanoneincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                @endif
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/index.php?payplan=39" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/img/raket3.png" class="aboutnew-img">
                                </div>
                                <div class="line"></div>
                                <h3><span class="money">80 GÜN</span></h3>
                                <div class="qiymet">
                                    <!-- <b>Yalnız 1 həftə</b>
                                    <br> -->
                                    <font color="red">
                                        <strike>39 AZN</strike>
                                    </font>
                                    <!-- <br> -->
                                    <strong>7 AZN</strong>
                                </div>
                                <!--<p>1 TƏLİM  </p>-->
                                <div class="choose">
                                    <a href="/registration/index.php?payplan=39">LİMİTSİZ</a>
                                </div>
                                <div class="new-path1">
                                @if (Auth::check())
                                    <a href="/registration/index.php?payplan=39" class="about_uzv">ÜZV OL</a>
                                @else
                                    <a href="/payplantwoincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                @endif
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/index.php?payplan=89" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/img/raket2.png" class="aboutnew-img">
                                </div>
                                <div class="line"></div>
                                <h3><span class="money">280 GÜN</span></h3>
                                <div class="qiymet">
                                    <!-- <b>Yalnız 1 həftə</b> -->
                                    <!-- <br> -->
                                    <strong>89 AZN</strong>
                                    <!-- <font color="red"><strike>89 AZN</strike></font>
                                    <br> <strong>27 AZN</strong> -->
                                </div>
                                <!--<p>1 TƏLİM  </p>-->
                                <div class="choose">
                                    <a href="/registration/index.php?payplan=89">LİMİTSİZ</a>
                                </div>
                                <div class="new-path1">
                                @if (Auth::check())
                                    <a href="/registration/index.php?payplan=89" class="about_uzv">ÜZV OL</a>
                                @else
                                    <a href="/payplanthreeincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                @endif
                                </div>
                            </div>
                        </a>
                    </div>


                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/index.php?payplan=189" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/img/raketvip.png" class="aboutnew-img">
                                </div>
                                <div class="line"></div>
                                <h3><span class="moneyvip">VİP</span></h3>
                                <div class="qiymet">
                                    <strong>189 AZN</strong>
                                </div>
                                <!--<p>1 TƏLİM  </p>-->
                                <div class="choosevip">
                                <a href="/registration/index.php?payplan=189">MÜDDƏTSİZ - LİMİTSİZ</a></div>
                                <div class="new-path1">
                                @if (Auth::check())
                                    <a href="/registration/index.php?payplan=189" class="about_uzvvip">ÜZV OL</a>
                                @else
                                    <a href="/payplanvipincab" class="about_uzvvip">ÖDƏNİŞ ET</a>
                                @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
        </div>
    </div>
</section>
<section class="odeme">
    <div class="container text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="odeme-top">
                <h3>GÜVƏNLİ &nbsp;ALIŞ - VERİŞ</h3>
            </div>
            <div class="odeme-content">
                <div class="owl-carousel owl-theme odeme__carousel ">
                    <div class=" item partners__item">
                        <img src="assets/img/visa.png" class="odeme__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/mastercard.png" class="odeme__img img-fluid" alt="">
                    </div>
                    <div class=" item partners__item">
                        <img src="assets/img/goldenpay.png" class="odeme__img img-fluid" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section id="students">
    <a id='comments' href='#'></a>
    <div class="special-card text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="owl-carousel owl-theme owl-carousel-2">
                <?php/*
                require_once('database.php');

                $data = new Databases;

                $field = "";
                $postsComments = $data->select('vl_studentcomments', $field, " ORDER BY rowid asc");

                foreach($postsComments as $postComments)
                    {
                    $id = $postComments['id'];
                    $author = $postComments['author'];
                    $job    =  $postComments['job'];
                    $comment = $postComments['comment'];
                    */
                ?>
                <div class="item">
                    <p class="card-text text-center">

                    </p>
                    <h4 class="card-title text-right">

                    </h4>
                </div>
                <?php
                  /*  }*/
                ?>
            </div>
            <a href="/comments">hamısını göstər</a>
        </div>
    </div>
</section>
<section id="lessonentry">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="lessonentry-top">
                    <h3>Bütün video dərslərə limitsiz baxmaq icazəsi</h3>
                    <p>Vdeoline - da yer alan 150+ video və 400+ dəqiqə dərslərə limitsiz icazə əldə etmək üçün , indi üzv ol.</p>
                </div>
                <a href="/payment" class="about_uzv">ÜZV OL</a>
            </div>
        </div>
    </div>
</section>
@endsection
