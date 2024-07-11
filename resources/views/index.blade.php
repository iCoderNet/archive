@extends('layouts.base')

@section('title', 'Home Page | De Archive')

@section('top_script')
    <script src="/assets/js/map/mapdata.js"></script>
    <script src="/assets/js/map/countrymap.js"></script>
@endsection

@section('content')
    <div class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 order-lg-2 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="image-container">
                        <img class="img-fluid rounded" id="map_svg" src="/assets/img/map/map.55aecd8b.svg">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 wow fadeInUp pt-5" data-wow-delay="0.3s">
                    <!-- <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">About Us</p> -->
                    <h1 class="display-6 mb-4 text-primary">{{ __('index.int') }}</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">{{ __('index.bigtitle') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 order-lg-2 wow fadeInRight" data-wow-delay="0.1s">
                    <div class="image-container2">
                        <img class="img-fluid rounded" id="map_svg" src="/assets/img/map/task.svg">
                    </div>
                </div>
                <div class="col-lg-6 order-lg-1 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">About Us</p> -->
                    <h1 class="display-6 mb-4 text-primary">{{ __('index.what') }}</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">{{ __('index.bigtitle2') }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="container-xxl py-5 mt-5">
        <div class="container">
            <div class="row g-4 align-items-end mb-4">
                <div class="col-lg-6 order-lg-2 wow fadeInRight rrmap" data-wow-delay="0.1s">
                    <div class="map-container"></div>
                    <div id="map"></div>
                </div>
                <div class="col-lg-6 order-lg-1 wow fadeInUp" data-wow-delay="0.3s">
                    <!-- <p class="d-inline-block border rounded text-primary fw-semi-bold py-1 px-3">About Us</p> -->
                    <h1 class="display-6 mb-4 text-primary">{{ __('index.title2') }}</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">{{ __('index.bigtitle3') }}</h5>
                    <p class="mb-4 text-muted">{{ __('index.bigtitle4') }}</p>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary py-3 px-5 w-100"
                                style="background-color: #0769B4;">{{ __('index.map') }}</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <button class="btn btn-outline-primary py-3 px-5 w-100">{{ __('index.adsearch') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function() {

            // "Simplemaps.com Trial" word removed
            setInterval(function() {
                let d = document.querySelector('#map_inner');
                d.style.shadow = '1px 1px 1px 1px red';
                let e = document.querySelectorAll('a');
                for (let i = 0; i < e.length; i++) {
                    let a = e[i];
                    if (a.innerText === 'Simplemaps.com Trial') {
                        a.remove();
                    }
                }
            }, 50);


            // Round for map
            var mapElement = document.getElementById('map');
            var mapContainerElement = document.querySelector('.map-container');

            // ResizeObserver created
            var resizeObserver = new ResizeObserver(entries => {
                for (let entry of entries) {
                    var mapWidth = entry.contentRect.width;
                    var mapHeight = entry.contentRect.height;
                    var maxDimension = Math.max(mapWidth, mapHeight);

                    if (maxDimension > 375) {
                        mapContainerElement.style.transform = "translateY(-148px)";
                    } else {
                        mapContainerElement.style.transform = "translateY(-80px)";
                    }

                    // map-container element width and height updated
                    mapContainerElement.style.width = maxDimension + 'px';
                    mapContainerElement.style.height = maxDimension + 'px';

                    //console.log('Map width:', mapWidth);
                    //console.log('Map height:', mapHeight);
                }
            });

            // map element observed
            resizeObserver.observe(mapElement);
        });
    </script>
@endsection
