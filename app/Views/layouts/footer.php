<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="container_base flex justify-between ml-3 p-3">

    <!-- INFO -->
    <div>
      <span> <?= lang('Footer.description') ?> </span>
    </div>

    <!-- CMS VERSION -->
    <div class="flex flex-col">
      <span> <?= $globalData['cmsCurrentVersion'] ?> </span>
      <span> <?= lang('Footer.page_rendered_in') ?> {elapsed_time}s</span>
    </div>

</footer>

<script>

  // To down footer on login view
  if ( !window.location.href.includes('home') )
    document.getElementsByTagName('footer')[0].className += ' ' + 'absolute bottom-0 right-0 left-0 mr-3';

</script>