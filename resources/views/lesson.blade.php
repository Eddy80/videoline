
@extends('layout')

@section('content')
    <?php
    $today = date("Y-m-d");
    ?>
    <section id="lessonUser-cover">
        <div class="container">
            <div class="row text-center">
                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <div class="lessonUser-top">
                        <a href="/" class="lessonUser-head1">ANA SƏHİFƏ ></a>
                        <a href="/lessons" class="lessonUser-head2">Təlimlər</a>

                        <div id="videocat" style="display: none;">{{ $lesson->id }}</div>
                        <h3>{{ $lesson->name }}</h3>
                        <div class="ders">
                            <div id="video_name">
                                <a href="#" class="lessonUser-head2"></a>
                                &nbsp;{{$videos[0]->name}}
                                <a href="#" class="lessonUser-head1"></a>
                            </div>
                        </div>
                        <div class="star text-right">
                              <span>
                                  <a href="#">
                                      <i class="fas fa-star"></i>
                                  </a>
                              </span>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                                <a href="#">
                                    <i class="fas fa-star"></i>
                                </a>
                        </div>
                    </div>

                    <div class="lessonUser-cont">
                        <div class="lessonUser-content">
                            <div id="divvideoplayer">
                                <a href='/payment'><img src='/assets/img/video.png'  width='645px' height='365px'/></a>
                            </div>
                            <video id="videoarea" oncontextmenu="return false;" controls="controls" controlsList="nodownload" poster="../img/logo.png" src="" ></video>


                            <ul id="playlist" class="videobasliq">
                                <li class="videospan" style="font-size:22px; font-weight: bold;">Təlimin videoları</li>
                                <div class="videoIc">

                                    @foreach($videos as $video)
                                        @php
                                        $totalDuration = $video->durationinseconds;
                                        $totalHour =   floor($totalDuration/3600);
                                        $totalMinute = floor(abs($totalDuration-$totalHour*3600)/60);
                                        $totalSecond = floor(abs($totalDuration-$totalHour*3600)%60);
                                        @endphp

                                        @if ( strlen($totalHour)==1)
                                            @php $totalHour= "0".$totalHour; @endphp
                                        @endif
                                        @if ( strlen($totalMinute)==1)
                                            @php $totalMinute= "0".$totalMinute; @endphp
                                        @endif
                                        @if ( strlen($totalSecond)==1)
                                            @php $totalSecond= "0".$totalSecond; @endphp
                                        @endif

                                        @php
                                        $totalFormat = $totalHour.":".$totalMinute.":".$totalSecond;
                                        @endphp

                                        @if (Auth::check())

                                            @if (($currentuser->status==1) && ($currentuser->payexpiredate>$today) )
                                                @if ( ($currentuser->payamount==39) || ($currentuser->payamount==89) || ($currentuser->payamount==189) )
                                                    <li class="list" movieurl="/assets/vl_payed_videos/cat{{ $lesson->id }}/{{$video->filename}}" movieid="{{$video->id}}" moviename="{{htmlentities(htmlspecialchars(trim($video->name)))}}">
                                                        <i class="fas fa-play-circle"></i>&nbsp;{{$totalFormat}} {{$video->name}}
                                                    </li>
                                                @endif
                                            @else
                                                @if (true)
                                                    <li class="list" movieurl="/assets/vl_payed_videos/cat{{ $lesson->name }}/{{$video->filename}}" movieid="{{$video->id}}" moviename="{{htmlentities(htmlspecialchars(trim($video->name)))}}">
                                                        <i class="fas fa-play-circle"></i>&nbsp;{{$totalFormat}} {{$video->name}}
                                                    </li>
                                                @else
                                                    <li class="list" movieurl="" movieid="{{$video->id}}" moviename="{{htmlentities(htmlspecialchars(trim($video->name)))}}">
                                                        <i class="fas fa-lock"></i>&nbsp;{{$totalFormat}} {{$video->name}}
                                                    </li>
                                                @endif
                                            @endif
                                        @else
                                            @if( !$video->payed)
                                                <li class="list" movieurl="/assets/vl_videos/cat{{ $lesson->id}}/{{$video->filename}}" movieid="{{$video->id}}" moviename="{{htmlentities(htmlspecialchars(trim($video->name)))}}" >
                                                    <i class="fas fa-play-circle"></i>&nbsp;{{$totalFormat}} {{$video->name}}
                                                </li>
                                            @else
                                                <li class="list" movieurl="" movieid="" moviename="" >
                                                    <i class="fas fa-lock"></i>&nbsp;{{$totalFormat}} {{$video->name}}
                                                </li>
                                            @endif
                                        @endif
                                    @endforeach





                                </div>
                                <div class="text-center">
                                    @if (Auth::check())

                                        @if ( ($currentuser->status==1) and ($currentuser->payamount>0) and ($currentuser->payexpiredate>$today) )
                                            <button type="button" class="btn btn-secondary" onclick="window.location.href = '/profile';">
                                            Sertifikat al
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-secondary" onclick="window.location.href = '/payment';">
                                                Sertifikat al
                                            </button>
                                       @endif
                                   @endif

                                </div>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="lessonUser-cover2">
        <div class="container">
            <div class="row text-center">
                <div class="lessonUser-content2">
                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                        <div class="img">
                            <img src="/img/lectors/about_us.png" class="lessonUser-img" >
                        </div>
                        <div class="lessonUser-text">

                            <h3>{{ $lesson->name }}</h3>
                            <h4>Ekspert - {{ $lesson->author }}</h4>
                            {{ $lesson->text }}

                        </div>
                    </div>
                    <p>
                        <br/>
                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                            @if (Auth::check())

                                @if (($currentuser->status==1) and ($currentuser->payamount>0) and ($currentuser->payexpiredate>$today) )
                                <div style="text-align: right;">
                                    <a href="/vl_payed_videos/param.pdf"> <img src="/img/pdf.png" class="lessonUser-img" title="Təlimin slaydı" /></a>
                                </div>
                                @endif
                            @endif

                        </div>
                    </p>
                </div>
            </div>
        </div>

    </section>
@endsection
