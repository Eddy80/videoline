@extends('layout')

@section('content')

<section id="endLesson-cover">
    @if (  (Auth::user()->payamount==0) && (Auth::user()->payexpiredate< date('Y-m-d') ) )
      @include('packets.blade.php');
    @endif
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                <div class="endLesson">
                    <!--<div class="vertic text-center"><a href="#" >online konsultasiya</a></div>-->
                     <div class="endLesson-top">
                        <h2>Hesabım : -  {{$currentuser->firstname}} {{$currentuser->lastname}}</h2>
                     </div>
                     <div class="endLesson-content">
                         <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                             <div class="list-group">
                                 <div style="text-align: center; width: 95%;">
                                     @if ($currentuser->myprivatepromokod != "-1")
                                         @if($totalprofit !=0)
                                             <span style="font-size: 16px;font-weight: bold;color: green;padding-top: 10px;">PROMO KODLA APARILAN ÖDƏNİŞLƏRİN STATİSTİKASI</span>
                                             <br/>
                                             <table style="width:100%;font-size:14px;margin-top:20px;margin-bottom:20px;">
                                                 <tr>
                                                     <td><b>Adı</b></td>
                                                     <td><b>Soyadı</b></td>
                                                     <td><b>Ödəniş Tarixi</b></td>
                                                     <td><b>Ödənilən Məbləğ</b></td>
                                                     <td><b>Qazanc</b></td>
                                                 </tr>
                                                 @foreach($promos as $promo)
                                                     <tr>
                                                         <td>{{$promo->firstname}}</td>
                                                         <td>{{$promo->lastname}}</td>
                                                         <td>{{$promo->paydate}}</td>
                                                         <td>{{$promo->payamount}} (manat)</td>
                                                         <td>{{$promo->payamount*50/100}} (manat)</td>
                                                     </tr>
                                                 @endforeach
                                             </table>
                                             <span style="font-size: 16px; font-weight: bold; color: green; padding-top: 10px;">CƏMİ QAZANC: </span>
                                             <span style="font-size: 18px;font-weight: bold;color:red;padding-top: 10px;">{{$totalProfit}}</span>
                                             <span style="font-size: 16px;font-weight: bold;color:black;padding-top: 10px;"> manat<br></span>
                                             <form id="form" action="/cabcard"  method="post" autocomplete=off >
                                                 <br>
                                                 <span style='font-size: 14px;font-weight: bold;color: black;padding-top: 10px;'>Qazancı pul şəklində çıxartmaq üçün Bank kartınızın üzərindəki 16 rəqəmli nömrəni daxil edin: </span><br/>
                                                 <input type='input'  name='cardnumber' id='cardnumber' size='16' maxlength='16' value='' placeholder='16 rəqəmli bank kart nömrəniz' style='font-size: 16px;font-weight: bold;color: green;margin-top: 10px; margin-bottom: 10px; width:290px;'  />
                                                 <br>
                                                 <span style='font-size: 14px;font-weight: bold;color: black;padding-top: 10px;'>Kart kimin adınadır? </span><br/>
                                                 <input type='text' name='cardname' id='cardname' size='26' maxlength='26' value='' placeholder='Adınız Soyadınız' style='font-size: 16px;font-weight: bold;color: green;margin-top: 10px; margin-bottom: 10px; width:290px;'/>
                                                 <input type='hidden' name='payedtouserAmount' id='payedtouserAmount' value='".$totalProfit."' />
                                                 <input type='hidden' name='mypromokodforpay' id='mypromokodforpay' value='".$myPrivatePromoKod."' />
                                                 <br>
                                                 <a href="#" onclick="document.getElementById('form').submit()" style="margin-bottom: 10px; color:red;font-size:14px; font-weight:bold;text-decoration:none;" >Pulu Çıxart !</a>
                                             </form>
                                             <br>
                                         @endif

                                         @if ($totalprofitwaiting!=0)
                                             <br/>
                                             <span style="font-size: 16px; font-weight: bold; color: red; padding-top: 10px;">
                                                Ödənilmə gözləmə rejimində:
                                             </span>
                                             <span style="font-size: 18px;font-weight: bold;color:green;padding-top: 10px;">
                                                {{$totalprofitwaiting}}
                                             </span>
                                             <span style="font-size: 16px;font-weight: bold;color:black;padding-top: 10px;">
                                                manat <br/>
                                             </span>';
                                             <br/><br/>
                                             <span style='color:green;  font-size: 12px;text-align: center; margin-top: 50px;'>
                                             QEYD: Hər ayın 15-də ödənişlər həyata keçir.
                                             </span>
                                             <br/><br/>
                                         @endif
                                     @endif
                                 </div>
                             </div>


                            <div class="uyelikBilgisi">
                                <div class="link"><a href="#">Üzvlük məlumatları</a></div>
                                <?php
                                $today = date('Y-m-d');
                                $daydiff=floor((abs(strtotime($today) - strtotime($currentuser->payexpiredate))/(60*60*24)));
                                ?>

                                @if (  ($currentuser->payamount>0) && ($currentuser->payexpiredate> $today ) )
                                    <div class="ozel">
                                        <h2>Videoline Özel Üzvlüyü</h2>
                                        <p>Qalan günlər:</p>
                                        <a href="#"><?php  if ( $daydiff <= 280)  echo $daydiff." gün"; else echo "Müddətsiz"; ?>  </a>
                                    </div>
                                    <div class="uyelik">
                                        <a href="/payment" class="uye">Üzvlüyü uzat</a>
                                        <p><!-- Tövsüyə et <a href="#">Üzvlük qazan</a>--></p>
                                    </div>
                                @else
                                    <div class="ozel"><h2>Videoline Özəl Üzvlüyü</h2><p><!--Qalan günlər:--></p><!--<a href="#">0 gün</a>--></div>
                                    <div class="uyelik"><a href="/payment" class="uye" target="blank">Üzvlük üçün ödəniş et</a><p><!-- Tövsiyə et <a href="#">Üzvlük qazan</a>--></p></div>
                                @endif
                                <div class="ozel">
                                    <h2><span style="color:green; font-weight: bold; font-size: 16px;">Fərdi Endirim kodum:</span> </h2>
                                    <script type="text/javascript">
                                        function copy(that){
                                            var inp =document.createElement('input');
                                            document.body.appendChild(inp);
                                            inp.value =that.textContent.replace(/\s+/g, "");
                                            inp.select();
                                            document.execCommand('copy',false);
                                            inp.remove();
                                            alert("Buferə köçürüldü!");
                                        }
                                    </script>

                                    @if ($currentuser->myprivatepromokod!="-1")
                                        <a href="javascript:void(0)" onclick = "copy(this)">{{$currentuser->myprivatepromokod}}</a>
                                        <br>
                                        <div><span style="color:#660066; font-weight: bold; font-size: 10px;text-align: center;">(köçürtmək üçün endirim kodunu klikləyin)</span></div>
                                    @else
                                        <a href="#">Endirim kodunu əldə etmək üçün 189 manatlıq paket almalısınız...</a>
                                    @endif
                                </div>
                                <br/>
                                <span style="color:blue;  font-size: 12px;text-align: center; margin-top: 50px;">
                                       Fərdi Endirim Kodunuzu tanışlarınıza verməklə onların hər aldığı ödəniş paketinin <b>50%</b>
                                       miqdarında maddi vəsait sizə pul şəklində ödəniləcəkdir.
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
