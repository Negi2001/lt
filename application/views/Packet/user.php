<!DOCTYPE html>
<html lang="en">

<style>
    .right-tick {
        color: green;
        font-size: 20px;
        display: none;
    }
</style>

<body>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center pt-4">
                        <div class="pt-3 errorshow">
                            <img src="<?= base_url('assets') ?>/images/ltfoods.png" alt="bg" width="40%">
                            <img src="<?= base_url('assets') ?>/images/logo2.jpeg" alt="bg" width="37%">
                        </div>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12 pt-5">
                    <form action="<?php echo base_url('Packet/users') ?>" method="POST" class="needs-validation" novalidate enctype="multipart/form-data">

                        <div class="user">
                            <label class="form-label">Mobile Number</label>
                            <div class="userinput">
                                <input type="tel" autocomplete="off" pattern="[6-9]{1}[0-9]{9}" min="0" maxlength="10" class="form-control new-form" placeholder="Enter Mobile Number" required="" id="numberfield" name="mobile_number">

                                <div class="mb-3 text-end pt-3 getotp">
                                    <button type="button" id="getOtpBtn">GET OTP</button>
                                </div>
                            </div>
                            <i class="fa fa-phone"></i>
                        </div>



                        <div class="form-group px-2 otpsection text-center animated" data-group-name="digits">
                            <input id="digit-1" data-next="digit-2" type="tel" maxlength="1" required="">
                            <input id="digit-2" data-next="digit-3" data-previous="digit-1" type="tel" maxlength="1" required="">

                            <input id="digit-3" data-next="digit-4" data-previous="digit-2" type="tel" maxlength="1" required="">

                            <input id="digit-4" type="tel" data-previous="digit-3" maxlength="1" required="">
                        </div>

                        <div class="text-center pt-2 animated" id="timerContainer">
                            <span id="timer">90s</span>
                        </div>

                        <div class="text-center pt-2 d-flex justify-content-center resendbutton animated">
                            <button type="button" id="resendOtpBtn">RESEND OTP</button>
                        </div>

                        <div class="mb-3 user position-relative userinput">
                            <div class="errorshow">
                                <label class="form-label">Market</label>
                                <span id="rightTick" class="right-tick" style="display: none;">
                                    <img src="<?= base_url('assets') ?>/images/check-mark.png" alt="">
                                </span>
                            </div>

                            <input type="text" autocomplete="off" class="form-control new-form" placeholder="Market" required="" id="textInputField" readonly name="market_name">

                            <span class="fetch-icon">
                                <img src="<?= base_url('assets') ?>/images/arrow.png" id="infoImage" alt="" width="96%">
                            </span>
                            <i class="fa fa-map-marker"></i>

                            <div id="message" style="color: red; margin-top: 2px;"></div>

                        </div>

                        <div class="text-center pt-2">
                            <a href="<?= base_url('Packet/info') ?>">
                                <img src="<?= base_url('assets') ?>/images/info.png" alt="" width="13%">
                            </a>
                        </div>

                        <div id="loader">
                            <div class="spinner"></div>
                        </div>

                        <div class="text-center pt-5 pb-3 d-flex justify-content-center animated">
                            <button type="submit" id="submitBtn" class="nextbutton">SUBMIT</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        const allowedStates = ['Uttar Pradesh', 'Delhi', 'Haryana'];

        document.getElementById('infoImage').addEventListener('click', function() {
            findUserLocation();
        });

        document.getElementById('submitBtn').addEventListener('click', function(event) {
            const state = document.getElementById('textInputField').value;
            if (!allowedStates.includes(state)) {
                document.getElementById('message').innerText = 'Sorry, you are not allowed in this campaign.';
                event.preventDefault();
            } else {
                document.getElementById('message').innerText = '';
                document.getElementById('rightTick').style.display = 'inline';
            }
        });

        function findUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    function(position) {
                        const latitude = position.coords.latitude;
                        const longitude = position.coords.longitude;
                        findLocationDetails(latitude, longitude);
                    },
                    function(error) {
                        console.error('Error getting user location:', error);
                        document.getElementById('message').innerText = 'Error getting user location. Please try again.';
                    }
                );
            } else {
                document.getElementById('message').innerText = 'Geolocation is not supported by your browser.';
            }
        }

        function findLocationDetails(latitude, longitude) {
            const apiUrl = `https://nominatim.openstreetmap.org/reverse?format=json&lat=${latitude}&lon=${longitude}`;
            fetch(apiUrl)
                .then(response => response.json())
                .then(data => {
                    const state = data.address.state;
                    document.getElementById('textInputField').value = state;

                    // Check if fetched state is allowed and show/hide right tick accordingly
                    if (allowedStates.includes(state)) {
                        document.getElementById('rightTick').style.display = 'inline';
                        document.getElementById('message').innerText = '';
                    } else {
                        document.getElementById('rightTick').style.display = 'none';
                        document.getElementById('message').innerText = 'Sorry, you are not allowed in this campaign.';
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    document.getElementById('message').innerText = 'Error finding location details. Please try again.';
                    document.getElementById('rightTick').style.display = 'none';
                });
        }
    </script>

</body>

</html>