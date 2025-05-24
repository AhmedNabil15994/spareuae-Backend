<div class="tab-pane fade" id="ads">
  <h3 class="page-title">{{ __('setting::dashboard.settings.form.tabs.ads') }}</h3>
  <div class="col-md-10">


    {{-- <div class="form-group">
        <label class="col-md-2">
            {{ __('setting::dashboard.settings.form.number_of_free') }}
        </label>
        <div class="col-md-9">
            <input type="number" class="form-control" name="other[number_of_free]" value="{{ setting('other','number_of_free') ?? 2 }}" autocomplete="off" />
        </div>
    </div> --}}

    <div class="form-group">
      <label class="col-md-2">
        {{ __('setting::dashboard.settings.form.default_price') }}
      </label>
      <div class="col-md-9">
        <input type="number" class="form-control" name="other[default_price]"  value="{{ setting('other','default_price') ?? 0  }}" autocomplete="off" />
      </div>
    </div>

    <div class="form-group">
      <label class="col-md-2">
        {{ __('setting::dashboard.settings.form.default_duration') }}
      </label>
      <div class="col-md-9">
        <input type="number" class="form-control" name="other[default_duration]"  value="{{ setting('other','default_duration') ?? 5  }}" autocomplete="off" />
      </div>
    </div>



    <div class="form-group">
      <label class="col-md-2">
        {{ __('setting::dashboard.settings.form.protected_cat') }}
      </label>
      <div class="col-md-9">

        <select name="protectd_cat[]" id="single" multiple class="form-control select2">
          @foreach ($mainCategories as $category)
            <option value="{{ $category->id }}"
                    @if (in_array( $category->id , setting('protectd_cat') ?? []))
                      selected
              @endif>
              {{ $category->translateOrDefault(locale())->title}}
            </option>
          @endforeach
        </select>
      </div>
    </div>




  </div>
</div>
