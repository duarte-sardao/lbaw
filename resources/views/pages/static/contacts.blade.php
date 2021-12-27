@extends('layouts.app')

@section('content')

<main>
    <div class="contacts-row">
        <div class="contacts-column">
            <div class="contacts-card">
                <img src="default.jpg" alt="Carlos" style="width:100%">
                <div class="contacts-container">
                    <h2>Carlos Veríssimo</h2>
                    <p class="contacts-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p>up201907716@up.pt</p>
                    <p><button class="contacts-button">Contact</button></p>
                </div>
            </div>
        </div>

        <div class="contacts-column">
            <div class="contacts-card">
                <img src="/w3images/team2.jpg" alt="Duarte" style="width:100%">
                <div class="contacts-container">
                    <h2>Duarte Sardão</h2>
                    <p class="contacts-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201905497@up.pt</p>
                    <p><button class="contacts-button">Contact</button></p>
                </div>
            </div>
        </div>
        
        <div class="contacts-column">
            <div class="contacts-card">
                <img src="/w3images/team3.jpg" alt="Nuno" style="width:100%">
                <div class="contacts-container">
                    <h2>Nuno Jesus</h2>
                    <p class="contacts-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201905477@up.pt</p>
                    <p><button class="contacts-button">Contact</button></p>
                    </div>
                </div>
            </div>

        <div class="contacts-column">
            <div class="contacts-card">
                <img src="/w3images/team3.jpg" alt="Tomás" style="width:100%">
                <div class="contacts-container">
                    <h2>Tomás Torres</h2>
                    <p class="contacts-title">Developper</p>
                    <p>Some text that describes me lorem ipsum ipsum lorem.</p>
                    <p> up201800700@up.pt</p>
                    <p><button class="contacts-button">Contact</button></p>
                </div>
            </div>
        </div>

    </div>
</main>

@endsection