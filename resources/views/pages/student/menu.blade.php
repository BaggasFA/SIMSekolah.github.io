{{--Marksheet--}}
<li class="nav-item">
    <a href="{{ route('marks.year_select', Auth::user()->id) }}" class="nav-link {{ in_array(Route::currentRouteName(), ['marks.show', 'marks.year_selector', 'pins.enter']) ? 'active' : '' }}"><i class="icon-book"></i> Hasil Ujian </a>
</li>
