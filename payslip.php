<?php
session_start();
if (isset($_SESSION['access'])) {
    include 'partials/connection.php';
    $user_id = $_SESSION['id'];
    $user_name = $_SESSION['name'];
    $user_level = $_SESSION['level'];
    $attendanceId = $_GET['id'];
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Techneo360</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
        <style>
            #invoice {
                padding: 30px;
            }

            .invoice {
                position: relative;
                background-color: #FFF;
                min-height: 680px;
                padding: 15px
            }

            .invoice header {
                padding: 10px 0;
                margin-bottom: 20px;
                border-bottom: 1px solid #3989c6
            }

            .invoice .company-details {
                text-align: right
            }

            .invoice .company-details .name {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .contacts {
                margin-bottom: 20px
            }

            .invoice .invoice-to {
                text-align: left
            }

            .invoice .invoice-to .to {
                margin-top: 0;
                margin-bottom: 0
            }

            .invoice .invoice-details {
                text-align: right
            }

            .invoice .invoice-details .invoice-id {
                margin-top: 0;
                color: #3989c6
            }

            .invoice main {
                padding-bottom: 50px
            }

            .invoice main .thanks {
                margin-top: -100px;
                font-size: 2em;
                margin-bottom: 50px
            }

            .invoice main .notices {
                padding-left: 6px;
                border-left: 6px solid #3989c6
            }

            .invoice main .notices .notice {
                font-size: 1.2em
            }

            .invoice table {
                width: 100%;
                border-collapse: collapse;
                border-spacing: 0;
                margin-bottom: 20px
            }

            .invoice table td,
            .invoice table th {
                padding: 15px;
                background: #eee;
                border-bottom: 1px solid #fff
            }

            .invoice table th {
                white-space: nowrap;
                font-weight: 400;
                font-size: 16px
            }

            .invoice table td h3 {
                margin: 0;
                font-weight: 400;
                color: #3989c6;
                font-size: 1.2em
            }

            .invoice table .qty,
            .invoice table .total,
            .invoice table .unit {
                text-align: right;
                font-size: 1.2em
            }

            .invoice table .no {
                color: #fff;
                font-size: 1.6em;
                background: #3989c6
            }

            .invoice table .unit {
                background: #ddd
            }

            .invoice table .total {
                background: #3989c6;
                color: #fff
            }

            .invoice table tbody tr:last-child td {
                border: none
            }

            .invoice table tfoot td {
                background: 0 0;
                border-bottom: none;
                white-space: nowrap;
                text-align: right;
                padding: 10px 20px;
                font-size: 1.2em;
                border-top: 1px solid #aaa
            }

            .invoice table tfoot tr:first-child td {
                border-top: none
            }

            .invoice table tfoot tr:last-child td {
                color: #3989c6;
                font-size: 1.4em;
                border-top: 1px solid #3989c6
            }

            .invoice table tfoot tr td:first-child {
                border: none
            }

            .invoice footer {
                width: 100%;
                text-align: center;
                color: #777;
                border-top: 1px solid #aaa;
                padding: 8px 0
            }

            @media print {
                .invoice {
                    font-size: 11px !important;
                    overflow: hidden !important
                }

                .invoice footer {
                    position: absolute;
                    bottom: 10px;
                    /* page-break-after: always */
                }

                .invoice>div:last-child {
                    /* page-break-before: always */
                }
            }
        </style>
    </head>

    <body>
        <div id="invoice">
            <div class="invoice overflow-auto">
                <div style="min-width: 600px">
                    <header>
                        <div class="row">
                            <div class="col">
                                <a target="_blank" href="https://lobianijs.com">
                                    <img src="https://cdn.pixabay.com/photo/2017/02/18/19/20/logo-2078018_960_720.png" data-holder-rendered="true" style="height:80px ;width:80px" />
                                </a>
                            </div>
                            <div class="col company-details">
                                <h2 class="name">
                                    <a target="_blank" href="#">
                                           Techneo360
                                    </a>
                                </h2>
                                <div>Address:</div>
                                <div>Contact:</div>
                                <div>Email:</div>
                            </div>
                        </div>
                    </header>
                    <main>
                        <?php
                        $salary = mysqli_fetch_assoc(mysqli_query($conn, "SELECT attendence.*, users.first_name, users.last_name, users.email, users.address FROM `attendence` INNER JOIN users on users.id = attendence.employee_id where attendence.id= '$attendanceId'"));
                        $month = "";
                                            if ($salary['month'] == '01') {
                                                $month = "January " . $salary['year'];
                                            } elseif ($salary['month'] == '02') {
                                                $month = "February " . $salary['year'];
                                            } elseif ($salary['month'] == '03') {
                                                $month = "March " . $salary['year'];
                                            } elseif ($salary['month'] == '04') {
                                                $month = "Aprill " . $salary['year'];
                                            } elseif ($salary['month'] == '05') {
                                                $month = "May " . $salary['year'];
                                            } elseif ($salary['month'] == '06') {
                                                $month = "June " . $salary['year'];
                                            } elseif ($salary['month'] == '07') {
                                                $month = "July " . $salary['year'];
                                            } elseif ($salary['month'] == '08') {
                                                $month = "August " . $salary['year'];
                                            } elseif ($salary['month'] == '09') {
                                                $month = "September " . $salary['year'];
                                            } elseif ($salary['month'] == '10') {
                                                $month = "October " . $salary['year'];
                                            } elseif ($salary['month'] == '11') {
                                                $month = "November " . $salary['year'];
                                            } else {
                                                $month = "December " . $salary['year'];
                                            }
                        ?>
                        <div class="row contacts">
                            <div class="col invoice-to">
                                <div class="text-gray-light">Payslip TO:</div>
                                <h2 class="to"><?= $salary['first_name'].' '. $salary['last_name'] ?></h2>
                                <div class="address"><?= $salary['address'] ?></div>
                                <div class="email"><a href="mailto:<?= $salary['email'] ?>"><?= $salary['email'] ?></a></div>
                            </div>
                            <div class="col invoice-details">
                                <h1 class="invoice-id">INVOICE <?= $attendanceId ?></h1>
                                
                                <div class="date">Salary Of: <?= $month ?></div>
                                <div class="date">Date: <?= date("d/m/Y") ?></div>
                            </div>
                        </div>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th class="text-left">DESCRIPTION</th>
                                    <th class="text-right">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="no">01</td>
                                    <td class="text-left">
                                        <h3>
                                            Attendance 
                                        </h3>
                                        <?= $salary['attended']. ' Days out Of ' . $salary['working_day'] ?>
                                    </td>
                                    <td class="total"><?= $salary['total_salary'] ?> Tk/-</td>
                                </tr>
                                <tr>
                                    <td class="no">02</td>
                                    <td class="text-left">
                                        <h3>Provident Fund</h3>
                                    </td>
                                    <td class="total"><?= $salary['provident_fund'] ?> Tk/-</td>
                                </tr>
                                <tr>
                                    <td class="no">03</td>
                                    <td class="text-left">
                                        <h3>Tax</h3>
                                    </td>
                                    <td class="total"><?= $salary['professional_tax'] ?> Tk/-</td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2">Net Salary</td>
                                    <td><?= $salary['total_salary']-$salary['professional_tax'] - $salary['provident_fund'] ?> Tk/-</td>
                                </tr>
                            </tfoot>
                        </table>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <div class="thanks">Thank you!</div>
                        <div class="notices">
                            <div>NOTICE:</div>
                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                        </div>
                    </main>
                    <footer>
                        Invoice was created on a computer and is valid without the signature and seal.
                    </footer>
                </div>
                <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                <div></div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                // $(window).load(function() {
                Popup($('.invoice')[0].outerHTML);

                function Popup(data) {
                    window.print();
                    return true;
                }
            });
            // });
            // $(window).load(function() {
            //     Popup($('.invoice')[0].outerHTML);

            //     function Popup(data) {
            //         window.print();
            //         return true;
            //     }
            // });
            // $('#printInvoice').click(function() {

            // });
        </script>
    </body>

    </html>
<?php
} else {
    echo "<script>document.location.href='login.php';</script>";
}
?>