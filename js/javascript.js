$("#profile-img-tag").click(function(){
  $("#profile-img").click();
});
 function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $('#profile-img-tag').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#profile-img").change(function(){
        readURL(this);
    });

	$(window).on('load',function(){
        // $('#myModal').modal('show');
    });


$("#signupForm").validate();


// When the user scrolls the page, execute myFunction 
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
    $(".ancher").addClass("anchers");
    $("#logo-cap").removeClass("hidden");
  } else {
    header.classList.remove("sticky");
    $(".ancher").removeClass("anchers");
    $("#logo-cap").addClass("hidden");
  }
}

$("#Register").click(function(){
    var x="index.php?status=signup";
    // var x=window.location.hostname;
    // var x=window.location.pathname;
    // var x=window.location.protocol;
    // var x=window.location.port;
    // alert( x );
    window.location.assign(x)
});
$("#login").click(function(){
    var x="index.php?status=login";
    // var x=window.location.hostname;
    // var x=window.location.pathname;
    // var x=window.location.protocol;
    // var x=window.location.port;
    // alert( x );
    window.location.assign(x)
});

$("#logout").click(function(){
    var x="logout.php";
    window.location.assign(x)
});


$(document).ready(function() {
    $('#example').DataTable();
} );










// ajax working

    /*Insert*/   
                // $("#signupForm").on("submit", function(){ 
                //     // $('#load').show();
                //     $.ajax({
                //         url: "ajax.php?type=Register&work=insert", 
                //         type: "POST",
                //         data:$("#signupForm").serialize(),
                //         success: function(datanew) {
                //         $("#view").html(datanew);
                //         $("#formnews")[0].reset();
                //             $('input').val("");
                //             // $('#load').hide();
                //         }
                //     });
                //     return false;
                // });