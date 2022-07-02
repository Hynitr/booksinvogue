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
      '<img style="width: 100px; height: 100px" src="assets/img/loading.gif">'
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
    
    var authprof = 70 / 100 * price;
    var bivprof = 30 / 100 * price;

    $("#authprofit").val(authprof);
    $("#bivprofit").val(bivprof);


  });
});
