@extends('layout')

@section('content')
<section id="lessonentry">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                    <?php
                    if ((    isset($_POST['oldpass']) && isset($_POST['newpass'])  && isset($_POST['newpass2'])    )
                    && ($_POST['newpass'] == $_POST['newpass2']) )
                    {
                    $field1 = array(
                        'username'     =>     $_SESSION['Name']//,
                    );

                    $postsV = $data->select('vl_users',$field1, " ORDER BY username asc");
                    foreach($postsV as $postV)
                    {
                        $password = $postV['password'];
                    }

                    if ($password==md5($_POST['oldpass']))
                    {
                    $newpassmd5 = md5($_POST['newpass']);

                    $field = array('password' => $newpassmd5);
                    $cond = array('username'    =>  $_SESSION['Name'] );

                    if($data->update("vl_users", $field, $cond))
                    {?>
                    <div class="registration-form">
                        <table align=center>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td colspan="2"  align="center"></td></tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr>
                                <td colspan="2"><H1>Keçərsöz uğurla dəyişdirildi !!!</H4></td>
                            </tr>
                            <tr><td></td><td></td></tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr><td></td><td></td></tr>
                            <tr>
                                <td colspan="2" align="center">
                                   <a href="<?=$path;?>/profile">DAVAM ET</a>
                                </td>
                            </tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                        </table>
                    </div>
                    <?php
                    }
                    else //echo "string";
                        echo"<script>alert('Yeni Keçərsözün təkrarını düz daxil edin...'); window.location.href = '".$path."/changepassword' ; </script>";
                    }

                    else //echo "string";
                        echo"<script>alert('Köhnə Keçərsözü düz daxil edin...'); window.location.href = '".$path."/changepassword' ; </script>";



                    }
                    else
                    {

                    if (    isset($_POST['oldpass']) && isset($_POST['newpass'])  && isset($_POST['newpass2'] ))
                        echo"<script>alert('Yeni Keçərsözün təkrarını düz daxil edin...'); window.location.href = '".$path."/changepassword' ; </script>";


                    //echo "Vacib sahələr doldurulmalıdır !";
                    ?>
                    <div class="registration-form">

                        <form id="form" action="/changepassword"  method="post" autocomplete=on >
                            <table align=center width="70%">


                                <tr>
                                    <td colspan="4">
                                        <H3><span>KEÇƏRSÖZÜ DƏYİŞ</span></H3>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>


                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td align="left"><label for="oldpass">Cari keçərsöz :  </label></td>
                                    <td><input type="password" name="oldpass" id="oldpass" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Ən azı 6 simvol' : ''); if(this.checkValidity()) form.repassword.pattern = this.value;" placeholder="" /> <span>*</span></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>


                                <tr>
                                    <td align="left"><label for="newpass">Yeni keçərsöz :  </label></td>
                                    <td><input type="password" name="newpass" id="newpass" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Ən azı 6 simvol' : ''); if(this.checkValidity()) form.repassword.pattern = this.value;" placeholder=""/>  <span>*</span>
                                    </td>
                                    <td align="left"><label for="newpass2">Təkrar yeni keçərsöz :  </label></td>
                                    <td><input type="password" name="newpass2" id="newpass2" required pattern="^\S{6,}$" onchange="this.setCustomValidity(this.validity.patternMismatch ? 'Keçərsözü təkrar eynisini daxil edin' : '');" placeholder="" /> <span>*</span>
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td colspan="4"></td>
                                </tr>

                                <tr>
                                    <td colspan="4" align="right"> <a href="#" onclick="document.getElementById('form').submit()" >DƏYİŞ</a><!--<input type="submit" class="buttons" value="Üzv ol" />-->&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                                <tr>
                                    <td colspan="4">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>
                                <tr>
                                    <td colspan="4" align="center">&nbsp;</td>
                                </tr>
                            </table>
                        </form>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>
</section>
@endsection
