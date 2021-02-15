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
      <input type="file" name="image" value="{{ old('image', $recipe->image)}}" class="form-control-file" id="input-file" accept="image/png, image/jpeg">
      <div id="box-img-recipe">
        <div class="box-img" id="box_for_preview">
          <img src="/storage/image/{{$recipe->image}}" alt="画像だよ" class="img-recipe">
        </div>
      </div>
    @else 
      <input type="file" name="image" value="{{ old('image')}}" class="form-control-file" id="input-file" accept="image/png, image/jpeg">
      <div id="box-img-recipe">
      </div>
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
  <select type="text" class="form-control" name="category_id">
  <option value = "" selected>選択してください</option>
    @foreach($categories as $category)
      @if(isset( $recipe -> category_id))
        <option value="{{ $category->id }}" selected class="form-control form-control" id="InputCategoryId">{{ $category->category }}</option>
      @else 
        <option value = "{{ $category->id }}" class="form-control form-control" id="InputCategoryId">{{ $category->category }}</option>
      @endif
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