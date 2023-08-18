<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <title> @yield('title') | {{config('app.name')}}</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
        <meta content="Themesbrand" name="author" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="{{ URL::asset('assets/images/favicon.ico')}}">
        @include('layouts.head')
        <style>
            @media (min-width: 1025px) {
                .h-custom {
                    height: 100vh !important;
                }
            }

            .horizontal-timeline .items {
                border-top: 2px solid #ddd;
            }

            .horizontal-timeline .items .items-list {
                position: relative;
                margin-right: 0;
            }

            .horizontal-timeline .items .items-list:before {
                content: "";
                position: absolute;
                height: 8px;
                width: 8px;
                border-radius: 50%;
                background-color: #ddd;
                top: 0;
                margin-top: -5px;
            }

            .horizontal-timeline .items .items-list {
                padding-top: 15px;
            }
        </style>
    </head>
    <body>
        <section class="h-100 h-custom" style="background-color: #eee;">
            <div class="container py-5 h-100">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-8 col-xl-6">
                  <div class="card border-top border-bottom border-3" style="border-color: #f37a27 !important;">
                    <div class="card-body p-5">
          
                      <p class="lead fw-bold mb-5" style="color: #f37a27;">Subscription Detail</p>
                      <div class="row">
                        <div class="col mb-3">
                          <p class="small text-muted mb-1">Date</p>
                          <p>{{ $date }}</p>
                        </div>
                        <div class="col mb-3">
                          <p class="small text-muted mb-1">Subscription Plan</p>
                          <p>{{ Arr::get($tenant, 'subscription.subscription_name') }}</p>
                        </div>
                      </div>
                      
                      <div class="row">
                        <div class="col mb-3">
                          <p class="small text-muted mb-1">Subscription Detail</p>
                          <p>{{ Arr::get($tenant, 'subscription.subscription_description') }}</p>
                        </div>
                        <div class="col mb-3">
                          <p class="small text-muted mb-1">Subscription Max Price Per Year</p>
                          <p>RM {{ Arr::get($tenant, 'subscription.subscription_maximum_charge_per_year') }}</p>
                        </div>
                      </div>
          
                      <div class="mx-n5 px-5 py-4" style="background-color: #f2f2f2;">
                        <div class="row">
                          <div class="col-md-8 col-lg-9">
                            <p class="mb-0">Every First Month Price
                              <span class="small text-muted mb-1">- Recurring starting month</span>
                            </p>
                          </div>
                          <div class="col-md-4 col-lg-3">
                            <p class="mb-0">RM {{ Arr::get($tenant, 'subscription.subscription_price') }}</p>
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-8 col-lg-9">
                            <p class="">Price Per Kg
                              <span class="small text-muted mb-1">- Recurring end of month</span>
                            </p>
                          </div>
                          <div class="col-md-4 col-lg-3">
                            <p class="">RM {{ Arr::get($tenant, 'subscription.subscription_charge_per_kg') }}</p>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-md-12">
                            <p class="mb-0">Additional Price Per Feature
                              <span class="small text-muted mb-1">- Recurring end of month based on usage</span>
                            </p>
                          </div>
                        </div>

                        @foreach (Arr::get($tenant, 'subscription.feature') as $feature)
                          <div class="row">
                            <div class="col-md-8 col-lg-9">
                              <p class="mb-0">{{ Arr::get($feature, 'feature_title') }}</p>
                            </div>
                            <div class="col-md-4 col-lg-3">
                              <p class="mb-0">RM {{ Arr::get($feature, 'feature_extra_charge') }}</p>
                            </div>
                          </div>
                        @endforeach
                      </div>

                      <div class="row my-4">
                        <div class="col-md-8 col-lg-9">
                          <p class="lead fw-bold mb-0" style="color: #f37a27;">RM {{ Arr::get($tenant, 'subscription.subscription_price') }}</p>
                        </div>
                        <div class="col-md-4 col-lg-3">
                          <a href="{{ route('subscription.pay.order', ['tenant_company_id' => Crypt::encryptString($tenant->id)]) }}" class="btn pay-button" style="background-color: #f37a27; color:white">Pay Now</a>
                        </div>
                      </div>
          
          
                      <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #f37a27;">Please contact
                          us</a></p>
          
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
      @include('layouts.footer-script')

    </body>
    <script>
      $(document).ready(function () {
        $('.pay-button').on('click', function(e) {
          e.preventDefault();

          Swal.showLoading()
          let tenant_id = "{{ Arr::get($tenant, 'id') }}";
          $.ajax({
              type: "POST",
              url: "{{ route('subscription.pay.order') }}",
              data: {
                _token: "{{ csrf_token() }}",
                tenant_id: tenant_id
              },
              dataType: "json",
              encode: true,
              success: function(data){  
                  if (data.status == 200) {
                      Swal.fire({
                          type: 'success',
                          title: 'Success!',
                          text: data.message,
                      }).then((result) => {
                      });
                      

                  } else {
                      Swal.fire({
                          type: 'error',
                          title: 'Error!',
                          text: data.message
                      })
                  }
              },
              error: function(error) { 
                  Swal.fire({
                      type: 'error',
                      title: 'Something went wrong!',
                      text: 'Please try again later!',
                  })
              }
          })
        })
      })
    </script>
</html>