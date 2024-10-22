        @extends('layouts.webapp')
        @section('webtitle')Home @endsection
        @section('webcontent')
            <a href="#" class="top  d-none"><i class="fa-solid fa-arrow-up"></i></a>
            <div class="container-fluid mt-5" >
                <div class="row" style="margin-top:100px">
                    <div class="col-md-4">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="headingOne">
                                <button
                                    data-mdb-collapse-init
                                    class="accordion-button bg-danger text-white"
                                    type="button"
                                    data-mdb-target="#collapseOne"
                                    aria-expanded="true"
                                    aria-controls="collapseOne"
                                >
                                    Category
                                </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-mdb-parent="#accordionExample">
                                    <div class="accordion-body  ">
                                        <div class="category">
                                        <ul>
                                            <li><a href="#">Layer Read Eage</a></li>
                                            <li><a href="#">Layer White Read Eage</a></li>
                                            <li><a href="#">Duck Eage</a></li>
                                            <li><a href="#">Koyel bird Eage</a></li>
                                            <li><a href="#">Fish Eage</a></li>
                                        </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>                                       
                        </div>
                    </div>
                    <div class="col-md-8">
                        <!-- Carousel wrapper -->
                        <div id="carouselMaterialStyle" class="carousel slide carousel-fade" data-mdb-ride="carousel" data-mdb-carousel-init>
                        <!-- Indicators -->
                        <div class="carousel-indicators">
                            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="0" class="active" aria-current="true"
                            aria-label="Slide 1"></button>
                            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide-to="2" aria-label="Slide 3"></button>
                        </div>

                        <!-- Inner -->
                        <div class="carousel-inner rounded-5 shadow-4-strong">
                            <!-- Single item -->
                            <div class="carousel-item active">
                            <img src="{{asset('../assets/images/single.jpg')}}" class="d-block w-100"
                                alt="Sunset Over the City" />
                            <div class="carousel-caption d-none d-md-block">
                                <button class="btn btn-danger">Shop now</button>
                                <!-- <h5>First slide label</h5>
                                <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p> -->
                            </div>
                            </div>

                            <!-- Single item -->
                            <div class="carousel-item">
                            <img src="{{asset('../assets/images/banner-1.jpg')}}"  class="d-block w-100"
                                alt="Canyon at Nigh" />
                            <div class="carousel-caption d-none d-md-block">
                            <button class="btn btn-danger">Shop now</button>
                                <!-- <h5>Second slide label</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> -->
                            </div>
                            </div>

                            <!-- Single item -->
                            <div class="carousel-item">
                            <img src="{{asset('../assets/images/banner-2.jpg')}}" class="d-block w-100"
                                alt="Cliff Above a Stormy Sea" />
                            <div class="carousel-caption d-none d-md-block">
                            <button class="btn btn-danger">Shop now</button>
                                <!-- <h5>Third slide label</h5>
                                <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p> -->
                            </div>
                            </div>
                        </div>
                        <!-- Inner -->

                        <!-- Controls -->
                        <button class="carousel-control-prev" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-mdb-target="#carouselMaterialStyle" data-mdb-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                        </div>
                        <!-- Carousel wrapper -->
                    </div>
                </div>

                <!-- owl carosal -->
               <div class="row mt-5">
                <h3 class="text-danger">Top Models</h3>
                <p>Why not give one of these popular Workers a look? Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                <div class="owl-carousel owl-theme">
                        <div class="item"><h4><img src="{{asset('../assets/images/e1.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e2.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e3.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e4.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e5.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e6.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e1.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e2.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e3.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e4.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e5.jpg')}}" alt=""></h4></div>
                        <div class="item"><h4><img src="{{asset('../assets/images/e6.jpg')}}" alt=""></h4></div>
                    </div>
               </div>
               <div class="row">
                <div class="col-md-12 text-center">
                    <h3 class="text-danger">Featured Product</h3>
                </div>
               </div>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p8.jpg')}}" class="img-fluid"/>
                                <a href="{{route('productDetails')}}">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p6.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p5.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p3.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p2.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p3.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p4.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="bg-image hover-overlay" data-mdb-ripple-init data-mdb-ripple-color="light">
                                <img src="{{asset('../assets/images/p5.jpg')}}" class="img-fluid"/>
                                <a href="#!">
                                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                                </a>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Card title <span class="float-end "><a href="#"><i class="fa-solid fa-heart text-danger"></i></a> <a href="#"> <i class="fa-solid fa-cart-shopping text-danger"></i> </a></span></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content. <a href="#">More</a></p>                                
                                <span class="text-danger"> Price </span> <del class="text-danger"> 170 </del> <span> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong> </span><a href="#!" class="btn btn-danger float-end" data-mdb-ripple-init>Buy now</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center mt-5">
                        <a href="{{route('clientHome')}}" class="btn btn-danger">Show More </a>
                    </div>
                </div>
            </div>

            @endsection

           