@extends('dashboard.template.template')

@section('title', 'Home - Naeva School')

@section('carousel')
    <div id="carouselDekstop" class="carousel slide d-none d-lg-block" data-bs-ride="carousel">
        <!-- Carousel content here -->
    </div>
@endsection

@section('content')
    <div class="row py-3">
        <div class="col-lg-7 mb-4">
            <h1>SD IT Naevaweb School</h1>
            <p>Lorem ipsum dolor sit amet...</p>
        </div>
        <div class="col-lg-5 mb-4">
            <img src="https://naevaschool.naevaweb.my.id/userfiles/uploads/bg-edukasi-246.jpg" class="d-block w-100 rounded" alt="...">
        </div>
    </div>
@endsection
