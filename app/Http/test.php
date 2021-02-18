<form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
    @csrf
    <!-- 省略 -->
    <div class="form-group row">
        <label for="image" class="col-md-4 col-form-label text-md-right">Example file input</label>
        <div class="col-md-6">
            <input type="file" class="form-control-file" id="image" name="image" accept="image/png, image/jpeg">
        </div>
    </div>
      <!-- 省略 -->
</form>

