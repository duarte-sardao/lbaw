@extends('layouts.app')

@section('content')
    <div class="aboutus-section">
        <h1>About Us Page</h1>
        <p>Some text about who we are and what we do.</p>
        <p>Resize the browser window to see that this page is responsive by the way.</p>
    </div>

    <h2 style="text-align:center">Our Team</h2>
    
    <div class="aboutus-row">
        <div class="aboutus-column">
            <div class="aboutus-card">
                <img src="default.jpg" alt="Carlos" style="width:100%">
                <div class="aboutus-container">
                    <h2>Carlos Veríssimo</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>up201907716@up.pt</p>
                    <p><button class="aboutus-button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="aboutus-column">
            <div class="aboutus-card">
                <img src="/w3images/team2.jpg" alt="Duarte" style="width:100%">
                <div class="aboutus-container">
                    <h2>Duarte Sardão</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201905497@up.pt</p>
                    <p><button class="aboutus-button">Contact</button></p>
                </div>
            </div>
        </div>
        
        <div class="aboutus-column">
            <div class="aboutus-card">
                <img src="/w3images/team3.jpg" alt="Nuno" style="width:100%">
                <div class="aboutus-container">
                    <h2>Nuno Jesus</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201905477@up.pt</p>
                    <p><button class="aboutus-button">Contact</button></p>
                    </div>
                </div>
            </div>

        <div class="aboutus-column">
            <div class="aboutus-card">
                <img src="/w3images/team3.jpg" alt="Tomás" style="width:100%">
                <div class="aboutus-container">
                    <h2>Tomás Torres</h2>
                    <p class="aboutus-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201800700@up.pt</p>
                    <p><button class="aboutus-button">Contact</button></p>
                </div>
            </div>
        </div>
    </div>

@endsection