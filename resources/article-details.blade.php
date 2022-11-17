@extends('layouts.front')

@section('content') 

<section class="nga-hero-section default -bg-deep-blue  " data-opacity="1" style="@if($blog->banner!==null) background-image: url('{{ asset("uploads/blog/$blog->banner") }}');@else background-image: url('{{ asset("uploads/def-banner.jpg") }}');@endif" >
  {{-- <div class="parallax-container">
  </div> --}}
  <div class="text-bg-gradient ">
  </div>
  <div class="hero-text-container">
    <div class="container">
      <div class="content-wrapper">
        <header class="nga-animate eyebrow blur-in-800">
          <a href="#">
            Indian Institute of Public Administration
          </a>
        </header>
        <h1 class=" nga-animate u-ts-3 slight-slide-down-0">
          {{ $blog->title }}
        </h1>
        <footer class="nga-animate blur-in-800">
          @php
            $timestamp = strtotime($blog->created_at);
            $newDate = date('d-M-Y', $timestamp);
            @endphp
          <time class="hero-article-info">
            {{ $newDate }}
          </time>
          <span class="hero-article-info">
            | Podcast
          </span>
        </footer>
      </div>
    </div>
  </div>
</section>

<section class="blog-section">
  <div class="container">
    <div class="header-dive">
      <div class="share-about">
        <p>{!! htmlspecialchars_decode($blog->description) !!}</p>
        <p>Editor: <span>{{ $blog->editor}}</span></p>
      </div>
     {{--  <div class="share-wraper">
        <a href="#"><i class="fa fa-twitter" aria-hidden="true" title="twiter"></i></a>
        <a href="#"><i class="fa fa-facebook" aria-hidden="true" title="facebook"></i></a>
        <a href="#"><i class="fa fa-share-alt" aria-hidden="true" title="Share"></i></a>
        <a href="{{ asset("uploads/blog/$blog->pdf") }}" target="_blank"><i class="fa fa-download" aria-hidden="true" title="Download"></i></a>
      </div> --}}
  </div>  
</section>
<hr/>

<div class="container">
 <div  class="row">
    
    <div class="col-xs-3 tab_head">

      <h3>Articles</h3>
      <hr/>

      <ul class="nav nav-tabs leftNav tabs-left sideways">
        @foreach($blog->articles as $key => $article )
        <div class="row article-row">
          {{-- {{ dd($key+1) }} --}}
          <li class="tab_li {{ $key== 0 ? 'active' : '' }}" >
            <div class="col-xs-8 tab_article">
              <a href="#{{ $article->id }}" data-toggle="tab" >
                <h5 class="a-t-clamp">{{ $article->title }}</h5>
                @php
                $timestamp = strtotime($article->created_at);
                $newDate = date('d-M-Y', $timestamp);
                @endphp 
              <span>{{ $article->editor }}</span> </a>
            </div>
            <div class="col-xs-4" style="padding-left: 5px;">
            <a href="#{{ $article->id }}" data-toggle="tab">
              @if($article->image!==null)
              <img src="{{ asset("uploads/article/$article->image") }}" class="img-responsive">
              @endif
            </a>
            </div>
          </li>
        </div>
        @endforeach
      </ul>

    </div>
    
    <div class="col-xs-8 tab_content">
      <!-- Tab panes -->
      <div class="article tab-content">
        @foreach($blog->articles as $key => $article )
        <div class="tab-pane {{ $key== 0 ? 'active' : '' }}" id="{{ $article->id }}" >
          <h2 class="blog-title">{{ $article->title }}
          </h2>
          <p class="description-blog">{!! htmlspecialchars_decode(ucfirst($article->description)) !!}</p>
        </div>
        @endforeach
      </div>
    </div>

    <div class="col-xs-1 share-article">
      <ul>
        <li>
          <a href="https://twitter.com/iipa9/" class="icon-with-text" title="twiter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
        </li>
        <li><a href="#"><i class="fa fa-facebook" aria-hidden="true" title="facebook"></i></a>
        </li>
        <li><a href="https://www.youtube.com/results?search_query=iipa"><i class="fa fa-youtube" aria-hidden="true" title="Youtube"></i></a></li>       
        <li><a href="#"><i class="fa fa-envelope" aria-hidden="true" title="Email"></i></a></li>       
      </ul>
    </div>

    <div class="tab_clearfix clearfix"></div>

  </div>
</div>
@endsection
@push('styles')
  <link rel="stylesheet" type="text/css" href="{{ asset('css/blog.css') }}">
  <style type="text/css">

  .nav.leftNav>li>a>img {
      max-width: -webkit-fill-available;
  }
  .nav.leftNav>li>a{
    padding: 5px 6px;
  }
  .tab_li{
    padding-bottom: 2rem;
  }
  .tab_clearfix{
    padding-bottom: 5rem;
  }
  .col-xs-3.tab_head{
    padding-right: 0;
    padding-left: 0;
  }
  .tabs-left {
    border-bottom: none;
    border-right: 1px solid #ddd;
  }

  .tabs-left>li {
    float: none;
    margin:0px;
    
  }

  .tabs-left>li.active>a,
  .tabs-left>li.active>a:hover,
  .tabs-left>li.active>a:focus {
    border-bottom-color: #ddd;
    border-right-color: transparent;
    background:#ddc;
    border:none;
    color: #2251ff;
    border-radius:0px;
    margin:0px;
  }
  .nav-tabs>li>a:hover {
      /* margin-right: 2px; */
      line-height: 1.42857143;
      border: 1px solid transparent;
      /* border-radius: 4px 4px 0 0; */
  }
  .tabs-left>li.active>a::after{content: "";
      position: absolute;
      top: 10px;
      right: -10px;
      border-top: 10px solid transparent;
      border-bottom: 10px solid transparent; 
      border-left: 10px solid #ddc;
      display: block;
      width: 0;
    }
      .tab_article{
        padding-right: 0;
      }
      .article.tab-content {
          overflow-y: scroll;
          max-height: 80vh;
          border-right: 1px solid #ddd;
      }
      .article.tab-content::-webkit-scrollbar {
          display: none;
          -ms-overflow-style: none; 
          scrollbar-width: none;
      }
      .article-row{
        padding-bottom: 3rem ;
      }
      h5.a-t-clamp {
        margin-top: 0;
        font-weight: 600;
      }
      .tab_article a{
        text-decoration: none;
        color: #000;
      }
      .tab_article :hover{
        color: #2251ff;
      }
      .tab_article a:focus{
        color: #2251ff;
      }
      .a-t-clamp {
        padding: 0;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;  
        overflow: hidden;
      }
      .share-article li{
        list-style: none;
        padding: 10px 0;
        font-size: 2rem;
      } 
      .share-article li a i:hover{
        color: #000;
      }

      

  </style>
@endpush

@push('scripts')
  <script type="text/javascript">
    var fixmeTop = $('.fixme').offset().top;
    $(window).scroll(function() {
      console.log('wirkg');
        var currentScroll = $(window).scrollTop();
        if (currentScroll >= fixmeTop) {
            $('.fixme').css({
                position: 'fixed',
                // top: '0',
                // left: '0'
            });
        } else {
            $('.fixme').css({
                // position: 'relative'
            });
        }
    });
  </script>
@endpush


