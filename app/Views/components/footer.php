<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->
<footer class="footer dark:footer_dark flex justify-between rounded-xl m-3">

    <!-- INFO -->
    <div>
      <span> &copy; <?= date('Y') ?> - </span>
      <span> <?= lang('Footer.description') ?> </span>
      <p> <?= lang('Footer.license') ?> </p>
    </div>

    <!-- CMS VERSION -->
    <div>
      <span> <?= $cmsCurrentVersion ?> </span>
    </div>

</footer>