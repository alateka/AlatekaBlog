<?php $changeLanguage = $globalData['locale'] === 'es' ? '/en' : '/es' ?>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="footer">

    <!-- INFO -->
    <div class="flex flex-col justify-between">

      <!-- DESCRIPTION -->
      <span> <?= lang('Footer.description') ?> </span>

      <!-- CHANGE LANGUAGE -->
      <a class="flex items-center" href="<?= base_url('index.php') . $changeLanguage . '/home' ?>">
        <span class="material-symbols-outlined mr-1">language</span>
        <span class="mr-1"> <?= lang('Footer.change_to') ?> </span>
        <span> <?= $globalData['locale'] === 'es' ? lang('Base.language_en') : lang('Base.language_es') ?> </span>
      </a>

    </div>

    <!-- INFO -->
    <div class="hidden md:block">

      <!-- CHANGE LANGUAGE -->
      <div class="flex items-center mt-3">
        <span class="material-symbols-outlined mr-1">download_done</span>
        <span> <?= lang('Footer.page_rendered_in') ?> {elapsed_time}s</span>
      </div>

    </div>

</footer>