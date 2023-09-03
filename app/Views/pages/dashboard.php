<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
    <div class="grid grid-cols-2 gap-11 m-9">
      <div class="container_base p-7">
        <p class="text-xl font-bold"><?= lang('Dashboard.login_as') . ': ' . session('user')['username'] ?></p>
        <p> <?= lang('Dashboard.total_posts') . ': ' . $postsCounter ?> </p>
      </div>
      <div class="container_base p-7">
        <a class="base_button text-lg" href="<?= url_to('create_post') ?>"> <?= lang('Dashboard.create_post') ?> </a>
      </div>
    </div>
<?= $this->endSection() ?>