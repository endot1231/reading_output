@extends('layouts.base')

@section('content')
<div id="app">
    <textarea class="ckeditor" name="text"></textarea>
</div>

@endsection

@push('javascript')
<script src="https://unpkg.com/vue@3.0.2/dist/vue.global.prod.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axi
os/0.19.2/axios.min.js"></script>
<script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script>
<script>
Vue.createApp({
    data() {
        return {
            status: 'index', // ここの内容で表示切り替え
            posts: [],
            currentPost: {},
            postTitle: '',  // タイトル
            richEditor: null    // CKEditorのインスタンス
        }
    },
    methods: {
        initRichEditor(defaultDescription) {
            const target = document.querySelector('#editor');
            ClassicEditor.create(target)
                .then(editor => {

                    this.postTitle = this.currentPost.title || '';
                    this.richEditor = editor;
                    this.richEditor.plugins
                        .get('FileRepository')
                        .createUploadAdapter = loader  => {
                            return new UploadAdapter(loader);
                        };
                    this.richEditor.setData(defaultDescription);
                });
        },
        getPosts() {
            const url = '/output';
            axios.get(url)
                .then(response => {
                    this.posts = response.data;
                });
        },
        setCurrentPost(post) {
            this.currentPost = post;
            this.status = 'edit';
        },
        changeStatus(status) {
            this.status = status;
        },
        onSave() {
            if(confirm('保存します。よろしいですか？')) {
                let url = '';
                let method = '';
                if(this.isStatusCreate) {
                    url = '/post';
                    method = 'POST';
                } else if(this.isStatusEdit) {
                    url = `/post/${this.currentPost.id}`;
                    method = 'PUT';
                }

                const params = {
                    _method: method,
                    title: this.postTitle,
                    description: this.richEditor.getData()
                };
                axios.post(url, params)
                    .then(response => {
                        if(response.data.result === true) {
                            this.getPosts();
                            this.changeStatus('index');
                        }
                    })
                    .catch(error => {
                        console.log(error); // エラーの場合
                    });
            }
        },
        onDelete(post) {
            if(confirm('削除します。よろしいですか？')) {
                const url = `/post/${post.id}`;
                axios.delete(url)
                    .then(response => {
                        if(response.data.result === true) {
                            this.getPosts();
                        }
                    });
            }
        }
    },
    computed: {
        isStatusIndex() {
            return (this.status === 'index');
        },
        isStatusCreate() {
            return (this.status === 'create');
        },
        isStatusEdit() {
            return (this.status === 'edit');
        }
    },
    watch: {
        status(value) {
            if(value === 'create') {
                this.currentPost = {};
            }

            const editorKeys = ['create', 'edit'];
            const defaultDescription = (value === 'edit') ? this.currentPost.description : '';

            if(editorKeys.includes(value)) {
                Vue.nextTick(() => {
                    this.initRichEditor(defaultDescription);
                });
            }
        }
    },
    setup() {
        return {
            richEditor: Vue.reactive({})
        }
    },
    mounted() {
        this.getPosts();
    }
}).mount('#app');
</script>
@endpush
