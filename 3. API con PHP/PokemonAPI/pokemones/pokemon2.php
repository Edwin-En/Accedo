<?php
$pokemon = '2';

$api = curl_init("https://pokeapi.co/api/v2/pokemon/$pokemon");
curl_setopt($api, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($api);
curl_close($api);

$json = json_decode($response);

echo '<a href="/PokemonAPI/listapokemones.php"><h2>Ver mas Pokemones</h2></a>';

$name = $json->name;
#echo $name;

echo '<h2> Pokemon: </h2>', $name;

echo '<h3>HABILIDADES</h3>';
foreach($json->abilities as $k => $v) {
    echo $v->ability->name.'<br>';
}



echo '<h3>FOTOS</h3>';
echo '<img src="'.$json->sprites->back_default.'" width="200">';
echo '<img src="'.$json->sprites->front_default.'" width="200">';


?>
