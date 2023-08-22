<!-- NAVBAR -->
<header class="mb-28">
  <div class="relative">
    <div class="fixed top-0 left-0 right-0">
      <nav class="navbar flex justify-between items-center p-3">

        <!-- LOGO -->
        <div>
          <img
            class="w-12 m-1"
            src="/favicon.svg"
            alt="Favicon"
          >
        </div>

        <!-- NAV LINKS -->
        <div>
          <ul class="flex">
            <li>
              <a href="<?= url_to('home') ?>"> <?= lang('Navbar.home') ?> </a>
            </li>
            <div onmouseleave="document.getElementById('category_menu').hidden = true">

              <!-- CATEGORY MENU -->
              <li onmouseover="document.getElementById('category_menu').hidden = false" class="ml-3"><a href="#"> <?= lang('Navbar.categories') ?> </a></li>
              <ul id="category_menu" hidden class="bg-gray-100 text-gray-700 rounded-xl dark:bg-gray-800 dark:text-gray-100 absolute px-7">
                <li class="my-5"><a href="#">Windows</a></li>
                <li><a href="#">Linux</a></li>
                <li class="my-5"><a href="#">Software</a></li>
                <li><a href="#">Hardware</a></li>
                <li class="my-5"><a href="#"> <?= lang('Navbar.development') ?> </a></li>
              </ul>

            </div>
          </ul>
        </div>

        <div>
          <span class="material-symbols-outlined">dark_mode</span>
        </div>

      </nav>
    </div>
  </div>
</header>