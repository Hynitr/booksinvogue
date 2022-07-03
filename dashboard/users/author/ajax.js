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

   //save author acct details
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
});
