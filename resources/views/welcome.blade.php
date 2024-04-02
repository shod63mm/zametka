@extends('layout.head')
@section('content')
<div class="bg-blue-500 w-full px-0 py-5">
    <img src="{{ asset('images/logo.png') }}" alt="" class="h-[35px] w-auto mx-auto px-4">
</div>
<div class="bg-blue-500">
    @livewire('zametka')
    
</div>

<div class="absolute w-full text-center bottom-0 py-5 bg-blue-500 text-xl text-white font-semibold">
    Powered by <a href="https://instagram.com/mahmudov.shod" class="text-yellow-500">mahmudov.shod</a>
</div>
@endsection