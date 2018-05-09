@extends('layouts.admin')

@section('content')
    <admin-dashboard @switchto="changesection" :section="section" :mobile-menu-open="mobileMenuOpen" ></admin-dashboard>
@endsection
