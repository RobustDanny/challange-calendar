@extends('layouts.app')

@section('context')


<div class="flex">


The latest year is: {{$year}}    


</div>

<div class="place-content-center grid grid-rows-1 grid-flow-col text-sm-center">
    <form method="post" action="{{route('months.store' )}}">
        @csrf
        <button type="submit" class="border-solid border-2 border-lime-300 ">
            Make new year
        </button>
    </form>
</div>


@endsection