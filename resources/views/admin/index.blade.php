@extends('admin.layout.index')

@section('content')


 <div class="row">

   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-info">
       <div class="inner">
         <h3>{{ \App\Models\Admin::query()->count() }}</h3>

         <p>Admins</p>
       </div>
       <a href="{{ route('admins.index') }}">
         <div class="icon">
         <i class="fa fa-user-plus"></i>
       </div>
</a>

       <a href="{{ route('admins.index') }}" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div><!-- Admins -->

   </div>


   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-danger">
       <div class="inner">
         <h3>{{ \App\Models\User::query()->count() }}</h3>

         <p>Users</p>
       </div>

       <div class="icon">
         <i class="fa fa-users"></i>
       </div>
       <a href="#" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div><!-- Users -->

   </div>

   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-success">
       <div class="inner">
         <h3>{{ \App\Models\Order::query()->count() }}</h3>

         <p>Orders</p>
       </div>

       <div class="icon">
         <i class="fa fa-shopping-cart"></i>
       </div>
       <a href="#" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div>

   </div><!-- Orders -->

   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-purple">
       <div class="inner">
         <h3>{{ \App\Models\Product::query()->count() }}</h3>

         <p>Products</p>
       </div>

       <div class="icon">
        <i class="fa fa-tshirt"></i>
       </div>
       <a href="{{ route('products.index') }}" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div>

   </div><!-- Products -->
   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-pink">
       <div class="inner">
         <h3>{{ \App\Models\Category::query()->count() }}</h3>

         <p>Categories</p>
       </div>
     <a href="{{ route('categories.index') }}">
    <div class="icon">
        <i class="fa fa-circle-c"></i>
               </div></a>

       <a href="{{ route('categories.index') }}" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div>

   </div><!-- Categories -->



   <div class="col-lg-3 col-6">

     <!-- small card -->
     <div class="small-box bg-yellow">
       <div class="inner">
         <h3>{{ \App\Models\Tag::query()->count() }}</h3>

         <p>Tags</p>
       </div>
<a href="{{ route('tags.index') }}">
     <div class="icon">
        <i class="fa fa-tags"></i>
       </div></a>

       <a href="{{ route('tags.index') }}" class="small-box-footer">
         More info <i class="fas fa-arrow-circle-right"></i>
       </a>
     </div>

   </div><!-- Tags -->

 </div>

@endsection
