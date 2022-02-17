<div class="modal-header pt-45">
    <h5 class="modal-title">{{ __('Add New Post') }}</h5>
</div>
<div class="modal-body">
    <form id="savePostForm">
    <div class="row">
    <div class="upload-box mb-40 col-md-6">
        <div class="img-upload">
            <label for="uploadIMG">
                <div class="upload-icon">
                    <i class="las la-cloud-upload-alt"></i>
                </div>
                <p class="upload-text">{{ __('Select a file or drag and drop here') }}</p>
                <p class="upload-file-format mb-20">{{ __('jpeg, jpg, png, gif, svg, wbmp or webp file, max 5 image upload, size no more than 10MB') }}</p>
                <div class="btn theme-btn m-auto">{{ __('Upload') }}</div>
            </label>
            <input type="file" id="uploadIMG" name="imgUrl" class="d-none">
        </div>
        <div class="error text-danger" id="imgUrl_error"></div>
        <div class="show-uploaded-img">
            {{-- <div class="single-img">
                <img src="/assets/img/dog.png" alt="">
                <span class="remove-img-btn"><i class="las la-times"></i></span>
            </div> --}}
        </div>
    </div>
    <div class="upload-box mb-40 col-md-6">
        <div class="img-upload">
            <label for="uploadVideo">
                <div class="upload-icon">
                    <i class="las la-cloud-upload-alt"></i>
                </div>
                <p class="upload-text">{{ __('Select a file or drag and drop here') }}</p>
                <p class="upload-file-format mb-20">{{ __('mp4,3gp,avi,mpeg,flv,mov or qt file size no more than 10MB') }}</p>
                <div class="btn theme-btn m-auto">{{ __('Upload') }}</div>
            </label>
            <input type="file" id="uploadVideo" name="videoUrl" class="d-none">
        </div>
        <div class="error text-danger" id="videoUrl_error"></div>
        <div class="show-uploaded-img">
            {{-- <div class="single-img">
                <img src="/assets/img/dog.png" alt="">
                <span class="remove-img-btn"><i class="las la-times"></i></span>
            </div> --}}
        </div>
    </div>
    </div>
    <div class="row">
        <input type="hidden" name="id" value="{{$post->id ?? ''}}">
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="">{{ __('Add Location') }}</label>
                <select id="city" name="city">
                    <option value="">Select</option>
                    @foreach ($cities as $city)
                    <option value="{{$city->name}}" {{(!empty($post->city) && ($post->city == $city->name)) ? 'selected' : ''}}>{{$city->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="age">{{ __('Age') }}</label>
                <input type="text" name="age" value="{{$post->age??''}}" placeholder="Enter here">
            </div>
            <div class="error text-danger" id="age_error"></div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="category">{{ __('Choose Category') }}</label>
                <select id="category" name="category">
                    <option value="">Select</option>
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}" {{(!empty($post->category) && ($post->category == $category->id)) ? 'selected' : ''}}>{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="error text-danger" id="category_error"></div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="subCategory">{{ __('Choose Subcategory') }}</label>
                <select id="sub_category" name="subCategory" class="form-control">
                    <option value="">Select</option>
                    <option value="">1</option>
                    <option value="">2</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="">{{ __('Add Post Title') }}</label>
                <input type="text" name="itemTitle" value="{{$post->itemTitle??''}}" placeholder="Enter here">
            </div>
            <div class="error text-danger" id="itemTitle_error"></div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="popup-form-field">
                <label for="vaccine_detail">{{ __('Vaccine Details') }}</label>
                <input type="text" name="vaccine_detail" value="{{$post->vaccine_detail??''}}" placeholder="Enter here">
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="radio-option">
                <label for="">{{ __('Sex') }}</label>
                <div class="d-flex align-items-center gap-5">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="female" value="female" {{(!empty($post->sex) && ($post->sex == 'female')) ? 'checked' : ''}}>
                        <label class="form-check-label" for="female">{{ __('Female') }}</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="sex" id="male" value="male" {{(!empty($post->sex) && ($post->sex == 'male')) ? 'checked' : ''}}>
                        <label class="form-check-label" for="male">{{ __('Male') }}</label>
                    </div>
                </div>
            </div>
            <div class="error text-danger" id="sex_error"></div>
        </div>
        <div class="col-xl-6 col-lg-6 mb-30">
            <div class="radio-option">
                <label for="passport">{{ __('Passport') }}</label>
                <div class="d-flex align-items-center gap-5">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="passport" id="pass-yes" value="yes" {{(!empty($post->passport) && ($post->passport == 'yes')) ? 'checked' : ''}}>
                        <label class="form-check-label" for="pass-yes">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="passport" id="pass-no" value="no" {{(!empty($post->passport) && ($post->passport == 'no')) ? 'checked' : ''}}>
                        <label class="form-check-label" for="pass-no">No</label>
                    </div>
                </div>
            </div>
            <div class="error text-danger" id="passport_error"></div>
        </div>
        <div class="col-12 mb-30">
            <div class="popup-form-field">
                <label for="itemDesc">{{ __('Post Description') }}</label>
                <textarea cols="10" name="itemDesc" rows="5" placeholder="Enter here">{{$post->itemDesc??''}}</textarea>
            </div>
        </div>
        <div class="radio-option mb-30">
            <label for="">{{ __('Select Communications options:') }}</label>
            <div class="communication-options">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="showPhoneNumber" id="showPhoneNumber" value="1" {{(!empty($post->showPhoneNumber) && ($post->showPhoneNumber == 1)) ? 'checked' : ''}}>
                    <label class="form-check-label" for="showPhoneNumber">{{ __('Phone') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="showMessage" id="showMessage" value="1" {{(!empty($post->showMessage) && ($post->showMessage == 1)) ? 'checked' : ''}}>
                    <label class="form-check-label" for="showMessage">{{ __('Message') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="showComments" id="showComments" value="1" {{(!empty($post->showComments) && ($post->showComments == 1)) ? 'checked' : ''}}>
                    <label class="form-check-label" for="showComments">{{ __('Comments') }}</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="showWhatsapp" id="showWhatsapp" value="1" {{(!empty($post->showWhatsapp) && ($post->showWhatsapp == 1)) ? 'checked' : ''}}>
                    <label class="form-check-label" for="showWhatsapp">{{ __('WhatsApp') }}</label>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<div class="modal-footer pb-35">
    <div id="post_submit_notification"></div>
    <button type="button" class="btn theme-btn-light" data-bs-dismiss="modal">{{ __('Cancel') }}</button>
    <button type="button" class="btn theme-btn" id="savePost" data-url="{{route('save-post')}}">{{ __('Post') }}</button>
</div>

<script type="text/javascript">
    $("#sub_category").select2({
        placeholder: "Select Sub Category",
        ajax: {
            url: "<?php echo route("get_sub_category") ?>",
            dataType: 'json',
            type: 'post',
            delay: 250,
            data: function (params) {
                var query = {
                    cat_id: $('#category').val(),
                    page: params.page
                }

              // Query parameters will be ?search=[term]&type=public
              return query;
            },
            processResults: function(data, params) {
                params.page = params.page || 1;
                console.log(data.results);
                return {
                    results: data.results,
                    // pagination: {
                    //     more: (params.page * 30) < data.total_count
                    // }
                };
            },
            cache: true
        },
        escapeMarkup: function(markup) {
            return markup;
        }, // let our custom formatter work
    });
</script>

