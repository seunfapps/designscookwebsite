@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Post a job</span></li>
@stop
@section('content')
    <div class="block-title"><h2>Pick A Category</h2></div>
    <div id="categories">

    @if (!$categories->isEmpty())
        @foreach($categories as $category)
            <div class="split">
                <div class="panel-block size3">
                    <h3>{{$category->name}}</h3>
                    <ul>
                        <?php
                            $subcategories = $category->subcategories ;
                            foreach($subcategories as $subcategory){
                                ?>
                                <li>{{HTML::link('job/details/'.$subcategory->id, $subcategory->name)}}</li>
                                <?php
                            }
                        ?>

                    </ul>

                </div>
            </div>
        @endforeach
    @endif 
@stop