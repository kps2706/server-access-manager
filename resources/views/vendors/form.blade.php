@csrf

<div class="mb-3">
    <label for="vendor_id">Vendor ID</label>
    <input type="text" name="vendor_id" class="form-control" value="{{ old('vendor_id', $vendor->vendor_id ?? '') }}" placeholder="vendor name...">
</div>
<div class="mb-3">
    <label for="name">Name</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $vendor->name ?? '') }}" required>
</div>
<div class="mb-3">
    <label for="email">Email</label>
    <input type="email" name="email" class="form-control" value="{{ old('email', $vendor->email ?? '') }}">
</div>
<div class="mb-3">
    <label for="mobile">Mobile</label>
    <input type="text" name="mobile" class="form-control" value="{{ old('mobile', $vendor->mobile ?? '') }}">
</div>
<div class="mb-3">
    <label for="company">Company</label>
    <input type="text" name="company" class="form-control" value="{{ old('company', $vendor->company ?? '') }}">
</div>
<div class="mb-3">
    <label for="address">Address</label>
    <textarea name="address" class="form-control">{{ old('address', $vendor->address ?? '') }}</textarea>
</div>
<div class="mb-3">
    <label for="status">Status</label>
    <select name="status" class="form-control">
        <option value="Active" {{ (old('status', $vendor->status ?? '') == 'Active') ? 'selected' : '' }}>Active</option>
        <option value="Inactive" {{ (old('status', $vendor->status ?? '') == 'Inactive') ? 'selected' : '' }}>Inactive</option>
    </select>
</div>
<button type="submit" class="btn btn-success">Save</button>
