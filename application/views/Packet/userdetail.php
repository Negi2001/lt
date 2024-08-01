<!DOCTYPE html>
<html lang="en">

<body>
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="pt-3 errorshow">
                        <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="bg" width="35%">
                        <img src="<?= base_url('assets') ?>/images/logo2.jpeg" alt="bg" width="35%">
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
                    <form action="<?php echo base_url('Packet/details_user') ?>" class="needs-validation user" method="POST" novalidate enctype="multipart/form-data">
                        <div class="pb-3">
                            <label class="form-label">User Name</label>

                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Enter User Name" id="username1" required="" name="user_name">
                            </div>
                        </div>

                        <div class="pb-3 gender">
                            <label class="form-label">Age</label>
                            <select class="form-select" aria-label="Default select example" name="age" required>
                                <option value>Select Age</option>
                                <option value="18-25">18-25</option>
                                <option value="26-40">26-40</option>
                                <option value="41-100">41-100</option>
                            </select>
                        </div>

                        <div class="pb-3 gender">
                            <label class="form-label">Gender</label>
                            <select class="form-select" aria-label="Default select example" name="gender" required>
                                <option value>Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <div class="pb-3">
                            <label class="form-label">Outlet/Area/Shop</label>
                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Outlet/Area/Shop" id="outlet1" required="" name="outlet_area_shop">
                            </div>
                        </div>

                        <div class="pb-3">
                            <label class="form-label">City</label>
                            <div>
                                <input type="text" autocomplete="off" class="form-control new-form" placeholder="Enter City" id="city1" required="" name="city">
                            </div>
                        </div>

                        <div class="pt-3 pb-5 d-flex justify-content-center">
                            <button type="submit" class="nextbutton">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>

</html>