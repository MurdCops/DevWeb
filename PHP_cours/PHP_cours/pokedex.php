<?php
// Charger et décoder le fichier JSON
$jsonFile = 'pokemon.json';

if (!file_exists($jsonFile)) {
    die('<div style="color: red; padding: 20px; font-family: sans-serif; text-align: center;">Erreur : Le fichier <b>pokemon.json</b> est introuvable dans le dossier.</div>');
}

$jsonString = file_get_contents($jsonFile);
$allPokemon = json_decode($jsonString, true);

if (json_last_error() !== JSON_ERROR_NONE || !is_array($allPokemon)) {
    $allPokemon = [];
}

// Gestion de la Pagination
$itemsPerPage = isset($_GET['limit']) ? (int)$_GET['limit'] : 12;
$itemsPerPage = max(1, min($itemsPerPage, 60));

$totalItems = count($allPokemon);
$totalPages = $totalItems > 0 ? ceil($totalItems / $itemsPerPage) : 1;

$currentPage = isset($_GET['page']) ? (int)$_GET['page'] : 1;
if ($currentPage < 1) $currentPage = 1;
if ($currentPage > $totalPages) $currentPage = $totalPages;

$offset = ($currentPage - 1) * $itemsPerPage;
$pokemonsOnPage = array_slice($allPokemon, $offset, $itemsPerPage);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon Pokédex</title>
    <style>
        :root {
            --bg-gradient: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            --primary-red: #ff1c1c;
            --dark-charcoal: #2b2d42;
            --card-bg: #ffffff;
            --text-main: #2b2d42;
            --text-muted: #8d99ae;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
        }

        body {
            background: var(--bg-gradient);
            color: var(--text-main);
            min-height: 100vh;
            padding: 30px 20px;
        }

        header {
            text-align: center;
            margin-bottom: 35px;
        }

        header h1 {
            color: var(--primary-red);
            font-size: 2.8rem;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 8px;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.1);
        }

        header p {
            color: var(--text-muted);
            font-size: 1rem;
            font-weight: 600;
        }

        /* Barre de recherche et contrôles */
        .controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1200px;
            margin: 0 auto 30px auto;
            flex-wrap: wrap;
            gap: 15px;
            background: rgba(255, 255, 255, 0.8);
            padding: 15px 25px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.05);
            backdrop-filter: blur(5px);
        }

        .search-box input {
            padding: 12px 20px;
            border: 2px solid #e2e8f0;
            border-radius: 30px;
            width: 300px;
            font-size: 1rem;
            outline: none;
            transition: all 0.3s ease;
        }

        .search-box input:focus {
            border-color: var(--primary-red);
            box-shadow: 0 0 8px rgba(255, 28, 28, 0.2);
        }

        .limit-box select {
            padding: 10px 15px;
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            background: #fff;
            font-size: 1rem;
            outline: none;
            cursor: pointer;
        }

        /* GRILLE DES CARTES POKÉMON (Force l'affichage en colonnes/lignes) */
        .pokedex-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(240px, 1fr));
            gap: 25px;
            max-width: 1200px;
            margin: 0 auto;
        }

        .pokemon-card {
            background: var(--card-bg);
            border-radius: 20px;
            padding: 25px 20px;
            text-align: center;
            box-shadow: 0 10px 25px rgba(0,0,0,0.06);
            transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.8);
        }

        .pokemon-card::before {
            content: '';
            position: absolute;
            top: 0; left: 0; width: 100%; height: 6px;
            background: var(--primary-red);
            opacity: 0.8;
        }

        .pokemon-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
        }

        .pokemon-id {
            position: absolute;
            top: 15px;
            right: 18px;
            font-weight: 800;
            color: #cbd5e1;
            font-size: 1.1rem;
        }

        .pokemon-sprite-container {
            background: radial-gradient(circle, #f8fafc 60%, #f1f5f9 100%);
            border-radius: 50%;
            width: 130px;
            height: 130px;
            margin: 10px auto 15px auto;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: inset 0 2px 5px rgba(0,0,0,0.03);
        }

        .pokemon-sprite {
            width: 105px;
            height: 105px;
            object-fit: contain;
            transition: transform 0.3s ease;
        }

        .pokemon-card:hover .pokemon-sprite {
            transform: scale(1.1);
        }

        .pokemon-name {
            font-size: 1.35rem;
            font-weight: 700;
            margin-bottom: 5px;
            text-transform: capitalize;
            color: var(--dark-charcoal);
        }

        .pokemon-category {
            font-size: 0.85rem;
            color: var(--text-muted);
            margin-bottom: 12px;
            font-style: italic;
            min-height: 18px;
        }

        .types-container {
            display: flex;
            justify-content: center;
            gap: 8px;
            flex-wrap: wrap;
        }

        .type-badge {
            display: inline-flex;
            align-items: center;
            gap: 5px;
            background: #f1f5f9;
            color: #475569;
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.75rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .type-badge img {
            width: 14px;
            height: 14px;
        }

        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 8px;
            margin-top: 50px;
            flex-wrap: wrap;
        }

        .pagination a, .pagination span {
            padding: 10px 16px;
            border-radius: 12px;
            background: #fff;
            color: var(--text-main);
            text-decoration: none;
            box-shadow: 0 4px 10px rgba(0,0,0,0.04);
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.2s ease;
        }

        .pagination a:hover {
            background: var(--primary-red);
            color: #fff;
            transform: translateY(-2px);
        }

        .pagination .active {
            background: var(--dark-charcoal);
            color: #fff;
            box-shadow: 0 4px 12px rgba(43, 45, 66, 0.3);
        }

        /* Modal Détaillé des stats */
        .modal {
            display: none;
            position: fixed;
            top: 0; left: 0;
            width: 100%; height: 100%;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(4px);
            justify-content: center;
            align-items: center;
            z-index: 1000;
            padding: 20px;
        }

        .modal-content {
            background: #fff;
            border-radius: 25px;
            max-width: 480px;
            width: 100%;
            padding: 30px;
            position: relative;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
            animation: modalScaleUp 0.3s cubic-bezier(0.16, 1, 0.3, 1);
        }

        @keyframes modalScaleUp {
            from { transform: scale(0.85); opacity: 0; }
            to { transform: scale(1); opacity: 1; }
        }

        .close-btn {
            position: absolute;
            top: 20px;
            right: 25px;
            font-size: 1.8rem;
            cursor: pointer;
            color: #94a3b8;
            transition: color 0.2s;
        }

        .close-btn:hover { color: var(--primary-red); }

        .stat-bar-container {
            margin: 10px 0;
        }

        .stat-label {
            display: flex;
            justify-content: space-between;
            font-size: 0.85rem;
            font-weight: 700;
            color: #475569;
            margin-bottom: 4px;
            text-transform: uppercase;
        }

        .stat-bar {
            height: 10px;
            background: #f1f5f9;
            border-radius: 5px;
            overflow: hidden;
        }

        .stat-fill {
            height: 100%;
            background: linear-gradient(90deg, #ff1c1c, #ff6b6b);
            border-radius: 5px;
            width: 0%;
            transition: width 0.6s ease;
        }
    </style>
</head>
<body>

    <header>
        <h1>Pokédex</h1>
        <p>Affichage de <?= $totalItems > 0 ? $offset + 1 : 0 ?> à <?= min($offset + $itemsPerPage, $totalItems) ?> sur <?= $totalItems ?> Pokémon</p>
    </header>

    <div class="controls">
        <div class="search-box">
            <input type="text" id="searchInput" onkeyup="filterPokemons()" placeholder="Rechercher un Pokémon...">
        </div>
        <div class="limit-box">
            <label for="limitSelect" style="font-weight:600; font-size:0.9rem; color:#64748b;">Par page : </label>
            <select id="limitSelect" onchange="changeLimit(this.value)">
                <option value="12" <?= $itemsPerPage == 12 ? 'selected' : '' ?>>12</option>
                <option value="24" <?= $itemsPerPage == 24 ? 'selected' : '' ?>>24</option>
                <option value="36" <?= $itemsPerPage == 36 ? 'selected' : '' ?>>36</option>
                <option value="60" <?= $itemsPerPage == 60 ? 'selected' : '' ?>>60</option>
            </select>
        </div>
    </div>

    <!-- Grille des Cartes Pokémon -->
    <div class="pokedex-grid" id="pokedexGrid">
        <?php if ($totalItems > 0): ?>
            <?php foreach ($pokemonsOnPage as $index => $pokemon): ?>
                <?php 
                    // ID sécurisé
                    $pokeId = $pokemon['pokedex_id'] ?? $pokemon['id'] ?? ($offset + $index + 1);
                    $idFormatted = sprintf("#%03d", $pokeId);
                    
                    // Nom sécurisé
                    if (is_array($pokemon['name'] ?? null)) {
                        $nameFr = $pokemon['name']['fr'] ?? $pokemon['name']['en'] ?? 'Inconnu';
                    } else {
                        $nameFr = $pokemon['name'] ?? 'Inconnu';
                    }

                    // Image (Sprite) avec fallback automatique si absent du JSON
                    $sprite = '';
                    if (!empty($pokemon['sprites']['regular'])) {
                        $sprite = $pokemon['sprites']['regular'];
                    } elseif (!empty($pokemon['sprite'])) {
                        $sprite = $pokemon['sprite'];
                    } else {
                        $sprite = 'https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/' . $pokeId . '.png';
                    }

                    $category = $pokemon['category'] ?? '';
                    $types = $pokemon['types'] ?? [];
                    $jsonData = htmlspecialchars(json_encode($pokemon), ENT_QUOTES, 'UTF-8');
                ?>
                <div class="pokemon-card" onclick='openModal(<?= $jsonData ?>)'>
                    <span class="pokemon-id"><?= htmlspecialchars($idFormatted) ?></span>
                    <div class="pokemon-sprite-container">
                        <img src="<?= htmlspecialchars($sprite) ?>" alt="<?= htmlspecialchars($nameFr) ?>" class="pokemon-sprite" loading="lazy">
                    </div>
                    <h2 class="pokemon-name"><?= htmlspecialchars($nameFr) ?></h2>
                    <div class="pokemon-category"><?= htmlspecialchars($category) ?></div>
                    
                    <div class="types-container">
                        <?php foreach ($types as $type): ?>
                            <?php 
                                $typeName = is_array($type) ? ($type['name'] ?? '') : $type;
                                $typeImg = is_array($type) ? ($type['image'] ?? '') : '';
                            ?>
                            <span class="type-badge">
                                <?php if (!empty($typeImg)): ?>
                                    <img src="<?= htmlspecialchars($typeImg) ?>" alt="">
                                <?php endif; ?>
                                <?= htmlspecialchars($typeName) ?>
                            </span>
                        <?php endforeach; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="grid-column: 1 / -1; text-align: center; color: #64748b; font-size: 1.1rem; padding: 40px;">Aucun Pokémon trouvé dans le JSON.</p>
        <?php endif; ?>
    </div>

    <!-- Navigation de Pagination -->
    <?php if ($totalPages > 1): ?>
        <div class="pagination">
            <?php if ($currentPage > 1): ?>
                <a href="?page=<?= $currentPage - 1 ?>&limit=<?= $itemsPerPage ?>">&laquo; Précédent</a>
            <?php endif; ?>

            <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                <?php if ($i == $currentPage): ?>
                    <span class="active"><?= $i ?></span>
                <?php else: ?>
                    <a href="?page=<?= $i ?>&limit=<?= $itemsPerPage ?>"><?= $i ?></a>
                <?php endif; ?>
            <?php endfor; ?>

            <?php if ($currentPage < $totalPages): ?>
                <a href="?page=<?= $currentPage + 1 ?>&limit=<?= $itemsPerPage ?>">Suivant &raquo;</a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <!-- Modal d'Affichage des Statistiques -->
    <div class="modal" id="pokemonModal">
        <div class="modal-content">
            <span class="close-btn" onclick="closeModal()">&times;</span>
            <div style="text-align: center;">
                <div style="background: radial-gradient(circle, #f8fafc 60%, #f1f5f9 100%); border-radius: 50%; width: 140px; height: 140px; margin: 0 auto 10px auto; display: flex; align-items: center; justify-content: center;">
                    <img id="modalSprite" src="" alt="" style="width: 110px; height: 110px; object-fit: contain;">
                </div>
                <h2 id="modalName" style="margin-top: 10px; color: var(--dark-charcoal); text-transform: capitalize;"></h2>
                <p id="modalCategory" style="color: var(--text-muted); font-style: italic; font-size: 0.9rem;"></p>
                <p style="margin: 12px 0; color: #475569; font-size: 0.95rem;"><strong id="modalHeight"></strong> | <strong id="modalWeight"></strong></p>
            </div>
            
            <h3 style="margin-top: 20px; border-bottom: 2px solid #f1f5f9; padding-bottom: 8px; font-size: 1.1rem; color: var(--dark-charcoal);">Statistiques de Base</h3>
            <div id="statsContainer" style="margin-top: 15px;"></div>
        </div>
    </div>

    <script>
        function changeLimit(limit) {
            window.location.href = '?page=1&limit=' + limit;
        }

        function filterPokemons() {
            let input = document.getElementById('searchInput').value.toLowerCase();
            let cards = document.getElementsByClassName('pokemon-card');
            
            Array.from(cards).forEach(card => {
                let name = card.querySelector('.pokemon-name').innerText.toLowerCase();
                if (name.includes(input)) {
                    card.style.display = "";
                } else {
                    card.style.display = "none";
                }
            });
        }

        function openModal(pokemon) {
            let pokeId = pokemon.pokedex_id || pokemon.id || 1;
            let nameFr = typeof pokemon.name === 'object' ? (pokemon.name.fr || pokemon.name.en || 'Inconnu') : (pokemon.name || 'Inconnu');
            let sprite = (pokemon.sprites && pokemon.sprites.regular) ? pokemon.sprites.regular : (pokemon.sprite || `https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/${pokeId}.png`);

            document.getElementById('modalSprite').src = sprite;
            document.getElementById('modalName').innerText = `#${pokeId} - ${nameFr}`;
            document.getElementById('modalCategory').innerText = pokemon.category || '';
            document.getElementById('modalHeight').innerText = `Taille : ${pokemon.height || 'N/A'}`;
            document.getElementById('modalWeight').innerText = `Poids : ${pokemon.weight || 'N/A'}`;

            let statsContainer = document.getElementById('statsContainer');
            statsContainer.innerHTML = '';

            if (pokemon.stats) {
                const statLabels = {
                    hp: 'PV',
                    atk: 'Attaque',
                    def: 'Défense',
                    spe_atk: 'Atk. Spé.',
                    spe_def: 'Déf. Spé.',
                    vit: 'Vitesse'
                };

                const maxStat = 180;

                for (const [key, value] of Object.entries(pokemon.stats)) {
                    let label = statLabels[key] || key;
                    let percentage = Math.min(100, (value / maxStat) * 100);
                    
                    statsContainer.innerHTML += `
                        <div class="stat-bar-container">
                            <div class="stat-label">
                                <span>${label}</span>
                                <span>${value}</span>
                            </div>
                            <div class="stat-bar">
                                <div class="stat-fill" style="width: ${percentage}%"></div>
                            </div>
                        </div>
                    `;
                }
            } else {
                statsContainer.innerHTML = '<p style="color: #888; text-align: center; padding: 15px;">Aucune statistique disponible.</p>';
            }

            document.getElementById('pokemonModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('pokemonModal').style.display = 'none';
        }

        window.onclick = function(event) {
            let modal = document.getElementById('pokemonModal');
            if (event.target == modal) {
                closeModal();
            }
        }
    </script>
</body>
</html>
