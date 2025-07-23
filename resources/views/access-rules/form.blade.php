<div class="row">
    <div class="col-md-6">
        <label>Source IP</label>
        <input type="text" name="source_ip" class="form-control" value="{{ old('source_ip', $accessRule->source_ip ?? '') }}" required>
    </div>

    <div class="col-md-6">
        <label>Destination IP</label>
        <input type="text" name="destination_ip" class="form-control" value="{{ old('destination_ip', $accessRule->destination_ip ?? '') }}" required>
    </div>

    <div class="col-md-4 mt-3">
        <label>Port</label>
        <input type="text" name="port" class="form-control" value="{{ old('port', $accessRule->port ?? '') }}" required>
    </div>

    <div class="col-md-4 mt-3">
        <label>Protocol</label>
        <select name="protocol" class="form-control" required>
            <option value="TCP" {{ old('protocol', $accessRule->protocol ?? '') == 'TCP' ? 'selected' : '' }}>TCP</option>
            <option value="UDP" {{ old('protocol', $accessRule->protocol ?? '') == 'UDP' ? 'selected' : '' }}>UDP</option>
            <option value="ICMP" {{ old('protocol', $accessRule->protocol ?? '') == 'ICMP' ? 'selected' : '' }}>ICMP</option>
        </select>
    </div>

    <div class="col-md-4 mt-3">
        <label>
            <input type="checkbox" name="is_allowed" value="1" {{ old('is_allowed', $accessRule->is_allowed ?? true) ? 'checked' : '' }}>
            Is Allowed?
        </label>
    </div>

    <div class="col-md-12 mt-3">
        <label>Remarks</label>
        <textarea name="remarks" class="form-control" rows="3">{{ old('remarks', $accessRule->remarks ?? '') }}</textarea>
    </div>
</div>
