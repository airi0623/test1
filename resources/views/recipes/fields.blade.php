<!-- タイトル -->
<div class="form-group">
  <label for="InputTitle">タイトル</label>
  <!-- <input type="text" name="title" value="{{ $recipe->title ?? ''}}" class="form-control form-control @error('title') is-invalid @enderror" id="InputTitle" placeholder="Enter title"> -->
  @if(isset( $recipe -> title ))
    <input type="text" name="title" value="{{ old('title', $recipe->title)}}" class="form-control form-control @error('title') is-invalid @enderror" id="InputTitle" placeholder="Enter title">
  @else 
    <input type="text" name="title" value="{{ old('title')}}" class="form-control form-control @error('title') is-invalid @enderror" id="InputTitle" placeholder="Enter title">
  @endif
  @error('title')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>
<!-- 画像保存 -->
<div class="form-group">
    <label for="exampleFormControlFile1">Example file input</label>
    @if(isset( $recipe -> image ))
      <input type="file" name="image" value="{{ old('image', $recipe->image)}}" class="form-control-file" id="exampleFormControlFile1" accept="image/png, image/jpeg">
    @else 
      <input type="file" name="image" value="{{ old('image')}}" class="form-control-file" id="exampleFormControlFile1" accept="image/png, image/jpeg">
    @endif
    @error('image')
    <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
    </span>
    @enderror
</div>
<!-- カテゴリー -->
<div class="form-group">
  <label for="InputCategoryId">カテゴリー</label>
  {{-- <!-- <input type="integer" name="category" value="{{ $recipe->category ?? ''}}" class="form-control form-control @error('category') is-invalid @enderror" id="InputCategoryId" name="category"> --> --}}
  <select type="text" class="form-control" name="category">
    @foreach($category as $key => $value)
      <option value="{{ $value }}" name="category" class="form-control form-control" class="form-control form-control" id="InputCategoryId">{{ $value }}</option>
    @endforeach
  </select>
  @error('category')
  <span class="invalid-feedback" role="alert">
      <strong>{{ $message }}</strong>
  </span>
  @enderror
</div>

<button type="submit" class="btn btn-primary">送信</button>
<!-- route{{}}の記述方法が使えない -->
<a href="/recipes" class="btn btn-secondary">一覧へ戻る</a>