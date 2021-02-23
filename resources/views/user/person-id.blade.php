@inject('personnel_repository', 'App\Http\Controllers\Repositories\PersonnelRepository')
@extends('user.templates.app')
@section('page-title', 'Your I.D')
@prepend('page-css')
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
<style>
    #base-image {
    }
    .base {
        background : url('/storage/id_template/plain_blank_2.png') center center;
        background-repeat: no-repeat;
        width: auto;
    }

    .border-color {
        border-color: #5F23D1;
    }

    .person_name {
        font-family: 'Poppins', sans-serif;
    }
</style>
@endprepend
@section('content')
 <!-- BEGIN: Content -->
 <div class="flex h-screen base ">
  <div class="m-auto">
        <img id="qr-image" class="img-fit mt-40 mx-auto rounded border-4 border-color shadow p-2 bg-white" src="{{ asset('/storage/images/test-qr.png') }}">

        <img id="person_image" class="w-40 h-40 mx-auto mt-5 img-fit mx-auto rounded border-4 border-color border-white border-2 shadow p-2 bg-white" src="{{ asset('/storage/images/' . $person->image) }}">

        <p class="person_name text-lg font-bold tracking-wide mx-auto mt-5 text-white">{{ $person->firstname }} {{ $person->middlename[0] }}. {{ $person->lastname }} {{ $person->suffix }}</p>
    </div>
</div>
<!-- END: Content -->
@endsection