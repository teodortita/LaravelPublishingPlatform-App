@component('mail::layout')
    {{-- Header --}}
    @slot('header')
        @component('mail::header', ['url' => config('app.url')])
            Secretul Bancherului
        @endcomponent
    @endslot

{{-- Body --}}
    <b>Felicitari,</b> {{ $userName }}!
    <br><br>
    Tocmai ai publicat un nou articol pe aceasta platforma,
    cu numele: "{{ $newPost->title }}".
    <br><br>
    Il poti vizualiza <a href="{{ $newPost->url() }}">aici</a>.
    <br><br>
    O zi buna!

{{-- Footer --}}
    @slot('footer')
        @component('mail::footer')
            © {{ date('Y') }} Secretul Bancherului.
        @endcomponent
    @endslot
@endcomponent