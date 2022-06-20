$(document).ready(function () {

  //signup
  $("#sub").click(function () {
    var fname = $("#fname").val();
    var usname = $("#usname").val();
    var catgy  = $("#catgy").val();
    var email = $("#email").val();
    var pword = $("#pword").val();
    var cpword = $("#cpword").val();
    var ref = $("#ref").val();

    if (fname == "" || fname == null) {
      $("#fmsg").html("Kindly input your full name.");
    } else {
      if (usname == "" || usname == null) {
        $("#usmsg").html("Please create a username");
      }else {
          if (email == "" || email == null) {
            $("#emmsg").html("Invalid email address");
            } else {
              if (pword == "" || pword == null) {
                $("#pwmsg").html("Please create a secured password");
              } else {
                if (cpword == "" || cpword == null) {
                  $("#cpwmsg").html("Confirm your password");
                } else {
                  if (pword != cpword) {
                    $("#cpwmsg").html("Password does not match");
                  } else {
                    $("#msg").html("Loading... Please Wait");

                    $.ajax({
                      type: "post",
                      url: "functions/init.php",
                      data: {
                        fname: fname,
                        usname: usname,
                        email: email,
                        pword: pword,
                        cpword: cpword,
                        catgy, catgy,
                        ref: ref,
                      },
                      success: function (data) {
                        $("#msg").html(data);
                      },
                    });
                  }
                }
                }
              }
            }
        }
  });



//resend otp
$("#rotp").click(function () {

  $("#otptitle").html("We've sent you another OTP ✅");

  //I left this code so as to give a dummy text to the function validator
  var otpp  = "dummy";

    $("#vmsg").html("Loading... Please wait");

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {otpp: otpp},
      success: function (data) {
        $("#vmsg").html(data);
      },
    });
})


//verify otp
$("#vsub").click(function () {

   var digit1   = $("#digit-1").val();
   var digit2   = $("#digit-2").val();
   var digit3   = $("#digit-3").val();
   var digit4   = $("#digit-4").val();

   if(digit1 == "" || digit1 == null) {

    $("#vmsg").html("Invalid OTP!");

   } else {

    if(digit2 == "" || digit2 == null) {

      $("#vmsg").html("Invalid OTP!");

    } else {

    if(digit3 == "" || digit3 == null) {

      $("#vmsg").html("Invalid OTP!");

    } else {

    if(digit4 == "" || digit4 == null) {

      $("#vmsg").html("Invalid OTP!");

    } else {

      var votp = digit1 + digit2 + digit3 + digit4;

      $("#vmsg").html("Loading... Please Wait");

      $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {votp: votp},
      success: function (data) {
        $("#vmsg").html(data);
      },
    });
    }
    }
    }
   }

  
   alert(allotp);
  /* var votp   = $("#otpper").val();
   var votp   = $("#otpper").val();
   var votp   = $("#otpper").val();

  document.getElementById("rvmsg").style.display = 'none';
  document.getElementById("vmsg").style.display = 'block';

      if (votp == "" || votp == null) {
      $("#vmsg").html("Invalid OTP!");
    } else {
    $("#vmsg").html("Loading... Please Wait");
    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {votp: votp},
      success: function (data) {
        $("#vmsg").html(data);
      },
    });
  }*/
})


  //signin
  $("#lsub").click(function () {
    var username = $("#luname").val();
    var password = $("#lpword").val();

    if (username == "" || username == null) {
      $("#lumsg").html("Kindly insert your username");
    } else {
      if (password == "" || password == null) {
        $("#lupmsg").html("Invalid password inputted");
      } else {
        $("#lmsg").html("Loading... Please wait");
        $.ajax({
          type: "post",
          url: "functions/init.php",
          data: { username: username, password: password },
          success: function (data) {
            $("#lmsg").html(data);
          },
        });
      }
    }
  });


  //forgot
  $("#fsub").click(function () {
    var fgeml = $("#femail").val();

    if (fgeml == "" || fgeml == null) {
      $("#fmsg").html("Please insert your email");
    } else {
      $("#fmsg").html("Loading...Please Wait!");

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: { fgeml: fgeml },
        success: function (data) {
          $("#fmsg").html(data);
        },
      });
    }
  });



  //reset
  $("#updf").click(function () {

    var fgpword  = $("#pword").val();
    var fgcpword = $("#cpword").val();

    if (fgpword == "" || fgpword == null) {
      $("#umsg").html("Please create a new password");
    } else {
      if (fgcpword == "" || fgcpword == null) {
        $("#umsg").html("Kindly confirm Your Password");
      } else {
        if (fgpword != fgcpword) {
          $("#umsg").html("Password does not match!");
        } else {
          $("#umsg").html("Loading... Please Wait!");

          $.ajax({
            type: "post",
            url: "functions/init.php",
            data: { fgpword: fgpword, fgcpword: fgcpword },
            success: function (data) {
              $("#umsg").html(data);
            },
          });
        }
      }
    }
  });




  /******** USER PROFILE SECTION */

  //getting books details
  $(".offcanvasr").click(function () {

    var dataid  = $(this).attr('data-id');

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {dataid: dataid},
      success: function (data) {
        $(".canvastale").html(data);
      },
    });
  });


  //search for books
  $("#searcher").keyup(function() {
    var searchword  = $("#searcher").val();

    //display content if words are empty
      $("#allbook").hide();

      if(searchword == null || searchword == "") {

        $("#allbook").show();

      } else {

        //$("#searchresult").show(1000);

        $.ajax({
        type: "post",
        url: "srchres.php",
        data: {searchword: searchword},
        success: function (data) {
          $("#searchresult").html(data).show(1000);
        }
      });
    }
  });



  //add to wishlist
  $("#btwsh").click(function() {

    var wishid  = $(".srchid").val();

    $('#btwsh').on('shown.bs.popover', function () {
        
      setTimeout(function() {
          $('.popover').fadeOut('slow',function() {}); 
      },800);
      
  });


    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {wishid: wishid},
      success: function (data) {

      //display content if words are empty
      $("#btwsh").hide();

      $("#addtwh").show();

      }
    });

  });


  //added to wishlist
  $("#lksd").click(function() {


    $('#lksd').on('shown.bs.popover', function () {
        
      setTimeout(function() {
          $('.popover').fadeOut('slow',function() {}); 
      },800);
      
  });

  });


  //cancel payment
  $("#cnc").click(function() {

      $("#clss").popover('hide');

  });

});
