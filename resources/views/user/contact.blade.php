@extends('weblayout.index')
@section('content')

<style>
    /* Fix for primary-custom button if missing */
    .btn-primary-custom {
        background: linear-gradient(135deg, #ff6a00, #ee0979);
        border: none;
        color: white !important;
        font-weight: 600;
        transition: 0.3s;
    }
    .btn-primary-custom:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(238,9,121,0.4);
        color: white;
    }
    /* Social icons spacing */
    .social-icons a {
        margin: 0 8px;
        display: inline-block;
        transition: 0.3s;
    }
    .social-icons a:hover {
        color: #ff6a00 !important;
        transform: scale(1.1);
    }
    /* Contact info list spacing */
    .contact-info-detail {
        margin-bottom: 1.5rem;
    }
    .contact-info-detail p:first-of-type {
        margin-bottom: 0.25rem;
    }
</style>

<div class="container mt-5 pt-5">
    <div class="row">
        <div class="col-lg-12 text-center mb-5">
            <h1 class="text-white display-4 fw-bold">Get In Touch</h1>
            <p class="text-muted lead">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
        </div>
    </div>

    <div class="row">
        <!-- Contact Form Column -->
        <div class="col-md-7 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100">
                <h3 class="text-white mb-4"><i class="fa fa-envelope me-2"></i> Send us a Message</h3>

                @if(session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <form method="POST" action="{{ route('contact.submit') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label text-white">Full Name</label>
                        <input type="text" name="name" class="form-control bg-secondary text-white border-0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Email Address</label>
                        <input type="email" name="email" class="form-control bg-secondary text-white border-0" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Subject</label>
                        <input type="text" name="subject" class="form-control bg-secondary text-white border-0">
                    </div>
                    <div class="mb-3">
                        <label class="form-label text-white">Message</label>
                        <textarea name="message" rows="5" class="form-control bg-secondary text-white border-0" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary-custom px-5 py-2">Send Message</button>
                </form>
            </div>
        </div>

        <!-- Contact Info Column -->
        <div class="col-md-5 mb-4">
            <div class="bg-dark p-4 rounded-4 h-100">
                <h3 class="text-white mb-4"><i class="fa fa-address-card me-2"></i> Contact Info</h3>
                
                <div class="contact-info-detail">
                    <p class="text-muted mb-1"><i class="fa fa-map-marker me-2" style="color:#ff6a00;"></i> Address</p>
                    <p class="text-white">APWA Complex, 1st Floor, Agha Khan 3 Rd, Garden East Saddar Town, Karachi, 74400, Pakistan</p>
                </div>

                <div class="contact-info-detail">
                    <p class="text-muted mb-1"><i class="fa fa-phone me-2" style="color:#ff6a00;"></i> Phone</p>
                    <p class="text-white">+92 331-3689607</p>
                </div>

                <div class="contact-info-detail">
                    <p class="text-muted mb-1"><i class="fa fa-envelope me-2" style="color:#ff6a00;"></i> Email</p>
                    <p class="text-white">ahsun2504b@aptechgdn.net</p>
                    <p class="text-white">ehsunrehan@gmail.com</p>
                </div>
                
                <hr class="bg-secondary">
                <div class="mt-3 text-center">
                    <h5 class="text-white">Follow Us</h5>
                    <div class="social-icons mt-2">
                        <a href="#" class="text-white fs-4"><i class="fa fa-facebook"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa fa-twitter"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa fa-instagram"></i></a>
                        <a href="#" class="text-white fs-4"><i class="fa fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Google Map -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="bg-dark p-2 rounded-4 text-center">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3619.9063475340963!2d67.02431109999999!3d24.867048000000004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33e6b1566c46f%3A0x65318f4eb62c7aa8!2sAptech%20Learning%20Garden%20Center!5e0!3m2!1sen!2s!4v1779302811484!5m2!1sen!2s" width="100%" height="300" style="border:0; border-radius: 16px;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>

    <!-- Gap before footer -->
    <div class="mb-5"></div>
</div>

@endsection