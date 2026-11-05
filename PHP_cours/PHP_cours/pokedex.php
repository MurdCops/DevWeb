<?php
// Charger le fichier JSON
$jsonFile = 'pokemon.json';
if (!file_exists($jsonFile)) {
    die("Erreur : Le fichier pokemon.json est introuvable.");
}

$pokemons = json_decode(file_get_contents($jsonFile), true);
if (!is_array($pokemons)) {
    $pokemons = [];
}

// Configuration de la pagination (12 Pokémon par page)
$parPage = 12;
$total = count($pokemons);
$nbPages = ceil($total / $parPage);

$pageActuelle = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($pageActuelle < 1) $pageActuelle = 1;
if ($pageActuelle > $nbPages) $pageActuelle = $nbPages;

$debut = ($pageActuelle - 1) * $parPage;
$pokemonsAffiches = array_slice($pokemons, $debut, $parPage);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon Pokédex Simple</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            text-align: center;
            margin: 0;
            padding: 20px;
        }
        h1 {
            color: #e3350d;
        }
        .grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
            max-width: 1000px;
            margin: 0 auto;
        }
        .card {
            background: white;
            border-radius: 10px;
            padding: 15px;
            width: 200px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            text-align: center;
        }
        .card img {
            width: 100px;
            height: 100px;
            object-fit: contain;
        }
        .card h3 {
            font-size: 1.1rem;
            margin: 10px 0 5px 0;
            text-transform: capitalize;
        }
        .stats {
            font-size: 0.85rem;
            color: #555;
            background: #f1f1f1;
            padding: 8px;
            border-radius: 5px;
            margin-top: 10px;
            text-align: left;
        }
        .pagination {
            margin: 30px 0;
        }
        .pagination a, .pagination span {
            padding: 8px 14px;
            margin: 0 4px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-weight: bold;
        }
        .pagination span {
            background: #333;
        }
    </style>
</head>
<body>

    <h1>Mon Pokédex</h1>
    <p>Page <?= $pageActuelle ?> sur <?= $nbPages ?></p>

    <!-- Grille des Pokémon -->
    <div class="grid">
        <?php foreach ($pokemonsAffiches as $index => $p): ?>
            <?php 
                // Récupération propre des données
                $id = $p['pokedex_id'] ?? $p['id'] ?? ($debut + $index + 1);
                $nom = is_array($p['name'] ?? null) ? ($p['name']['fr'] ?? 'Inconnu') : ($p['name'] ?? 'Inconnu');
                $img = $p['sprites']['regular'] ?? "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/{$id}.png";
                
                $hp = $p['stats']['hp'] ?? '?';
                $atk = $p['stats']['atk'] ?? '?';
                $def = $p['stats']['def'] ?? '?';
            ?>
            <div class="card">
                <img src="<?= htmlspecialchars($img) ?>" alt="<?= htmlspecialchars($nom) ?>">
                <h3>#<?= $id ?> - <?= htmlspecialchars($nom) ?></h3>
                
                <div class="stats">
                    <strong>Stats :</strong><br>
                    PV : <?= $hp ?><br>
                    Atk : <?= $atk ?><br>
                    Déf : <?= $def ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <!-- Boutons de Pagination -->
    <div class="pagination">
        <?php if ($pageActuelle > 1): ?>
            <a href="?page=<?= $pageActuelle - 1 ?>">&laquo; Précédent</a>
        <?php endif; ?>

        <span><?= $pageActuelle ?> / <?= $nbPages ?></span>

        <?php if ($pageActuelle < $nbPages): ?>
            <a href="?page=<?= $pageActuelle + 1 ?>">Suivant &raquo;</a>
        <?php endif; ?>
    </div>

</body>
</html>