<?php 
  use App\Database\Enums\PostCategory;

  helper('form');

  $textFields = [
    'title' => $postData['title'] ?? '',
    'content' => $postData['content'] ?? '',
    'image_url' => $postData['image_url'] ?? ''
  ];
  
  // Category options to dropdown
  $categories = [];
  foreach (array_column(PostCategory::cases(), 'value') as $value) {
    switch ($value) {
      case PostCategory::LINUX->value:
        $categories[PostCategory::LINUX->value] = 'Linux';
        break;
      
      case PostCategory::WINDOWS->value:
        $categories[PostCategory::WINDOWS->value] = 'Windows';
        break;
    
      case PostCategory::SOFTWARE->value:
        $categories[PostCategory::SOFTWARE->value] = 'Software';
        break;

      case PostCategory::HARDWARE->value:
        $categories[PostCategory::HARDWARE->value] = 'Hardware';
        break;

      case PostCategory::DEVELOPMENT->value:
        $categories[PostCategory::DEVELOPMENT->value] = lang('Navbar.development');
        break;

      default:
        break;
    }
  }
?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
  <div class="container_base text-center mb-9 mx-auto w-11/12 md:w-3/5 xl:w-2/3">

  <!-- POST FORM -->
  <?= form_open($isEditing ? '{locale}/post/'.$postData['id'] : '{locale}/post', ['id' => 'create_edit_post', 'class' => 'flex flex-col mx-9 mt-7']) ?>

    <?php if ($isEditing) echo form_hidden('_method', 'PUT') ?>

    <div class="text-3xl my-7">
      <span> <?= $isEditing ? lang('Post.edit_post') : lang('Post.create_post') ?> </span>
    </div>

    <!-- GENERIC ERROR -->
    <?php if ( session('error') ): ?>
      <span class="error_message mb-7"> <?= session('error') ?> </span>
    <?php endif; ?>
    
    <!-- TITLE INPUT + SHOW ERROR -->
    <?= form_input(['type' => 'text', 'name' => 'title', 'class' => 'form_input', 'placeholder' => lang('Post.title')], old('title') ?? $textFields['title']) ?>
    <?php if ( session('errors.title') ): ?>
      <span class="error_message mt-3"> <?= session('errors.title') ?> </span>
    <?php endif; ?>

    <!-- CONTENT INPUT + SHOW ERROR -->
    <?= form_textarea(['rows' => 11, 'type' => 'text', 'name' => 'content', 'class' => 'text_area mt-7', 'placeholder' => lang('Post.content')], old('content', null, 'raw') ?? $textFields['content']) ?>
    <?php if ( session('errors.content') ): ?>
      <span class="error_message mt-3"> <?= session('errors.content') ?> </span>
    <?php endif; ?>

    <!-- IMAGE URL INPUT + SHOW ERROR -->
    <?= form_input(['type' => 'text', 'name' => 'image_url', 'class' => 'form_input mt-7', 'placeholder' => lang('Post.image_url')], old('image_url') ?? $textFields['image_url']) ?>
    <?php if ( session('errors.image_url') ): ?>
      <span class="error_message mt-3"> <?= session('errors.image_url') ?> </span>
    <?php endif; ?>

    <!-- CATEGORY DROPDOWN + SHOW ERROR -->
    <?= form_dropdown('category', $categories, [], ['class' => 'form_input mt-7']) ?>
    <?php if ( session('errors.category') ): ?>
      <span class="error_message mt-3"> <?= session('errors.category') ?> </span>
    <?php endif; ?>

    <!-- LANGUAGE DROPDOWN + SHOW ERROR -->
    <?= form_dropdown('language', ['es' => 'ES', 'en' => 'EN'], [], ['class' => 'form_input mt-7']) ?>
    <?php if ( session('errors.language') ): ?>
      <span class="error_message mt-3"> <?= session('errors.language') ?> </span>
    <?php endif; ?>

    <!-- ACTION BUTTONS -->
    <div class="flex justify-end">
      <!-- CANCEL BUTTON -->
      <a class="my-7 mr-5 cursor-pointer submit_button w-32 flex items-center justify-center" href="<?= url_to('home') ?>"> <?= lang('Post.cancel') ?> </a>
      <!-- SUBMIT BUTTON -->
      <?= form_submit('submit_button', $isEditing ? lang('Post.modify') : lang('Post.create'), ['class' => 'my-7 cursor-pointer submit_button w-32']) ?>
    </div>

  <?php form_close() ?>

  </div>
<?= $this->endSection() ?>