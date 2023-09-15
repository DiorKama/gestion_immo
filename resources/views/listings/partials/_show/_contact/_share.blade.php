<div class="listing-item__share-bar__inner text-center pb-3">
    <h2 class="listing-item__share-bar-title">
        {{ __('Partagez ce bien avec vos amis') }}
    </h2>

    <div class="listing-item__share-bar-items">
        @foreach(config('core.share') as $serviceName => $shareServiceUrl)
            @php
                $shareUrl = request()->fullUrlWithQuery(
                    [
                        'utm_campaign' => 'share-button',
                        'utm_medium' => 'social',
                        'utm_source' => $serviceName,
                    ]
                );

                $encodedUrl = sprintf(
                    '%s%s',
                    $shareServiceUrl,
                    urlencode($shareUrl)
                );
            @endphp

            <a
                class="listing-item__share-bar-link listing-item__share-bar-link--{{ $serviceName }}"
                title="{{ __('Partagez sur :network', [
                    'network' => $serviceName
                ]) }}"
                rel="noopener noindex nofollow"
                href="{{ $encodedUrl }}"
                target="_blank"
                @if($serviceName === 'whatsapp')
                    data-whatsapp="{{ whatsapp_url('', $shareUrl, false) }}"
                @endif
            >
                <i class="fab fa-{{ $serviceName }}"></i>
            </a>
        @endforeach
    </div>
</div>
