
@extends('layout')

@section('content')
<section id="lessonentry">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                <div class="registration-form">
                    <form action="/logmein" method="post">
                        <table align=center>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr><td colspan="2"><H3><span >PROFİLƏ GİRİŞ</span></H3></td></tr>
                            <tr><td colspan="2" align="center">&nbsp;</td></tr>
                            <tr>
                                <td align="left"><label for="login">Login :</label></td>
                                <td><input type="text" name="login" required/></td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr>
                                <td align="left"><label for="password">Parol :</label></td>
                                <td><input type="password" name="password" required/></td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr>
                                <td></td>
                                <td align="right"><input type="submit" class="buttons" value="Daxil ol" /></td>
                            </tr>
                            <tr><td colspan="2">&nbsp;</td></tr>
                            <tr>
                                <td colspan="2" align="center"> <span id="forgotpass" onclick="window.location='/forgot'">parolu unutdum</span></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
