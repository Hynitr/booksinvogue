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

    if (
      actnm == "Retrieving... Please wait" ||
      actnm == "Error Retrieving Your Account Name" ||
      actnm == "Retrieving your account name..."
    ) {
      $("#actsub").prop("disabled", true);
    } else {
      $("#actsub").prop("disabled", false);
    }

    $("#arpaymsg").html(
      '<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">'
    );

    $.ajax({
      type: "post",
      url: "../functions/init.php",
      data: { bank: bank, acctn: acctn, actnm: actnm },
      success: function (data) {
        $("#arpaymsg").html(data);
      },
    });
  });


  //save author acct details
  $("#price").keyup(function () {
    var price = $("#price").val();
    
    var authprof = Math.round(70 / 100 * price);
    var bivprof = Math.round(30 / 100 * price);

    $("#authprofit").val(authprof);
    $("#bivprofit").val(bivprof);

  });

   //upload book
   $("#bkupld").click(function () {
    var booktitle = $("#booktitle").val();
    var bookdescp = $("#bookdescp").val();
    var series    = $("#series").val();
    var author    = $("#author").val();
    var otherauthor = $("#otherauthor").val();
    var copyright = $("#copyright").val();
    var category = $("#category").val();
    var isbn = $("#isbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();

    if(booktitle == null || booktitle == '') {

      $("#msg").html('Please type in your book title');
    } else {

      if(bookdescp == null || bookdescp == '') {

        $("#msg").html('A description for your book is needed');
      } else {

        if(price == null || price == '') {

          $("#msg").html('Please type in the book price');
        } else {

          $.ajax({
            type: "post",
            url: "../functions/init.php",
            data: {booktitle: booktitle, bookdescp: bookdescp, series: series, author: author, otherauthor: otherauthor, copyright: copyright, category: category, isbn: isbn, price: price, authprofit: authprofit, bivprofit: bivprofit, lang: lang},
            success: function (data) {
              $("#msg").html(data);
            },
          });

        }
      }
    }
    
    

  });

    //save book to draft
    $("#dft").click(function () {
      var booktitle = $("#booktitle").val();
      var bookdescp = $("#bookdescp").val();
      var series    = $("#series").val();
      var author    = $("#author").val();
      var otherauthor = $("#otherauthor").val();
      var copyright = $("#copyright").val();
      var category = $("#category").val();
      var isbn = $("#isbn").val();
      var price = $("#price").val();
      var authprofit = $("#authprofit").val();
      var bivprofit = $("#bivprofit").val();
      var lang = $("#lang").val();
      var dft  = 'draft';
  
      if(booktitle == null || booktitle == '') {
  
        $("#msg").html('Please type in your book title');
      } else {

        if(bookdescp == null || bookdescp == '') {

          $("#msg").html('Please type a description for your book');
        } else {

          $("#msg").html('Loading... Please wait');

            $.ajax({
              type: "post",
              url: "../functions/init.php",
              data: {booktitle: booktitle, bookdescp: bookdescp, series: series, author: author, otherauthor: otherauthor, copyright: copyright, category: category, isbn: isbn, price: price, authprofit: authprofit, bivprofit: bivprofit, lang: lang, dft: dft},
              success: function (data) {
                $("#msg").html(data);
              },
            });
          }
      }
    });


  //edit book
  $("#edbkupld").click(function () {
    var edbooktitle = $("#edbooktitle").val();
    var edbookdescp = $("#edbookdescp").val();
    var edseries    = $("#edseries").val();
    var edauthor    = $("#edauthor").val();
    var edotherauthor = $("#edotherauthor").val();
    var edcopyright = $("#edcopyright").val();
    var category = $("#category").val();
    var edisbn = $("#edisbn").val();
    var price = $("#price").val();
    var authprofit = $("#authprofit").val();
    var bivprofit = $("#bivprofit").val();
    var lang = $("#lang").val();
    var bookdtta = $("#bookdtta").val();

    if(edbooktitle == null || edbooktitle == '') {

      $("#msg").html('Please type in your book title');
    } else {

      if(edbookdescp == null || edbookdescp == '') {

        $("#msg").html('A description for your book is needed');
      } else {

        if(price == null || price == '') {

          $("#msg").html('Please type in the book price');
        } else {

          $.ajax({
            type: "post",
            url: "../functions/init.php",
            data: {edbooktitle: edbooktitle, edbookdescp: edbookdescp, edseries: edseries, edauthor: edauthor, edotherauthor: edotherauthor, edcopyright: edcopyright, category: category, edisbn: edisbn, price: price, authprofit: authprofit, bivprofit: bivprofit, lang: lang, bookdtta: bookdtta},
            success: function (data) {
              $("#msg").html(data);
            },
          });

        }
      }
    }
  });


  //publish book file
  $("#publ").click(function () {

    //book file
    var fd = new FormData();
    var bkfiles  = $("#bkfile").prop("files")[0];
    var covfiles = $("#bkcov").prop("files")[0];
    fd.append("covfile", covfiles);
    fd.append("fil", bkfiles);


    if (bkfiles == null || bkfiles == "") {

      $("#fmsg").html("Kindly select a book");

    } else {

      if(covfiles == null || covfiles == "") {

        $("#fmsg").html("Kindly select a book cover");

      } else {

        $("#fmsg").html('<img style="width: 100px; height: 100px" src="../assets/img/loading.gif">');

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
    var wishid = $(".srchid").val();

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
        $("#pymsg").html("The minimum amount you can fund is ₦100");
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
      data: { amt: amt, bkid: bkid, authoremail: authoremail, bkprice: bkprice, rylty: rylty },
      success: function (data) {
        $("#bkpymsg").html(data);
      },
    });
  });
});
