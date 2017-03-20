<html>
<body>
<h1> About us </h1>
?>
<?php
foreach ($food as $value) {
    echo "$value <br>";
}
?>
@foreach($people as $person)
<li> {{ $person}} </li>
@endforeach
</body>
</html>