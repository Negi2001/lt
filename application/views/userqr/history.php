<!DOCTYPE html>
<html lang="en">


<body>

    <div class="section">
        <div class="container">
            <div class="row pt-3">
                <div class="col">
                    <div class="paymenthistpry">
                        <a href="">
                            PAYMENT HISTORY
                        </a>
                    </div>
                </div>

                <dic class="col">
                    <div class="qpsstatus">
                        <a href="<?= base_url('userqr/qps') ?>">QPS STATUS</a>
                    </div>
                </dic>
            </div>

            <div class="row pt-5">
                <div class="profilemain px-4">
                    <div class="text-center">
                        <img src="<?= base_url('assets') ?>/images/profile.png" width="60%" alt="">
                    </div>

                    <div class="userprofile">
                        <h5>Rakesh Kumar</h5>
                        <div>
                            <img src="<?= base_url('assets') ?>/images/star.png" alt="" width="23%">
                            <span>Rs : 25,000</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row pt-5">
                <div class="col-md-12">
                    <form action="<?php echo base_url('userqr/thankyou') ?>">
                        <div class="mytable">
                            <table class="table table-bordered paytable">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>HEAD</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Coupon Redeem</td>
                                        <td>2500</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>QPS</td>
                                        <td>2700</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>



                        <div class="mytable mt-4">
                            <table class="table table-bordered paytable">
                                <thead>
                                    <tr>
                                        <th>Sr.No</th>
                                        <th>HEAD</th>
                                        <th>AMOUNT</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Total</td>
                                        <td>5200</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Redeemed</td>
                                        <td>2500</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-12 text-center mt-5">
                            <button class="thanksbutton1">NEXT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>