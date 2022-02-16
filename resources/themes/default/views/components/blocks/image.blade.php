@props([
    'src',
    'title' => '',
])

<div>
    <img
        title="{{ $title }}"
        src="{{ nova_cms_image($src) }}"
    />
</div>
