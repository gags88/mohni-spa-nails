<footer id="mh-footer" class="mh-footer mh-haslayout">
    <div class="mh-footer-area">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="mh-col">
                        <h3>Follow Us</h3>
                        <ul class="list-unstyled mh-socialicons">
                            <li><a href="https://www.facebook.com/pages/category/Spa/Mohni-Spa-Nails-2082874411980198/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fab fa-twitter"></i></a></li>
                            <li class="mh-googleplus"><a href="javascript:void(0);"><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href="javascript:void(0);"><i class="fab fa-instagram"></i></a></li>
                        </ul>
                        @include('includes.location-map', ['height' => 200])
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="mh-col">
                        <h3>Business hours</h3>
                        <ul class="list-unstyled mh-info footer">
                            <li><b>Monday:</b>Closed</li>
                            <li><b>Tuesday:</b>10:00AM-07:00PM</li>
                            <li><b>Wednesday:</b>10:00AM-07:00PM</li>
                            <li><b>Thursday:</b>10:00AM-07:00PM</li>
                            <li><b>Friday:</b>10:00AM-07:00PM</li>
                            <li><b>Saturday:</b>10:00AM-07:00PM</li>
                            <li><b>Sunday:</b>Closed</li>
                        </ul>
                        <div class="mh-col">
                            <i>Holiday hours may vary</i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="mh-col">
                        <h3>Contact Us</h3>
                        <ul class="list-unstyled mh-info">
                            <li><a href="tel:+12042194071"><span>+1 204 219 4071</span></a></li>
                            <li><span><a href="mailto:mohnispa.info@gmail.com">mohnispa.info@gmail.com</a></span>
                            </li>
                            <li><span>250 Marion St #102, Winnipeg,<em>MB R2H 0T7, Canada</em></span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mh-footerbar text-center">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <ul class="list-unstyled list-unstyled mh-footernav">
                        <li>Appointments are appreciated, but walk-ins are always welcome.</li>
                        <li>Lots of parking space is available in front of our door.</li>
                        <li>Wheelchair accessible entrance.</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <span class="mh-copyright">&copy; {{ date('Y') }} {{app_name()}}</span>
                    <br/><small>Developed by Emages Soft Services</small>
                </div>
            </div>
        </div>
    </div>
</footer>
