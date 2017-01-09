@extends('layouts.app')

@section('content')
    <section id='homeBillboard_container' style="max-width: 2000px; margin: auto; ">
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $i = 1;?>
                @foreach($billboards as $billboard)
                    <?php  
                        if($i==1){
                            echo '<div class="carousel-item active">';
                        } else {
                            echo '<div class="carousel-item">';
                        }
                    ?>
                        <!-- <img src="../images/advertising/homeBillboard/precious.jpg" alt=""> -->
                        <img src="{{$img_filePath}}{{$billboard->content}}.jpg" alt="">
                    </div>
                    <?php $i = $i+1;?>
                @endforeach
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>    
    </section>
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Welcome</div>

                    <div class="panel-body">
                        Your Application's Landing Page.
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
