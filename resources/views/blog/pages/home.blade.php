

    <div id="colorlib-main">
        <section class="ftco-section ftco-no-pt ftco-no-pb">
            <div class="container">
                <div class="row d-flex">
                    <div class="col-xl-8 py-5 px-md-5">
                        <div class="row pt-md-4">
                            <div class="col-md-12">
                                @foreach($posts as $item)
                                    <div class="blog-entry ftco-animate d-md-flex">
                                        <a href="#" class="img img-2" style="background-image: url(images/image_1.jpg);"></a>
                                        <div class="text text-2 pl-md-4">
                                            <h3 class="mb-2"><a href="#">{{ $item->title }}</a></h3>
                                            <div class="meta-wrap">
                                                <p class="meta">

                                                    <span><a href="#"><i class="icon-folder-o mr-2"></i>{{ $item->category->title }}</a></span>

                                                </p>
                                            </div>
                                            <p class="mb-4">{{ $item->excerpt }}</p>
                                            <p><a href="#" class="btn-custom">Read More <span class="ion-ios-arrow-forward"></span></a></p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>

                        </div><!-- END-->
                        @include('blog.parts.paginate')
                    </div>
                    <div class="col-xl-4 sidebar ftco-animate bg-light pt-5">
                        @include('blog.parts.search')
                        @include('blog.parts.filter')


                        <div class="sidebar-box ftco-animate">
                            <h3 class="sidebar-heading">Paragraph</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus itaque, autem necessitatibus voluptate quod mollitia delectus aut.</p>
                        </div>
                    </div><!-- END COL -->
                </div>
            </div>
        </section>
    </div><!-- END COLORLIB-MAIN -->
