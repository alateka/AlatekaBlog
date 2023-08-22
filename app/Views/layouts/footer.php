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