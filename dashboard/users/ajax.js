$(document).ready(function () {

  //signup
  $("#sub").click(function () {
    var fname = $("#fname").val();
    var user = $("#usname").val();
    var pword = $("#pword").val();
    var cpword = $("#cpword").val();
    var ref = $("#ref").val();

    if (fname == "" || fname == null) {
      $("#fmsg").html("Kindly input your full name.");
    } else {
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
                        tel: tel,
                        email: email,
                        user: user,
                        pword: pword,
                        cpword: cpword,
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
  });



//resend otp
$("#rotp").click(function () {

  document.getElementById("rvmsg").style.display = 'block';
  document.getElementById("vmsg").style.display = 'none';

  //I left this code so as to give a dummy text to the function validator
  var otpp  = $("#otpp").val();

  if (otpp == "" || otpp == null) {
    $("#rvmsg").html("Invalid OTP!");
  } else {

    $("#rvmsg").html("Loading... Please wait");

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: {otpp: otpp},
      success: function (data) {
        $("#rvmsg").html(data);
      },
    });
  }
})


//verify otp
$("#vsub").click(function () {

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
  }
})


  //signin
  $("#lsub").click(function () {
    var username = $("#luname").val();
    var password = $("#lpword").val();

    if (username == "" || username == null) {
      $("#lmsg").html("Kindly insert your username");
    } else {
      if (password == "" || password == null) {
        $("#lmsg").html("Invalid password inputted");
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

  /** USER PROFILE PICTURE */
  $("#pupl").click(function () {
    var fd = new FormData();
    var files = $("#psfile").prop("files")[0];
    fd.append("fle", files);

    if (files == null || files == "") {
      $("#msg").text("Kindly select a picture");
    } else {
      $("#msg").text(
        "Loading.. Make sure you have a strong internet connection"
      );

      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#msg").html(data);
        },
      });
    }
  });

  /** COPY REFERRAL LINK TO CLIPBOARD */
  $("#copy").click(function () {
    $("#copy").text("Copied!");

    $("#refLink").on("hidden.bs.modal", function () {
      $("#copy").text("Copy Referral Link");
    });
  });

  /** DONATE PDFs **/
  $("#donatenow").click(function () {
    var inst = $("#inst").val();
    var typ = $("#typ").val();
    var title = $("#title").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();

    if (inst == "" || inst == null) {
      $("#dntmsg").html("Please input your institution name");
    } else {
      if (title == "" || title == null) {
        $("#dntmsg").html("Your PDF title cannot be empty");
      } else {
        if (fcg == "" || fcg == null) {
          $("#dntmsg").html("Kindly input the PDF Faculty or College");
        } else {
          if (dept == "" || dept == null) {
            $("#dntmsg").html("Kindly input the PDF Department");
          } else {
            $("#dntmsg").html(
              "Loading.. Make sure you have a strong internet connection"
            );

            $.ajax({
              type: "post",
              url: "functions/init.php",
              data: {
                inst: inst,
                typ: typ,
                title: title,
                fcg: fcg,
                dept: dept,
                level: level,
              },
              success: function (data) {
                $("#dntmsg").html(data);
              },
            });
          }
        }
      }
    }

    $("#donateModalCenter").modal();
  });

  /** UPLOAD PDF FILE
  $("#donatnow").click(function () {


      $.ajax({
        type: "post",
        url: "functions/init.php",
        data: fd,
        contentType: false,
        processData: false,
        success: function (data) {
          $("#dntmsg").html(data);
        },
      });
    }
    $("#donateModalCenter").modal();
  });**/

  /** SEARCH FILTER */
  $("#filter").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    window.location.href =
      "./search?txt=" +
      srctxt +
      "&inst=" +
      inst +
      "&fcg=" +
      fcg +
      "&dept=" +
      dept +
      "&level=" +
      level;
  });

  /** SEARCH FILTER ADVANCED */
  $("#pqfilterr").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    //window.location.href = "./search?txt=" + srctxt + "&inst=" + inst + "&fcg=" + fcg + "&dept=" + dept + "&level=" + level;

    var xhr = new XMLHttpRequest();
    document.getElementById("resl").innerHTML =
      "<span style='color: #ff0000; text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading.. Please wait!</span>";

    xhr.open(
      "GET",
      "./pqsearchresult?txt=" +
        srctxt +
        "&inst=" +
        inst +
        "&fcg=" +
        fcg +
        "&dept=" +
        dept +
        "&level=" +
        level,
      true
    );

    xhr.onload = function () {
      if (xhr.status == 200) {
        //document.write(this.responseText);
        document.getElementById("resl").innerHTML = xhr.responseText;
      } else {
        document.getElementById("resl").innerHTML =
          "<span style='color: #ff0000'>Error loading document. <br/> Kindly try again later!</span>";
      }
    };

    xhr.send();
  });

  /** SEARCH FILTER ADVANCED */
  $("#filterr").click(function () {
    var inst = $("#inst").val();
    var fcg = $("#fcg").val();
    var dept = $("#dept").val();
    var level = $("#level").val();
    var srctxt = $("#srctxt").val();

    //window.location.href = "./search?txt=" + srctxt + "&inst=" + inst + "&fcg=" + fcg + "&dept=" + dept + "&level=" + level;

    var xhr = new XMLHttpRequest();
    document.getElementById("resl").innerHTML =
      "<span style='color: #ff0000; text-align: center;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Loading.. Please wait!</span>";

    xhr.open(
      "GET",
      "./searchresult?txt=" +
        srctxt +
        "&inst=" +
        inst +
        "&fcg=" +
        fcg +
        "&dept=" +
        dept +
        "&level=" +
        level,
      true
    );

    xhr.onload = function () {
      if (xhr.status == 200) {
        //document.write(this.responseText);
        document.getElementById("resl").innerHTML = xhr.responseText;
      } else {
        document.getElementById("resl").innerHTML =
          "<span style='color: #ff0000'>Error loading document. <br/> Kindly try again later!</span>";
      }
    };

    xhr.send();
  });

/**WITHDRAW FUNDS */
$("#withdraw").click(function () {
var point = $("#vall").text();

if(point <= 99){
  alert("The minimum withdrawal is NGN1,000");

} else {

alert("You have been scheduled for withdrawal");
}
});


/**BUY PEDIA CREDIT */

});
