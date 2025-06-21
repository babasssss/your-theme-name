<section class="flex pt-28 pb-20 px-10 flex-col items-center gap-2 self-stretch">
  <div class="flex flex-col 1200:flex-row max-w-[--max-w-1204] items-center justify-center gap-10 self-stretch flex-wrap 810:mx-auto">
    <div class="flex flex-col items-start gap-12 flex-grow flex-shrink-0 basis-0 max-w-(--max-w-759)">
      <div class="flex flex-col items-start gap-8 self-stretch">
        <x-heading :text="$attributes['titleHero'] ?? ''" />
        <div class="flex pr-14 items-start gap-2 self-stretch">
          <x-paragraph :text="$attributes['paragraphHero'] ?? ''" class="text-2xl opacity-80" />
        </div>
      </div>
      <div class="flex flex-col 810:flex-row w-full 810:w-auto items-start justify-start gap-3">
        @if (!empty($attributes['button1Text']))
          <a href="{{ $attributes['button1Url'] }}" target="{{ $attributes['button1Target'] }}" class="flex py-4 px-5 justify-center items-center rounded-2xl !no-underline cursor-pointer border transition-all duration-300 ease-in-out bg-primary-600 hover:bg-primary-800 w-full 810:w-auto">
            <span class="text-neutral-0 text-base font-bold leading-tight-122">{{ $attributes['button1Text'] }}</span>
          </a>
        @endif
        @if (!empty($attributes['button2Text']))
          <a href="{{ $attributes['button2Url'] }}" target="{{ $attributes['button2Target'] }}" class="flex py-4 px-5 justify-center items-center rounded-2xl !no-underline cursor-pointer border border-neutral-300 transition-all duration-300 ease-in-out bg-neutral-0 hover:bg-neutral-50 w-full 810:w-auto">
            <span class="text-neutral-900 text-base font-bold leading-tight-122">{{ $attributes['button2Text'] }}</span>
          </a>
        @endif
      </div>
    </div>
    <div class="group flex 1200:w-(--max-w-405) min-w-80 w-max justify-end items-end gap-2">
      <div class="flex 1200:w-(--max-w-405) min-w-80 w-max justify-end items-end gap-2 shrink-0">
        <div class="w-full h-full shrink-0">
          <div class="grid grid-cols-6 grid-rows-6 810:gap-8 gap-3">
            @foreach ($attributes['images'] ?? [] as $index => $image)
              @php
                $positions = [
                  ['col-start-3', 'row-start-1'],
                  ['col-start-5', 'row-start-1'],
                  ['col-start-1', 'row-start-3'],
                  ['col-start-3', 'row-start-3'],
                  ['col-start-5', 'row-start-3'],
                  ['col-start-1', 'row-start-5'],
                  ['col-start-3', 'row-start-5'],
                  ['col-start-5', 'row-start-5'],
                ];

                $colStart = $positions[$index][0] ?? '';
                $rowStart = $positions[$index][1] ?? '';
                $isSpecial = $index === 2;
              @endphp

              <div class="col-span-2 row-span-2 {{ $colStart }} {{ $rowStart }} shrink-0 810:w-[120px] 810:h-[120px] w-[100px] h-[100px] relative flex items-center justify-center">
                @if ($isSpecial)
                  <div class="absolute z-0 w-5/6 h-5/6 shrink-0 rounded-3xl bg-neutral-200 transform transition-transform duration-300 group-hover:rotate-45"></div>
                  <div class="absolute z-10 w-[40px] h-[40px] rounded-xl bg-primary-600 -rotate-6 top-0 right-0 translate-x-1/4 -translate-y-1/4 transform transition-all duration-400 group-hover:top-1/2 group-hover:left-1/2 group-hover:-translate-x-1/2 group-hover:-translate-y-1/2 group-hover:rotate-45 group-hover:w-5/12 group-hover:h-5/12">
                    <img
                      src="{{ $image['url'] }}"
                      class="h-full w-full p-2 object-contain rotate-0 transition-transform duration-300 group-hover:-rotate-45"
                      alt="{{ $image['alt'] ?? '' }}"
                    />
                  </div>
                @else
                  <div class="absolute inset-0 z-0 w-full h-full shrink-0 rounded-4xl -rotate-6 bg-neutral-200"></div>
                  <div class="relative z-10 flex w-full h-full items-center justify-center shrink-0 rounded-4xl">
                    <img
                      src="{{ $image['url'] }}"
                      class="w-full h-full object-cover rounded-4xl"
                      alt="{{ $image['alt'] ?? '' }}"
                    />
                  </div>
                @endif
              </div>
            @endforeach
          </div>        
        </div>
      </div>
    </div>
  </div>
</section>