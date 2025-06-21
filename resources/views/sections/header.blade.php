<header x-data="{ openMenu: false }" class="flex py-0 px-6 justify-between items-center self-stretch max-w-[1440px] mx-auto">
  <div class="flex flex-col items-start flex-[1_0_0] border-b border-neutral-300">
    <div class="flex py-6 px-0 justify-between items-center self-stretch">

      {{-- Logo && Menu Left --}}
      <div class="flex items-center gap-14 self-stretch">
        <a href="{{ home_url('/') }}" class="flex items-center justify-center gap-2 no-underline">
          @svg('logo-e-formaliste', 'h-16 w-auto text-primary-600')
        </a>

        {{-- Navigation visible uniquement à partir de xl --}}
        @if (has_nav_menu('primary_navigation'))
          <nav class="hidden 1200:flex gap-6 items-center text-sm text-gray-700" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
            {!! wp_nav_menu([
              'theme_location' => 'primary_navigation',
              'menu_class' => 'flex gap-6',
              'container' => false,
              'echo' => false,
              'walker' => new \App\Walkers\Primary_Navigation_Walker(),
            ]) !!}
          </nav>
        @endif
      </div>

      {{-- Menu Right --}}
      <div class="flex justify-end items-end text-primary-600 gap-3 h-">
        @if (has_nav_menu('secondary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'secondary_navigation',
            'menu_class' => 'hidden gap-3 810:flex',
            'container' => false,
            'echo' => false,
            'walker' => new \App\Walkers\Secondary_Navigation_Walker(),
          ]) !!}
        @endif

        {{-- Menu Hamburger --}}
        <div class="flex p-3 1200:hidden items-center">
          <button @click="openMenu = true">
            @svg('hamburger-open', 'h-8 w-8 text-neutral-900')
          </button>
        </div>
      </div>
    </div>
  </div>

  {{-- Menu mobile --}}
  <div x-show="openMenu" x-transition class="fixed inset-0 z-50 bg-white flex flex-col py-0 px-6">
    <div class="flex justify-between items-center py-6 px-0 border-b border-neutral-300">
      @svg('logo-e-formaliste', 'h-16 w-auto text-primary-600')
      <div class="flex items-center gap-4 justify-center">
        @if (has_nav_menu('secondary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'secondary_navigation',
            'menu_class' => 'hidden 810:flex gap-3',
            'container' => false,
            'echo' => false,
            'walker' => new \App\Walkers\Secondary_Navigation_Walker(),
          ]) !!}
        @endif
        <button @click="openMenu = false">
          @svg('hamburger-close', 'h-8 w-8 text-neutral-900')
        </button>
      </div>
    </div>
    <div class="flex flex-col items-start justify-between h-full">
      @if (has_nav_menu('primary_navigation'))
        <nav class="flex flex-col gap-4 m-0 overflow-y-auto max-h-[calc(100vh-192px)] w-full" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'flex flex-col',
            'container' => false,
            'echo' => false,
            'walker' => new \App\Walkers\Primary_Navigation_Walker_Mobile(),
          ]) !!}
        </nav>
      @endif
      @if (has_nav_menu('secondary_navigation'))
        {!! wp_nav_menu([
          'theme_location' => 'secondary_navigation',
          'menu_class' => 'flex 810:hidden gap-3 items-center justify-center w-full py-4 px-0 m-0',
          'container' => true,
          'echo' => false,
          'walker' => new \App\Walkers\Secondary_Navigation_Walker(),
        ]) !!}
      @endif
    </div>
  </div>
</header>
