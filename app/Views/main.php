<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div>

    <div class="flex justify-center items-center mb-7">

      <!-- LOGO -->
      <img class="mr-3 w-32 rounded-full shadow-md border-4 border-gray-50 dark:border-gray-900" src="/logo.webp" alt="Logo">

      <!-- TITLE -->
      <div class="text-5xl font-extrabold container_base p-5">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-500 to-green-500">
          <?= lang('Base.blog_owner') ?>
        </span>
      </div>

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
          <p class="text-xs text-right"> <?= str_contains($globalData['locale'], 'en') ? date_format(date_create($post['created_at']), 'Y-m-d') : date_format(date_create($post['created_at']), 'd/m/Y') ?> </p>
        
        </a>
      </div>

    <?php endforeach ?>
    </div>

    <!-- PAGINATION -->
    <div class="flex md:justify-end justify-center m-7">
      <?= $data['pagination']['pager']->makeLinks($data['pagination']['page'], $data['pagination']['perPage'], $data['pagination']['total'], 'pagination') ?>
    </div>

  </div>
<?= $this->endSection() ?>