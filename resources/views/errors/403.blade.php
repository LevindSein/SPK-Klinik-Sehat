@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))


<?php
if(Session::get('role') == NULL)
    return redirect()->route('login')->send()->with('warning','Silakan Login dahulu');
?>