@extends('layouts.master')
@section('css')
    @toastr_css
    @section('title')
        {{ trans('main_trans.lecture') }}
    @stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
    @section('PageTitle')
        {{ trans('main_trans.lecture') }}
    @stop
    <!-- breadcrumb -->
@endsection
@section('content')
    <div class="justify-content-between ">
        <a href="{{ route('video.create') }}" class="btn btn-primary btn-sm m-2"> {{ __('main_trans.add_video') }}</a>
    </div>
    <div class="row mb-5">
        @forelse($videos as $video)
            <div class="col-md-4 m-auto ">
                <div class="blog-image m-2 p-2">
                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('storage/attachments/image/' . $video->image_url)}}" alt="{{ $video->image_url }}"></a>
                </div>
                <div class="title">
                    {{ $video->title }}
                </div>
                <div class="description p-2">
                    <p class="lead">
                        {!! Str::words($video->description, 25, '' ) !!}
                    </p>
                    <a href="blog-details.html" class="m-1 d-block"><i class="fa fa-long-arrow-right text-primary"></i> Read More</a>
                </div>
                <span class="divider border-bottom border-primary w-full h-25 d-block"></span>
                <div class="bottom d-flex justify-content-between mb-10">
                    <div class="">
                        <ul>
                            <li><a href="#."><i class="fa fa-calendar"></i> <span> {{$video->created_at->diffForHumans()}}</span></a></li>
                        </ul>
                    </div>
                    <div class="">
                        <a href="#."><i class="fa fa-heart-o"></i>21</a>
                        <a href="#."><i class="fa fa-eye"></i>8</a>
                        <a href="#."><i class="fa fa-comment-o"></i>17</a>
                    </div>
                </div>
            </div>

        @empty
            <p> Sory No Video uploaded Yet!</p>
        @endforelse
    </div>

@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection
<!-- row -->
{{--<div class="row">--}}
{{--    @forelse($videos as $video)--}}
{{--        <div class="col-sm-6 col-md-4 col-lg-4">--}}

{{--            <div class="blog grid-blog">--}}
{{--                <div class="blog-image">--}}
{{--                    <a href="blog-details.html"><img class="img-fluid" src="{{ asset('storage/attachments/image/' . $video->image_url)}}" alt=""></a>--}}
{{--                </div>--}}

{{--                <div class="blog-content">--}}
{{--                    <h3 class="blog-title"><a href="">{{ $video->title }}</a></h3>--}}
{{--                    <p>{{ $video->description }}</p>--}}
{{--                    <a href="blog-details.html" class="read-more"><i class="fa fa-long-arrow-right"></i> Read More</a>--}}
{{--                    <div class="d-flex justify-content-between m-1">--}}
{{--                        <div class="post-left">--}}
{{--                            <ul>--}}
{{--                                <li><a href="#."><i class="fa fa-calendar"></i> <span>{{ $video->created_at }}</span></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="post-right">--}}
{{--                            <a href="#."><i class="fa fa-heart-o"></i>21</a>--}}
{{--                            <a href="#."><i class="fa fa-eye"></i>8</a>--}}
{{--                            <a href="#."><i class="fa fa-comment-o"></i>17</a>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                @empty--}}
{{--                    <p>Sory No Video Uploaded Yet...</p>--}}

{{--            </div>--}}

{{--        </div>--}}
{{--    @endforelse--}}
{{--</div>--}}
<!-- row closed -->
