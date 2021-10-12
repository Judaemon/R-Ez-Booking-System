@extends('layouts.app')

@section('script')


{{-- <link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.9.0/main.min.js"></script> --}}

<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
    integrity="sha512-mSYUmp1HYZDFaVKK//63EcZq4iFWFjxSL+Z3T/aCt4IO9Cejm03q3NKKYN6pFQzY0SBOr8h+eCIAZHPXcpZaNw=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
    integrity="sha512-T/tUfKSV1bihCnd+MxKD0Hm1uBBroVYBOYSk1knyvQ9VyZJpc/ALb4P0r6ubwVPSGB2GvjeoMAJJImBG12TiaQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(function () {
        // $('#datepicker').datepicker();

        var nowDate = new Date();
        var today = new Date(nowDate.getFullYear(), nowDate.getMonth(),
            nowDate.getDate(), 0, 0, 0, 0);

        $('.input-daterange input').each(function () {
            $(this).datepicker({
                todayHighlight: true,
                // startDate: '12-12-2012',
                startDate: today,
                beforeShowDay: unavailable,
            });
        });
    })

    var unavailableDates = ["13-10-2021","14-8-2015"];

function unavailable(date) {
    
  dmy = date.getFullYear() + "-" + (date.getMonth()+1) + "-" +date.getDate();
  var qwe = ["13-10-2021","14-8-2015"];
    if ($.inArray(qwe, unavailableDates) < 0) {
        return [true,"","Book Now"];
    } else {
        return [false,"","Booked Out"];
    }
}

    // // var disabledDates = ["2021-10-12", "2021-10-13", "2021-10-15"]
    // var disabledDates = ["23-10-2021", "2021-10-13", "2021-10-15"]

    // function unavailable(date) {
    // // dmy = date.getFullYear() + "-" + (date.getMonth()+1) + "-" +date.getDate();
    // dmy = date.getDate() + "-" + (date.getMonth()+1) + "-" +date.getFullYear();
    // if ($.inArray(dmy, disabledDates) < 0) {
    //     return [true,"","Book Now"];
    // } else {
    //     return [false,"","Booked Out"];
    // }

</script>
@endsection

@section('content')

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Room</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <img src="{{ URL::asset('img\welcome_page\hut.jpg'); }}" alt=""
                            style="width: 100%; border-radius: 5%;">
                    </div>
                    <div class="col-md-8">
                        <div class="row">
                            <p>Description</p>
                            <p>Details</p>
                        </div>
                        <div class="row">
                            <div class="input-group input-daterange">
                                <input type="text" class="form-control">
                                <div class="input-group-addon mx-2">to</div>
                                <input type="text" class="form-control">
                            </div>
                            {{-- <div class="input-group date" id="datepicker">
                                <input type="text" class="form-control">
                                <span class="input-group-text bg-white">

                                </span>
                            </div>
                            <input class="date" type="date"> --}}
                            {{-- <div class="input-append date" id="dp3" data-date="12-02-2012" data-date-format="dd-mm-yyyy"> 
                                <input class="span2" size="16" type="text" value="12-02-2012"> 
                                    <span class="add-on"><i class="icon-th"></i></span>
                              </div> --}}
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Rent</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <h1>Rent</h1>
    <div class="row">
        <div class="col-md-8">

            <button type="button" class="btn btn-secondary" style="width: 6rem">Rooms</button>
            <button type="button" class="btn btn-secondary" style="width: 6rem">Rentals</button>
            <button type="button" class="btn btn-secondary" style="width: 6rem">Other</button>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\kubo_fan_room\kubo1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Kubo Fan Room</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\superior_room\superior1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Superior Room</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
              
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\villa_room\villa1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Villa</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>

            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\couple_bhut\couple1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Couple Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\regular_bhut\regular1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Regular Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            <div style="margin-top: 1rem">

              <div style="margin-top: 1rem; margin-bottom: 1rem">
                  <div style="border-bottom: 1px solid gray;"></div>
              </div>
              <div data-bs-toggle="modal" data-bs-target="#exampleModal" style="cursor: pointer;">
                  <div class="row">
                      <div class="col-md-3">
                          <img src="{{ URL::asset('img\barkada_bhut\barkada1.jpg'); }}" alt="" style="width: 100%; border-radius: 10%;">
                      </div>
                      <div class="col-md-9">
                          <p>Barkada Beach Hut</p>
                          <p>Description</p>
                      </div>
                  </div>
              </div>
            
            </div>
            
        </div>
        
        <div class="col-md-4">
            <div class="card mb-3">

                <h3 class="card-header">Summary</h3>
                <div class="card-body">

                </div>

            </div>
        </div>
    </div>
    @endsection
