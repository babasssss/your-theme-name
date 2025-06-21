<div class="flex items-start justify-start gap-(--gap-52) self-stretch flex-wrap px-0 py-14">
  @foreach ($attributes['kpis'] ?? [] as $kpi)
    <div class="flex w-auto flex-col items-start gap-3">
      <span
        class="number-ticker text-neutral-900 810:text-39 text-3xl font-bold leading-tight-116"
        data-start="0"
        data-value="{{ $kpi['number'] ?? 0 }}"
        data-decimals="0"
        data-delay="0"
        data-unit="{{ $kpi['unit'] ?? '' }}"
      >
        0
      </span>

      @if (!empty($kpi['paragraph'] ?? ''))
        <x-paragraph :text="$kpi['paragraph'] ?? ''" class="text-xl !leading-normal-158 !text-neutral-700 max-w-2/3" />
      @endif
    </div>
  @endforeach
</div>