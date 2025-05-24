<div class="tab-content">
  <div class="tab-pane fade in active" id="colored-rounded-tab-general">
    <div class="form-group">
      <label class="control-label col-md-3">
      </label>
      <div class="col-md-12">
        <div class="possibilities-form">
          @if(isset($model))
          @foreach($model->galleries as $key => $gallery)
          <div id="possibility-template">
            <div class="row delete-content" style="margin-top: 20px;padding: 16px 11px;box-shadow: 0px 0px 3px 0px #3641503d;">
              <input type="hidden" class="gallery-id" name="old_galleries[{{ $gallery->id }}][id]" value="{{ $gallery->id }}">
              <div class="tab-content">
                {!! field()->text("old_galleries[$gallery->id][link]",
                __('qsale::dashboard.ads.form.link') , $gallery->getFirstMediaUrl('image')) !!}
                {!! field()->file("old_galleries[$gallery->id][image]",
                __('qsale::dashboard.ads.form.image') , $gallery->getFirstMediaUrl('image')) !!}
              </div>
              <div class="col-xs-12">
                <span class="input-group-btn">
                  <a data-input="images" data-preview="holder" class="btn btn-danger delete-possibility">
                    <i class="fa fa-trash"></i>
                  </a>
                </span>
              </div>
            </div>
          </div>
          @endforeach
          @endif
        </div>

        <br>
        <div class="form-group">
          <button type="button" class="btn btn-sm green add-possibility" data-style="slide-down" data-spinner-color="#333">
            <i class="fa fa-plus-circle"></i>

          </button>
        </div>
      </div>
    </div>
  </div>
</div>

@push('scripts')
<link rel="stylesheet" href="https://app.hojozatapp.com/SewidanField/plugins/bootstrap-fileinput/css/fileinput.min.css">
<script src="https://app.hojozatapp.com/SewidanField/plugins/bootstrap-fileinput/js/fileinput.min.js"></script>
<script>
  // member FORM / ADD NEW member
        $(document).ready(function () {
            var html =`<div id="possibility-template" >
                                <div class="row delete-content"
                                     style="margin-top: 20px;padding: 16px 11px;box-shadow: 0px 0px 3px 0px #3641503d;">

                                    <div class="tab-content">

                              </div>
                      {!! field()->text("galleries[::index][link]",__('qsale::dashboard.ads.form.link') ) !!}

                                <x-core::filemanger name="galleries[::index][image]" value="" :label="__('qsale::dashboard.ads.form.image')"   />
                                     <div class="col-xs-12">
                                        <span class="input-group-btn">
                                            <a data-input="images" data-preview="holder"
                                               class="btn btn-danger delete-possibility">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </span>
                                    </div>
                                </>
                            </div>`;




            $(".add-possibility").click(function (e) {
                e.preventDefault();
                var content = html;
                var rand = Math.floor(Math.random() * 9000000000) + 1000000000;
                content = replaceAll(content, '::index', rand);
                $(".possibilities-form").append(content);
                $('.make-switch').bootstrapSwitch();
                $(".file_upload_preview").fileinput({
                     showUpload: false,
                     showRemove: false,
                     showCaption: false
                     });
            });
        });

        // DELETE member BUTTON
        $(".possibilities-form").on("click", ".delete-possibility", function (e) {
             e.preventDefault();
             const id= $(this).closest('.delete-content').find('.gallery-id').val();
             if(id){
                 $('.possibilities-form').append(`<input type="hidden"  name="deleted_galleries[]"  value="${id}">`);
             }
            $(this).closest('.delete-content').remove();

        });

        function escapeRegExp(string) {
            return string.replace(/[.+?^${}()|[]\]/g, "\$&");
        }

        // Define functin to find and replace specified term with replacement string
        function replaceAll(str, term, replacement) {
            return str.replace(new RegExp(escapeRegExp(term), 'g'), replacement);
        }


</script>

@endpush
