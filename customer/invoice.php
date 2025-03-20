<?php
session_start();
include("includes/db.php");
include("functions/functions.php");
if (isset($_GET['due_amt'])) {
    $total = htmlspecialchars($_GET['due_amt']);
    $inovice_no = htmlspecialchars($_GET['invoice']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice - AutoHub</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
     <!-- Favicon -->
     <link rel="icon" type="image/png" href="images/slogo.png">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>

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
        .invoice-header {
            border-bottom: 1px solid #ddd;
            padding-bottom: 20px;
            margin-bottom: 20px;
        }
        .invoice-title {
            font-size: 28px;
            color: #333;
            margin-bottom: 5px;
        }
        .invoice-date {
            color: #777;
            font-size: 14px;
        }
        .invoice-logo {
            text-align: right;
        }
        .invoice-logo img {
            max-width: 150px;
        }
        .invoice-details {
            margin-bottom: 30px;
        }
        .invoice-table {
            width: 100%;
            border-collapse: collapse;
        }
        .invoice-table th {
            background-color: #f8f8f8;
            font-weight: bold;
        }
        .invoice-table th, .invoice-table td {
            padding: 12px;
            border-bottom: 1px solid #ddd;
        }
        .invoice-total {
            font-weight: bold;
            font-size: 18px;
            background-color: #f8f8f8;
        }
        .download-btn {
            margin-top: 20px;
            text-align: center;
        }
        @media print {
            .download-btn {
                display: none;
            }
        }
    </style>
</head>
<body>
    <br>
    <div class="container" id="invoice-content">
        <div class="invoice-box">
            <div class="row invoice-header">
                <div class="col-xs-6">
                    <div class="invoice-title">INVOICE</div>
                    <div class="invoice-date">Date: <?php echo date('d M Y'); ?></div>
                    <div class="invoice-date">Invoice #: INV-<?php echo $inovice_no; ?></div>
                </div>
                <div class="col-xs-6 invoice-logo">
                    <img src="images/logo.png" alt="AutoHub Logo">
                </div>
            </div>
            
            <div class="row invoice-details">
                <div class="col-xs-6">
                    <strong>Billed To:</strong><br>
                    <?php 
                    if(isset($_SESSION['customer_name'])) {
                        echo $_SESSION['customer_name'] . "<br>";
                    } else {
                        echo "Guest Customer<br>";
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['customer_email'])) {
                        echo $_SESSION['customer_email'];
                    }
                    ?>
                </div>
                <div class="col-xs-6 text-right">
                    <strong>AutoHub</strong><br>
                    123 Auto Street<br>
                    Automotive City, AC 12345<br>
                    Phone: (+91) 8828602507<br>
                    Email: info@autohub.com
                </div>
            </div>
            
            <div class="row">
                <div class="col-xs-12">
                    <table class="invoice-table">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th class="text-right">Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Order Subtotal</td>
                                <td class="text-right">INR <?php echo number_format($total, 2); ?></td>
                            </tr>
                            <tr>
                                <td>Shipping and Handling</td>
                                <td class="text-right">INR 0.00</td>
                            </tr>
                            <tr>
                                <td>Tax</td>
                                <td class="text-right">INR 0.00</td>
                            </tr>
                            <tr class="invoice-total">
                                <td>Total</td>
                                <td class="text-right">INR <?php echo number_format($total, 2); ?></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="row" style="margin-top: 40px;">
                <div class="col-xs-12 text-center">
                    <p>Thank you for shopping with AutoHub!</p>
                </div>
            </div>
        </div>
        
        <div class="download-btn">
            <button class="btn btn-primary" onclick="downloadPDF()">
                <i class="fa fa-download"></i> Download PDF
            </button>
        </div>
    </div>

    <!-- jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <!-- html2pdf library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>
    function downloadPDF() {
        // Get the invoice content
        const element = document.getElementById('invoice-content');
        
        if (!element) {
            alert("Invoice content not found!");
            return;
        }

        // PDF options
        const opt = {
            margin: [10, 10, 10, 10], // Top, Right, Bottom, Left
            filename: 'AutoHub_Invoice<?php echo $inovice_no ?>.pdf',
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: window.devicePixelRatio || 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'landscape' }
        };

        // Generate and download the PDF
        html2pdf().set(opt).from(element).save();
    }
</script>

</body>
</html>