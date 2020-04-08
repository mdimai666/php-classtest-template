<div class="jumbotron text-center" style="margin-bottom:0">
    <h1>API test page</h1>
    <p>integrations</p>
</div>

<!-- <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/list">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/test">Link</a>
            </li>
        </ul>
    </div>
</nav> -->

<div class="container" style="margin-top:30px">
    <div class="row">
        <div class="col-12 col-sm-3">
            <ul class="nav nav-pills flex-column">
                <li class="nav-item">
                    <a class="nav-link <?=IsActiveUrl('/')?'active':'' ?>" href="/">Index</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?=IsActiveUrl('/list')?'active':'' ?>" href="/list">List</a>
                </li>
                <li class="nav-item">
                <a class="nav-link <?=IsActiveUrl('/test')?'active':'' ?>" href="/test">Test</a>
                </li>
            </ul>
            <hr class="d-sm-none">
        </div>
        <div class="col-12 col-sm-9">
            <?php Content(); ?>
        </div>
    </div>
</div>

<!-- <div class="jumbotron text-center" style="margin-bottom:0">
    <p>Footer</p>
</div> -->