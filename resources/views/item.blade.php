@extends('layouts.app')

@section('kotak_hijau')
<div class="container">
     <div class="row">
        <div class="col-md-12">
         
            <div class="row">

                <div class="col-md-4">
                        

                    <p>{{ $item->name }}</p>

                    @foreach ($item->details as $detail)
                    <img src="{{ asset('storage/'.$detail->filename) }}">
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endsection

@section('kotak_merah')
Ini adalah footer
@endsection
