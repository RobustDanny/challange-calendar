@extends('layouts.app')

<head >
<link rel="stylesheet" href="css/app.css/">
</head>

@section('context')



<div class="flex place-content-center gap-4">

    <div class="text-center mb-10 mr-16">
        {{"Year " . $year->year}}
    </div>

    <form method="GET" action="{{route('months.index')}}">
        <input type="hidden" name="year" value="{{$year->year-1}}">
        <button type="submit">
            ◀
        </button>
    </form>

    <form>
        <input type="hidden" name="year" value="{{$year->year+1}}">
        <button type="submit">
            ▶
        </button>
    </form>


</div>
<div class="mb-10 place-content-center grid grid-rows-3 grid-flow-col gap-2 w-full">

    @foreach ($months as $month)

    <div style="cursor: pointer"
        class="place-content-center size-16 border-solid border-2 border-lime-300 rounded-lg outline-4 text-center">



        <a href="{{route('months.show', ['month'=> $month->id])}} " class="">
            {{$month->month_name}}
        </a>


    </div>

    @endforeach

</div>


<div class="place-content-center grid grid-rows-1 grid-flow-col text-sm-center">
    <form method="post" action="{{route('months.store' )}}">
        @csrf
        <button type="submit" id="button-48" class="button-48">
            Make new year
        </button>
    </form>
</div>
@endsection