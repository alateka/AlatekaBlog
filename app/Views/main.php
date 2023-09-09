<?php
helper('form');
$this->extend('layouts/base');
$this->section('content');
?>
  <div>

    <div class="flex justify-center items-center mb-7">

      <!-- LOGO -->
      <img class="hidden md:block mr-3 w-32 rounded-full shadow-md border-4 border-gray-50 dark:border-gray-900" src="/logo.webp" alt="Logo">

      <!-- TITLE -->
      <div class="text-3xl md:text-5xl font-extrabold container_base p-5">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-lime-500 to-emerald-500">
          <?= lang('Base.blog_owner') ?>
        </span>
      </div>

    </div>

    <!-- GENERIC MESSAGE ( OK | ERROR ) -->
    <div class="text-center">

      <?php if ( session('ok_message') ): ?>
        <span class="ok_message"> <?= lang(session('ok_message')) ?> </span>

      <?php elseif(session('error_message')): ?>
        <span class="error_message"> <?= lang(session('error_message')) ?> </span>

      <?php endif; ?>
    </div>

    <!-- Show all posts from back-end -->
    <div class="posts_table">
    <?php foreach ($data['posts'] as $post): ?>

      <!-- POST -->
      <div class="container_base p-3 hover:border-emerald-500 duration-150">

        <a href="<?= url_to('show_post', $post['id']) ?>">

            <!-- DATE -->
            <p class="text-xs text-right mb-3">
              <?= date_format(date_create($post['created_at']), str_contains($globalData['locale'], 'es') ? 'd/m/Y' : 'Y-m-d') ?>
            </p>
            
            <!-- IMAGE -->
            <img  class="rounded-xl h-36 w-full object-cover" src="<?= $post['image_url'] ?>" alt="Post image">
            
            <div class=" border-t border-gray-300 dark:border-gray-700 mt-5 mb-3"></div>

            <!-- TITLE -->
            <p class="font-bold text-lg"> <?=  esc($post['title']) ?> </p>

            <!-- CONTENT -->
            <p> <?= substr($post['content'], 0, 99) ?>... </p>

        </a>

        <!-- POST ACTIONS -->
        <?php if( session('user') ): ?>
        <div class="flex justify-between ">

          <!-- POST DELETE ACTION -->
          <div>
            <?= form_open( url_to('delete_post', $post['id']) ) ?>
            <?= form_hidden('_method', 'DELETE') ?>
            <?= form_button(['type' => 'submit', 'name' => 'post_delete_button'], '<span class="material-symbols-outlined">delete</span>') ?>
            <?= form_close() ?>
          </div>

          <!-- POST EDIT ACTION -->
          <a href="<?= url_to('edit_post', $post['id'])  ?>">
            <span class="material-symbols-outlined">edit</span>
          </a>
        </div>
        <?php endif; ?>

      </div>
    <?php endforeach ?>
    </div>

    <!-- PAGINATION -->
    <div class="flex md:justify-end justify-center m-7">
      <?= $data['pagination']['pager']->makeLinks($data['pagination']['page'], $data['pagination']['perPage'], $data['pagination']['total'], 'pagination') ?>
    </div>

  </div>
<?= $this->endSection() ?>