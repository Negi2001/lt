<!DOCTYPE html>
<html lang="en">


<body>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pt-3">
                        <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="bg" width="50%">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12 pt-5">
                    <div class="text-center">
                        <img src="<?= base_url('assets') ?>/images/profile.png" alt="profile" width="20%">
                    </div>
                </div>

                <div class="col-md-12 pt-3">
                    <form action="<?php echo base_url('userqr/qrscan') ?>" class="needs-validation user" novalidate>
                        <div class="pb-2">
                            <label class="form-label">User Name</label>

                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Enter User Name" id="username1" required="">
                            </div>
                        </div>

                        <div class="pb-2">
                            <label class="form-label">Age</label>
                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Enter Your Age" id="age1" required="">
                            </div>
                        </div>

                        <div class="pb-2 gender">
                            <label class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" required>
                                <option value>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="pb-2">
                            <label class="form-label">Outlet/Area/Shop</label>
                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Outlet/Area/Shop" id="outlet1" required="">
                            </div>
                        </div>

                        <div class="pb-3">
                            <label class="form-label">City</label>
                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Enter City" id="city1" required="">
                            </div>
                        </div>

                        <div class="pt-2 pb-5 d-flex justify-content-center">
                            <button type="submit" class="nextbutton">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>