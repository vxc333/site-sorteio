<!DOCTYPE html>
<html>
<head>
  <title>Sorteio de Times - Resultado</title>
</head>
<body>
  <h1>Resultado do Sorteio</h1>

  <?php
  $numTeams = $_POST['num-teams'];
  $playersPerTeam = $_POST['players-per-team'];
  $playerNames = $_POST['player-names'];

  // Convertendo os nomes dos jogadores em um array
  $names = explode("\n", $playerNames);

  // Removendo linhas em branco e espaços em excesso
  $names = array_map('trim', $names);
  $names = array_filter($names);

  // Verificando se há nomes suficientes para o sorteio
  if (count($names) < $numTeams * $playersPerTeam) {
    echo '<p>Não há nomes suficientes para realizar o sorteio.</p>';
  } else {
    // Embaralhando os nomes
    shuffle($names);

    // Realizando o sorteio e exibindo os times
    for ($i = 0; $i < $numTeams; $i++) {
      echo '<h3>Time ' . ($i + 1) . '</h3>';
      echo '<ul>';
      for ($j = 0; $j < $playersPerTeam; $j++) {
        $playerIndex = $i * $playersPerTeam + $j;
        echo '<li>' . $names[$playerIndex] . '</li>';
      }
      echo '</ul>';
    }
  }
  ?>
</body>
</html>
