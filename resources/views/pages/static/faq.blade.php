@extends('layouts.app')

@section('content')
    <!-- Breadcrumbs -->
    <nav class = "m-3" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
            <li class="breadcrumb-item" aria-current="page">FAQ</li>
        </ol>
    </nav>

    <!-- Content -->
    <section class="QA-Container">
        <div class="QA-1">
            <!-- faq question -->
            <h1 class="question">What is an FAQ Page?</h1>
            <!-- faq answer -->
            <div class="answer">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                    necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                    aperiam.
                    Perspiciatis, porro!
                </p>
            </div>
        </div>
        
        <hr>
        
        <div class="QA-2">
            <!-- faq question -->
            <h1 class="question">Why do you need an FAQ page?</h1>
            <!-- faq answer -->
            <div class="answer">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                    necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                    aperiam.
                    Perspiciatis, porro!
                </p>
            </div>
        </div>

        <hr>
        
        <div class="QA-3">
            <!-- faq question -->
            <h1 class="question">Does it improves the user experience of a website?</h1>
            <!-- faq answer -->
            <div class="answer">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                    necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                    aperiam.
                    Perspiciatis, porro!
                </p>
            </div>
        </div>

        <div class="QA-4">
            <!-- faq question -->
            <h1 class="question">sit amet consectetur adipisicing elit. Velit s?</h1>
            <!-- faq answer -->
            <div class="answer">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Velit saepe sequi, illum facere
                    necessitatibus cum aliquam id illo omnis maxime, totam soluta voluptate amet ut sit ipsum
                    aperiam.
                    Perspiciatis, porro!
                </p>
            </div>
        </div>

    </section>
        
@endsection