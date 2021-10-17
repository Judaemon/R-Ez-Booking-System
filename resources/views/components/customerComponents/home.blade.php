@extends('layouts.app')

@section('script')
<script src="{{ asset('js/transaction.js') }}"></script>

{{-- <link rel="stylesheet"
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
            console.log("asd");
            $(this).datepicker({
                format: 'yyyy-mm-dd',
                todayHighlight: true,
                startDate: today,
                // beforeShowDay: unavailable,
            });
        });
    })

</script> --}}
@endsection

<style>
    #test {
        background: url('{{ URL::asset('/img/welcome_page/welcomecoverphoto.png') }}') no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

</style>

@section('content')
<div id="test" class="">
    <div class="row justify-content-center p-2 p-md-5 m-0">
        <div class="border border-white rounded-2 border-3 row bg-primary mx-2 w-100 ">
            <form class="text-white">
                <div class="row">
                    <div class="col-12 col-md-7">
                        <div class="form-group col-12">
                            <label for="title" class="col-md-5 col-form-label">Title</label>
                            <input id="title" type="text" class="m-0 form-control" name="title" autocomplete="title"
                                placeholder="Title..." autofocus>

                            <span class="invalid-feedback fw-bold error-text title_error"></span>
                        </div>

                        <div class="row">
                            <div class="form-group col-12 col-md-6 ">
                                <label for="start" class="col-md-5 col-form-label">Check In</label>
                                <input id="start" type="date" min class="m-0 form-control" name="start"
                                    placeholder="yyyy/mm/dd">

                                <span class="invalid-feedback fw-bold error-text start_error"></span>
                            </div>
                            <div class="form-group col-12 col-md-6 ">
                                <label for="end" class="col-md-5 col-form-label">Check Out</label>
                                <input id="end" type="date" min="2021-10-17" class="m-0 form-control" name="end"
                                    placeholder="yyyy/mm/dd">

                                <span class="invalid-feedback fw-bold error-text end_error"></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-12 col-md-6">
                                <label for="adult" class="col-md-5 col-form-label">Adult (18+)</label>
                                <input id="adult" type="number" class="m-0 form-control" name="adult" placeholder="1"
                                    value="1">

                                <span class="invalid-feedback fw-bold error-text adult_error"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="children" class="col-md-5 col-form-label">Children (0-17)</label>
                                <input id="children" type="text" class="m-0 form-control" name="children"
                                    placeholder="0" value="0">

                                <span class="invalid-feedback fw-bold error-text children_error"></span>
                            </div>
                        </div>
                        <div class="form-group col-12">
                            <label for="description" class="col-md-5 col-form-label">Description</label>
                            <textarea id="description" placeholder="Description (max 250 word)" class="m-0 form-control"
                                style="height: 120px" maxlength="250" name="description"></textarea>

                            <span class="invalid-feedback fw-bold error-text description_error"></span>
                        </div>
                    </div>

                    <div class="col-12 col-md-5">
                        <div id="menu">
                            <div class="panel list-group">
                                <a href="#" class="col-md-12" data-bs-toggle="collapse" data-bs-target="#roomsContainer"
                                    data-bs-parent="#menu" aria-expanded="true">
                                    <label for="description" class="col-md-5 col-form-label text-white">Select
                                        Rooms</label>
                                    <i class="bi bi-house-fill"></i>
                                    <span class="glyphicon glyphicon-envelope pull-right"></span>
                                </a>
                                <div id="roomsContainer" class="sublinks collapse show">
                                    {{-- <div class="bg-light text-black p-2 row">
                                        <div class="col-12 col-md-9" data-bs-toggle="modal" data-bs-target="#viewRoomInfoModal">
                                            Room type (min to max people)
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <button class="btn btn-primary selectRoomBtn h-100">Book</button> 
                                        </div>
                                    </div>
                                    <div class="modal fade " id="viewRoomInfoModal" tabindex="-1" aria-labelledby="viewRoomInfoModal" aria-hidden="true">
                                        <div class="modal-dialog modal-xl modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="viewRoomInfoModal">Room Information</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body row text-black">
                                                    <div class="col-12 col-md-4">
                                                        <img class="w-75" src="{{ URL::asset('img\superior_room\superior1.jpg'); }}" alt="">
                                                    </div>
                                                    <div class="col-12 col-md-8">
                                                        <h3>name</h3>
                                                        <p class="my-4">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ut, corrupti dignissimos. Enim, cupiditate earum quas dolores, obcaecati inventore, odit cum doloribus atque quaerat ut exercitationem eum accusantium autem veritatis harum.</p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="col-12 col-md-6">capacity</div>
                                                            <div class="col-12 col-md-6 text-right">price</div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <a href="#" class="col-md-12" data-bs-toggle="collapse" data-bs-target="#sl"
                                    data-bs-parent="#menu">
                                    <label for="description" class="col-md-5 col-form-label text-white">Select
                                        Rentals</label>
                                    <i class="bi bi-house-fill"></i>
                                    <span class="glyphicon glyphicon-envelope pull-right"></span>
                                </a>
                                <div id="sl" class="sublinks collapse">
                                    <a class="list-group-item small"><span
                                            class="glyphicon glyphicon-chevron-right"></span> saved tasks</a>
                                    <a class="list-group-item small"><span
                                            class="glyphicon glyphicon-chevron-right"></span> add new
                                        task</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
