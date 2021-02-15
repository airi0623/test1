<h1>hello</h1>
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">レシピ編集</div>
                <div class="card-body">
                  <form method="POST" action="{{ route('recipes.update', $recipe) }}" enctype="multipart/form-data">
                    @method('PUT')
                    {{ method_field('PUT') }}
                    @csrf
                    @include('recipes.fields')
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
