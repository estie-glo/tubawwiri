<?php
$resourcesDir = __DIR__ . '/app/Filament/Resources';
$docDir = __DIR__ . '/doc';

$files = glob("$resourcesDir/*Resource.php");

foreach ($files as $file) {
    $content = file_get_contents($file);
    // Get class name
    preg_match('/class\s+(\w+Resource)\s/', $content, $matches);
    $className = $matches[1] ?? 'UnknownResource';
    $resourceName = str_replace('Resource', '', $className);
    
    // Try to get label
    $resourceLabel = $resourceName;
    if (preg_match('/public\s+static\s+function\s+label\(\)\s*:\s*string\s*\{(.*?)\}/s', $content, $m)) {
        $labelBody = trim($m[1]);
        if (preg_match('/return\s+[\'"]([^\'"]+)[\'"]/', $labelBody, $ml)) {
            $resourceLabel = $ml[1];
        }
    }
    
    // Get navigation icon
    $icon = '';
    if (preg_match('/protected\s+static\s+\$navigationIcon\s*=\s*[\'"]([^\'"]+)[\'"];/', $content, $m)) {
        $icon = $m[1];
    }
    
    // Get navigation group
    $group = '';
    if (preg_match('/protected\s+static\s+\$navigationGroup\s*=\s*[\'"]([^\'"]+)[\'"];/', $content, $m)) {
        $group = $m[1];
    }
    
    // Extract form fields
    preg_match_all('/Forms\\\\Components\\\\(\w+)\::make\(\'([^\']+)\'\)[^)]*?(?:\->label\(\'([^\']+)\'\))?/', $content, $fieldMatches, PREG_SET_ORDER);
    $fields = [];
    foreach ($fieldMatches as $m) {
        $type = $m[1];
        $name = $m[2];
        $fieldLabel = $m[3] ?? ucfirst($name);
        $fields[] = ['type' => $type, 'name' => $name, 'label' => $fieldLabel];
    }
    
    // Extract table columns
    preg_match_all('/Tables\\\\Columns\\\\(\w+)\::make\(\'([^\']+)\'\)[^)]*?(?:\->label\(\'([^\']+)\'\))?/', $content, $colMatches, PREG_SET_ORDER);
    $columns = [];
    foreach ($colMatches as $m) {
        $type = $m[1];
        $name = $m[2];
        $colLabel = $m[3] ?? ucfirst($name);
        $columns[] = ['type' => $type, 'name' => $name, 'label' => $colLabel];
    }
    
    // Build LaTeX with escaped backslashes
    $tex = <<<LATEX
\\documentclass[12pt]{article}
\\usepackage[utf8]{inputenc}
\\usepackage[T1]{fontenc}
\\usepackage[french]{babel}
\\usepackage{hyperref}
\\usepackage{booktabs}
\\usepackage{longtable}
\\usepackage{array}
\\usepackage{xcolor}

\\title{Tutoriel : Gestion de la ressource « $resourceLabel »}
\\author{Équipe Tubawwiri}
\\date{\\today}

\\begin{document}
\\maketitle

\\section{Introduction}
Ce tutoriel présente la gestion de la ressource \\textbf{$resourceLabel} dans l'administration Filament de Tubawwiri.

L'accès à cette section se fait via le menu du tableau de bord Filament.

\\section{Formulaire de création / édition}
Les champs suivants sont présents dans le formulaire :

\\begin{longtable}{>{\\bfseries}l l l}
\\toprule
Type de champ & Nom du champ & Libellé \\
\\midrule
\\endhead
LATEX;
    foreach ($fields as $f) {
        $tex .= "{$f['type']} & {$f['name']} & {$f['label']} \\\\ \n";
    }
    $tex .= <<<LATEX
\\bottomrule
\\end{longtable}

\\section{Liste des enregistrements}
Le tableau de liste présente les colonnes suivantes :

\\begin{longtable}{>{\\bfseries}l l l}
\\toprule
Type de colonne & Nom de la colonne & Libellé \\
\\midrule
\\endhead
LATEX;
    foreach ($columns as $c) {
        $tex .= "{$c['type']} & {$c['name']} & {$c['label']} \\\\ \n";
    }
    $tex .= <<<LATEX
\\bottomrule
\\end{longtable}

\\section{Utilisation}
\\begin{enumerate}
\\item Accédez au tableau de bord Filament via \\texttt{/admin/login}.
\\item Connectez-vous avec les identifiants fournis.
\\item Dans le menu latéral, cliquez sur l'icône correspondant à la ressource « $resourceLabel ».
\\item Vous pouvez alors :
  \\begin{itemize}
    \\item \\textbf{Voir la liste} des enregistrements existants.
    \\item \\textbf{Ajouter un nouvel enregistrement} en cliquant sur le bouton « Nouvel(le) $resourceLabel ».
    \\item \\textbf{Modifier} un enregistrement existant en cliquant sur l'icône d'édition.
    \\item \\textbf{Supprimer} un enregistrement (si autorisé).
  \\end{itemize}
\\end{enumerate}

\\section{Conseils}
\\begin{itemize}
\\item Veillez à respecter les règles de validation indiquées dans le formulaire.
\\item Utilisez les filtres et la recherche du tableau pour trouver rapidement un enregistrement.
\\item Exportez les données si nécessaire via le bouton d'exportation.
\\end{itemize}

\\end{document}
LATEX;
    
    $fileName = "$docDir/" . strtolower($resourceName) . ".tex";
    file_put_contents($fileName, $tex);
    echo "Generated $fileName\n";
}
