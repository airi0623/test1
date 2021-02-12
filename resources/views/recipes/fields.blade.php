<div class="form-group">
  <label for="InputTitle">タイトル</label>
  <input type="text" name="title" value="{{ $recipe->title ?? ''}}" class="form-control form-control @error('title') is-invalid @enderror" id="InputTitle" placeholder="Enter title">
  @error('title')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" accept="image/png, image/jpeg">
</div>

<div class="form-group">
  <label for="InputCategoryId">カテゴリー</label>
  <input type="integer" name="category_id" value="{{ $recipe->category_id ?? ''}}" class="form-control form-control @error('category_id') is-invalid @enderror" id="InputCategoryId" name="category_id">
  @error('category_id')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>




<button type="submit" class="btn btn-primary">送信</button>
<!-- route{{}}の記述方法が使えない -->
<a href="/recipes" class="btn btn-secondary">一覧へ戻る</a>