@extends('layouts.base')

@section('content')
<div id="app" class="mt-5 pt-5">
    <div id="editor-container"></div>
</div>
@endsection

@push('css')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush

@push('javascript')
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.2/axios.min.js"></script>
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
<script src="https://unpkg.com/quill-table-ui@1.0.5/dist/umd/index.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module@3.0.0/image-resize.min.js" type="text/javascript"></script>

<!--
<script src="{{asset('js/ckeditor.js')}}"></script>
-->
<script>
var quill = new Quill('#editor-container', {
  modules: {
    imageResize: {
        displaySize: true
    },
    toolbar: [
      [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
      ['bold', 'italic', 'underline', 'strike'],
      ['link', 'blockquote', 'code-block', 'image'],
      [{ 'color': [] }, { 'background': [] }], 
      [{ 'align': [] }],
      [{ list: 'ordered' }, { list: 'bullet' }]
    ]
  },
  placeholder: '',
  theme: 'snow'
});

quill.on('text-change', function(delta, oldDelta, source) {
  if (source == 'api') {
    console.log("An API call triggered this change.");
  } else if (source == 'user') {
    console.log(quill.root.innerHTML);
  }
  
});

class UploadAdapter {
    constructor(loader) {
        this.loader = loader;
    }
    upload() {
        return this.loader.file
        .then(file => {
            return new Promise((resolve, reject) => {
                const url = '/post/upload_image';
                let formData = new FormData();
                formData.append('image', file);
                axios.post(url, formData)
                    .then(response => {
                        if(response.data.result === true) {
                            const imageUrl = response.data.image_url;
                            resolve({ default: imageUrl });
                        } else {
                            reject();
                        }
                    })
                    .catch(error => {
                        reject();
                    });
            });
        });
    }
}

</script>
@endpush
