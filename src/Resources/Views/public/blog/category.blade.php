@extends('storefront::public.layout')

@section('title', $category->name)



@section('breadcrumb')
@endsection

@section('content')

    <!-- <img src="./blog-page.jpg" class="home" alt=""> -->
<main >

    
    <section class="bg-before-dot">
        <div class="container">
            <div class="sidebar-fixed row">
                <div class="mainside col-md-9">

                    

                    <div class="main-article">
                        <div class="category-breadcrumb">
                            <ul>
                                @foreach ($posts[0]->categories as $postcategory)
                                <li>
                                    @if ($loop->first)
                                        <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                    @endif
                                    <a href="{{route('post.category', $postcategory->slug)}}">
                                        {{$postcategory->name}}
                                    </a> 
                                    
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        <a href="{{ route('post.details',  $posts[0]->slug ) }}">
                            <h1 class="title">
                                {{ $posts[0]->title }}
                            </h1>
                        </a>
                        <h3 class="author">
                            <span>
                                نوشته شده:  
                            </span>
                            <a >
                                {{ $posts[0]->author->first_name }}
                                {{ $posts[0]->author->last_name }}
                            </a>
                        </h3>

                        @isset( $posts[0]->images )
                            <div class="article-pic">
                                <img src="{{ $posts[0]->images['main']  }}" alt="{{ $posts[0]->title }}" class="mw-100">
                            </div>
                        @endisset

                        <div class="article-description">
                                <p>
                                    {{ $posts[0]->summary }}
                                   
                                </p>
                        </div>
                        <div class="readmore">
                            <a href="{{ route('post.details',  $posts[0]->slug ) }}">
                                <span class="red btn ">
                                    بیشتر بخوانید
                                </span>
                            </a>
                        </div>
                        <div class="share-and-comment">
                            <div class="comment-and-date">
                                <div class="carate-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="14"  viewBox="0 0 18.4 19.82" enable-background="new 0 0 18.4 19.82"><path d="M17.98 3.25a1.35 1.35 0 0 0-.99-.42h-1.42V1.77c0-.49-.17-.9-.52-1.25A1.7 1.7 0 0 0 13.8 0h-.71c-.49 0-.9.17-1.25.52a1.7 1.7 0 0 0-.52 1.25v1.06H7.08V1.77c0-.49-.17-.9-.52-1.25A1.7 1.7 0 0 0 5.31 0H4.6c-.49 0-.9.17-1.25.52a1.7 1.7 0 0 0-.52 1.25v1.06H1.42c-.38 0-.72.14-1 .42-.28.28-.42.61-.42 1V18.4c0 .38.14.71.42.99.28.28.61.42 1 .42h15.57c.38 0 .72-.14 1-.42.28-.28.42-.61.42-.99V4.25a1.41 1.41 0 0 0-.43-1zm-5.24-1.48c0-.1.03-.19.1-.25.07-.07.15-.1.25-.1h.71c.1 0 .19.03.25.1.07.07.1.15.1.25v3.18c0 .1-.03.19-.1.25a.33.33 0 0 1-.25.1h-.71a.32.32 0 0 1-.25-.1.33.33 0 0 1-.1-.25V1.77zm-8.49 0c0-.1.03-.19.1-.25.07-.07.15-.1.25-.1h.71c.1 0 .19.03.25.1.07.07.1.15.1.25v3.18c0 .1-.03.19-.1.25a.33.33 0 0 1-.25.1H4.6a.32.32 0 0 1-.25-.1.33.33 0 0 1-.1-.25V1.77zM16.98 18.4H1.42V7.08h15.57V18.4zm0 0"/></svg>
                                        <span>
                                            {{ $posts[0]->published_at}}
                                        </span>
                                </div>
                            </div>

                            <div class="share-it">
                                <ul>
                                    <li class=""> <a href="https://www.facebook.com/sharer.php?u={{ config('app.url') }}/{{$posts[0]->slug}}">
                                        <svg class="share-icon-size" width="20px" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 408.788 408.788" style="enable-background:new 0 0 408.788 408.788;" xml:space="preserve">
                                            <path style="fill:#475993;" d="M353.701,0H55.087C24.665,0,0.002,24.662,0.002,55.085v298.616c0,30.423,24.662,55.085,55.085,55.085 h147.275l0.251-146.078h-37.951c-4.932,0-8.935-3.988-8.954-8.92l-0.182-47.087c-0.019-4.959,3.996-8.989,8.955-8.989h37.882 v-45.498c0-52.8,32.247-81.55,79.348-81.55h38.65c4.945,0,8.955,4.009,8.955,8.955v39.704c0,4.944-4.007,8.952-8.95,8.955 l-23.719,0.011c-25.615,0-30.575,12.172-30.575,30.035v39.389h56.285c5.363,0,9.524,4.683,8.892,10.009l-5.581,47.087 c-0.534,4.506-4.355,7.901-8.892,7.901h-50.453l-0.251,146.078h87.631c30.422,0,55.084-24.662,55.084-55.084V55.085 C408.786,24.662,384.124,0,353.701,0z"></path>
                                        </svg>
                                        <!-- Facebook -->
                                    </a></li>
                                <li class=""> <a href="tg://msg_url?url={{ config('app.url') }}/{{$posts[0]->slug}}">
                                        <svg class="share-icon-size" width="20px" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve">
                                            <circle style="fill:#41B4E6;" cx="255.997" cy="256" r="255.997"></circle>
                                            <path style="fill:#0091C8;" d="M512,256.003c0-6.238-0.235-12.419-0.673-18.546L405.228,131.36L106.772,248.759l114.191,114.192 l1.498,5.392l1.939-1.955l0.008,0.008l-1.947,1.947L348.778,494.66C444.298,457.5,512,364.663,512,256.003z"></path>
                                            <polygon style="fill:#FFFFFF;" points="231.138,293.3 346.829,380.647 405.228,131.36 106.771,248.759 197.588,278.84 363.331,167.664 "></polygon>
                                            <polygon style="fill:#D2D2D7;" points="197.588,278.84 222.461,368.344 231.138,293.3 363.331,167.664 "></polygon>
                                            <polygon style="fill:#B9B9BE;" points="268.738,321.688 222.461,368.344 231.138,293.3 "></polygon>
                                        </svg>
                                        <!-- Telegram -->
                                    </a></li>
                                <li class=""> <a href="https://twitter.com/intent/tweet?url={{ config('app.url') }}/{{$posts[0]->slug}}">
                                        <svg class="share-icon-size" width="20px"   xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 112.197 112.197" style="enable-background:new 0 0 112.197 112.197;" xml:space="preserve">
                                            <g>
                                                <circle style="fill:#55ACEE;" cx="56.099" cy="56.098" r="56.098"></circle>
                                                <g>
                                                    <path style="fill:#F1F2F2;" d="M90.461,40.316c-2.404,1.066-4.99,1.787-7.702,2.109c2.769-1.659,4.894-4.284,5.897-7.417 c-2.591,1.537-5.462,2.652-8.515,3.253c-2.446-2.605-5.931-4.233-9.79-4.233c-7.404,0-13.409,6.005-13.409,13.409 c0,1.051,0.119,2.074,0.349,3.056c-11.144-0.559-21.025-5.897-27.639-14.012c-1.154,1.98-1.816,4.285-1.816,6.742 c0,4.651,2.369,8.757,5.965,11.161c-2.197-0.069-4.266-0.672-6.073-1.679c-0.001,0.057-0.001,0.114-0.001,0.17 c0,6.497,4.624,11.916,10.757,13.147c-1.124,0.308-2.311,0.471-3.532,0.471c-0.866,0-1.705-0.083-2.523-0.239 c1.706,5.326,6.657,9.203,12.526,9.312c-4.59,3.597-10.371,5.74-16.655,5.74c-1.08,0-2.15-0.063-3.197-0.188 c5.931,3.806,12.981,6.025,20.553,6.025c24.664,0,38.152-20.432,38.152-38.153c0-0.581-0.013-1.16-0.039-1.734 C86.391,45.366,88.664,43.005,90.461,40.316L90.461,40.316z"></path>
                                                </g>
                                            </g>
                                        </svg>
                                        <!-- Twitter -->
                                    </a></li>
                                <li class=""> <a href="whatsapp://send?text={{ config('app.url') }}/{{$posts[0]->slug}}">
                                        <svg class="share-icon-size" viewBox="-1 0 512 512" width="20px" xmlns="http://www.w3.org/2000/svg">
                                            <path d="m10.894531 512c-2.875 0-5.671875-1.136719-7.746093-3.234375-2.734376-2.765625-3.789063-6.78125-2.761719-10.535156l33.285156-121.546875c-20.722656-37.472656-31.648437-79.863282-31.632813-122.894532.058594-139.941406 113.941407-253.789062 253.871094-253.789062 67.871094.0273438 131.644532 26.464844 179.578125 74.433594 47.925781 47.972656 74.308594 111.742187 74.289063 179.558594-.0625 139.945312-113.945313 253.800781-253.867188 253.800781 0 0-.105468 0-.109375 0-40.871093-.015625-81.390625-9.976563-117.46875-28.84375l-124.675781 32.695312c-.914062.238281-1.84375.355469-2.761719.355469zm0 0" fill="#e5e5e5"></path>
                                            <path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0" fill="#fff"></path>
                                            <path d="m19.34375 492.625 33.277344-121.519531c-20.53125-35.5625-31.324219-75.910157-31.3125-117.234375.050781-129.296875 105.273437-234.488282 234.558594-234.488282 62.75.027344 121.644531 24.449219 165.921874 68.773438 44.289063 44.324219 68.664063 103.242188 68.640626 165.898438-.054688 129.300781-105.28125 234.503906-234.550782 234.503906-.011718 0 .003906 0 0 0h-.105468c-39.253907-.015625-77.828126-9.867188-112.085938-28.539063zm0 0" fill="#64b161"></path>
                                            <g fill="#fff">
                                                <path d="m10.894531 501.105469 34.46875-125.871094c-21.261719-36.839844-32.445312-78.628906-32.429687-121.441406.054687-133.933594 109.046875-242.898438 242.976562-242.898438 64.992188.027344 125.996094 25.324219 171.871094 71.238281 45.871094 45.914063 71.125 106.945313 71.101562 171.855469-.058593 133.929688-109.066406 242.910157-242.972656 242.910157-.007812 0 .003906 0 0 0h-.105468c-40.664063-.015626-80.617188-10.214844-116.105469-29.570313zm134.769531-77.75 7.378907 4.371093c31 18.398438 66.542969 28.128907 102.789062 28.148438h.078125c111.304688 0 201.898438-90.578125 201.945313-201.902344.019531-53.949218-20.964844-104.679687-59.09375-142.839844-38.132813-38.160156-88.832031-59.1875-142.777344-59.210937-111.394531 0-201.984375 90.566406-202.027344 201.886719-.015625 38.148437 10.65625 75.296875 30.875 107.445312l4.804688 7.640625-20.40625 74.5zm0 0"></path>
                                                <path d="m195.183594 152.246094c-4.546875-10.109375-9.335938-10.3125-13.664063-10.488282-3.539062-.152343-7.589843-.144531-11.632812-.144531-4.046875 0-10.625 1.523438-16.1875 7.597657-5.566407 6.074218-21.253907 20.761718-21.253907 50.632812 0 29.875 21.757813 58.738281 24.792969 62.792969 3.035157 4.050781 42 67.308593 103.707031 91.644531 51.285157 20.226562 61.71875 16.203125 72.851563 15.191406 11.132813-1.011718 35.917969-14.6875 40.976563-28.863281 5.0625-14.175781 5.0625-26.324219 3.542968-28.867187-1.519531-2.527344-5.566406-4.046876-11.636718-7.082032-6.070313-3.035156-35.917969-17.726562-41.484376-19.75-5.566406-2.027344-9.613281-3.035156-13.660156 3.042969-4.050781 6.070313-15.675781 19.742187-19.21875 23.789063-3.542968 4.058593-7.085937 4.566406-13.15625 1.527343-6.070312-3.042969-25.625-9.449219-48.820312-30.132812-18.046875-16.089844-30.234375-35.964844-33.777344-42.042969-3.539062-6.070312-.058594-9.070312 2.667969-12.386719 4.910156-5.972656 13.148437-16.710937 15.171875-20.757812 2.023437-4.054688 1.011718-7.597657-.503906-10.636719-1.519532-3.035156-13.320313-33.058594-18.714844-45.066406zm0 0" fill-rule="evenodd"></path>
                                            </g>
                                        </svg>
                                        <!-- Whatsapp -->
                                    </a></li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>



                        @foreach ($posts as $post)

                            @if ( !$loop->first)
                            
                                <!-- ========================= -->
                                <div class="intro-article">
                                    <div class="row">
                                        <div class="intro-article-pic col-12 col-sm-4 col-md-6 col-lg-5">
                                            <img src="{{$post->images['intro']}}" alt="{{  $post->title }}" class="mw-100">
                                        </div>
                                        <div class="intro-article-text col-12 col-sm-8 col-md-6 col-lg-7 text-center text-sm-right">
                                            <div class="category-breadcrumb ">
                                                <ul class="text-center text-sm-right">

                                                    @foreach ($post->categories as $category)
                                                    <li>
                                                        @if ($loop->first)
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                                        @endif
                                                        <a href="{{route('post.category', $category->slug)}}">
                                                            {{$category->name}}
                                                        </a> 
                                                        
                                                    </li>
                                                    @endforeach
                    
                                                </ul>
                                            </div>
                                            <a href="{{ route('post.details',  $posts[0]->slug ) }}">
                                                <h2 class="title">
                                                    {{  $post->title }}
                                                </h2>
                                            </a>
                                            <h3 class="author">
                                                <span>
                                                    نوشته شده:  
                                                </span>
                                                <a href="">
                                                    {{  $post->author->first_name }}
                                                    {{  $post->author->first_name }}

                                                </a>
                                            </h3>
                                            <div class="article-description d-none d-md-block">
                                                <p>
                                                    {{ $post->summary }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>  <!-- row  -->
                                </div>  <!-- intro-article  -->
                                <!-- ========================= -->

                            @endif

                        @endforeach


                    </div>
                        
                        {{-- <div class="pagenation">
                            <ul class="">
                                <li><a href="">۱</a></li>
                                <li><a href="">۲</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div> --}}


                        {{ $posts->links() }}






              </div>  <!-- mainside -->






  
              <div class="col-md-3 blog-sidebar">
                <div class="">
                    <div class="forpadding">


                        <div class="card">
                            <h4 class="title-sidebar"> واپسین نوشته‌ها </h4>
                            <div class="last-articles">


                                @foreach ($lastposts as $lastpost)
                                        
                                    <div class="last-article-intro">
                                        <div class="last-article-pic">
                                            <img src="{{ $lastpost->images['intro'] }}" alt="{{ $lastpost->title }}" class="mw-100">
                                        </div>
                                        <div class="last-article-title">
                                            <a href="{{ route('post.details' , $lastpost->slug ) }}">
                                                {{ $lastpost->title }}
                                            </a>
                                        </div>  
                                        <div class="last-article-date">
                                                {{  $lastpost->published_at }}
                                        </div>
                                    </div>
                                @endforeach
           
                            </div>
                        </div>




                        <div class="card">
                            <h4 class="title-sidebar"> دسته بندی نوشته‌ها </h4>
                            <div class="categorization ">
                                <ul>

                                    @foreach ($categories as $categiry)
                                        
                                    <li>
                                        <span class="for-border">
                                            <span class="link">
                                                <a href="{{ route('post.category' , $categiry->slug  ) }}">
                                                    {{ $categiry->name }}
                                                </a>
                                            </span>
                                            <span class="number">
                                                ({{  $categiry->posts_count }})
                                            </span>
                                        </span>
                                        {{-- <ul>
                                            <li>
                                                <span class="for-border">
                                                    <span class="link">
                                                        <a href="#">
                                                            مطالب آموزشی
                                                        </a>
                                                    </span>
                                                    <span class="number">
                                                        (۳۹)
                                                    </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="for-border">
                                                    <span class="link">
                                                        <a href="#">
                                                            مطالب آموزشی
                                                        </a>
                                                    </span>
                                                    <span class="number">
                                                        (۳۹)
                                                    </span>
                                                </span>
                                            </li>
                                            <li>
                                                <span class="for-border">
                                                    <span class="link">
                                                        <a href="#">
                                                            مطالب آموزشی
                                                        </a>
                                                    </span>
                                                    <span class="number">
                                                        (۳۹)
                                                    </span>
                                                </span>
                                            </li>
                                        </ul> --}}
                                    </li>
                                    @endforeach


                                </ul>
                            </div>
                        </div>


{{--                        @if ($socialLinks->isNotEmpty())--}}
{{--                            <div class="card">--}}
{{--                                <h4 class="title-sidebar d-none d-lg-block"> ما را در شبکه‌های اجتماعی دنبال کنید </h4>--}}
{{--                                <div class="social d-none d-lg-block">--}}
{{--                                    <div class="social-container">--}}
{{--                                        <ul class="">--}}
{{--                                            @foreach ($socialLinks as $icon => $link)--}}
{{--                                                @if (! is_null($link))--}}
{{--                                                    <li><a href="{{ $link }}"><i class="fa fa-{{ $icon }}" aria-hidden="true"></i></a></li>--}}
{{--                                                @endif--}}
{{--                                            @endforeach--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endif--}}



                        {{-- <div class="card">
                            <h4 class="title-sidebar d-none d-lg-block"> در اینستاگرام با ما همراه باشید </h4>

                            <div class="instagram d-none d-lg-flex">
                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>
                                
                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>
                                
                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>
                                
                                <div class="instagram-pic">
                                    <img src="./assets/img/demo/insta-(1).jpg" alt="">
                                </div>

                            </div>
                        </div> --}}

                    </div>

                </div>
            </div>

            <!-- sidebar -->



            </div>
        </div>
    </section>

</main>





@endsection
