@extends('layouts.app')

@section('title')Все сообщения@endsection

@section('content')
    <h1>Все сообщения</h1>

    @foreach($data as $item)
        <div class="alert alert-info">
            <h3> {{ $item->subject }} </h3>
            <p> {{ $item->email }} </p>
            <p><small> {{ $item->created_at }} </small></p>
            <a href="{{ route('contact-detail', $item->id) }}"><button class="btn btn-warning">Детальнее</button></a>
        </div>
    @endforeach

    {{ $data->links() }}
@endsection


