@extends('layouts.app')

@section('content')
    <div class="aboutus-section">
        <h1>About Us</h1>
    </div>
    
    <div class="aboutus-row">
        @include('partials.static.about_card', [
        'name' => 'Carlos Veríssimo', 
        'text' => 'Some text that describes me.', 
        'email' => 'up201907716@up.pt'
        ])

        @include('partials.static.about_card', [
            'name' => 'Duarte Sardão', 
            'text' => 'Some text that describes me.', 
            'email' => 'up201905497@up.pt'
            ])

        @include('partials.static.about_card', [
            'name' => 'Nuno Jesus', 
            'text' => 'Some text that describes me.', 
            'email' => 'up201905477@up.pt'
            ])

        @include('partials.static.about_card', [
            'name' => 'Tomás Torres', 
            'text' => 'Some text that describes me.', 
            'email' => 'up201800700@up.pt'
            ])
    </div>

@endsection