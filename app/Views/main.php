<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div>

    <div class="text-center mb-7">
      <span class="text-5xl font-bold text-gray-700 dark:text-gray-100">Alateka's Blog</span>
    </div>

    <!-- Show all posts from back-end -->
    <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-9 lg:gap-16 lg:p-7">
    <?php foreach ($posts['data'] as $post): ?>

      <!-- POST -->
      <div class="container_base p-3">
        <a href="<?= url_to('show_post', $post['id']) ?>">
          <img class="rounded-xl" src="<?= $post['image_url'] ?>" alt="Post image">
          <div class=" border-t border-gray-300 dark:border-gray-700 mt-5 mb-3"></div>
          <p class="font-bold text-lg"> <?= $post['title'] ?> </p>
          <p> <?= substr($post['content'], 0, 99) ?> ... </p>
        </a>
      </div>

    <?php endforeach ?>
    </div>

    <!-- PAGINATION -->
    <div class="flex md:justify-end justify-center m-7">
      <?= $posts['pager']->makeLinks($posts['page'], $posts['perPage'], $posts['total'], 'pagination') ?>
    </div>

  </div>
<?= $this->endSection() ?>