@extends('layout.app')

@section('title', app_name() . ' in Winnipeg, Manitoba')
@section('website_meta')
<meta name="description" content="Mohni Nails Spa">
<meta name="keywords" content="Nails Spa">
<meta name="author" content="<?php echo app_name(); ?>">
@endsection
@section('content')
<div id="mh-innerbanner" class="mh-innerbanner mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="mh-innerbanner-area">
                    <div class="mh-bannarheading">
                        <h1>Contact Us</h1>
                    </div>
                    <ul class="list-unstyled mh-breadcrumb">
                        <li><a href="/">Home</a></li>
                        <li>Contact Us</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="mh-contactus" class="mh-contactus mh-sectionspace mh-haslayout">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-sm-offset-0 col-md-8 col-md-offset-2">
                <div class="mh-sectionhead mb-50">
                    <div class="mh-sectiontitle">
                        <h2><span>{{ app_name() }}</span>
                            Our Address
                        </h2>
                    </div>
                    <div class="mh-headcontent">
                        <div class="mh-description">
                        </div>
                    </div>
                </div>
            </div>
            <div class="mh-contactus-area mh-haslayout">
                <div class="mh-addressarea">
                    <div class="col-xs-12 col-sm-12">
                        <figure class="mh-contactusmap">
                            <iframe width="100%" height="450" style="border:0" loading="lazy" allowfullscreen referrerpolicy="no-referrer-when-downgrade" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d641.7029328194336!2d-97.09429287120261!3d49.95863406654574!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x52ea71af35b9e75d%3A0xe1a1cc4614feac38!2sMohni%20Spa%20%26%20Nails!5e0!3m2!1sen!2sca!4v1680577520562!5m2!1sen!2sca">
                            </iframe>
                        </figure>
                    </div>
                </div>
                <div class="mh-contactus-formarea">
                    <div class="col-xs-12">
                        <div class="mh-headcontent">
                            <h2 class="no-underline">Contact Us By Email!</h2>
                            <div class="mh-description">
                                <p>Fill out the form below to reach out.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="mh-formtheme mh-contactusform">
                            <form id="contactForm" data-toggle="validator" novalidate="true">
                                <fieldset>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="txtname" class="form-control" name="name" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="txtemail" class="form-control" name="email" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12 col-md-4">
                                        <div class="form-group">
                                            <input type="text" id="txtwebsite" class="form-control" name="website" placeholder="Website">
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <textarea class="w-100 h-100" rows="5" id="txtmessage" placeholder="Message"></textarea>
                                        </div>
                                    </div>
                                    <div id="msgSubmit" class="form-message hidden"></div>
                                    <div class="col-xs-12 col-sm-12">
                                        <div class="form-group">
                                            <button type="submit" class="mh-btn" id="form-submit">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </fieldset>
                            </form>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="mh-address">
                            <div class="mh-addressbox text-left">
                                <p><i class="ti-world"></i>250 Marion St #102, Winnipeg,<br /> MB R2H 0T7.</p>
                                <br />
                                <p><i class="ti-email"></i>Email: mohnispa.info@gmail.com</p>
                                <br />
                                <p><i class="ti-mobile"></i>Phone: +1 204 219 4071</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection