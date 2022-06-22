<?php
include("functions/init.php");

$data = $_GET['id'];

//get current fee
$sl = "SELECT * FROM t_his WHERE `t_ref` = '$data'";
$rs = query($sl);

if(row_count($rs) == null) {

    redirect("./transactions");

}else {

    $fow = mysqli_fetch_array($rs)
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>BooksinVogue</title>
    <style>
    .invoice-box {
        max-width: 800px;
        margin: auto;
        padding: 30px;
        border: 1px solid #eee;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.15);
        font-size: 16px;
        line-height: 24px;
        font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color: #555;
    }

    .invoice-box table {
        width: 100%;
        line-height: inherit;
        text-align: left;
    }

    .invoice-box table td {
        padding: 5px;
        vertical-align: top;
    }

    .invoice-box table tr td:nth-child(2) {
        text-align: right;
    }

    .invoice-box table tr.top table td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.top table td.title {
        font-size: 45px;
        line-height: 45px;
        color: #333;
    }

    .invoice-box table tr.information table td {
        padding-bottom: 40px;
    }

    .invoice-box table tr.heading td {
        background: #eee;
        border-bottom: 1px solid #ddd;
        font-weight: bold;
    }

    .invoice-box table tr.details td {
        padding-bottom: 20px;
    }

    .invoice-box table tr.item td {
        border-bottom: 1px solid #eee;
    }

    .invoice-box table tr.item.last td {
        border-bottom: none;
    }

    .invoice-box table tr.total td:nth-child(2) {
        border-top: 2px solid #eee;
        font-weight: bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td {
            width: 100%;
            display: block;
            text-align: center;
        }

        .invoice-box table tr.information table td {
            width: 100%;
            display: block;
            text-align: center;
        }
    }

    /** RTL **/
    .invoice-box.rtl {
        direction: rtl;
        font-family: Tahoma, 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
    }

    .invoice-box.rtl table {
        text-align: right;
    }

    .invoice-box.rtl table tr td:nth-child(2) {
        text-align: left;
    }
    </style>
</head>

<body>
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="2">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="https://booksinvogue.com.ng/assests/logo.png"
                                    style="width: 70px; max-width: 300px" />
                            </td>

                            <td>
                                <small> Receipt ID: <i><b><?php echo $fow['t_ref'] ?></b></i></small><br />
                                <small> Printed: <i><b><?php echo date('l, F d, Y'); ?></b></i></small><br />

                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="information">
                <td colspan="2">
                    <table>
                        <tr>
                            <td>
                                Books in Vogue,<br />
                                info@booksinvogue.com<br />
                                +234 (0) 809 481 4575

                            </td>

                            <td>
                                <b><?php echo $fow['username'] ?> </b><br />
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="heading">
                <td>Payment Method</td>

                <td>Date Paid</td>
            </tr>

            <tr class="details">
                <td><b>IN-APP</b></td>

                <td><?php echo date('l, F d, Y', strtotime($fow['datepaid'])); ?></td>
            </tr>

            <tr class="heading">
                <td>Description</td>

                <td>Amount Paid</td>

            </tr>

            <tr class="item">
                <td><?php echo $fow['paynote'] ?></td>

                <td>₦<?php echo number_format($fow['amt']) ?></td>


        </table>
        <a href="#" onclick="goBack();">Click here to go back</a>
    </div>

</body>
<script>
function goBack() {
    window.history.back()
}
</script>
<script type="text/javascript">
window.addEventListener("load", window.print());
</script>

</html>

<?php
}
?>