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
                    <h1 class="display-6 mb-4 text-primary">{{ __('tab1') }}</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">You are on the website of the Interactive Archive
                        of the Germans of Kazakhstan, where are collected and presented the materials from state and family
                        archives on the history and culture of the Kazakh Germans. When studying the past, we turn to
                        various sources, including archival documents that silently store information about past events,
                        phenomena, facts, and names. Is it really silent? By carefully collecting, researching and
                        preserving information from archives on various topics in the history and culture of the Kazakh
                        Germans, we saw that archival materials can often loudly “voice” certain problems of the past. And
                        all the more valuable today is turning to documentary history in search of answers to many pressing
                        questions and challenges of our time.</h5>
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
                    <h1 class="display-6 mb-4 text-primary">WHAT IS THE ARCHIVE USEFUL FOR YOU PERSONALLY?</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">From 2022 to 2023 carried out the project team a
                        lot of work in the state archives of the Republic of Kazakhstan, collecting materials from the
                        family archives of Kazakh Germans. The identified set of materials was digitized and systematized
                        into the presented categories. Using the site you will have the opportunity to get acquainted with
                        various topics on the history and culture of the Germans of Kazakhstan. Please note that the site
                        contains electronic copies of archival documents and the site does not provide archive certificates.
                        To obtain archive certificates, you should contact departmental and state archival institutions of
                        the Republic of Kazakhstan.</h5>
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
                    <h1 class="display-6 mb-4 text-primary">HOW IT WORK?</h1>
                    <h5 style="font-weight: 600;" class="mb-4 text-muted">You can go to “Advanced Search” to see all the
                        publications available on the site, divided into sections, or find the information you need
                        specifically, and click on an area on the map on the right to see all publications related to this
                        area. The same thing can be done using the “Search” menu item. By accessing the “Database” menu
                        item, you can search for a specific person and information about him. If you have materials that you
                        would like to submit for placement on our website, use the “Submit Materials” menu item.</h5>
                    <p class="mb-4 text-muted">All materials on the site are provided for informational purposes only.
                        Partial or complete copying of site materials without written permission from the site
                        administration is prohibited! All materials on the site are protected in accordance with the law,
                        including copyright and related rights.</p>
                    <div class="row">
                        <div class="col-12 col-md-6 mb-3 mb-md-0">
                            <button class="btn btn-primary py-3 px-5 w-100" style="background-color: #0769B4;">Open the
                                map</button>
                        </div>
                        <div class="col-12 col-md-6">
                            <button class="btn btn-outline-primary py-3 px-5 w-100">Advanced search</button>
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
