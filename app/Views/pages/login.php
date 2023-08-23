<?php helper('form') ?>
<?= $this->extend('layouts/base') ?>

<?= $this->section('content') ?>
    <div class="container_base text-center m-auto w-11/12 md:w-3/5 xl:w-1/3">

      <!-- LOGIN FORM -->
      <?= form_open('{locale}/login', ['id' => 'login', 'class' => 'flex flex-col mx-9 mt-7']) ?>

        <div class="text-3xl my-7">
          <span> <?= lang('Login.login') ?> </span>
        </div>

        <!-- GENERIC ERROR -->
        <?php if ( session('error') ): ?>
          <span class="error mb-7"> <?= session('error') ?> </span>
        <?php endif; ?>
        
        <!-- EMAIL INPUT + SHOW ERROR -->
        <?= form_input(['value' => old('email'), 'type' => 'email', 'name' => 'email', 'class' => 'form_input', 'placeholder' => lang('Login.email')]) ?>
        <?php if ( session('_ci_validation_errors.email') ): ?>
          <span class="error mt-3"> <?= session('_ci_validation_errors.email') ?> </span>
        <?php endif; ?>

        <!-- PASSWORD INPUT + SHOW ERROR -->
        <?= form_password(['value' => old('password'), 'name' => 'password', 'class' => 'mt-9 form_input', 'placeholder' => lang('Login.password')]) ?>
        <?php if ( session('_ci_validation_errors.password') ): ?>
          <span class="error mt-3"> <?= session('_ci_validation_errors.password') ?> </span>
        <?php endif; ?>

        <!-- SUBMIT BUTTON -->
        <?= form_submit('btnSubmit', lang('Login.login'), ['class' => 'my-7 cursor-pointer submit_button']) ?>
        
      <?php form_close() ?>

    </div>
<?= $this->endSection() ?>