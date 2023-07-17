<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.2.0/css/all.css">
<!-- Header Area-->
<div class="header-area" id="headerArea">
    <div class="container">
        <div class="header-content header-style-five position-relative d-flex align-items-center justify-content-between">
            <!-- Logo Wrapper-->
            <div class="logo-wrapper"><a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/img/icons/icon-72x72.png" alt=""></a></div>
            <div class="page-heading">
                <h6 class="mb-0">SOLARDEX ENERGY</h6>
            </div>
            <!-- Navbar Toggler-->
            <div class="navbar--toggler" id="affanNavbarToggler"><span class="d-block"></span><span class="d-block"></span><span class="d-block"></span></div>
        </div>
        <!-- # Header Five Layout End-->
    </div>
</div>

<div class="page-content-wrapper elements-page">
    <div class="owl-carousel-one owl-carousel">
        <!-- Single Hero Slide-->
        <div class="single-hero-slide bg-overlay" style="background-image: url('assets/img/bg-img/banner1.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="500ms">Master Control of All Batteries</h4>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="500ms">Turn ON/OFF The Load Easily</p><a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms">Try it Now</a>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide bg-overlay" style="background-image: url('assets/img/bg-img/banner2.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Realtime Batteries Location</h4>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Check the battery location on map.</p><a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms">Check it</a>
                </div>
            </div>
        </div>
        <!-- Single Hero Slide-->
        <div class="single-hero-slide bg-overlay" style="background-image: url('assets/img/bg-img/banner3.jpg')">
            <div class="slide-content h-100 d-flex align-items-center text-center">
                <div class="container">
                    <h4 class="text-white mb-1" data-animation="fadeInUp" data-delay="100ms" data-wow-duration="1000ms">Pairing of Batteries Via QR Code</h4>
                    <p class="text-white mb-4" data-animation="fadeInUp" data-delay="400ms" data-wow-duration="1000ms">Connect your batteries to the App</p><a class="btn btn-creative btn-warning" href="#" data-animation="fadeInUp" data-delay="800ms" data-wow-duration="500ms">Let's do this</a>
                </div>
            </div>
        </div>
    </div>

    <div class="container pt-3">
        <div class="card shadow-sm">
            <div class="card-body pb-2">
                <div class="chart-wrapper">
                    <div id="areaChart1"></div>
                </div>
            </div>
        </div>
    </div>

    <div class="container py-3 direction-rtl">
        <div class="row g-3">
            <div class="col-3">
                <a href="<?= base_url() ?>page/add_battery">
                    <div class="feature-card text-center">
                        <div class="card shadow mx-auto"><img src="assets/img/dashboard/accumulator.png" alt=""></div>
                        <p class="mb-0">Add Battery</p>
                    </div>
                </a>
            </div>
            <div class="col-3">
                <div class="feature-card mx-auto text-center">
                    <div class="card shadow mx-auto"><img src="assets/img/dashboard/monitoring.png" alt=""></div>
                    <p class="mb-0">Battery Map</p>
                </div>
            </div>
            <div class="col-3">
                <div class="feature-card mx-auto text-center">
                    <div class="card shadow mx-auto"><img src="assets/img/dashboard/electric-station.png" alt=""></div>
                    <p class="mb-0">Station </p>
                </div>
            </div>
            <div class="col-3">
                <div class="feature-card mx-auto text-center">
                    <div class="card shadow mx-auto"><img src="assets/img/dashboard/renewable-energy.png" alt=""></div>
                    <p class="mb-0">Total Power</p>
                </div>
            </div>
        </div>
    </div>



</div>

<script src="<?= base_url() ?>assets/js/apexcharts.min.js"></script>
<script>
    var lastUpdateData = "";
    var TotalConsumption = [];
    var TotalProduction = [];
    ambilDataGraph();

    function ambilDataGraph() {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                const JsonData = this.responseText;
                const obj = JSON.parse(JsonData);
                // console.log(JsonData);
                //Total Energy Cosumption
                TotalConsumption = obj.total_consumption;
                // console.log(TotalConsumption);
                //Total Power Production
                TotalProduction = obj.total_production;
                // console.log(TotalProduction);
                //Last Update Data
                lastUpdateData = obj.last_update;
                // console.log(lastUpdateData);
                (function() {
                    'use strict';

                    var areaChart1 = {
                        chart: {
                            height: 240,
                            type: 'area',
                            animations: {
                                enabled: true,
                                easing: 'easeinout',
                                speed: 1000
                            },
                            dropShadow: {
                                enabled: true,
                                opacity: 0.1,
                                blur: 1,
                                left: -5,
                                top: 18
                            },
                            zoom: {
                                enabled: false
                            },
                            toolbar: {
                                show: false
                            },
                        },
                        colors: ['#0134d4', '#ea4c62'],
                        dataLabels: {
                            enabled: false
                        },
                        fill: {
                            type: "gradient",
                            gradient: {
                                type: "vertical",
                                shadeIntensity: 1,
                                inverseColors: true,
                                opacityFrom: 0.15,
                                opacityTo: 0.02,
                                stops: [40, 100],
                            }
                        },
                        grid: {
                            borderColor: '#dbeaea',
                            strokeDashArray: 4,
                            xaxis: {
                                lines: {
                                    show: true
                                }
                            },
                            yaxis: {
                                lines: {
                                    show: false,
                                }
                            },
                            padding: {
                                top: 0,
                                right: 0,
                                bottom: 0,
                                left: 0
                            },
                        },
                        legend: {
                            position: 'bottom',
                            horizontalAlign: 'center',
                            offsetY: 4,
                            fontSize: '14px',
                            markers: {
                                width: 9,
                                height: 9,
                                strokeWidth: 0,
                                radius: 20
                            },
                            itemMargin: {
                                horizontal: 5,
                                vertical: 0
                            }
                        },
                        title: {
                            text: TotalProduction[6] + ' Watt',
                            align: 'left',
                            margin: 0,
                            offsetX: 0,
                            offsetY: 20,
                            floating: false,
                            style: {
                                fontSize: '16px',
                                color: '#8480ae'
                            },
                        },
                        tooltip: {
                            theme: 'dark',
                            marker: {
                                show: true,
                            },
                            x: {
                                show: false,
                            }
                        },
                        subtitle: {
                            text: 'Energy Production & Cosumption',
                            align: 'left',
                            margin: 0,
                            offsetX: 0,
                            offsetY: 0,
                            floating: false,
                            style: {
                                fontSize: '14px',
                                color: '#8480ae'
                            }
                        },
                        stroke: {
                            show: true,
                            curve: 'smooth',
                            width: 3
                        },
                        labels: lastUpdateData,
                        series: [{
                            name: 'Production',
                            data: TotalProduction
                        }, {
                            name: 'Consumption',
                            data: TotalConsumption
                        }],
                        xaxis: {
                            crosshairs: {
                                show: true
                            },
                            labels: {
                                offsetX: 0,
                                offsetY: 0,
                                style: {
                                    colors: '#8480ae',
                                    fontSize: '12px',
                                },
                            },
                            tooltip: {
                                enabled: false,
                            },
                        },
                        yaxis: {
                            labels: {
                                offsetX: -10,
                                offsetY: 0,
                                style: {
                                    colors: '#8480ae',
                                    fontSize: '12px',
                                },
                            }
                        },
                    }
                    var areaChart_01 = new ApexCharts(document.querySelector("#areaChart1"), areaChart1);
                    areaChart_01.render();
                })();
            }
        };
        xhttp.open("GET", "<?= base_url() ?>api/battery/production_energy");
        xhttp.send();
    }
</script>