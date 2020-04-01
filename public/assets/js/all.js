function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

$(function() {


   
    $("#playlist li").on("click", function() {

        //alert(444);

 var murl = $(this).attr("movieurl");

// alert(murl);
        

        if (murl=="") {
            $('#divvideoplayer').css("display", "block");
            $('#videoarea').css("display", "none");
        }
        else{
        $('#divvideoplayer').css("display", "none");
            $('#videoarea').css("display", "block");
        }
  
        $("#video_name").html( $(this).attr("moviename") );
        videoindex = $(this).attr("movieid");
        //alert(videoindex);
        $("#videoarea").attr({
            "src": $(this).attr("movieurl"),
            "poster": "",
            "autoplay": "autoplay"
        })


        logged =  document.getElementById("logged").innerHTML
        vcat =  document.getElementById("videocat").innerHTML;
        $.ajax({
            method: "POST",
            url: "../logvideoplaying.php",
            data: { username: logged, videoid: videoindex,videocat: vcat }
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
        });   

    })





    $("#videoarea").attr({
        //"src": "../img/videoline.mp4",//$("#playlist li").eq(0).attr("movieurl"),
        "src": $("#playlist li").eq(1).attr("movieurl"),
        "poster": "../img/logo.png",//$("#playlist li").eq(0).attr("moviesposter"),
        "autoplay": "autoplay"
        

    })

        logged =  document.getElementById("logged").innerHTML
        vcat =  document.getElementById("videocat").innerHTML;
        $.ajax({
            method: "POST",
            url: "../logvideoplaying.php",
            data: { username: logged, videoid: 1,videocat: vcat }
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
        });


        // $('[id^=cardnumber]').keypress(validateNumber);


})



//    $('.owl-carousel').owlCarousel({
//     loop:true,autoplay:true,
//     margin:10,
//     nav:true,
// items:1
// })
      $('.iphone-slide').owlCarousel({

    loop:true,
    autoplay:true,
    margin:10,
    nav:true,
    navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    items:1,
    dots:true
    // responsive:{
    //     0:{
    //         items:1
    //     },
    //     600:{
    //         items:3
    //     },
    //     1000:{
    //         items:5
    //     }
    // }
})
      $('.owl-carousel-2').owlCarousel({

    loop:true,
    autoplayTimeout:16000,
    autoplay:true,
    margin:10,
    nav:true,
     navText: ["<i class='fa fa-angle-left'></i>", "<i class='fa fa-angle-right'></i>"],
    items:1,
    dots:true 
    // responsive:{
    //     0:{
    //         items:1
    //     },
    //     600:{
    //         items:3
    //     },
    //     1000:{
    //         items:5
    //     }
    // }
})
       $(".partners__carousel").owlCarousel({
                loop:true,
                margin:10,
                autoplayTimeout:8000,
                dots:false,
                autoplay:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });
   $(".odeme__carousel").owlCarousel({
                loop:true,
                margin:10,
                autoplayTimeout:8000,
                dots:false,
                autoplay:true,
                responsive:{
                    0:{
                        items:1
                    },
                    600:{
                        items:3
                    },
                    1000:{
                        items:5
                    }
                }
            });



  document.getElementById('videoarea').addEventListener('ended',myHandler,false);
    function myHandler(e) {
        // What you want to do after the event
        //alert(5);
        var filename = $("#videoarea").attr('src').replace(/^.*[\\\/]/, '');
        var res = filename.split(".", 2) ;
        //alert(res[0]);


        var nextVideoId = parseInt(res[0])+1;
        
        var murl = $("#playlist li").eq(nextVideoId).attr("movieurl");
        //alert(murl);

        if (murl=="") {
            $('#divvideoplayer').css("display", "block");
            $('#videoarea').css("display", "none");
        }
        // document.getElementById('divvideoplayer').innerHTML = "<a href='<?=$path;?>/payments'><img src'/img/video.png' /></a>";
        else  {  
        $(this).attr({
        "src": $("#playlist li").eq(nextVideoId).attr("movieurl"),
        "poster": "",//$("#playlist li").eq(0).attr("moviesposter"),
        "autoplay": "autoplay"
        })

          logged =  document.getElementById("logged").innerHTML
          vcat =  document.getElementById("videocat").innerHTML;
        $.ajax({
            method: "POST",
            url: "../logvideoplaying.php",
            data: { username: logged, videoid: nextVideoId,videocat: vcat }
        }).done(function( msg ) {
            //alert( "Data Saved: " + msg );
        });

         

        }
    }