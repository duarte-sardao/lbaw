@extends('layouts.app')

@section('content')
    <div class="aboutus-section">
        <h1>About Us Page</h1>
    </div>

    
    <div class="aboutus-row">
        <div class="aboutus-column">
            <div class="aboutus-card">
                <img id= "developperPhoto" src="images/default.jpg" alt="Carlos">
                <div class="aboutus-container">
                    <h2>Carlos Veríssimo</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me.</p>
                    <p>up201907716@up.pt</p>
                    <button class = "btn btn-outline-primary w-50 m-2">
                        <a class="w-50 m-2" href="mailto:up201907716@up.pt"> Contact me! </a>
                    </button>
                </div>
            </div>
        </div>

        <div class="aboutus-column">
            <div class="aboutus-card">
                <img id= "developperPhoto" src="images/default.jpg" alt="Duarte">
                <div class="aboutus-container">
                    <h2>Duarte Sardão</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me.</p>
                    <p> up201905497@up.pt</p>
                    <button class = "btn btn-outline-primary w-50 m-2">
                        <a class="w-50 m-2" href="mailto:up201905497@up.pt"> Contact me! </a>
                    </button>
                </div>
            </div>
        </div>
        
        <div class="aboutus-column">
            <div class="aboutus-card">
                <img id= "developperPhoto" src="images/default.jpg" alt="Nuno">
                <div class="aboutus-container">
                    <h2>Nuno Jesus</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me.</p>
                    <p>up201905477@up.pt</p>
                    <button class = "btn btn-outline-primary w-50 m-2">
                        <a class="w-50 m-2" href="mailto:up201905477@up.pt"> Contact me! </a>
                    </button>
                </div>
            </div>
        </div>

        <div class="aboutus-column">
            <div class="aboutus-card">
                <img id= "developperPhoto" src="images/default.jpg" alt="Tomás">
                <div class="aboutus-container">
                    <h2>Tomás Torres</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me.</p>
                    <p>up201800700@up.pt</p>
                    <button class = "btn btn-outline-primary w-50 m-2">
                        <a class="w-50 m-2" href="mailto:up201800700@up.pt"> Contact me! </a>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection