<div class="container text-center">
    <h1>404</h1>
    <p>Page not found</p>
</div>

<?php
$z = $_SERVER;
unset($z['PATH']);
__dump($z);