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
        $("#videoarea").attr({
            "src": $(this).attr("movieurl"),
            "poster": "",
            "autoplay": "autoplay"
        })
    })
    $("#videoarea").attr({
        "src": "../img/videoline.mp4",//$("#playlist li").eq(0).attr("movieurl"),
        "poster": "../img/logo.png",//$("#playlist li").eq(0).attr("moviesposter"),
        "autoplay": "autoplay"

    })
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
