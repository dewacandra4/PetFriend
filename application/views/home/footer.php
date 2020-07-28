 <!-- footer_start  -->
 <footer class="footer">
        <div class="footer_top">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Contact Us
                            </h3>
                            <ul class="address_line">
                                <li>+62 81238912614</li>
                                <li><a href="#">candrabrata8@gmail.com</a></li>
                                <li>Jalan Raya Puputan, Renon, Bali </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Our Services
                            </h3>
                            <ul class="links">
                                <li><a href="#">Pet Health</a></li>
                                <li><a href="#">Pet Hotel</a></li>
                                <li><a href="#">Pet Salon</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3  col-md-6 col-lg-3">
                        <div class="footer_widget">
                            <h3 class="footer_title">
                                Quick Link
                            </h3>
                            <ul class="links">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-xl-3 col-md-6 col-lg-3 ">
                        <div class="footer_widget">
                            <div class="footer_logo">
                                <a href="#">
                                    <img src="<?= base_url()?>assets/img/logo_trans.png" alt="PetFriend" width=90% height=50%>
                                </a>
                            </div>
                            <p class="address_text">Denpasar, Jalan Raya Puputan, Renon, Bali
                            </p>
                            <div class="socail_links">
                                <ul>
                                    <li>
                                        <a href="#">
                                            <i class="ti-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="ti-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-google-plus"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="copy-right_text">
            <div class="container">
                <div class="bordered_1px"></div>
                <div class="row">
                    <div class="col-xl-11">
                        <p class="copy_right text-center">
                            <p>
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Made with <i class="fa fa-heart" aria-hidden="true" style="color:red"></i> for everyone
  </p>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer_end  -->


    <!-- JS here -->
    <script src="<?= base_url()?>assets/anipat/js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/vendor/jquery-1.12.4.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/popper.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/bootstrap.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/owl.carousel.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/ajax-form.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/waypoints.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/scrollIt.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.scrollUp.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/wow.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/nice-select.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.slicknav.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/plugins.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/gijgo.min.js"></script>

    <!--contact js-->
    <script src="<?= base_url()?>assets/anipat/js/contact.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.ajaxchimp.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.form.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/jquery.validate.min.js"></script>
    <script src="<?= base_url()?>assets/anipat/js/mail-script.js"></script>

    <script src="<?= base_url()?>assets/anipat/js/main.js"></script>
    <script>
        $('#datepicker').datepicker({
            iconsLibrary: 'fontawesome',
            disableDaysOfWeek: [0, 0],
        //     icons: {
        //      rightIcon: '<span class="fa fa-caret-down"></span>'
        //  }
        });
        $('#datepicker2').datepicker({
            iconsLibrary: 'fontawesome',
            icons: {
             rightIcon: '<span class="fa fa-caret-down"></span>'
         }

        });
        var timepicker = $('#timepicker').timepicker({
         format: 'HH.MM'
     });
    </script>
    <script>
	$(document).ready(function(){		
		$('.form-checkbox').click(function(){
			if($(this).is(':checked')){
				$('.form-password').attr('type','text');
			}else{
				$('.form-password').attr('type','password');
			}
		});
	});
</script>
</body>

</html>