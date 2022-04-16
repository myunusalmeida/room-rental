<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice</title>
    <link rel="stylesheet" href="vendors/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <section class="container">
        <!-- <div class="row justify-content-between mb-5"> -->
            <!-- <div class="col-md-12"> -->
                <div class="invoice-title mb-5">
                    <div class="d-flex align-items-center justify-content-between">
                        <h2>Invoice</h2>
                        <h3 class="text-right">Order # 12345</h3>
                    </div>
                </div>
            <!-- </div> -->

        <div class="d-flex justify-content-between">
            <div class="col-md-4">
                <h5 class="mb-3">Bill From</h5>
                <p>Name: <strong>Muhammad Yunus Almeida</strong></p>
                <p>Company Name: <strong>Onlenkan Academy</strong></p>
                <p>Street Address: <strong>Jl. Triarona no. 420 Blitar</strong></p>
                <p>City, ST ZIP Code: <strong>Blitar, 31231</strong></p>
                <p>Phone: <strong>+62 8123 4567 89</strong></p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Bill To</h5>
                <p>Name: <strong>Muhammad Yunus Almeida</strong></p>
                <p>Company Name: <strong>Onlenkan Academy</strong></p>
                <p>Street Address: <strong>Jl. Triarona no. 420 Blitar</strong></p>
                <p>City, ST ZIP Code: <strong>Blitar, 31231</strong></p>
                <p>Phone: <strong>+62 8123 4567 89</strong></p>
            </div>
            <div class="col-md-4">
                <h5 class="mb-3">Invoice No. 31321</h5>
                <p>Invoice Date: 14 Agustus 2022</p>
                <p>Due Date: 14 Agustus 2022</p>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr class="table-info">
                    <th>Property Address</th>
                    <th>Rent</th>
                    <th>Fee(s)</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Room M1</td>
                    <td>2 Month</td>
                    <td>Rp. 1.000.000</td>
                    <td>Rp. 2.000.000</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Subtotal</td>
                    <td>Rp. 2.000.000</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Other</td>
                    <td>0</td>
                </tr>
                <tr>
                    <td>&nbsp;</td>
                    <td>&nbsp;</td>
                    <td>Total</td>
                    <td>Rp. 2.000.000</td>
                </tr>
            </tbody>
        </table>
    </section>
    
    <script>
        window.print();
    </script>
</body>
</html>