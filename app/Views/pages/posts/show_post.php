<?php helper('form') ?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div class="container_base m-7">
    <div class="m-9">

      <!-- TITLE -->
      <div class="text-center font-bold text-xl">
        <span class="underline"> <?= $postData['title'] ?> </span>
      </div>

      <!-- IMAGE -->
      <div class="mt-3">
        <img class="w-96 m-auto rounded-xl" src="<?= $postData['image_url'] ?>" alt="Image">
      </div>

      <div class="border-b my-5 border-gray-300 dark:border-gray-700"></div>

      <!-- CONTENT -->
      <div>
        <span> <?= $postData['content'] ?> </span>
      </div>

    </div>
  </div>
<?= $this->endSection() ?>