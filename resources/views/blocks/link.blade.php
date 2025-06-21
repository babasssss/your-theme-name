@if (!empty($attributes['linkText']))
  <x-link 
    text="{{ $attributes['linkText'] }}" 
    url="{{ !empty($attributes['linkUrl']) ? $attributes['linkUrl'] : '#' }}" 
    target="{{ $attributes['linkTarget'] }}" 
  />
@endif