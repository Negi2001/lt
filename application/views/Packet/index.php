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
                <div class="col-md-12">
                    <form action="<?php echo base_url('Packet/user') ?>" class="needs-validation" enctype="multipart/form-data" method="POST">
                        <div class="mainsection">
                            <div class="texts px-3">
                                <h2>Welcome to the LT FOODS Microsite</h2>
                            </div>

                            <div id="slider" class="text-center newslider">
                                <div class="slides">
                                    <img src="<?= base_url('assets') ?>/images/banner5.jpg" width="100%" />
                                </div>

                                <div class="slides">
                                    <img src="<?= base_url('assets') ?>/images/banner4.jpg" width="100%" />
                                </div>

                                <!-- <div class="slides">
                                    <img src="<?= base_url('assets') ?>/images/banner2.jpg" width="100%" />
                                </div>

                                <div class="slides">
                                    <img src="<?= base_url('assets') ?>/images/banner1.jpg" width="100%" />
                                </div>

                                <div class="slides">
                                    <img src="<?= base_url('assets') ?>/images/banner3.jpg" width="100%" />
                                </div> -->

                                <div id="dot"><span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span><span class="dot"></span>
                                </div>
                            </div>

                            <div class="form-check mt-3 pt-5 padding1">
                                <input type="checkbox" class="form-check-input largerCheckbox" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">I am 18 years and above. I agree to
                                    all terms & Conditions.</label>
                                <div class="invalid-feedback">You must agree to the terms & conditions.</div>
                            </div>

                            <div class="pt-3 text-center terms">
                                <h5>*Terms
                                    &amp; Conditions</h5>
                            </div>

                            <div class="text-center pt-4 pb-4">
                                <button type="submit" class="nextbutton">NEXT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        var index = 0;
        var slides = document.querySelectorAll(".slides");
        var dot = document.querySelectorAll(".dot");

        function changeSlide() {

            if (index < 0) {
                index = slides.length - 1;
            }

            if (index > slides.length - 1) {
                index = 0;
            }

            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
                dot[i].classList.remove("active");
            }

            slides[index].style.display = "block";
            dot[index].classList.add("active");

            index++;

            setTimeout(changeSlide, 2000);

        }

        changeSlide();
    </script>
</body>

</html>