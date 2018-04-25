@extends('layouts.admin')

@section('content')
    <admin-dashboard @switchto="changesection" :section="section" ></admin-dashboard>
@endsection
