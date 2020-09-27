@extends('storefront::public.layout')

@section('title', $page->name)

//TODO:Add meta
@push('meta')
    <meta name="title" content="{{ $page->meta->meta_title ?? $page->name}}">
    <meta name="keywords" content="{{ implode(',', $page->meta->meta_keywords) }}">
    <meta name="description" content="{{ $page->meta->meta_description }}">
    <meta property="og:title" content="{{ $page->meta->meta_title ?? $page->name }}">
    <meta property="og:description" content="{{ $page->meta->meta_description }}">
@endpush

@section('content')
    <div class="page-wrapper clearfix">
        {!! $page->body !!}
    </div>
@endsection
