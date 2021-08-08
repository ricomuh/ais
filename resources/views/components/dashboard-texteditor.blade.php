@props(['name', 'value' => ''])

<textarea name="{{ $name }}" id="{{ $name }}" class="tiny" cols="30" rows="10">{{ $value }}</textarea>

@push('custom-script')
        <script src="https://cdn.tiny.cloud/1/xvurvierghxp2jdzixqjvajoqlnf73d7x8ylj6xucwpc2tio/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <script>
        tinymce.init({
            mode: "specific_textareas",
            editor_selector: "tiny",
            skin: 'oxide-dark',
            //content_css: 'dark',
            height: 500,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks fullscreen',
                'insertdatetime media table contextmenu'
            ],
            toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image code',
            toolbar_mode: 'floating',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            //convert_urls: false;
            convert_urls: false,
            images_upload_url: '{{ route('dashboard.uploadImg') }}',
            images_upload_handler: function(blobInfo, success, failure) {
                var xhr, formData;
        
                xhr = new XMLHttpRequest();
                xhr.withCredentials = false;
                xhr.open('POST', '{{ route('dashboard.uploadImg') }}');
                var token = '{{ csrf_token() }}';
                xhr.setRequestHeader("X-CSRF-Token", token);
        
                xhr.onload = function() {
                    var json;
        
                    if (xhr.status != 200) {
                        failure('HTTP Error: ' + xhr.status);
                        return;
                    }
        
                    json = JSON.parse(xhr.responseText);
        
                    if (!json || typeof json.location != 'string') {
                        failure('Invalid JSON: ' + xhr.responseText);
                        return;
                    }
        
                    success(json.location);
                };
        
                formData = new FormData();
                formData.append('file', blobInfo.blob(), blobInfo.filename());
        
                xhr.send(formData);
            },
        });
        </script>
    @endpush