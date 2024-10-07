@extends('layouts.app')


@section('context')

<div class="place-content-center grid grid-rows-1  gap-10 drop-shadow-md text-black-50 mb-4">

<div class="place-content-center flex gap-10">
<a href="{{route('months.index')}}">
    {{$month->month_name}} {{$month->year}}
</a>
</div>

<div class=" flex gap-10 mb-4">
<form method="POST" action="{{route('months.update', ['month' => $month])}}">
    @csrf

    @method('PUT')

    @if($month->challenge)


    <label for="challenge" class="">
        Challenge: {{ $month->challenge }}
    </label>
    

    @else
    <input name="challenge"  placeholder="Add a challenge">
    <button type="submit">
        Go!
    </button>
    @endif
</form>

</div>

</div>



<div class="flex place-content-center grid grid-rows-6 grid-flow-col gap-2 drop-shadow-md">
    @foreach ($days as $day)
    

    @if($day->complete)

    <form method="GET" action="{{route('day.toggle', ['day'=>$day])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="place-content-center text-center size-20 rounded-lg border bg-green-300 text-green-500">
            {{$day->name}}
        </button>
    </form>
    
    @else

    <form method="GET" action="{{route('day.toggle', ['day'=>$day])}}">
        @csrf
        @method('PUT')
        <button type="submit" class="place-content-center text-center size-20 rounded-lg border bg-rose-300 text-rose-500">
            {{$day->name}}
        </button>
    </form>

    @endif

    @endforeach
</div>

@endsection

