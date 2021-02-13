
@extends('layouts.app')
<!-- ◆ all.bladeファイルを親にもつビューファイル -->

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">レシピ一覧</div>

                <div class="card-body">
                    <div class="md-3">
                      <a href="{{ route('recipes.create') }}" class="btn btn-primary mb-3">レシピ新規登録</a>
                    </div>
                    {{-- @include('components.alert') --}}
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>料理名</th>
                          <th>カテゴリー</th>
                          <th>詳細</th>
                        </tr>
                      </thead>
                      @foreach($recipes as $recipe)
                        <tr>
                          <td class="align-middle">{{ $recipe -> title }}</td>
                          <td class="align-middle">{{ $recipe -> category }}</td>
                          <td class="align-middle">
                            <div class="d-flex">
                              <a href="{{ route('recipes.edit', $recipe->id) }}" class="btn btn-secondary btn-sm">編集</a>
                              <a href="{{ route('recipes.show', $recipe->id) }}" class="btn btn-secondary btn-sm ml-1">詳細</a>
                            </div>
                          </td>
                        </tr>
                      @endforeach
                    </table>
                    {{ $recipes -> links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
