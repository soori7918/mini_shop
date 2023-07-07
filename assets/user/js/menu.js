// const mobileScreen = window.matchMedia("(max-width: 990px )");
// $(document).ready(function () {
//     $(".dashboard-nav-dropdown-toggle").click(function () {
//         $(this).closest(".dashboard-nav-dropdown")
//             .toggleClass("show")
//             .find(".dashboard-nav-dropdown")
//             .removeClass("show");
//         $(this).parent()
//             .siblings()
//             .removeClass("show");
//     });
//     $(".menu-toggle").click(function () {
//         if (mobileScreen.matches) {
//             $(".dashboard-nav").toggleClass("mobile-show");
//         } else {
//             $(".dashboard").toggleClass("dashboard-compact");
//         }
//     });
// });




document.querySelector(".landing_btn-menu").addEventListener('click', function () {
    document.getElementById("landing_menu").style.width = "250px";
});
document.querySelector(".landing_close").addEventListener('click', function () {
    document.getElementById("landing_menu").style.width = "0";
});
var flag=false;
function myFunction(pc) {
    if (pc.matches) { // If media query matches
        document.querySelector('.li-hover').addEventListener("click", function () {
            flag=!flag;
            if(flag==true) {
                document.querySelector('.sub-menu').classList.add('show_box');
            }else {
                document.querySelector('.sub-menu').classList.remove('show_box');
            }
        })
    } else {
        document.querySelector('.li-hover').addEventListener("mouseenter", function () {
            document.querySelector('.sub-menu').classList.add('show_box');
        })
        document.querySelector('.li-hover').addEventListener("mouseleave", function () {
            document.querySelector('.sub-menu').classList.remove('show_box');
        })
    }
}

var pc = window.matchMedia("(max-width: 1000px)")
myFunction(pc) // Call listener function at run time
pc.addListener(myFunction) // Attach listener function on state changes


