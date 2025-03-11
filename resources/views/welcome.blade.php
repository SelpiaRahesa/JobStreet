@extends('layouts.home')
@section('content')
<section class="py-0" id="home">
        <div class="bg-holder d-none d-sm-block" style="background-image:url(assets/frontend/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="bg-holder d-sm-none" style="background-image:url(assets/frontend/img/illustrations/hero-bg.png);background-position:right top;background-size:contain;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row align-items-center min-vh-75 min-vh-md-100">
            <div class="col-md-7 col-lg-6 py-6 text-sm-start text-center">
              <h1 class="mt-6 mb-sm-4 display-2 fw-semi-bold lh-sm fs-4 fs-lg-6 fs-xxl-8">Find your job better <br class="d-block d-lg-none d-xl-block" />and faster</h1>
              <p class="mb-4 fs-1">Find your best job better and faster with Jobest</p>
              <div class="pt-3">
                <form>
                  <div class="input-group w-xl-75 w-xxl-50 d-flex flex-end-center">
                    <input class="form-control rounded-pill shadow-lg border-0" id="formGroupExampleInput" type="text" placeholder="Seacrh by skill, company and job" /><img class="input-box-icon me-2" src="{{asset('assets/frontend/img/illustrations/search.png')}}" width="30" alt="" />
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section class="py-5">
        <div class="bg-holder" style="background-image:url(assets/frontend/img/illustrations/bg.png);background-position:left top;background-size:initial;margin-top:-180px;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 order-md-0 text-center text-md-start"><img class="img-fluid mb-4" src="{{asset('assets/frontend/img/illustrations/passion.png')}}" width="450" alt="" /></div>
            <div class="col-md-5 text-center text-md-start">
              <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Find your passion and<br />achieve success</h6>
              <p class="my-4 pe-xl-8"> find a job that suits your interests and talents. A high salary is not the top priority. Most importantly,You can work according to your heart's desire.</p>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-0">

        <div class="container">


          <!-- ============================================-->
          <!-- <section> begin ============================-->
          <section class="py-8">

            <div class="container">
              <div class="row flex-center">
                <div class="col-md-5 order-md-1 text-center text-md-end"><img class="img-fluid mb-4" src="{{asset('assets/frontend/img/illustrations/jobs.png')}}" width="450" alt="" /></div>
                <div class="col-md-5 text-center text-md-start">
                  <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Million of jobs, finds <br> the one thats rights for you</h6>
                  <p class="my-4 pe-xl-8">Get your blood tests delivered at home collect a sample from the news your blood tests.</p>
                </div>
              </div>
            </div>
            <!-- end of .container-->

          </section>
          <!-- <section> close ============================-->
          <!-- ============================================-->


        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-5">
        <div class="bg-holder d-none d-sm-block" style="background-image:url"{{asset('assets/frontend/img/illustrations/category-bg.png);')}}background-position:right top;background-size:200px 320px;">
        </div>
        <!--/.bg-holder-->

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-9 col-lg-6 text-center mb-3">
              <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Browse jobs by category</h5>
              <p class="mb-5">Choose from the list of most popular categories</p>
            </div>
          </div>
          <div class="row flex-center h-100">
            <div class="col-10 col-xl-9">
              <div class="row">
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/finance.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Accounting</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/design.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Design/Creative</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/programmer.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Programmer</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/production.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Production</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/education.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Education</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-6 col-lg-4 pb-lg-6 px-lg-4 pb-4">
                  <div class="card py-4 shadow-sm h-100 hover-top">
                    <div class="text-center"> <img src="{{asset('assets/frontend/img/illustrations/consultancy.png')}}" height="120" alt="" />
                      <div class="card-body px-2">
                        <h6 class="fw-bold fs-1 heading-color">Consultancy</h6>
                        <p class="mb-0 card-text">100 open position</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="py-8">

        <div class="container">
          <div class="row flex-center">
            <div class="col-md-5 order-md-1 text-center text-md-end"><img class="img-fluid mb-4" src="{{asset('assets/frontend/img/illustrations/feature.png')}}" width="450" alt="" /></div>
            <div class="col-md-5 text-center text-md-start">
              <h6 class="fw-bold fs-2 fs-lg-3 display-3 lh-sm">Over 10,000 top <br> companies join with us</h6>
              <p class="my-4 pe-xl-8">Posting now includes out of the box integration with major CRM &amp;amp; accounting and ERP platforms, as well as an open API that allows you to seamlessly integrate with your business systems.</p>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <section class="py-0"><img class="w-100" src="{{asset('assets/frontend/img/illustrations/come-on-join.png')}}" alt="" />
        <div class="container">
          <div class="row align-items-center">
            <div class="col-12 text-center">
              <h6 class="fw-bold fs-3 fs-lg-5 lh-sm">Come on, join with us !</h6>
              <p>Create an account and refer your friend </p>
            </div>
          </div>
        </div>
      </section>
    <br>
@endsection
