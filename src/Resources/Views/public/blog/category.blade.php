@extends('storefront::public.layout')

@section('title', $PostCategory->title)



@section('breadcrumb')
@endsection

@section('content')

    <!-- <img src="./blog-page.jpg" class="home" alt=""> -->
<main >
    <div class="toppic-page">
        <!-- <img src="./assets/img/toppic/blog.jpg" alt=""> -->
        <div class="container">
            <div class="title">
                وبلاگ و مقالات
            </div>

        </div>
    </div>
    <section class="breadcrumb-section">
        <div class="container">
            <div class="row">
                <div class="breadcrumb-container d-none d-sm-flex col-sm-8">
                    <ol class="breadcrumb">
                        <li>
                            <a href="">امداد خودرو ایران</a>
                        </li>
                        <li>
                            مقالات
                        </li>
                    </ol>
                </div> <!-- breadcrumb-section -->
				<form class="search pt-2 pb-2 col-12 col-sm-4">
                    <input type="text" id="search" placeholder="جستجو ...">
                    <label for="search">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" class="pinkish-grey" width="15" height="16" viewBox="0 0 44 46.8" enable-background="new 0 0 44 46.8"><defs><path id="SVGID_1_" d="M0 0h43.92v46.8H0z"/></defs><clipPath id="SVGID_2_"><use xlink:href="#SVGID_1_" overflow="visible"/></clipPath><path d="M43.33 41.78L32.48 30.5c2.79-3.32 4.32-7.49 4.32-11.83C36.8 8.52 28.55.27 18.4.27 8.25.27 0 8.52 0 18.67c0 10.15 8.25 18.4 18.4 18.4 3.81 0 7.44-1.15 10.54-3.33L39.87 45.1c.46.48 1.07.74 1.73.74.62 0 1.21-.24 1.66-.67.96-.92.99-2.44.07-3.39zM18.4 5.07c7.5 0 13.6 6.1 13.6 13.6s-6.1 13.6-13.6 13.6-13.6-6.1-13.6-13.6 6.1-13.6 13.6-13.6zm0 0" clip-path="url(#SVGID_2_)"/></svg>
                    </label>
                </form>
            </div>
        </div> <!-- container -->
    </section>

    
    <section class="bg-before-dot">
        <div class="container">
            <div class="sidebar-fixed row">
                <div class="mainside col-md-9">
                    <div class="main-article">
                        <div class="category-breadcrumb">
                            <ul>
                                <li>
                                <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                <a href="">
                                        آموزش
                                </a> </li>
                                <li> <a href="">
                                    آشنایی با ما
                                </a> </li>
                            </ul>
                        </div>
                        <h1 class="title">
                            امداد خودرو دوست خوب خودرو شما
                        </h1>
                        <h3 class="author">
                            <span>
                                نوشته شده:  
                            </span>
                            <a href="">
                                روابط عمومی امداد خودرو ایران
                            </a>
                        </h3>
                        <div class="article-pic">
                            <img src="./assets/img/demo/main-article.jpg" alt="main-article">
                        </div>
                        <div class="article-description">
                                <p>
                                    لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی و فرهنگ پیشرو در زبان فارسی ایجاد کرد.
                                    در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها و شرایط سخت تایپ به پایان رسد وزمان مورد نیاز شامل حروفچینی دستاوردهای اصلی و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                </p>
                        </div>
                        <div class="readmore">
                            <a href="./blog-details.html">
                                <span>
                                    بیشتر بخوانید
                                </span>
                            </a>
                        </div>
                        <div class="share-and-comment">
                            <div class="comment-and-date">
                                <div class="carate-date">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="14"  viewBox="0 0 18.4 19.82" enable-background="new 0 0 18.4 19.82"><path d="M17.98 3.25a1.35 1.35 0 0 0-.99-.42h-1.42V1.77c0-.49-.17-.9-.52-1.25A1.7 1.7 0 0 0 13.8 0h-.71c-.49 0-.9.17-1.25.52a1.7 1.7 0 0 0-.52 1.25v1.06H7.08V1.77c0-.49-.17-.9-.52-1.25A1.7 1.7 0 0 0 5.31 0H4.6c-.49 0-.9.17-1.25.52a1.7 1.7 0 0 0-.52 1.25v1.06H1.42c-.38 0-.72.14-1 .42-.28.28-.42.61-.42 1V18.4c0 .38.14.71.42.99.28.28.61.42 1 .42h15.57c.38 0 .72-.14 1-.42.28-.28.42-.61.42-.99V4.25a1.41 1.41 0 0 0-.43-1zm-5.24-1.48c0-.1.03-.19.1-.25.07-.07.15-.1.25-.1h.71c.1 0 .19.03.25.1.07.07.1.15.1.25v3.18c0 .1-.03.19-.1.25a.33.33 0 0 1-.25.1h-.71a.32.32 0 0 1-.25-.1.33.33 0 0 1-.1-.25V1.77zm-8.49 0c0-.1.03-.19.1-.25.07-.07.15-.1.25-.1h.71c.1 0 .19.03.25.1.07.07.1.15.1.25v3.18c0 .1-.03.19-.1.25a.33.33 0 0 1-.25.1H4.6a.32.32 0 0 1-.25-.1.33.33 0 0 1-.1-.25V1.77zM16.98 18.4H1.42V7.08h15.57V18.4zm0 0"/></svg>
                                        <span>
                                            ۲۵ اردیبهشت ۱۳۹۷
                                        </span>
                                </div>
                                <div class="comment">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15"  viewBox="0 0 25.6 25.6" enable-background="new 0 0 25.6 25.6"><path d="M16.8 13.6h-8a.8.8 0 0 0-.8.8c0 .44.36.8.8.8h8a.8.8 0 0 0 .8-.8.8.8 0 0 0-.8-.8zm1.6-4.8H7.2a.8.8 0 0 0-.8.8c0 .44.36.8.8.8h11.2a.8.8 0 0 0 .8-.8.8.8 0 0 0-.8-.8zM12.8 0C5.73 0 0 5.02 0 11.2c0 3.53 1.88 6.68 4.8 8.73v5.67l5.6-3.4c.78.12 1.57.2 2.4.2 7.07 0 12.8-5.01 12.8-11.2C25.6 5.02 19.87 0 12.8 0zm0 20.8c-.93 0-1.84-.11-2.7-.29l-3.77 2.26.05-3.71C3.49 17.32 1.6 14.45 1.6 11.2c0-5.3 5.01-9.6 11.2-9.6 6.18 0 11.2 4.3 11.2 9.6s-5.02 9.6-11.2 9.6zm0 0" fill-rule="evenodd" clip-rule="evenodd"/></svg>
                                        <span>
                                                ۳۹
                                                 نظر ثبت شده
                                        </span>
                                </div>
                            </div>

                            <div class="share-it">
                                <ul>
                                    <li>
                                        <a href="">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="17.66" class="warm-grey" viewBox="0 0 17.66 14.36" enable-background="new 0 0 17.66 14.36"><path d="M17.17.27c-.7.42-1.48.72-2.3.88A3.62 3.62 0 0 0 8.7 4.46 10.32 10.32 0 0 1 1.23.66a3.65 3.65 0 0 0 1.12 4.85 3.8 3.8 0 0 1-1.64-.46v.05a3.64 3.64 0 0 0 2.91 3.56 3.7 3.7 0 0 1-1.63.06 3.63 3.63 0 0 0 3.38 2.52 7.27 7.27 0 0 1-5.36 1.5 10.23 10.23 0 0 0 5.55 1.63c6.66 0 10.31-5.53 10.31-10.32l-.01-.47a7.31 7.31 0 0 0 1.81-1.87c-.65.29-1.35.48-2.08.57A3.72 3.72 0 0 0 17.17.27z"/></svg>
                                        </a>
                                    </li>
                                    <li><a href="">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" class="warm-grey" viewBox="0 0 26.75 26" enable-background="new 0 0 26.75 26"><path d="M26.26.89A2.34 2.34 0 0 0 24.4 0c-.48 0-.98.13-1.48.4L1.6 11.55c-1.52.79-1.62 1.99-1.6 2.47.02.48.26 1.66 1.85 2.29l2.73 1.08c.52.2 1.1.31 1.72.31l.29-.02-.12.13c-.51.76-.53 1.79-.07 2.89l.02.05c.81 1.78 1.7 3.79 1.81 4.07.26.7.94 1.18 1.69 1.18 1.15 0 1.49-.55 3.37-3.61.15-.22.47-.75.53-1.41l.6.24 3.02 1.23 1.41.58.27.14c.21.08.44.13.67.13 1.37 0 1.7-1.19 1.88-1.82l.34-1.23 4.61-16.88c.35-1.29-.08-2.1-.36-2.48zM11.77 21.43s-1.71 2.77-1.85 2.77l-.01-.01c-.17-.45-1.86-4.18-1.86-4.18-.31-.75-.25-1.39.28-1.39.12 0 .26.03.42.1l1.31.68c.22.15.46.28.72.38l.07.03.12.06c1.02.54 1.34.73.8 1.56zM24.89 2.88l-4.6 16.88-.48 1.73-.01-.02-1.67-.69-3.02-1.23-3.35-1.33-.15-.06-.56-.29c-.56-.43-.61-1.13-.05-1.73l9.35-9.99c.38-.4.52-.61.44-.61-.06 0-.27.13-.62.4L8.33 15.27a3.48 3.48 0 0 1-3.1.45l-2.72-1.07c-.92-.36-.96-1.03-.08-1.5L23.76 1.98c.25-.13.46-.19.64-.19.46.01.67.41.49 1.09z" /></svg>
                                    </a></li>
                                    <li>
                                        <a href="#">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" class="warm-grey" viewBox="0 0 38 38" enable-background="new 0 0 38 38"><path class="st0" d="M16.88 1.14L12.56.17A6.53 6.53 0 0 0 4.75 5.1l-.98 4.35a18 18 0 0 1 13.11-8.31zM1.14 21.12l-.97 4.32a6.52 6.52 0 0 0 4.93 7.81l4.35.98a18 18 0 0 1-8.31-13.11zM32.9 4.75l-4.35-.98a18 18 0 0 1 8.31 13.11l.97-4.32a6.53 6.53 0 0 0-4.93-7.81zM21.12 36.86l4.32.97a6.53 6.53 0 0 0 7.81-4.93l.98-4.35a18 18 0 0 1-13.11 8.31z"/><path d="M19 3a16 16 0 1 0 0 32 16 16 0 0 0 0-32zm-4 5a4 4 0 1 1 0 8 4 4 0 0 1 0-8zm-3 19a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm5-8c0-1.1.9-2 2-2s2 .9 2 2-.9 2-2 2-2-.9-2-2zm6 11a4 4 0 1 1 0-8 4 4 0 0 1 0 8zm3-11a4 4 0 1 1 0-8 4 4 0 0 1 0 8z" /></svg>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" class="favorite">
                                            <svg xmlns="http://www.w3.org/2000/svg"  width="16" class="transparent"  viewBox="-1 -1 21 21" enable-background="new 0 0 19.44 18.55"><path d="M13.95 0c-1.65 0-3.2.75-4.24 2A5.46 5.46 0 0 0 0 5.48c0 2.37 1.41 5.11 4.2 8.14a40.19 40.19 0 0 0 5.14 4.64l.38.29.38-.29c.66-.5 3-2.31 5.14-4.64 2.78-3.03 4.2-5.77 4.2-8.14A5.49 5.49 0 0 0 13.95 0zm0 0"/></svg>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div>
                        <!-- ========================= -->
                        <div class="intro-article">
                            <div class="row">
                                <div class="intro-article-pic col-12 col-sm-4 col-md-6 col-lg-5">
                                    <img src="./assets/img/demo/intro-artucle.jpg" alt="" class="mw-100">
                                </div>
                                <div class="intro-article-text col-12 col-sm-8 col-md-6 col-lg-7 text-center text-sm-right">
                                    <div class="category-breadcrumb ">
                                        <ul class="text-center text-sm-right">
                                            <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                            <a href="">
                                                    آموزش
                                            </a> </li>
                                            <li> <a href="">
                                                آشنایی با ما
                                            </a> </li>
                                        </ul>
                                    </div>
                                    <h1 class="title">
                                        امداد خودرو دوست خوب خودرو شما
                                    </h1>
                                    <h3 class="author">
                                        <span>
                                            نوشته شده:  
                                        </span>
                                        <a href="">
                                            روابط عمومی امداد خودرو ایران
                                        </a>
                                    </h3>
                                    <div class="article-description d-none d-md-block">
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد . . .                                        
                                        </p>
                                    </div>
                                </div>
                            </div>  <!-- row  -->
                        </div>  <!-- intro-article  -->
                        <!-- ========================= -->
                        <!-- ========================= -->
                        <div class="intro-article">
                            <div class="row">
                                <div class="intro-article-pic col-12 col-sm-4 col-md-6 col-lg-5">
                                    <img src="./assets/img/demo/intro-artucle.jpg" alt="" class="mw-100">
                                </div>
                                <div class="intro-article-text col-12 col-sm-8 col-md-6 col-lg-7">
                                    <div class="category-breadcrumb">
                                        <ul>
                                            <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                            <a href="">
                                                    آموزش
                                            </a> </li>
                                            <li> <a href="">
                                                آشنایی با ما
                                            </a> </li>
                                        </ul>
                                    </div>
                                    <h1 class="title">
                                        امداد خودرو دوست خوب خودرو شما
                                    </h1>
                                    <h3 class="author">
                                        <span>
                                            نوشته شده:  
                                        </span>
                                        <a href="">
                                            روابط عمومی امداد خودرو ایران
                                        </a>
                                    </h3>
                                    <div class="article-description d-none d-md-block">
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد . . .                                        
                                        </p>
                                    </div>
                                </div>
                            </div>  <!-- row  -->
                        </div>  <!-- intro-article  -->
                        <!-- ========================= -->
                        <!-- ========================= -->
                        <div class="intro-article">
                            <div class="row">
                                <div class="intro-article-pic col-12 col-sm-4 col-md-6 col-lg-5">
                                    <img src="./assets/img/demo/intro-artucle.jpg" alt="" class="mw-100">
                                </div>
                                <div class="intro-article-text col-12 col-sm-8 col-md-6 col-lg-7">
                                    <div class="category-breadcrumb">
                                        <ul>
                                            <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                            <a href="">
                                                    آموزش
                                            </a> </li>
                                            <li> <a href="">
                                                آشنایی با ما
                                            </a> </li>
                                        </ul>
                                    </div>
                                    <h1 class="title">
                                        امداد خودرو دوست خوب خودرو شما
                                    </h1>
                                    <h3 class="author">
                                        <span>
                                            نوشته شده:  
                                        </span>
                                        <a href="">
                                            روابط عمومی امداد خودرو ایران
                                        </a>
                                    </h3>
                                    <div class="article-description d-none d-md-block">
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد . . .                                        
                                        </p>
                                    </div>
                                </div>
                            </div>  <!-- row  -->
                        </div>  <!-- intro-article  -->
                        <!-- ========================= -->
                        <!-- ========================= -->
                        <div class="intro-article">
                            <div class="row">
                                <div class="intro-article-pic col-12 col-sm-4 col-md-6 col-lg-5">
                                    <img src="./assets/img/demo/intro-artucle.jpg" alt="" class="mw-100">
                                </div>
                                <div class="intro-article-text col-12 col-sm-8 col-md-6 col-lg-7">
                                    <div class="category-breadcrumb">
                                        <ul>
                                            <li>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="warm-grey" width="15" viewBox="0 0 29.58 25.03" enable-background="new 0 0 29.58 25.03"><path d="M28.41 5.72a3.84 3.84 0 0 0-2.81-1.17H13.65v-.57c0-1.09-.39-2.03-1.17-2.81A3.84 3.84 0 0 0 9.67 0H3.98C2.89 0 1.96.39 1.17 1.17A3.85 3.85 0 0 0 0 3.98v17.07c0 1.09.39 2.03 1.17 2.81a3.84 3.84 0 0 0 2.81 1.17H25.6c1.09 0 2.03-.39 2.81-1.17a3.84 3.84 0 0 0 1.17-2.81V8.53c0-1.09-.39-2.02-1.17-2.81zm-1.1 15.33c0 .47-.17.88-.5 1.21-.33.33-.73.5-1.21.5H3.98c-.47 0-.88-.17-1.21-.5-.33-.33-.5-.74-.5-1.21V3.98c0-.47.17-.88.5-1.21.33-.33.74-.5 1.21-.5h5.69c.47 0 .88.17 1.21.5.33.33.5.74.5 1.21v1.14c0 .47.17.88.5 1.21.33.33.74.5 1.21.5H25.6c.48 0 .88.17 1.21.5.33.33.5.73.5 1.21v12.51zm0 0"/></svg>    
                                            <a href="">
                                                    آموزش
                                            </a> </li>
                                            <li> <a href="">
                                                آشنایی با ما
                                            </a> </li>
                                        </ul>
                                    </div>
                                    <h1 class="title">
                                        امداد خودرو دوست خوب خودرو شما
                                    </h1>
                                    <h3 class="author">
                                        <span>
                                            نوشته شده:  
                                        </span>
                                        <a href="">
                                            روابط عمومی امداد خودرو ایران
                                        </a>
                                    </h3>
                                    <div class="article-description d-none d-md-block">
                                        <p>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط فعلی تکنولوژی مورد . . .                                        
                                        </p>
                                    </div>
                                </div>
                            </div>  <!-- row  -->
                        </div>  <!-- intro-article  -->
                        <!-- ========================= -->    
                    </div>
                        
                        <div class="pagenation">
                            <ul class="">
                                <li><a href="">۱</a></li>
                                <li><a href="">۲</a></li>
                                <li><a href=""><i class="fa fa-angle-right"></i></a></li>
                            </ul>
                        </div>



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
                                            <img src="{{ $lastpost->images }}" alt="">
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
                                                <a href="#">
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


                        <div class="card">
                            <h4 class="title-sidebar d-none d-lg-block"> ما را در شبکه‌های اجتماعی دنبال کنید </h4>

                            <div class="social d-none d-lg-block">
                                <div class="social-container">
                                    <ul class="social-icons">
                                        <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                        <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>



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
