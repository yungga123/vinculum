<?php 
defined('BASEPATH') or die('Access Denied');
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Transactions</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm">
                    <div class="card card-primary">
                        <div class="card-header">
                            <b>CLIENT INFORMATION</b>
                        </div>

                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Client Name</label>
                                <input type="text" name="client_name" id="client_name" class="form-control" readonly>
                            </div>

                            <div class="form-group">
                                <label for="">Contact No</label>
                                <input type="text" name="contact_no" id="contact_no" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm">
                    <div class="card card-primary">
                        <div class="card-header">
                            <b>TRANSACTION</b>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                              <label for="">Transactions</label>
                              <select class="form-control" name="transaction" id="transaction">
                                    <option>Transaction 1</option>
                                    <option>Transaction 2</option>
                                    <option>Transactopn 3</option>
                              </select>
                            </div>

                            <button type="button" class="btn btn-success btn-block text-bold"><i class="fas fa-check"></i> CONFIRM</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <b>TRANSACTION TABLE</b>
                        </div>

                        <div class="card-body">

                            <table class="table table-sm table-bordered" style="font-size: 12px">
                                <thead>
                                    <tr>
                                        <th width="20%">DEVICE</th>
                                        <th width="15%">QTY</th>
                                        <th width="15%">PRICE</th>
                                        <th width="20%">DEVICE</th>
                                        <th width="15%">QTY</th>
                                        <th width="15%">PRICE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td class="text-bold">ALARM HOST PANEL</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">DISPLACEMENT DETECTOR</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">MAGNETIC CONTACT</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">OUTDOOR MOTION SENSOR</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">INDOOR MOTION DETECTOR</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">WATER LEAK DETECTOR</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">INDOOR SIREN</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">SMOKE DETECTOR</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">REMOTE KEYFOB</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">OUTDOOR SIREN</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">IC CARD TAGS</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">WIRELESS KEYPAD</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">PANIC BUTTON</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">ALARM OUTPUT EXPANDER</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td class="text-bold">WIRELESS REPEATER</td>
                                        <td></td>
                                        <td></td>
                                        <td class="text-bold">CCTV</td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </section>
</div>