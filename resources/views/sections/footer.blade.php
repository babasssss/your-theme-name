<footer class="flex px-10 pt-0 pb-12 bg-neutral-0 flex-col items-center justify-center">
  <div class="flex max-w-(--max-w-1204) flex-col items-center justify-center self-stretch mx-auto w-full">

    <div class="flex flex-col gap-16 1200:gap-28 px-0 pt-20 pb-28 w-full">
      {{-- Première grille --}}
      <div class="grid 1200:grid-cols-3 gap-y-8 1200:gap-x-[60px] w-full">
        <div class="col-start-1 flex 1200:items-start 1200:flex-col justify-start items-center">
          <div class="flex w-auto flex-wrap gap-8 1200:flex-col ">
            @svg('logo-e-formaliste', 'h-20 w-auto text-primary-600')
            @if (has_nav_menu('social_navigation'))
              <nav class="h-auto flex items-center" aria-label="{{ wp_get_nav_menu_name('social_navigation') }}">
                {!! wp_nav_menu([
                    'theme_location' => 'social_navigation',
                    'menu_class' => 'flex gap-4',
                    'container' => false,
                    'echo' => false,
                    'walker' => new \App\Walkers\Social_navigation_Walker(),
                  ]) !!}
              </nav>
            @endif
          </div>
        </div>
        <div class="1200:col-span-2">
          @if (has_nav_menu('footer_navigation'))
            <nav class="flex flex-col w-auto items-start 1200:justify-start justify-center h-full" aria-label="{{ wp_get_nav_menu_name('footer_navigation') }}">
              {!! wp_nav_menu([
                'theme_location' => 'footer_navigation',
                'menu_class' => 'flex flex-wrap 810:gap-16 gap-10 810:min-w-[600px] items-start justify-start',
                'container' => false,
                'echo' => false,
                'walker' => new \App\Walkers\Footer_Navigation_Walker(),
              ]) !!}
            </nav>
          @endif
        </div>
      </div>

      {{-- Deuxième grille --}}
    </div>

    <div class="flex h-[1px] w-full flex-col justify-center items-center gap-2 self-stretch bg-neutral-300"></div>
    @if (has_nav_menu('copyright_navigation'))
      <nav class="flex max-w-(--max-w-1204) py-6 px-0 items-center justify-between gap-8 self-stretch flex-wrap" aria-label="{{ wp_get_nav_menu_name('copyright_navigation') }}">
        <p class="text-neutral-500 text-sm font-normal">©{{ date('Y') }} eformaliste · Tous droits réservés.</p>
        <div class="flex items-center justify-center gap-6">
          {!! wp_nav_menu([
            'theme_location' => 'copyright_navigation',
            'menu_class' => 'flex gap-6 flex-wrap',
            'container' => false,
            'echo' => false,
            'walker' => new \App\Walkers\Copyright_Navigation_Walker(),
          ]) !!}
        </div>
      </nav>
    @endif
</footer>