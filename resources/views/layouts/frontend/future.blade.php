<div class="page-section">
    <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">Para Mentor</h1>
        <div class="owl-carousel wow fadeInUp" id="doctorSlideshow">
            @foreach ($mentors as $mentor)
            <div class="item">
                <div class="card-doctor">
                    <div class="header">
                        <img src="{{ $mentor['photo'] }}" alt="">
                        <div class="meta">
                            <a href="{{ $mentor['instagram'] }}"><span class="mai-logo-instagram"></span></a>
                            <a href="https://wa.me/{{ $mentor['phone'] }}"><span class="mai-logo-whatsapp"></span></a>
                        </div>
                    </div>
                    <center>
                        <div class="body">
                            <p class="text-xl mb-0 text-center">{{ $mentor['name'] }}</p>
                            <span class="text-sm text-grey">Mentor Konsultasi</span>
                        </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
