
<div class="flex items-start">
  <div class="group flex items-center gap-2 h-4 cursor-pointer">
    <a 
      href="{{ $url ?? '#' }}"
      @if($target === '_blank') target="_blank" rel="noopener noreferrer" @endif
      class="relative inline-block text-primary-600 group-hover:text-primary-800 leading-tight-122 font-medium text-base transition-all duration-300 !no-underline
             after:content-[''] after:absolute after:left-0 after:bottom-0 after:h-[1px] after:w-full after:bg-primary-600 group-hover:after:bg-primary-800"
    >
      {{ $text }}
    </a>

    @svg('arrow-right', 'h-4.5 w-4.5 text-primary-600 transition-all duration-300 group-hover:text-primary-800 group-hover:translate-x-1')
  </div>
</div>
