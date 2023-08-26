<?php helper('form') ?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div class="container_base text-center m-auto w-11/12 md:w-3/5 xl:w-1/3">

  <!-- POST FORM -->
  <?= form_open('{locale}/post', ['id' => 'create_post', 'class' => 'flex flex-col mx-9 mt-7']) ?>

    <div class="text-3xl my-7">
      <span> <?= lang('Post.create_post') ?> </span>
    </div>

    <!-- GENERIC ERROR -->
    <?php if ( session('error') ): ?>
      <span class="error mb-7"> <?= session('error') ?> </span>
    <?php endif; ?>
    
    <!-- TITLE INPUT + SHOW ERROR -->
    <?= form_input(['value' => old('title'), 'type' => 'text', 'name' => 'title', 'class' => 'form_input', 'placeholder' => lang('Post.title')]) ?>
    <?php if ( session('_ci_validation_errors.title') ): ?>
      <span class="error mt-3"> <?= session('_ci_validation_errors.title') ?> </span>
    <?php endif; ?>

    <!-- CONTENT INPUT + SHOW ERROR -->
    <?= form_input(['value' => old('content'), 'type' => 'text', 'name' => 'content', 'class' => 'form_input mt-7', 'placeholder' => lang('Post.content')]) ?>
    <?php if ( session('_ci_validation_errors.content') ): ?>
      <span class="error mt-3"> <?= session('_ci_validation_errors.content') ?> </span>
    <?php endif; ?>

    <!-- IMAGE URL INPUT + SHOW ERROR -->
    <?= form_input(['value' => old('image_url'), 'type' => 'text', 'name' => 'image_url', 'class' => 'form_input mt-7', 'placeholder' => lang('Post.image_url')]) ?>
    <?php if ( session('_ci_validation_errors.image_url') ): ?>
      <span class="error mt-3"> <?= session('_ci_validation_errors.image_url') ?> </span>
    <?php endif; ?>

    <!-- CATEGORY INPUT + SHOW ERROR -->
    <?= form_input(['value' => old('category'), 'type' => 'number', 'name' => 'category', 'class' => 'form_input mt-7', 'placeholder' => lang('Post.category')]) ?>
    <?php if ( session('_ci_validation_errors.category') ): ?>
      <span class="error mt-3"> <?= session('_ci_validation_errors.category') ?> </span>
    <?php endif; ?>

    <!-- SUBMIT BUTTON -->
    <?= form_submit('btnSubmit', lang('Post.create'), ['class' => 'my-7 cursor-pointer submit_button']) ?>
    
  <?php form_close() ?>

  </div>
<?= $this->endSection() ?>