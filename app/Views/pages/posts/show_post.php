<?php helper('form') ?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div class="container_base m-9">
    <div class="m-9">

      <!-- TITLE -->
      <div class="text-center font-bold text-xl">
        <span class="underline"> <?= $postData['title'] ?> </span>
      </div>

      <!-- IMAGE -->
      <div class="mt-3">
        <img class="w-96 m-auto rounded-xl" src="<?= $postData['image_url'] ?>" alt="Image">
      </div>

      <div class="flex justify-between text-xs">
        <span> <?= $ownerData['name'] . ' ' . $ownerData['last_name'] ?> </span>
        <span> <?= date_format(date_create($postData['created_at']), str_contains($globalData['locale'], 'es') ? 'd/m/Y' : 'Y-m-d') ?> </span>
      </div>

      <div class="border-b my-5 border-gray-300 dark:border-gray-700"></div>

      <!-- CONTENT -->
      <div>
        <?= $postData['content'] ?>
      </div>

    </div>
  </div>
<?= $this->endSection() ?>