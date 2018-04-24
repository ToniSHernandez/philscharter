@extends('layouts.admin')

@section('content')
    <dashboard @switchto="changesection" :section="section" ></dashboard>
@endsection
