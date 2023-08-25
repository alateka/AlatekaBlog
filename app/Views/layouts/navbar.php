<!-- NAVBAR -->
<header class="mb-28">
  <div class="relative">
    <div class="fixed top-0 left-0 right-0">
      <nav class="navbar flex justify-between items-center p-3">

        <!-- LOGO -->
        <div>
          <a href="<?= url_to('home') ?>">
            <img class="w-12 m-1" src="/favicon.svg" alt="Favicon">
          </a>
        </div>

        <!-- NAV LINKS -->
        <div id="navbar_links">
          <ul class="flex">
            <li>
              <a href="<?= url_to('home') ?>"> <?= lang('Navbar.home') ?> </a>
            </li>

            <?php if ( str_contains(current_url(), 'home') ): ?>
              <div onmouseleave="document.getElementById('category_menu').hidden = true">

                <!-- CATEGORY MENU -->
                <li onmouseover="document.getElementById('category_menu').hidden = false" class="ml-7">
                  <a href="#"> <?= lang('Navbar.categories') ?> </a>
                </li>
                <ul id="category_menu" hidden class="bg-gray-100 text-gray-700 rounded-xl dark:bg-gray-800 dark:text-gray-100 absolute px-7">
                  <li class="my-5"><a href="#">Windows</a></li>
                  <li><a href="#">Linux</a></li>
                  <li class="my-5"><a href="#">Software</a></li>
                  <li><a href="#">Hardware</a></li>
                  <li class="my-5"><a href="#"> <?= lang('Navbar.development') ?> </a></li>
                </ul>

              </div>
            <?php endif; ?>
            
          </ul>
        </div>

        <div class="flex">
          
          <?php if ( session('user') ): ?>
            <a class="mr-7" href="<?= url_to('logout') ?>"> <?= lang('Login.logout') ?> </a>
          <?php endif; ?>

          <!-- THEME SWAP (Dark / Light) -->
          <div onclick="setDarkTheme()" id="dark_mode">
            <div class="cursor-pointer">
              <span class="material-symbols-outlined">dark_mode</span>
            </div>
          </div>
          <div onclick="setLightTheme()" id="light_mode">
            <div class="cursor-pointer">
              <span class="material-symbols-outlined">light_mode</span>
            </div>
          </div>

        </div>

      </nav>
    </div>
  </div>
</header>

<script>
  if (localStorage.theme === 'dark' || (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
    document.documentElement.classList.add('dark');
    document.getElementById('dark_mode').hidden = true;
  } else {
    document.documentElement.classList.remove('dark');
    document.getElementById('light_mode').hidden = true;
  }

  const setDarkTheme = () => {
    document.documentElement.classList.add("dark");
    localStorage.theme = "dark";
    document.getElementById('light_mode').hidden = false;
    document.getElementById('dark_mode').hidden = true;
  }

  const setLightTheme = () => {
    document.documentElement.classList.remove("dark");
    localStorage.theme = "light";
    document.getElementById('light_mode').hidden = true;
    document.getElementById('dark_mode').hidden = false;
  }

</script>