<?php
defined('BASEPATH') or die('Access Denied');
?>

<style>
    img {
        width: 50%;
    }

    .a {
        text-align: right;
    }

    .payment {
        margin-left: 5%;
    }

    .accounts {
        margin-left: 10%;
        font-weight: bold;
    }

    .terms {
        font-weight: bold;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="page-header m-0 text-dark">Billing Invoice</h1>
                    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="container-fluid" style="background: white; margin-bottom: 1%; max-width: 100%; height: auto;">
        <section class="content">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <div class="img">
                            <th scope="col" style="width: 50%;"><img src="data:image/png;base64,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">
                                <table class="table" style="width: 50%; float:right; text-align:center;">
                                    <thead>
                                        <tr>
                                            <th scope="col" colspan="2">BILLING INVOICE</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" colspan="2" style="color:red;">F07-01-<?php echo date("A-y-md"); ?>-00</th>
                                        </tr>
                                        <tr>
                                            <th scope="row">SOA Date:</th>
                                            <th scope="row">Due Date:</th>
                                        </tr>
                                        <tr>
                                            <td><?php echo date("F d, Y"); ?></td>
                                            <td><input type="text" class="form-control" placeholder=""></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </th>

                        </div>
                    </tr>
                </thead>
            </table>
            <table class="table table-borderless">
                <thead>
                    <tr>
                        <th scope="col">SERVED TO</th>
                        <th scope="col">SERVED BY</th>
                    </tr>
                </thead>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">
                            <form>
                                <div class="row">
                                    <div class="col">
                                        <select type="text" name="sel_city" id='sel_city' class="form-control select-customer select2">
                                            <option>-- Select Name --</option>
                                            <?php
                                            foreach ($slcctmrs as $row) {
                                                echo "<option value='" . $row['id'] . "'>" . $row['customer_name'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </form>
                        </th>
                        <th scope="col">VINCULUM TECHNOLOGIES</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <select type="text" name="sel_city" id='sel_city' class="form-control select-customer select2">
                                <option>-- Select Name --</option>
                                <?php
                                foreach ($slcctmrs as $row) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['customer_name'] . "</option>";
                                }
                                ?>
                            </select>
                        </td>
                        <td>70 National Road, Putatan Muntinlupa City</td>
                    </tr>
                </tbody>
            </table>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col" colspan="5">Attention: <select type="text" name="project_branch" id='sel_user' class="form-control select-branch select2">
                                <option>-- Select Name --</option>
                                <?php
                                foreach ($slcbrch as $row) {
                                    echo "<option value='" . $row['id'] . "'>" . $row['contact_person'] . "</option>";
                                }
                                ?>
                            </select>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" colspan="3">Project Name & Reference<br>
                            <input type="text" class="form-control" placeholder="">
                        </th>
                        <th scope="row" style="text-align: center;">Total Project Cost</th>
                        <th scope="row">PHP<input type="text" class="form-control" placeholder=""></th>
                    </tr>
                    <tr>
                        <th scope="row">Terms</th>
                        <th scope="row">Qty</th>
                        <th scope="row">Unit</th>
                        <th scope="row">Description</th>
                        <th scope="row">Payable Amount</th>
                    </tr>
                    <tr>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="number" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="text" class="form-control" placeholder=""></td>
                        <td><input type="number" class="form-control" placeholder="P"></td>
                    </tr>
                    <tr>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" class="a">
                            <center>***Nothing follows***</center>Sub Total (Vat Exclusive)
                        </th>
                        <th scope="row">103,630.28</th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" class="a" style="color: red;">Plus 12% VAT</th>
                        <th scope="row">12,435.63</th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" class="a">Amount Due</th>
                        <th scope="row">116,065.91</th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4"></th>
                        <th scope="row"></th>
                    </tr>
                    <tr>
                        <th scope="row" colspan="4" class="a">Grand Total Vat Inclusive</th>
                        <th scope="row">P 116,065.91</th>
                    </tr>
                </tbody>
            </table>

            <div class="container">

                <div class="terms">
                    Terms and Conditions:<br>
                </div>

                <div class="payment">
                    1 Payment is <b>Cash</b> or <b>Dated Company Check</b> payable to the following:<br>
                </div>

                <div class="accounts">
                    <div class="container">
                        <div class="row">
                            <div class="col">Bank Account Name:</div>
                            <div class="col">Vinculum Tech Enterprise</div>
                            <div class="w-100"></div>
                            <div class="col">Account Number:</div>
                            <div class="col">00000-2066-7432</div>
                        </div>
                        <div class="row">
                            <div class="col">Bank Name:</div>
                            <div class="col">Security Bank</div>
                            <div class="w-100"></div>
                            <div class="col">Branch:</div>
                            <div class="col">BF Paranaque-Aguirre Branch</div>
                        </div>
                        <div class="row">
                            <div class="col">Bank Account Name:</div>
                            <div class="col">Vinculum Tech Company</div>
                            <div class="w-100"></div>
                            <div class="col">Account Number:</div>
                            <div class="col">00000-3960-1591</div>
                        </div>
                        <div class="row">
                            <div class="col">Bank Name:</div>
                            <div class="col">Security Bank</div>
                            <div class="w-100"></div>
                            <div class="col">Branch:</div>
                            <div class="col">BF Paranaque-Aguirre Branch</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container" style="margin:5%;">
                <div class="row">
                    <div class="col-sm">
                        Recommending Approval:
                    </div>
                    <div class="col-sm">
                        Approved by:
                    </div>
                    <div class="col-sm">
                        Received by:
                    </div>
                </div>
            </div>

            <div class="container" style="margin:5%; font-weight:bold;">
                <div class="row">
                    <div class="col-sm">
                        Engr. Ginelou Niño T. Garzon
                    </div>
                    <div class="col-sm">
                        Marvin G. Lucas
                    </div>
                    <div class="col-sm">
                        _______________________
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>