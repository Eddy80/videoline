
@extends('layout')

@section('content')
<section id="lessonentry">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center"> 
                <table align=center width="94%">
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span>RƏYLƏR</span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>

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
                        $comment = $postComments['comment'];*/      
                    ?>
                    <tr>
                        <td colspan="4" align="justify">
                            <H4><?//=$comment;?></H4>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td align="right">
                            <h5>
                                <b><?/*=$author;*/?> - <?/*=$job;*/?></b>
                            </h5>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">
                            <H3>
                                <span></span>
                            </H3>
                        </td>
                    </tr>
                    <?php
                    //}
                    ?> 
                </table>
            </div>
        </div>
    </div>
</section> 
@endsection
