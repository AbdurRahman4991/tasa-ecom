@extends('layouts.webapp')
@section('webtitle')Products details @endsection
@section('webcontent')

<div class="container-fluid" style="margin-top:80px">
  <div class="row ">
    <div class="col-md-12 text-center">
      <h3 class="text-danger">Product details</h3>
    </div>
  </div>
</div>

     <div class="container-fluid mt-3">
       <div class="row">
         <div class="col-md-7 ">
            <div id="carouselExampleControls" class="carousel slide " data-mdb-ride="carousel" data-mdb-carousel-init>
              <div class="carousel-inner">
                <div class="carousel-item active">
                  <img src="https://mdbcdn.b-cdn.net/img/new/slides/041.webp" class="d-block w-100 h-70 " alt="Wild Landscape"/>
                </div>
                <div class="carousel-item">
                  <img src="https://mdbcdn.b-cdn.net/img/new/slides/042.webp" class="d-block w-100 h-70" alt="Camera"/>
                </div>
                <div class="carousel-item">
                  <img src="https://mdbcdn.b-cdn.net/img/new/slides/043.webp" class="d-block w-100 h-70" alt="Exotic Fruits"/>
                </div>
              </div>
              <button class="carousel-control-prev" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
              </button>
              <button class="carousel-control-next" type="button" data-mdb-target="#carouselExampleControls" data-mdb-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
              </button>
          </div>
        </div>
          <div class="col-md-5">
          <h3 class="text-danger">Laye Chicken eage</h3>
          <h4>Price: <del class="text-danger">170</del> <strong>150 <i class="fa-solid fa-bangladeshi-taka-sign"></i></strong></h4>
          <h5>Featured</h5>
          <ul>

            <li>Color: red, green, blue.</li>
            <li>Size: L, M, XL.</li>
            <li>Weight: 150kg</li>
            <li>Status: avalable</li>
            <li> Quantity: 10 pice</li>
          </ul>
          <h6 class="text-danger">Payment type: Cash on delvery</h6>

          <button class="btn btn-success"data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#exampleModal" >Buy noow</button> <button class="btn btn-danger"><i class="fa-solid fa-cart-shopping text-white"></i> Add to card</button>
          <button class="btn btn-worning"> <i class="fa-solid fa-heart text-danger"></i> Favarite </button>
          <div class="mt-3">
          <a
                data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #3b5998;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-facebook-f"></i
                ></a>

                <!-- Twitter -->
                <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #55acee;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-twitter"></i
                ></a>

                <!-- Google -->
                <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #dd4b39;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-google"></i
                ></a>

                <!-- Instagram -->
                <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #ac2bac;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-instagram"></i
                ></a>

                <!-- Linkedin -->
                <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #0082ca;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-linkedin-in"></i
                ></a>
                <!-- Github -->
                <a
                    data-mdb-ripple-init
                    class="btn text-white btn-floating m-1"
                    style="background-color: #333333;"
                    href="#!"
                    role="button"
                    ><i class="fab fa-github"></i
                ></a>
          </div>
          </div>
       </div>
    </div>



<div class="container-fluid ">
    <div class="row">
        <div class="col-md-7">
            <h3 class="text-danger">Descriptions</h3>
            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Suscipit sit sunt illum, quos, ipsum recusandae magni a odio ipsa dolor, autem beatae. Eaque deserunt vel dignissimos sunt, nostrum fugiat molestiae.</p>
        </div>
    </div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Order Now</h5>
        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="" method="post">
          <div class="form-outline mb-3" data-mdb-input-init>
            <input type="text" id="form12" class="form-control" />
            <label class="form-label" for="form12">Name</label>
          </div>
          <div class="form-outline mb-3" data-mdb-input-init>
            <input type="email" id="form12" class="form-control" />
            <label class="form-label" for="form12">Email</label>
          </div>
          <div class="form-outline mb-3" data-mdb-input-init>
            <input type="text" id="form12" class="form-control" />
            <label class="form-label" for="form12">phone</label>
          </div>
          <div class="form-outline mb-3" data-mdb-input-init>
            <input type="number" id="form12" class="form-control" />
            <label class="form-label" for="form12">Quantity</label>
          </div>
          <div class="form-outline mb-3" data-mdb-input-init>
          <textarea name="address" class="form-control" id="form12" class="form-control" id=""></textarea>
          <label class="form-label" for="form12">Delevery address</label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-mdb-ripple-init>Confirm order</button>
      </div>
    </div>
  </div>
</div>

@endsection