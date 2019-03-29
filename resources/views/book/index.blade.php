@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="grid">
            <div class="grid-sizer"></div>
            @foreach($books as $book)
                <div class="grid-item">
                    <div>
                        <img src="{{$book->image_proxy}}">
                    </div>
                    <div class="book-info">
                        <p>作者：{{$book->author}}</p>
                        <p>标签：{{$book->tags}}</p>
                        <p>评分：{{$book->average}}分</p>
                        <p>页码：{{$book->pages}}页</p>
                        <p>状态：
                            @switch($book->status)
                                @case(1)
                                计划读
                                @break
                                @case(2)
                                正在读
                                @break
                                @case(3)
                                已读完
                                @break
                                @default
                                计划读
                            @endswitch
                        </p>
                       <p>途径：
                           @switch($book->pathway)
                               @case(1)
                               实体书
                               @break
                               @case(2)
                               kindle
                               @break
                               @case(3)
                               网易蜗牛阅读
                               @break
                               @case(4)
                               微信读书
                               @break
                               @case(5)
                               藏书阁
                               @break
                               @default
                               实体书
                           @endswitch
                       </p>
                    </div>
                    <div>
                        <p class="content">{{$book->summary}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection

@section('styles')
    <style>
        * {
            box-sizing: border-box;
        }

        p {
            margin-bottom: 0.5rem;
        }

        /* force scrollbar */
        html {
            overflow-y: scroll;
        }

        body {
            font-family: sans-serif;
        }

        /* ---- grid ---- */

        .grid {
            /*background: #DDD;*/
        }

        /* clear fix */
        .grid:after {
            content: '';
            display: block;
            clear: both;
        }

        /* ---- .grid-item ---- */

        .grid-sizer,
        .grid-item {
            width: 23%;
            padding: 10px;
            margin-bottom: 10px;
            background-color: #fff;
            float: left;
        }

        .grid-item img {
            display: block;
            width: 100%;
            border-radius: 7px;
            height: 21rem;
        }

        .book-info {
            margin-top: 7px;
        }

        .content {
            padding-top: 5px;
            color: #888;
        }
    </style>
@endsection

@section('scripts')
    <script src="https://unpkg.com/imagesloaded@4/imagesloaded.pkgd.min.js"></script>
    <script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
    <script>
        // init Masonry
        var $grid = $('.grid').masonry({
            itemSelector: '.grid-item',
            percentPosition: true,
            columnWidth: '.grid-sizer',
            gutter: 15
        });
        // layout Masonry after each image loads
        $grid.imagesLoaded().progress(function () {
            $grid.masonry();
        });

    </script>
@endsection