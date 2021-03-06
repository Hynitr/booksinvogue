$(document).ready(function () {
  $("#actsub").prop("disabled", true);

  //get author acct details
  $("#acctn").change(function () {
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var trd = "hello";

    var actn = $("#actn").text();

    $("#actn").val("Retrieving... Please wait");

    if (
      actn == null ||
      actn == "Retrieving... Please wait" ||
      actn == "Error Retrieving Your Account Name"
    ) {
      $("#actsub").prop("disabled", true);
    } else {
      $("#actsub").prop("disabled", false);
    }
    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, trd: trd },
      success: function (data) {
        $("#actn").val(data);
      },
    });
  });

  //save author acct details
  $("#actsub").click(function () {
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var actnm = $("#actn").val();
    var bio = $("#bio").val();
    var wapn = $("#wapn").val();
    var twt = $("#twt").val();
    var ig = $("#ig").val();
    var fb = $("#fb").val();
    var tel = $("#tel").val();


    if (
      actnm == "Retrieving... Please wait" ||
      actnm == "Error Retrieving Your Account Name" ||
      actnm == "Retrieving your account name..."
    ) {
      $("#actsub").prop("disabled", true);
    } else {
      $("#actsub").prop("disabled", false);
    }


    if(bio == '' || bio == null) {

      $("#arpaymsg").html("Please tell us about yourself");

    } else {

      if(tel == '' || tel == null) {

        $("#arpaymsg").html("Please fill in your telephone number");

      } else {

        
    $("#arpaymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, actnm: actnm, bio: bio, wapn: wapn, twt: twt, ig: ig, fb: fb, tel: tel },
      success: function (data) {
        $("#arpaymsg").html(data);
      },
    });

      }
    }

  });


  //publisher details
  $("#pblactsub").click(function () {
    var bank = $("#bank").val();
    var acctn = $("#acctn").val();
    var actnm = $("#actn").val();
    var bio = $("#bio").val();
    var wapn = $("#wapn").val();
    var twt = $("#twt").val();
    var ig = $("#ig").val();
    var fb = $("#fb").val();
    var tel = $("#tel").val();
    var publsh = $("#publsh").val();
    

    if (
      actnm == "Retrieving... Please wait" ||
      actnm == "Error Retrieving Your Account Name" ||
      actnm == "Retrieving your account name..."
    ) {
      $("#actsub").prop("disabled", true);
    } else {
      $("#actsub").prop("disabled", false);
    }


    if(bio == '' || bio == null) {

      $("#arpaymsg").html("Please tell us about yourself");

    } else {

      if(tel == '' || tel == null) {

        $("#arpaymsg").html("Please fill in your telephone number");

      } else {

        if(publsh == '' || publsh == null) {

          $("#arpaymsg").html("Please fill in your publishing agency name");
        } else {

        
    $("#arpaymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, actnm: actnm, bio: bio, wapn: wapn, twt: twt, ig: ig, fb: fb, tel: tel, publsh: publsh },
      success: function (data) {
        $("#arpaymsg").html(data);
      },
    });

      }
    }
  }
  });

  //save author acct details
  $("#price").keyup(function () {
    var price = $("#price").val();

    var authprof = Math.round((70 / 100) * price);
    var bivprof = Math.round((30 / 100) * price);

    $("#authprofit").val(authprof);
    $("#bivprofit").val(bivprof);
  });

  //upload book
  $("#bkupld").click(function () {
    var booktitle = $("#booktitle").val();
    var bookdescp = $("#bookdescp").val();
    var series = $("#series").val();
    var author = $("#author").val();
    var otherauthor = $("#otherauthor").val();
    var copyright = $("#copyright").val();
    var category = $("#category").val();
    var isbn = $("#isbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();

    if (booktitle == null || booktitle == "") {
      $("#msg").html("Please type in your book title");
    } else {
      if (bookdescp == null || bookdescp == "") {
        $("#msg").html("A description for your book is needed");
      } else {
        if (author == null || author == "") {
          $("#msg").html("Please type in an author for your book");
        } else {
          if (price == null || price == "") {
            $("#msg").html("Please type in the book price");
          } else {
            $("#msg").html("Loading... Please wait");

            $.ajax({
              type: "post",
              url: "../functions/init.php",
              data: {
                booktitle: booktitle,
                bookdescp: bookdescp,
                series: series,
                author: author,
                otherauthor: otherauthor,
                copyright: copyright,
                category: category,
                isbn: isbn,
                price: price,
                authprofit: authprofit,
                bivprofit: bivprofit,
                lang: lang,
              },
              success: function (data) {
                $("#msg").html(data);
              },
            });
          }
        }
      }
    }
  });

  //edit uploaded book to images
  $("#edbkupld").click(function () {
    var booktitle = $("#booktitle").val();
    var bookdescp = $("#bookdescp").val();
    var series = $("#series").val();
    var author = $("#author").val();
    var otherauthor = $("#otherauthor").val();
    var copyright = $("#copyright").val();
    var category = $("#category").val();
    var isbn = $("#isbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();
    var bookdtta = $("#bookdtta").val();
    var imgnxtxt = "image are choosy";

    if (booktitle == null || booktitle == "") {
      $("#msg").html("Please type in your book title");
    } else {
      if (bookdescp == null || bookdescp == "") {
        $("#msg").html("A description for your book is needed");
      } else {
        if (author == null || author == "") {
          $("#msg").html("Please type in an author for your book");
        } else {
          if (price == null || price == "") {
            $("#msg").html("Please type in the book price");
          } else {
            $("#msg").html("Loading... Please wait");

            $.ajax({
              type: "post",
              url: "../functions/init.php",
              data: {
                booktitle: booktitle,
                bookdescp: bookdescp,
                series: series,
                author: author,
                otherauthor: otherauthor,
                copyright: copyright,
                category: category,
                isbn: isbn,
                price: price,
                authprofit: authprofit,
                bivprofit: bivprofit,
                lang: lang,
                bookdtta: bookdtta,
                imgnxtxt: imgnxtxt,
              },
              success: function (data) {
                $("#msg").html(data);
              },
            });
          }
        }
      }
    }
  });

  //save book to draft
  $("#dft").click(function () {
    var booktitle = $("#booktitle").val();
    var bookdescp = $("#bookdescp").val();
    var series = $("#series").val();
    var author = $("#author").val();
    var otherauthor = $("#otherauthor").val();
    var copyright = $("#copyright").val();
    var category = $("#category").val();
    var isbn = $("#isbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();
    var dft = "draft";

    if (booktitle == null || booktitle == "") {
      $("#msg").html("Please type in your book title");
    } else {
      if (bookdescp == null || bookdescp == "") {
        $("#msg").html("Please type a description for your book");
      } else {
        $("#msg").html("Loading... Please wait");

        $.ajax({
          type: "post",
          url: "../functions/init.php",
          data: {
            booktitle: booktitle,
            bookdescp: bookdescp,
            series: series,
            author: author,
            otherauthor: otherauthor,
            copyright: copyright,
            category: category,
            isbn: isbn,
            price: price,
            authprofit: authprofit,
            bivprofit: bivprofit,
            lang: lang,
            dft: dft,
          },
          success: function (data) {
            $("#msg").html(data);
          },
        });
      }
    }
  });

  //edit books to drafs
  $("#eddft").click(function () {
    var booktitle = $("#booktitle").val();
    var bookdescp = $("#bookdescp").val();
    var series = $("#series").val();
    var author = $("#author").val();
    var otherauthor = $("#otherauthor").val();
    var copyright = $("#copyright").val();
    var category = $("#category").val();
    var isbn = $("#isbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();
    var dft = "editdraft";
    var bookdtta = $("#bookdtta").val();

    if (booktitle == null || booktitle == "") {
      $("#msg").html("Please type in your book title");
    } else {
      if (bookdescp == null || bookdescp == "") {
        $("#msg").html("Please type a description for your book");
      } else {
        $("#msg").html("Loading... Please wait");

        $.ajax({
          type: "post",
          url: "../functions/init.php",
          data: {
            booktitle: booktitle,
            bookdescp: bookdescp,
            series: series,
            author: author,
            otherauthor: otherauthor,
            copyright: copyright,
            category: category,
            isbn: isbn,
            price: price,
            authprofit: authprofit,
            bivprofit: bivprofit,
            lang: lang,
            dft: dft,
            bookdtta: bookdtta,
          },
          success: function (data) {
            $("#msg").html(data);
          },
        });
      }
    }
  });

  //publish book file
  $("#publ").click(function () {
    //book file
    var fd = new FormData();
    var bkfiles = $("#bkfile").prop("files")[0];
    var covfiles = $("#bkcov").prop("files")[0];
    fd.append("covfile", covfiles);
    fd.append("fil", bkfiles);

    if (bkfiles == null || bkfiles == "") {
      $("#fmsg").html("Kindly select a book");
    } else {
      if (covfiles == null || covfiles == "") {
        $("#fmsg").html("Kindly select a book cover");
      } else {
        $("#fmsg").html(
          '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
        );

        $.ajax({
          type: "post",
          url: "../functions/init.php",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            $("#fmsg").html(data);
          },
        });
      }
    }
  });

  //update book file
  $("#edpubl").click(function () {
    //book file
    var fd = new FormData();
    var bkfiles = $("#bkfile").prop("files")[0];
    var covfiles = $("#bkcov").prop("files")[0];
    fd.append("covfile", covfiles);
    fd.append("fil", bkfiles);

    if (bkfiles == null || bkfiles == "") {
      $("#fmsg").html("Kindly select a book");
    } else {
      if (covfiles == null || covfiles == "") {
        $("#fmsg").html("Kindly select a book cover");
      } else {
        $("#fmsg").html(
          '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
        );


        $.ajax({
          type: "post",
          url: "../functions/init.php",
          data: fd,
          contentType: false,
          processData: false,
          success: function (data) {
            $("#fmsg").html(data);
          },
        });
      }
    }
  });

  /******** USER PROFILE SECTION */

  //getting books details
  $(".offcanvasr").click(function () {
    var dataid = $(this).attr("data-id");

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { dataid: dataid },
      success: function (data) {
        $(".canvastale").html(data);
      },
    });
  });

  //search for books
  $("#searcher").keyup(function () {
    var searchword = $("#searcher").val();

    //display content if words are empty
    $("#allbook").hide();

    if (searchword == null || searchword == "") {
      $("#allbook").show();
    } else {
      //$("#searchresult").show(1000);

      $.ajax({
        type: "post",
        url: "srchres.php",
        data: { searchword: searchword },
        success: function (data) {
          $("#searchresult").html(data).show(1000);
        },
      });
    }
  });

  //add to wishlist
  $("#btwsh").click(function () {
    var wishid = $("#srchid").val();

    $("#btwsh").on("shown.bs.popover", function () {
      setTimeout(function () {
        $(".popover").fadeOut("slow", function () {});
      }, 800);
    });

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { wishid: wishid },
      success: function (data) {
        //display content if words are empty
        $("#btwsh").hide();

        $("#addtwh").show();
      },
    });
  });

  //added to wishlist
  $("#lksd").click(function () {
    $("#lksd").on("shown.bs.popover", function () {
      setTimeout(function () {
        $(".popover").fadeOut("slow", function () {});
      }, 800);
    });
  });

  //cancel payment
  $("#cnc").click(function () {
    $("#clss").popover("hide");
  });

  //fund wallet
  $("#paybtn").click(function () {
    var amt = $("#amrp").val();

    if (amt == "" || amt == null) {
      $("#pymsg").html("Please input an amount");
    } else {
      if (amt < 100) {
        $("#pymsg").html("The minimum amount you can fund is ???100");
      } else {
        $("#pymsg").html(
          '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
        );

        var txt = $("#txt").text();
        var email = $("#email").text();
        var fname = $("#fname").text();

        FlutterwaveCheckout({
          public_key: "FLWPUBK_TEST-583986bf78101b92c8ea9becde1795b8-X",
          tx_ref: txt,
          amount: amt,
          currency: "NGN",
          country: "NG",
          payment_options: " ",
          method: "POST",
          // specified redirect URL
          redirect_url: "./pay",
          customer: {
            email: email,
            name: fname,
          },
          callback: function (data) {
            // specified callback function
            console.log(data);
          },
          customizations: {
            title: "Books in Vogue",
            description: "Fund Wallet",
            logo: "https://booksinvogue.com.ng/assests/logo.png",
          },
        });
      }
    }
  });

  //buy book
  $("#bkkpaybtn").click(function () {
    $("#pymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    var amt = $("#bkamt").text();
    var bkid = $("#bkid").text();
    var authoremail = $("#authoremail").text();
    var bkprice = $("#bkprice").text();
    var rylty = $("#rylty").text();

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: {
        amt: amt,
        bkid: bkid,
        authoremail: authoremail,
        bkprice: bkprice,
        rylty: rylty,
      },
      success: function (data) {
        $("#bkpymsg").html(data);
      },
    });
  });

  //delete book
  $("#bkkdelt").click(function () {
    var bkid = $("#bkid").text();
    var authoremail = $("#authoremail").text();
    var bkdel = "delete";

    $("#bkpymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bkid: bkid, authoremail: authoremail, bkdel: bkdel },
      success: function (data) {
        $("#bkpymsg").html(data);
      },
    });
  });

  //delete draft
  $("#deldraft").click(function () {
    var bkid = $("#bkid").text();
    var authoremail = $("#authoremail").text();
    var bkdel = "draft";

    $("#bkpymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bkid: bkid, authoremail: authoremail, bkdel: bkdel },
      success: function (data) {
        $("#bkpymsg").html(data);
      },
    });
  });

  //upgrade account
  $("#upgrd").click(function () {
    $("#note").html(
      '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">'
    );

    var upgrade = "publisher";

    $.ajax({
      type: "post",
      url: "functions/init.php",
      data: { upgrade: upgrade },
      success: function (data) {
        $("#note").html(data);
      },
    });
  });
});
