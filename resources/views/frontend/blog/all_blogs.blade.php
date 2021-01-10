@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')
   
      <!-- Breadcrumb Area Start -->
      <section class="abh-breadcrumb-area">
         <div class="breadcrumb-top">
            <div class="container">
               <div class="col-lg-12">
                  <div class="breadcrumb-box">
                     <h2>Blogs</h2>
                      <ul class="breadcrumb-inn">
                        <li><a href="{{url('')}}">Home</a></li>
                        <li class="active"><a href="{{url('all-blogs')}}">Blogs</a></li>                       
                      </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
      
<!-- Blog Area Start -->
<section class="abh-blog-area section_70" id="blogPostShow">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="site-heading">
                    <h2>Latest Blog</h2>
                    <p>Lorem ipsum dolor sit amet, conseetuer adipiscing elit. Aenan comdo igula eget. Aenean massa cum
                        sociis Theme natoque.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($all_blog as $v_blog)
            <div class="col-lg-4">
                <div class="single-blog-item">
                    <div class="blog-image">
                        <a href="{{url('blog?id='.$v_blog->id)}}">
                            <img src="{{asset('storage/app/'.$v_blog->image_source)}}" style="height: 230px;" alt="blog" />
                        </a>
                    </div>
                    <div class="blog-desc">
                        <div class="post-meta">
                            <p class="date">{{$v_blog->date}}</p>
                        </div>
                        <h3><a href="{{url('blog?id='.$v_blog->id)}}">{{$v_blog->title}}</a></h3>
                        <p>{!!$v_blog->short_summary!!}</p>
                        <a href="{{url('blog?id='.$v_blog->id)}}" class="btn-link readmore">Read more <span><i
                                    class="fa fa-arrow-right"></i></span></a>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
<!-- Blog Area End -->

@endsection