
@extends('layout')

@section('content')
    <?php
    use App\Http\Controllers\VlcatController;
    use App\Http\Controllers\VlExpertController;
    ?>
  <section id="new">
                <?php
            if (isset($_POST['search'])){
?>
    <div style="text-align: center;">
        <H1>AXTARIŞIN NƏTİCƏSİ</H1>
        <H5> axtarılan ifadə üzrə tapılan video dərsliklər aşağıdakı təlimlərdə rast gəlir: </H5>
<?php
}
?>
    </div>

    <div class="container text-center">

        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
            <div class="new-top">
               <!-- <h4><span class="new-head1">Yeni</span> | Populyar</h4>-->
            </div>
        <div class="new-content">
	        <div class="row">
                <?php  $postsCat = VlcatController::index();  ?>
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


                    $expert = VlExpertController::getUserFLNames($postCat->authorid);
                    //dd($expert);
                        ?>





                        <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4">
                        <a href="/lesson/{{$postCat->id}}" style="text-decoration: none;">
                            <div class="new-label">
                                <div class="item-rect">
                                    <img src="assets/vl_videos/cat{{$postCat->id}}/{{$catPreview}}" class="img">
                                </div>
                                <p>Ekspert :
                                    @if (count($expert) > 0)
                                        {{ $expert[0]->firstname }} {{ $expert[0]->lastname }}
                                    @endif
                                </p>
                                <p><h4>{{$postCat->name}}</h4></p>
                                <div class="new-path">
                                    <div class="path">
                                        <a href="/lesson/{{$postCat->id}}" class="about_uzv">Baxmaq</a>
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
        <!--<div class="load"><a href="#" class="badge badge-warning">Daha çox</a></div>-->
    </div>
</div>
</section>
@endsection
