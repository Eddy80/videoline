
@extends('layout')

@section('content')
<section id="newBook">
    <div class="container text-center">
        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12"> 
            <div class="aboutnew-top">
                <div id="tit">
                    <span>KİTABXANA</span>
                    <div id="titcat">
                        <?php    /*require_once('database.php');   $data = new Databases;*/   ?>
                        <SELECT title="Kateqoriyalar" name="bookcats" id="bookcats" onChange="loadbooks(this.value, '<?/*=$path;*/?>');">
                            <OPTION value="-1">Bütün kateqoriyalar</OPTION>
                            <?php/*
                            $postsCat = $data->select('vl_bookcats',"", "");                 
                            foreach($postsCat as $postCat)  
                                { 
                                $catid = $postCat['id'];
                                $catname = $postCat['name'];
                                echo '
                                <OPTION value="'.$catid.'">'.$catname.'</OPTION>';
                                }*/
                            ?>                  
                        </SELECT>
                    </div>
                </div>
                <br/>
                <H5>    
                    <strong>Qeyd:</strong> 
                    Yükləmək üçün videoline paketlərimizdən hər hansı birini əldə etməlisiz
                </H5>
            </div>
            <div class="aboutnew-content">
            <div class="row rowbooks"> 
                <?php //include 'loadbooks.php'; ?>    
            </div>
        </div>
    </div>
</section> 
@endsection
