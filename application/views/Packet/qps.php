<!DOCTYPE html>
<html lang="en">


<body>

    <div class="section">
        <div class="container">
            <div class="row pt-3">
                <div class="col">
                    <div class="paymenthistpry disabled">
                        <a href="<?= base_url('Packet/history') ?>">
                            PAYMENT HISTORY
                        </a>
                    </div>
                </div>

                <dic class="col">
                    <div class="qpsstatus active">
                        <a href="<?= base_url('Packet/qps') ?>">QPS STATUS</a>
                    </div>
                </dic>

                <div class="col-md-12 pt-4">
                    <div class="text-center">
                        <h3 class="qpstext">Activity Period <br />Aug'24-NOV'24</h3>
                    </div>
                </div>
            </div>


            <div class="row pt-3">
                <div class="col-md-12">
                    <form action="<?php echo base_url('Packet/thankyou') ?>">
                        <div class="row pt-3 pb-3">
                            <div class="col-md-12">
                                <div class="qps qps1 text-center">
                                    <img src="<?= base_url('assets') ?>/images/scan.png" alt="" width="15%" class="pb-2">
                                    <h6>30 QR</h6>
                                    <p>2700 Rs.</p><br />
                                    <a href="<?php echo base_url('Packet/claimupi') ?>">
                                        <button type="button">Claim</button>
                                    </a>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <div class="qps qps2 text-center">
                                    <img src="<?= base_url('assets') ?>/images/scan.png" alt="" width="15%" class="pb-2">
                                    <h6>60 QR</h6>
                                    <p>5850 Rs.</p><br />
                                    <button type="button" class="disabled">claim</button>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <div class="qps qps3 text-center">
                                    <img src="<?= base_url('assets') ?>/images/scan.png" alt="" width="15%" class="pb-2">
                                    <h6>90 QR</h6>
                                    <p>9450 Rs.</p><br />
                                    <button type="button" class="disabled">Claim</button>
                                </div>
                            </div>

                            <div class="col-md-12 pt-3">
                                <div class="qps qps4 text-center">
                                    <img src="<?= base_url('assets') ?>/images/scan.png" alt="" width="15%" class="pb-2">
                                    <h6>120 QR</h6>
                                    <p>13500 Rs.</p><br />
                                    <button type="button" class="disabled">Claim</button>

                                    <div class="text-center pt-2">
                                        <h5 style="color: #f2990e; font-weight: bold;">30 More for Next Slab</h5>
                                    </div>
                                </div>
                            </div>

                            <div class="qpsbutton text-center pt-3">
                                <button type="submit">NEXT</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</body>

</html>