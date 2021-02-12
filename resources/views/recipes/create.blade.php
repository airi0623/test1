@extends('layouts.app')
<!-- ◆ all.bladeファイルを親にもつビューファイル -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">レシピ登録</div>

                <div class="card-body">

                  <form method="POST" action="{{ route('recipes.store') }}" enctype="multipart/form-data">
                    @csrf
                    @include('recipes.fields')
                  </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
