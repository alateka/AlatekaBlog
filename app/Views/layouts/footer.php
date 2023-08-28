<?php $changeLanguage = $globalData['locale'] === 'es' ? '/en' : '/es' ?>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="footer flex justify-between ml-3 p-3 h-20 text-xs">

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
    <div class="flex flex-col justify-between">

      <!-- DESCRIPTION -->
      <span> <?= $globalData['cmsCurrentVersion'] ?> </span>

      <!-- CHANGE LANGUAGE -->
      <div class="flex items-center">
        <span class="material-symbols-outlined mr-1">download_done</span>
        <span> <?= lang('Footer.page_rendered_in') ?> {elapsed_time}s</span>
      </div>

    </div>

</footer>

<script>

  // To down footer on login & post view
  if ( !window.location.href.includes('home') && !window.location.href.includes('post') )
    document.getElementsByTagName('footer')[0].className += ' ' + 'absolute bottom-0 right-0 left-0 mr-3';

</script>