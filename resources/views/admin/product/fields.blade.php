<label for="name-field">Name</label>
<input type="text" id="name-field" name="name" placeholder="New product" value="{{ input_value($obj, 'name') }}" class="form-control">
<br>

<label for="price-field">Price</label>
<input type="number" id="price-field" name="price" value="{{ number_format(input_value($obj, 'price'), 2) }}" step="0.01" min="0" class="form-control">
<br>

<label for="stock-field">Stock Quantity</label>
<input type="number" id="stock-field" name="stock" value="{{ input_value($obj, 'stock', 0) }}" step="1" min="0" class="form-control">
<br>

<label for="description-field">Description</label>
<textarea id="description-field" name="description" class="form-control">{{ input_value($obj, 'description') }}</textarea>
<br>

<button type="submit" class="btn btn-primary">Save</button>