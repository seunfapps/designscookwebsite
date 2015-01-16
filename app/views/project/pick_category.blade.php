@extends('layouts.master')
@section('pagetree')
<li>{{HTML::link('/', 'Homepage')}}</li>
<li><span>Post a project</span></li>
@stop
@section('content')

    
       <div class="block-title">
            <h2>Pick A Category</h2>                            
        </div>
        <div class="split post-blocks dat-scrollnimate" data-animation="flipInX" style="display:flex">
            @if (!$categories->isEmpty())
                @foreach($categories as $category)
                    <div class="size3">
                        <h3>{{$category->name}}</h3>
                        <p>
                            <?php
                                $subcategories = $category->subcategories ;
                                foreach($subcategories as $subcategory){
                                    ?>
                                
                                <i class="fa fa-caret-right fa-1x"></i> &nbsp; {{HTML::link('project/brief/'.$subcategory->id, $subcategory->name)}}</li><br />
                                    <?php
                                }
                            ?>

                        </p>

                    </div>                    
                @endforeach
            @endif 
        </div>
@stop