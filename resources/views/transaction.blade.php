@extends('layouts.app')

@section('script')
<link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<script src="{{ asset('js/admin/transaction.js') }}"></script>

@endsection

@section('content')
<div class="container">
    <h1>transactions</h1>
</div>
<div id="dishTableContainer" class="container">

</div>
@endsection
