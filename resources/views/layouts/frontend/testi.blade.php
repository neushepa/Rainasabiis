<div class="page-section">
    {{-- @foreach ($testimonis as $ts) --}}
    {{-- <div class="container">
        <h1 class="text-center mb-5 wow fadeInUp">{{ $ts['testimoni'] }}</h1>
        </div> --}}

        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
        <?php
        $i = 0;
        ?>
        @foreach ($testimonis as $ts)
            <div class="carousel-item <?php if($i < 1){ ?>active<?php }; ?>">
                <h1 class="text-center mb-5">{{ $ts['testimoni'] }}</h1>
          </div>
          <?php
          $i++;
      ?>
      @endforeach
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>
{{-- @endforeach --}}
</div>
