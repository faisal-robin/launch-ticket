@extends('layouts.home')

@section('title', 'Page Title')

@section('home_content')
   
      <!-- Breadcrumb Area Start -->
      <section class="abh-breadcrumb-area">
         <div class="breadcrumb-top">
            <div class="container">
               <div class="col-lg-12">
                  <div class="breadcrumb-box">
                     <h2>{{$blog_data->title}}</h2>
                      <ul class="breadcrumb-inn">
                        <li><a href="index.html">Home</a></li>
                        <li class="active"><a href="#">Blog</a></li>
                        <li class="active"><a href="#">{{$blog_data->title}}</a></li>
                      </ul>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Breadcrumb Area End -->
       
       
      <!-- Blog Area Start -->
      <section class="abh-blog-page-area section_70">
         <div class="container">
            <div class="row">
               <div class="col-lg-8">
                  <div class="blog-page-left">
                     <div class="single-blog-item blog-single-page">
                        <div class="blog-image">
                           <img src="{{url('storage/app/'.$blog_data->image_source)}}" alt="blog" />
                        </div>
                        <div class="blog-desc">
                           <div class="post-meta">
                              <p class="date">{{$blog_data->date}}</p>
                              <p>By <a href="#">Admin</a></p>
                           </div>
                           <h3>{{$blog_data->title}}</h3>
                           {!!$blog_data->short_summary!!}
                           {!!$blog_data->full_summary!!}
                         
                    
                         
                     </div>
                     </div>
                 
                    
                  </div>
               </div>
<!--               <div class="col-lg-4">
                  <div class="sidebar-widget">
                     <div class="single-sidebar">
                        <form>
                           <input type="search" placeholder="Search..." />
                           <button type="submit"><i class="fa fa-search"></i></button>
                        </form>
                     </div>
                     <div class="single-sidebar">
                        <h3>Categories</h3>
                        <ul class="category">
                           <li><a href="#">Best Package</a></li>
                           <li><a href="#">Destinations</a></li>
                           <li><a href="#">Discovery</a></li>
                           <li><a href="#">Travel</a></li>
                           <li><a href="#">Trendy</a></li>
                           <li><a href="#">Popular</a></li>
                           <li><a href="#">Events</a></li>
                        </ul>
                     </div>
                     <div class="single-sidebar">
                        <h3>Tags</h3>
                        <ul class="Tags-catagory">
                           <li><a href="#">Fashion</a></li>
                           <li><a href="#">Sea</a></li>
                           <li><a href="#">Mountain</a></li>
                           <li><a href="#">Enjoy</a></li>
                           <li><a href="#">Hot</a></li>
                           <li><a href="#">Popular</a></li>
                           <li><a href="#">Events</a></li>
                        </ul>
                     </div>
                  </div>
               </div>-->
            </div>
         </div>
      </section>
      <!-- Blog Area End -->
       
       
@endsection