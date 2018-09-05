<!DOCTYPE html>
<html>
<head>
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700"
          type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.blue-light_blue.min.css">
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <link rel="stylesheet" href="../common/views/style.css">
    <?php
    if (isset($additionalStylesheets)) {
        foreach ($additionalStylesheets as $stylesheet) {
            echo "<link rel='stylesheet' href='" . $stylesheet . "'/>";
        }
    } ?>
</head>
<body>
<div class="mdl-layout mdl-js-layout mdl-layout--fixedheader">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <?php if (isset($back)) : ?>
                <a class="back" href="<?= $back ?>">
                    <i class="material-icons">keyboard_backspace</i>
                </a>
            <?php endif ?>
            <span class="mdl-layout-title"><?= $title ?></span>
            <div class="mdl-layout-spacer"></div>
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <?php if (isset($_SESSION['credentials'])) : ?>
                <a href="index.php?clear"
                   class="mdl-button mdl-button--primary mdl-button--raised">
                    Logout
                </a>
                <?php endif ?>
            </nav>
        </div>
    </header>

    <main class="mdl-layout__content">
        <?= $this->section('content') ?>
    </main>
</div>

<?= $this->section('scripts') ?>
</body>
</html>