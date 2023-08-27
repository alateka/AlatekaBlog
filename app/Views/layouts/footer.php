<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="container_base flex justify-between ml-3 p-3">

    <!-- INFO -->
    <div class="flex flex-col justify-between">

      <!-- DESCRIPTION -->
      <span> <?= lang('Footer.description') ?> </span>

      <!-- CHANGE LANGUAGE -->
      <a class="base_button flex" href="<?= base_url($globalData['locale'] === 'es' ? 'en' : 'es') . '/home' ?>">
        <span class="material-symbols-outlined mr-1">language</span>
        <span class="mr-1"> <?= lang('Footer.change_to') ?> </span>
        <span> <?= $globalData['locale'] === 'es' ? lang('Base.language_en') : lang('Base.language_es') ?> </span>
      </a>

    </div>

    <!-- CMS VERSION -->
    <div class="flex flex-col justify-around">
      <span> <?= $globalData['cmsCurrentVersion'] ?> </span>
      <div class="flex">
        <span class="material-symbols-outlined mr-1">download_done</span>
        <span> <?= lang('Footer.page_rendered_in') ?> {elapsed_time}s</span>
      </div>
    </div>

</footer>

<script>

  // To down footer on login view
  if ( !window.location.href.includes('home') )
    document.getElementsByTagName('footer')[0].className += ' ' + 'absolute bottom-0 right-0 left-0 mr-3';

</script>