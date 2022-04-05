<div class="form-group">
  <label for="name">Name</label>
  <input id="name" type="text" name="name" class="form-control">
</div>
<div class="form-group">
  <label for="address">Address Line 1</label>
  <input id="address" type="text" name="address" class="form-control">
</div>
<div class="form-group">
  <label for="city">City</label>
  <input id="city" type="text" name="city" class="form-control">
</div>
<div class="form-group">
  <label for="country">Country</label>
  <input id="country" type="text" name="country" class="form-control">
</div>

@if($errors->any())
  <div class="mb-3">
    <ul>
      @foreach($errors->all() as $error)
        <li class="list-group-item list-group-item-danger">{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
