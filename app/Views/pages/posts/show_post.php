<?php helper('form') ?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div class="container_base mb-9 mx-auto w-11/12 xl:w-2/3">
    <div class="m-9">

      <!-- BACK -->
      <a href="<?= url_to('home') ?>" class="flex base_button w-24">
        <span class="material-symbols-outlined mr-1">keyboard_backspace</span>
        <span><?= lang('Post.back') ?></span>
      </a>

      <!-- TITLE -->
      <div class="text-center font-bold text-xl">
        <span class="underline"> <?= esc($postData['title']) ?> </span>
      </div>

      <!-- IMAGE -->
      <div class="my-3">
        <img class="w-32 lg:w-72 m-auto rounded-xl" src="<?= $postData['image_url'] ?>" alt="Image">
      </div>

      <div class="flex justify-between text-xs">
        <span> <?= esc($ownerData['name']) . ' ' . esc($ownerData['last_name']) ?> </span>
        <span> <?= date_format(date_create($postData['created_at']), str_contains($globalData['locale'], 'es') ? 'd/m/Y' : 'Y-m-d') ?> </span>
      </div>

      <div class="border-b my-5 border-gray-300 dark:border-gray-700"></div>

      <!-- CONTENT -->
      <div class="text-xs lg:text-sm">
        <?= $postData['content'] ?>
      </div>

    </div>
  </div>
<?= $this->endSection() ?>