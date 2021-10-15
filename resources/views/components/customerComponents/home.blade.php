@extends('layouts.app')

@section('script')
    <script src="{{ asset('js/customer/customer.js') }}"></script>
@endsection

<style>
    .myBorder {
        border: 2px solid red;
    }

    #test {

        background: url('{{ URL::asset('/img/welcome_page/welcomecoverphoto.png') }}') no-repeat center center fixed;
        /* background: url('https://source.unsplash.com/twukN12EN7c/1920x1080') no-repeat center center fixed; */
        -webkit-background-size: cover;
        -moz-background-size: cover;
        background-size: cover;
        -o-background-size: cover;
    }

</style>

@section('content')
<div id="test" class="">
    <div class="row justify-content-center p-5 m-0">
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
                            <div class="form-group col-12 col-md-6">
                                <label for="start" class="col-md-5 col-form-label">Check In</label>
                                <input id="start" type="date" class="m-0 form-control" name="start"
                                    placeholder="dd/mm/yy">

                                <span class="invalid-feedback fw-bold error-text start_error"></span>
                            </div>
                            <div class="form-group col-12 col-md-6">
                                <label for="end" class="col-md-5 col-form-label">Check Out</label>
                                <input id="end" type="date" class="m-0 form-control" name="end" placeholder="dd/mm/yy">

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
                                <a href="#" class="col-md-12" data-bs-toggle="collapse"
                                    data-bs-target="#roomsContainer" data-bs-parent="#menu" aria-expanded="true">
                                    <label for="description" class="col-md-5 col-form-label text-white">Select
                                        Rooms</label>
                                    <i class="bi bi-house-fill"></i>
                                    <span class="glyphicon glyphicon-envelope pull-right"></span>
                                </a>
                                <div id="roomsContainer" class="sublinks collapse show">
                                    <a href="#" class="list-group-item small"><span
                                            class="glyphicon glyphicon-chevron-right"></span>
                                        inbox</a>
                                    <a class="list-group-item small "><span
                                            class="glyphicon glyphicon-chevron-right"></span> sent</a>
                                </div>

                                <a href="#" class="col-md-12" data-bs-toggle="collapse"
                                    data-bs-target="#sl" data-bs-parent="#menu">
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

{{-- <div class="bg-image" style="background-image: url('https://mdbootstrap.com/img/new/standard/city/041.jpg'); height: 400px;">
    </div> --}}
{{-- <div class="border border-primary rounded-2 border-3 row">
        <div class="col-md-7">
            <div class="myBorder">
                <h1>booking details</h1>
            </div>
            <div class="myBorder">
                <h1>Extra information</h1>
            </div>
        </div>
        <div class="col-md-5">
            <div class="myBorder ">
                <h1>Items Container</h1>
            </div>
        </div>
    </div> --}}
{{-- <div>
        <div class="list-group" id="myTab" role="tablist">
            <a class="list-group-item list-group-item-action active" data-bs-toggle="list" href="#home"
                role="tab">Home</a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#profile"
                role="tab">Profile</a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#messages"
                role="tab">Messages</a>
            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#settings"
                role="tab">Settings</a>
        </div>

        <div class="tab-content">
            <div class="tab-pane active" id="home" role="tabpanel">...</div>
            <div class="tab-pane" id="profile" role="tabpanel">...</div>
            <div class="tab-pane" id="messages" role="tabpanel">...</div>
            <div class="tab-pane" id="settings" role="tabpanel">...</div>
        </div>

        <script>
            var firstTabEl = document.querySelector('#myTab a:last-child')
            var firstTab = new bootstrap.Tab(firstTabEl)

            firstTab.show()

        </script>
    </div> --}}
{{-- <div id="menu">
        <div class="panel list-group">
            <a href="#" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#roomsConateiner"
                data-bs-parent="#menu">Select Rooms
                <i class="bi bi-house-fill"></i>
                <span class="glyphicon glyphicon-envelope pull-right"></span></a>
            <div id="roomsConateiner" class="sublinks collapse">
                <a href="#" class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span>
                    inbox</a>
                <a class="list-group-item small "><span class="glyphicon glyphicon-chevron-right"></span> sent</a>
            </div>
            <a href="#" class="list-group-item" data-bs-toggle="collapse" data-bs-target="#sl"
                data-bs-parent="#menu">TASKS <span class="glyphicon glyphicon-tag pull-right"></span></a>
            <div id="sl" class="sublinks collapse">
                <a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> saved tasks</a>
                <a class="list-group-item small"><span class="glyphicon glyphicon-chevron-right"></span> add new
                    task</a>
            </div>
        </div>
    </div> --}}
@endsection
