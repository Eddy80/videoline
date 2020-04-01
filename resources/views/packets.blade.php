
@extends('layout')

@section('content')

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
                        <a href="/registration/payplan/9" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect"><img src="/assets/img/raket.png" class="aboutnew-img"></div>
                                <div class="line"></div>
                                <h3><span class="money">BAŞLANĞIC</span></h3>
                                <div class="qiymet"><strong>  9 AZN</strong></div>
                                <div class="choose"><a href="/registration/payplan/9">1 TƏLİM</a></div>
                                <div class="new-path1">
                                    @if (!Auth::check())
                                        <a href="/registration/payplan/9" class="about_uzv">ÜZV OL</a>
                                    @else
                                        <a href="/payplanoneincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/payplan/39" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect"><img src="/assets/img/raket3.png" class="aboutnew-img"></div>
                                <div class="line"></div>
                                <h3><span class="money">80 GÜN</span></h3>
                                <div class="qiymet"><font color="red"><strike>39 AZN</strike></font><strong>7 AZN</strong></div>
                                <div class="choose"><a href="/registration/payplan/39">LİMİTSİZ</a></div>
                                <div class="new-path1">
                                    @if (!Auth::check())
                                        <a href="/registration/payplan/39" class="about_uzv">ÜZV OL</a>
                                    @else
                                        <a href="/payplantwoincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/payplan/89" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect"><img src="/assets/img/raket2.png" class="aboutnew-img"></div>
                                <div class="line"></div>
                                <h3><span class="money">280 GÜN</span></h3>
                                <div class="qiymet"><strong>89 AZN</strong></div>
                                <div class="choose"><a href="/registration/payplan/89">LİMİTSİZ</a></div>
                                <div class="new-path1">
                                    @if (!Auth::check())
                                        <a href="/registration/payplan/89" class="about_uzv">ÜZV OL</a>
                                    @else
                                        <a href="/payplanthreeincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                        <a href="/registration/payplan/189" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect"><img src="/assets/img/raketvip.png" class="aboutnew-img"></div>
                                <div class="line"></div>
                                <h3><span class="moneyvip">VİP</span></h3>
                                <div class="qiymet"><strong>189 AZN</strong></div>
                                <div class="choosevip"><a href="/registration/payplan/189">MÜDDƏTSİZ - LİMİTSİZ</a></div>
                                <div class="new-path1">
                                    @if (!Auth::check())
                                        <a href="/registration/payplan/189" class="about_uzv">ÜZV OL</a>
                                    @else
                                        <a href="/payplanvipincab" class="about_uzv">ÖDƏNİŞ ET</a>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
