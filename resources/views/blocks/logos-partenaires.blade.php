<div class="flex p-8 flex-col items-center gap-4 self-stretch bg-neutral-0">
  <div class="flex max-w-(--max-w-1204) py-5 px-0 items-center gap-12 self-stretch 810:mx-auto">
    <div class="relative w-screen overflow-hidden">
      @svg('logo-marquee', 'absolute -top-7 -left-2 w-[88px] h-[104px] rotate-180 z-10 test1')
      <div class="group flex gap-12">
        @for ($i = 0; $i < 3; $i++)
          <div class="flex shrink-0 gap-12 animate-marquee group-hover:[animation-play-state:paused]">
            @foreach ($attributes['images'] ?? [] as $logo)
              @if (!empty($logo['url']))
                <div class="flex items-center justify-center w-auto h-12 overflow-hidden">
                  <img
                    src="{{ $logo['url'] }}"
                    alt="{{ $logo['alt'] ?? 'Logo partenaire' }}"
                    class="object-contain w-full h-full grayscale hover:grayscale-0 transition duration-300 ease-in-out"
                  />
                </div>
              @endif
            @endforeach
          </div>
        @endfor
      </div>
      @svg('logo-marquee', 'absolute -top-7 -right-2 w-[88px] h-[104px] z-10')
    </div>
  </div>
</div>
