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
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-500 to-green-500">
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
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-9 lg:gap-16 lg:p-7">
    <?php foreach ($data['posts'] as $post): ?>

      <!-- POST -->
      <div class="container_base p-3">
        <a href="<?= url_to('show_post', $post['id']) ?>">
          
          <!-- IMAGE -->
          <img class="rounded-xl" src="<?= $post['image_url'] ?>" alt="Post image">
          
          <div class=" border-t border-gray-300 dark:border-gray-700 mt-5 mb-3"></div>

          <!-- TITLE -->
          <p class="font-bold text-lg"> <?= $post['title'] ?> </p>

          <!-- CONTENT -->
          <p p> <?= substr($post['content'], 0, 99) ?> ... </p>
          
          <!-- DATE -->
          <p class="text-xs text-right"> <?= date_format(date_create($post['created_at']), str_contains($globalData['locale'], 'es') ? 'd/m/Y' : 'Y-m-d') ?> </p>
        
        </a>

        <!-- POST ACTIONS -->
        <?php if( session('user') ): ?>
        <div class="flex justify-between mt-3">

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