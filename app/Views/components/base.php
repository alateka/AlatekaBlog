<!DOCTYPE html>
<html lang="<?= $locale ?>">

<!-- HEADER -->
<head>
    <meta charset="UTF-8">
    <title>AlatekaBlog - <?= lang('Base.title') ?> </title>
    <meta name="description" content="<?= lang('Blog.metaDescription') ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="keywords" content="<?= lang('Blog.metaKeywords') ?>">
    <link rel="shortcut icon" type="image/png" href="/favicon.svg">
    <link rel="stylesheet" href="css/app.css">
</head>

<body class="bg-gray-200 dark:bg-gray-800">
<!-- NAVBAR -->
<?= $this->include('components/navbar') ?>

<!-- CONTENT TO LOAD -->
<div>
  <?= $this->renderSection('content') ?>
</div>

<!-- FOOTER -->
<?= $this->include('components/footer') ?>

</body>
</html>
