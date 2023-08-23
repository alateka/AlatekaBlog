<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="container_base flex justify-between m-3 p-3">

    <!-- INFO -->
    <div>
      <span> &copy; <?= date('Y') ?> - </span>
      <span> <?= lang('Footer.description') ?> </span>
      <p> <?= lang('Footer.license') ?> </p>
    </div>

    <!-- CMS VERSION -->
    <div>
      <span> <?= $globalData['cmsCurrentVersion'] ?> </span>
    </div>

</footer>

<script>

  // To down footer on login view
  if ( window.location.href.includes('login') )
    document.getElementsByTagName('footer')[0].className += ' ' + 'absolute bottom-0 right-0 left-0';

</script>