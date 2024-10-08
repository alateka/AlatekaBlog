<!DOCTYPE html>
<html lang="<?= $globalData['locale'] ?>">

  <!-- HEADER -->
  <head>
    <meta charset="UTF-8">
    <title>📡 -| AlatekaBlog |- 📋</title>
    <meta name="description" content="<?= lang('Base.meta_description') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= lang('Base.meta_keywords') ?>">
    <link rel="shortcut icon" type="image/png" href="/favicon.svg">
    <link rel="stylesheet" href="/css/app.css">

    <!-- Material Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,1,0">

    <!-- Bunny fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=ubuntu:400" rel="stylesheet" />
    
  </head>

  <body class="bg-gray-300 dark:bg-gray-700">

    <!-- This div holds nabvar top & footer bottom -->
    <div class="flex flex-col min-h-screen">

      <!-- NAVBAR -->
      <?= $this->include('layouts/navbar') ?>

      <!-- CONTENT TO LOAD -->
      <div>
        <?= $this->renderSection('content') ?>
      </div>

      <!-- FOOTER -->
      <div class="mt-auto"> <!-- It holds footer to bottom -->
        <?= $this->include('layouts/footer') ?>
      </div>

    </div>

  </body>

</html>
