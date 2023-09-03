<!-- NAVBAR -->
<header class="mb-28">
  <div class="relative">
    <div class="fixed top-0 left-0 right-0">
      <nav class="navbar flex justify-between items-center p-3">

        <!-- LOGO -->
        <div>
          <span class="material-symbols-outlined mr-1">rss_feed</span>
        </div>

        <!-- NAV LINKS -->
        <div>
          <ul class="flex">
            <!-- GO TO HOME -->
            <li>
              <a class="base_button flex items-center" href="<?= url_to('home') ?>">
                <span class="material-symbols-outlined mr-1">home</span>
                <span> <?= lang('Navbar.home') ?></span>
              </a>
            </li>

            <?php if ( str_contains(current_url(), 'home') ): ?>
              <div onmouseleave="document.getElementById('category_menu').hidden = true">

                <!-- CATEGORY MENU -->
                <li onmouseover="document.getElementById('category_menu').hidden = false">
                  <a class="base_button flex items-center" href="#">
                    <span class="material-symbols-outlined mr-1">category</span>
                    <span> <?= lang('Navbar.categories') ?></span>
                  </a>
                </li>
                <ul id="category_menu" hidden class="bg-gray-100 text-gray-700 rounded-xl dark:bg-gray-800 dark:text-gray-100 absolute px-7 text-center">
                  <li class="my-5">
                    <a class="base_button" href="<?= url_to('home') . '?category='. 2 ?>">
                      Windows
                    </a>
                  </li>
                  <li>
                    <a class="base_button" href="<?= url_to('home') . '?category='. 1 ?>">
                      Linux
                    </a>
                  </li>
                  <li class="my-5 ">
                    <a class="base_button" href="<?= url_to('home') . '?category='. 3 ?>">
                      Software
                    </a>
                  </li>
                  <li>
                    <a class="base_button" href="<?= url_to('home') . '?category='. 4 ?>">
                      Hardware
                    </a>
                  </li>
                  <li class="my-5 ">
                    <a class="base_button" href="<?= url_to('home') . '?category='. 5 ?>">
                      <?= lang('Navbar.development') ?>
                    </a>
                  </li>
                </ul>

              </div>
            <?php endif; ?>

            <div class="border-l border-gray-300 dark:border-gray-600 mx-3"></div>
            
            <?php if ( session('user') ): ?>
              <!-- GO TO DASHBOARD -->
              <li>
                <a class="base_button flex items-center" href="<?= url_to('dashboard') ?>">
                  <span class="material-symbols-outlined mr-1">dashboard</span>
                  <span> <?= lang('Navbar.dashboard') ?></span>
                </a>
              </li>
              <!-- LOGOUT -->
              <li>
                <a class="base_button flex items-center" href="<?= url_to('logout') ?>">
                  <span class="material-symbols-outlined mr-1">logout</span>
                  <span> <?= lang('Login.logout') ?> </span>
                </a>
              </li>
            <?php endif; ?>

            <!-- THEME SWAP (DARK / LIGHT) -->
            <li class="flex items-center">
              <div onclick="setDarkTheme()" id="dark_mode">
                <div class="cursor-pointer flex items-center base_button">
                  <span class="material-symbols-outlined mr-1">dark_mode</span>
                  <span> <?= lang('Navbar.dark_mode') ?> </span>
                </div>
              </div>
              <div onclick="setLightTheme()" id="light_mode">
                <div class="cursor-pointer flex items-center base_button">
                  <span class="material-symbols-outlined mr-1">light_mode</span>
                  <span> <?= lang('Navbar.light_mode') ?> </span>
                </div>
              </div>
            </li>

          </ul>

        </div>
      </nav>
    </div>
  </div>
</header>

<script>

  // Down navbar on login view
  if ( !window.location.href.includes('home') )
    document.getElementsByTagName('nav')[0].className += ' ' + 'mr-3';


  // Set themes (Dark / Light)
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