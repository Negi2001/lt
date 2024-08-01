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
                <div class="col-md-12 pt-3">
                    <form action="<?php echo base_url('userqr/user') ?>" class="needs-validation" enctype="multipart/form-data" method="POST">
                        <div class="mainsection">
                            <div class="texts mt-5 px-3">
                                <h2>Welcome to the LT FOODS Microsite</h2>
                            </div>
                            <div class="form-check mt-5 pt-5 padding1">
                                <input type="checkbox" class="form-check-input largerCheckbox" id="exampleCheck1" required>
                                <label class="form-check-label" for="exampleCheck1">I am 18 years and above. I agree to
                                    all terms & Conditions.</label>
                                <div class="invalid-feedback">You must agree to the terms & conditions.</div>
                            </div>

                            <div class="pt-4 text-center terms">
                                <h5>*Terms
                                    &amp; Conditions</h5>
                            </div>

                            <div class="text-center pt-4 pb-3">
                                <button type="submit" class="nextbutton">NEXT</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <script>
        (function() {
            'use strict'

            var forms = document.querySelectorAll('.needs-validation')

            Array.prototype.slice.call(forms)
                .forEach(function(form) {
                    form.addEventListener('submit', function(event) {
                        if (!form.checkValidity()) {
                            event.preventDefault()
                            event.stopPropagation()
                        }

                        form.classList.add('was-validated')
                    }, false)
                })
        })()
    </script>
    <script>
        document.getElementById('submitBtn').addEventListener('click', function(event) {
            var checkbox = document.getElementById('exampleCheck1');
            if (!checkbox.checked) {
                checkbox.classList.add('is-invalid');
                event.preventDefault();
            }
        });

        document.getElementById('exampleCheck1').addEventListener('change', function() {
            this.classList.remove('is-invalid');
        });
    </script>
</body>

</html>