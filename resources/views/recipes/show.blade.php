



@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">レシピ詳細</div>

                <div class="card-body">
                    {{-- @include('components.alert') --}}
                    <table class="table">
                      <tr>
                        <th>作成日</th>
                        <td>{{ $recipe->created_at->format('Y年m月d日') }}</td>
                      </tr>
                      <tr>
                        <th>PhotoPhoto</th>
                        <td>
                          <div class="box-img">
                            <img src="../storage/image/{{$recipe->image}}" alt="画像だよ" class="img-detail">
                          </div>
                        </td>
                      </tr>
                      <tr>
                        <th>料理名</th>
                        <td>{{ $recipe->title }}</td>
                      </tr>
                      <tr>
                        <th>カテゴリー</th>
                        <td>{{ $recipe->category }}</td>
                      </tr>

                    </table>
                    <a href="/recipes" class="btn btn-secondary">戻る</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
