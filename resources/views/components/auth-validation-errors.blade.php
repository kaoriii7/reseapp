@props(['errors'])

@if ($errors->any())
    <div {{ $attributes }}>
        <div class="error">
            {{ __('おっと！入力を間違えたようだ。') }}
        </div>

        <ul class="error">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<style>
  li {
    list-style: none;
  }
  .error {
    margin: 20px 50px;
  }
</style>
