<div class="row mb-3">
    <div class="col-md-4 text-md-end">
        <label for="title" class="col-form-label">Title: </label>
    </div>
    <div class="col-md-6">
        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror" required value="{{ old('title') ?? $sheet->title }}">
        @error('title')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4 text-md-end">
        <label for="description" class="col-form-label">Description: </label>
    </div>
    <div class="col-md-8">
        <textarea id="description" name="description" type="text" class="form-control text-area-resize-none @error('description') is-invalid @enderror" required>{{ old('description') ?? $sheet->description }}</textarea>
        @error('description')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-4 text-md-end">
        <label for="theme" class="col-form-label">Theme: </label>
    </div>
    <div class="col-md-2">
        <select class="form-select" name="theme" id="theme" required>
            @foreach ($sheet->getThemes() as $themeKey => $theme)
                <option class="theme-{{ $theme }}" value="{{ $themeKey }}" @if($sheet->theme == $theme) selected @endif>{{ ucfirst($theme) }}</option>
            @endforeach
        </select>
    </div>
</div>