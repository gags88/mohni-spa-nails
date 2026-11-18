@php
    $menuId = 'treatment-menu-' . $menuKey . (!empty($menuIdSuffix) ? '-' . $menuIdSuffix : '');
    $menu = config('service-pricing.' . $menuKey);

    if (!empty($only)) {
        $menu['groups'] = collect($menu['groups'])->map(function ($group) use ($only) {
            $group['items'] = array_values(array_filter($group['items'], function ($item) use ($only) {
                return in_array($item['name'], $only, true);
            }));
            $group['wide'] = true;

            return $group;
        })->filter(function ($group) {
            return count($group['items']) > 0;
        })->values()->all();
    }

    if (!empty($groupTitle)) {
        $menu['groups'] = collect($menu['groups'])->map(function ($group) use ($groupTitle) {
            $group['title'] = $groupTitle;

            return $group;
        })->all();
    }

    $menu['title'] = $menuTitle ?? $menu['title'];
    $menu['intro'] = $menuIntro ?? $menu['intro'];
@endphp

<section id="{{ $menuId }}" class="mohni-treatment-menu" aria-labelledby="{{ $menuId }}-title">
    <header class="mohni-treatment-menu__header">
        <p class="mohni-eyebrow">Treatment menu</p>
        <h2 id="{{ $menuId }}-title">{{ $menu['title'] }}</h2>
        <p>{{ $menu['intro'] }}</p>
    </header>

    <div class="mohni-treatment-menu__groups">
        @foreach ($menu['groups'] as $group)
            <details class="mohni-treatment-menu__group {{ !empty($group['wide']) ? 'mohni-treatment-menu__group--wide' : '' }}" name="{{ $menuId }}">
                <summary class="mohni-treatment-menu__group-header">
                    <span class="mohni-treatment-menu__group-title">{{ $group['title'] }}</span>
                    <span class="mohni-treatment-menu__group-meta">
                        @if (!empty($group['note']))
                            <span>{{ $group['note'] }}</span>
                        @else
                            <span>{{ count($group['items']) }} {{ count($group['items']) === 1 ? 'treatment' : 'treatments' }}</span>
                        @endif
                        <i aria-hidden="true"></i>
                    </span>
                </summary>

                <div class="mohni-treatment-menu__group-body">
                    <ul class="mohni-treatment-menu__items">
                        @foreach ($group['items'] as $item)
                            <li class="mohni-treatment-menu__item">
                                <div class="mohni-treatment-menu__details">
                                    <span class="mohni-treatment-menu__name">{{ $item['name'] }}</span>
                                    @if (!empty($item['duration']))
                                        <span class="mohni-treatment-menu__duration">{{ $item['duration'] }}</span>
                                    @endif
                                </div>
                                <span class="mohni-treatment-menu__price">{{ $item['price'] }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </details>
        @endforeach
    </div>

    <footer class="mohni-treatment-menu__footer">
        <p>All treatment times are approximate. Please contact us if you need help choosing a service.</p>
        <a href="{{ config('services.booking.url') }}" class="mh-btn">Book an appointment</a>
    </footer>
</section>
