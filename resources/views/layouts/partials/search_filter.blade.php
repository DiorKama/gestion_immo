<div>
    <form
        action=""
        method="GET"
        class="search-form"
    >
        <div class="search-form__filters">
            <div class="col">
                <input type="text" class="form-control" name="q" placeholder="Recherchez ...">
            </div>
        </div>

        <div class="search-form__actions">
            <div class="search-form__col--action">
                <button type="submit" class="btn btn-primary">
                    {{ __('Rechercher') }}
                </button>

                {{-- @foreach($filters as $key => $value)
                    @if(is_array($value))
                        @php($formKey = Str::snake(Str::singular($key)) . '_id')
                        <div class="col">
                            @if(in_array($key, ['users']))
                                Form::formField(
                                    $formKey,
                                    'text',
                                    null,
                                    [
                                        'class' => 'form-control js-autocomplete',
                                    ],
                                    false
                                )
                            @else
                                Form::select(
                                    $formKey,
                                    [
                                        null => 'All ' . ucwords(str_replace('_',' ',Str::snake($key)))
                                    ] + $value,
                                    Request::input($formKey),
                                    [
                                        'class' => 'form-control',
                                    ]
                                )
                            @endif
                        </div>
                    @endif
                @endforeach --}}

                @yield('customFilters')
            </div>

            <div class="search-formh__col--action">
                <a
                    class="btn btn-default"
                    href="{{ Request::url() }}"
                >
                    {{ __('Réinitialiser') }}
                </a>
            </div>
        </div>
    </form>
</div>
