<ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" data-bs-toggle="pill" href="#home">description</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#menu1">delivery</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-bs-toggle="pill" href="#menu2">warranty</a>
    </li>
</ul>

<!-- Tab panes -->
<div class="tab-content">
    <div id="home" class="tab-pane active"><br>
        {!! $product->description !!}
    </div>
    <div id="menu1" class="tab-pane fade"><br>
        <h3>Menu 1</h3>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
        </p>
    </div>
    <div id="menu2" class="tab-pane fade"><br>
        <h3>Menu 2</h3>
        <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem
            aperiam.</p>
    </div>
</div>
