@props(['name' => ''])
@error($name)
    <span class="text-red">{{ $message }}</span>
@enderror
